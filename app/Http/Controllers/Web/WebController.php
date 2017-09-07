<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller {

	const SHEET_ID = '1iZ7KkO4bg9X7cFs5ynL2QT_ywxOE3EUCq_PjAWTNCrE';
	
	public function index ($id) {

		$validation = Validator::make([
			'id' => $id
		],[
			'id' => 'required|numeric'
		]);

		if ($validation->fails()) {
			session()->flash('error', 'Invalid Id provided');
			return redirect('final');
		} else {
			define('APPLICATION_NAME', 'Google Sheets API PHP Quickstart');
			define('CREDENTIALS_PATH', '~/.credentials/sheets.googleapis.com-php-quickstart.json');
			define('CLIENT_SECRET_PATH', __DIR__ . '/client_secret.json');
			define('SCOPES', implode(' ', array(
				\Google_Service_Sheets::SPREADSHEETS)
			));

			$client = $this->getClient();
			$service = new \Google_Service_Sheets($client);

			// Prints the names and majors of students in a sample spreadsheet:
			// https://docs.google.com/spreadsheets/d/1BxiMVs0XRA5nFMdKvBdBZjgmUUqptlbs74OgvE2upms/edit
			$range = 'Sheet1!'.($id+1).':'.($id+1);
			$response = $service->spreadsheets_values->get(self::SHEET_ID, $range);
			$values = $response->getValues();

			if (count($values) == 0) {
				session()->flash('error', 'Invalid Id provided');
			  	return redirect('final');
			} else {
				$data = $values[0];
				return view('welcome',[
					'id' => $id,
					'first_name' => $data[0] ?? '',
					'last_name' => $data[1] ?? '',
					'email' => $data[2] ?? '',
					'location' => $data[4] ?? '',
					'family_rec1_name' => $data[5] ?? '',
					'family_rec1_description' => $data[6] ?? '',
					'apprentice_rec1_name' => $data[7] ?? '',
					'apprentice_rec1_description' => $data[8] ?? '',
					'family_rec2_name' => $data[9] ?? '',
					'family_rec2_description' => $data[10] ?? '',
					'apprentice_rec2_name' => $data[11] ?? '',
					'apprentice_rec2_description' => $data[12] ?? ''
				]); 
			}
		}
	}

	public function store ($id) {
		$this->validate(request(),[
			'email' => 'required|email',
			'family_rec1_pref' => 'nullable|numeric',
			'family_rec1_tell' => 'nullable|string',
			'family_rec2_pref' => 'nullable|numeric',
			'family_rec2_tell' => 'nullable|string'
		]);
		$validation = Validator::make([
			'id' => $id
		],[
			'id' => 'required|numeric'
		]);

		if ($validation->fails()) {
			session()->flash('error', 'Invalid Id provided');
		} else {
			define('APPLICATION_NAME', 'Google Sheets API PHP Quickstart');
			define('CREDENTIALS_PATH', '~/.credentials/sheets.googleapis.com-php-quickstart.json');
			define('CLIENT_SECRET_PATH', __DIR__ . '/client_secret.json');
			define('SCOPES', implode(' ', array(
				\Google_Service_Sheets::SPREADSHEETS)
			));

			$client = $this->getClient();
			$service = new \Google_Service_Sheets($client);
			$range = 'Sheet1!P'.($id+1).':S'.($id+1);
			$params = array(
				'valueInputOption' => 'RAW'
			);
			$requestBody = new \Google_Service_Sheets_ValueRange(array(
				'values' => array(
					array(
						request('family_rec1_pref'),
						request('family_rec1_tell'),
						request('family_rec2_pref'),
						request('family_rec2_tell')
					)
				)
			));
			$response = $service->spreadsheets_values->update(self::SHEET_ID, $range, $requestBody, $params);
			session()->flash('message', 'Your response was saved sucessfully. Thank You');
		}
		return redirect('final');
	}

	function getClient() {
	  $client = new \Google_Client();
	  $client->setApplicationName(APPLICATION_NAME);
	  $client->setScopes(SCOPES);
	  $client->setAuthConfig(CLIENT_SECRET_PATH);
	  $client->setAccessType('offline');

	  // Load previously authorized credentials from a file.
	  $credentialsPath = $this->expandHomeDirectory(CREDENTIALS_PATH);
	  if (file_exists($credentialsPath)) {
	    $accessToken = json_decode(file_get_contents($credentialsPath), true);
	  } else {
	    // Request authorization from the user.
	    $authUrl = $client->createAuthUrl();
	    printf("Open the following link in your browser:\n%s\n", $authUrl);
	    print 'Enter verification code: ';
	    $authCode = trim(fgets(STDIN));

	    // Exchange authorization code for an access token.
	    $accessToken = $client->fetchAccessTokenWithAuthCode($authCode);

	    // Store the credentials to disk.
	    if(!file_exists(dirname($credentialsPath))) {
	      mkdir(dirname($credentialsPath), 0700, true);
	    }
	    file_put_contents($credentialsPath, json_encode($accessToken));
	    printf("Credentials saved to %s\n", $credentialsPath);
	  }
	  $client->setAccessToken($accessToken);

	  // Refresh the token if it's expired.
	  if ($client->isAccessTokenExpired()) {
	    $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
	    file_put_contents($credentialsPath, json_encode($client->getAccessToken()));
	  }
	  return $client;
	}

	function expandHomeDirectory($path) {
	  $homeDirectory = getenv('HOME');
	  if (empty($homeDirectory)) {
	    $homeDirectory = getenv('HOMEDRIVE') . getenv('HOMEPATH');
	  }
	  return str_replace('~', realpath($homeDirectory), $path);
	}
}

?>