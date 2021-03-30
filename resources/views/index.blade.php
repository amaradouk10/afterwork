<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/index.css') }}" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="fond" style="background-image:url({{asset('font/aftewrk.png')}}); background-repeat: no-repeat">
    </div>
    <div class="peidp" style="background-image:linear-gradient(180deg,#E90505, #680000)">
        <div>
            <div class="logo" style="background-image:url({{asset('font/simplon.png')}}); background-repeat:no-repeat ; border-radius: 100px 100px 100px 100px;">
            </div>
        </div>
        <div class="bouton">
            <div class="espace">
                <div class="conect">
                    <a href="{{url('connexion')}} ">
                        <h3>Se connecter</h3>
                    </a>
                </div>
                <div class="conect">
                    <a href="{{url('inscription')}} ">
                        <h3>S'inscrire</h3>
                    </a>
                </div>
            </div>
        </div>
</body>

</html>