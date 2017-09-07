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
            <form method="POST" action="choice/{{$id}}" >
                {{csrf_field()}}
                {{method_field('POST')}}
                <input type="hidden" name="email" value="{{$email}}">
                <div class="uk-flex uk-flex-center ">
                    <div class="uk-width-1-2 uk-margin-top ">
                        <div class="uk-padding uk-background-muted">
                            <h3>Hi {{$first_name}}!</h3>
                            <p>
                                Please find below the Family/Apprenticeship recommendation. And let us know your choice
                            </p>
                        </div>
                        <div class="uk-margin-top uk-padding uk-background-muted">
                            <h3 class="uk-heading-line"><span>Family Recommendation 1</span></h3>

                            <div >
                                <p>
                                    <b>Family Name:</b> {{$family_rec1_name}}
                                </p>
                                <p>
                                    <b>Family Description:</b> {{$family_rec1_description}}
                                </p>
                                <p>
                                    <b>Apprentice Name:</b> {{$apprentice_rec1_name}}
                                </p>
                                <p>
                                    <b>Apprentice Description:</b> {{$apprentice_rec1_description}}
                                </p>
                                
                            </div>
                            <hr>
                            <div class="uk-margin-top">
                                <h4>Please let us know your preference on this recommendation</h4>
                                <div class="uk-margin">
                                    <select class="uk-select" name="family_rec1_pref">
                                        <option>Choose</option>
                                        <option value="1">This Family / Apprenticeship Package is my First Preference</option>
                                        <option value="2">This Family / Apprenticeship Package is my Second Preference</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <h4>Anything else you'd like us to know about your preferences?</h4>
                                <div class="uk-margin">
                                    <textarea class="uk-textarea" rows="5" placeholder="Your Answer" name="family_rec1_tell"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="uk-margin-top uk-padding uk-background-muted">
                            <h3 class="uk-heading-line"><span>Family Recommendation 2</span></h3>

                            <div >
                                <p>
                                    <b>Family Name:</b> {{$family_rec2_name}}
                                </p>
                                <p>
                                    <b>Family Description:</b> {{$family_rec2_description}}
                                </p>
                                <p>
                                    <b>Apprentice Name:</b> {{$apprentice_rec2_name}}
                                </p>
                                <p>
                                    <b>Apprentice Description:</b> {{$apprentice_rec2_description}}
                                </p>
                                
                            </div>
                            <hr>
                            <div class="uk-margin-top">
                                <h4>Please let us know your preference on this recommendation</h4>
                                <div class="uk-margin">
                                    <select class="uk-select" name="family_rec2_pref">
                                        <option>Choose</option>
                                        <option value="1">This Family / Apprenticeship Package is my First Preference</option>
                                        <option value="2">This Family / Apprenticeship Package is my Second Preference</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <h4>Anything else you'd like us to know about your preferences?</h4>
                                <div class="uk-margin">
                                    <textarea class="uk-textarea" rows="5" placeholder="Your Answer" name="family_rec2_tell"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="uk-margin-top uk-margin-bottom">
                            <input type="submit" value="Submit your response" class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom" />
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- jQuery is required -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- UIkit JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.30/js/uikit.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.30/js/uikit-icons.min.js"></script>
    </body>
</html>
