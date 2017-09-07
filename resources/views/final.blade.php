<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Family Recommendation</title>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.30/css/uikit.min.css" />
    </head>
    <body>
        <div class="uk-container" >
            <div class="uk-child-width-expand@s uk-text-center" uk-grid>
                <div>
                    <h1 class="uk-heading-divider uk-margin-top">Family Recommendation</h1>
                </div>
            </div>
            @if($message = session('message'))
                <div class="uk-flex uk-flex-center ">
                    <div class="uk-width-1-2 uk-margin-top ">
                        <div class="uk-alert-success" uk-alert>
                            <a class="uk-alert-close" uk-close></a>
                            <h3>Message</h3>
                            <p>{{$message}}.</p>
                        </div>
                    </div>
                </div>
            @endif
            @if($message = session('error'))
                <div class="uk-flex uk-flex-center ">
                    <div class="uk-width-1-2 uk-margin-top ">
                        <div class="uk-alert-danger" uk-alert>
                            <a class="uk-alert-close" uk-close></a>
                            <h3>Error</h3>
                            <p>{{$message}}</p>
                        </div>
                    </div>
                </div>
            @endif
            @if($errors->any())
                <div class="uk-flex uk-flex-center ">
                    <div class="uk-width-1-2 uk-margin-top ">
                @foreach($errors->all() as $error)
                    <div class="uk-alert-danger" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <h3>Error</h3>
                        <p>{{$error}}</p>
                    </div>
                @endforeach
                    </div>
                </div>
            @endif
        </div>

        <!-- jQuery is required -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- UIkit JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.30/js/uikit.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.30/js/uikit-icons.min.js"></script>
    </body>
</html>
