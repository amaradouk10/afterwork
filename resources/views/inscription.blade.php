<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/inscripconect.css') }}" rel="stylesheet">
    <title>Inscription</title>
</head>

<body style="background-image:url({{asset('font/hero-bg.png')}})">
    <header>
        <div class="container-fluid" style="background-image:linear-gradient(180deg,#E90505, #680000)">
            <div class="row header">
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <div class="logo" style="background-image:url({{asset('font/simplon.png')}}); background-repeat:no-repeat ; border-radius: 100px 100px 100px 100px;">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mt-2">
                    <h2 class="text-center mt-1 afterwork">AFTER-WORK</h2>
                </div>
            </div>
        </div>
    </header>
    <div class="contenaire container">
        <div class="row">
            <div class="centrer col-lg-5 col-md-6 col-sm-12">
                <img src="font/logo.png" alt="" style="width: 100%; margin-top:150px;">
            </div>
            <div class="rectangle col-lg-5 col-md-6 col-sm-12" style="background-image:linear-gradient(180deg,#E90505, #680000)">
                <div class="results container-fluid">
                    @if (Session::get('success'))
                        <p class="alert alert-success">
                            {{ Session::get('success') }}
                        </p>
                    @endif
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                </div>
                <h1 class="text-center mt-1 afterwork">AFTER-WORK</h1>
                <form action="{{ route('create') }}" method="POST" class="form-group">
                @csrf
                    <input type="text" name="nom" placeholder="Nom" class=" mt-5 d-block container-fluid">
                    <p class="text-center text-light">@error('nom') {{ $message }} @enderror</p>
                    <input type="text" name="prenom" placeholder="Prenom" class=" mt-5 d-block container-fluid">
                    <p class="text-center text-light">@error('prenom') {{ $message }} @enderror</p>
                    <input type="email" name="mail" placeholder="email" class=" mt-5 d-block container-fluid">
                    <p class="text-center text-light">@error('mail') {{ $message }} @enderror</p>
                    <input type="text" name="role" placeholder="role" class=" mt-5 d-block container-fluid">
                    <p class="text-center text-light">@error('role') {{ $message }} @enderror</p>
                    <input type="password" name="password" placeholder="password" class=" mt-5 d-block container-fluid">
                    <p class="text-center text-light">@error('password') {{ $message }} @enderror</p>
                    <input type="submit" placeholder="soumettre" class="rounded btn-light mt-5 submi">
                </form>
            </div>
        </div>
    </div>
    <footer>
        <div class="container-fluid" style="background-image:linear-gradient(180deg,#E90505, #680000)">
            <div class="row footer mt-5">
                <p class="copyright">2021-Simplon BF/AUF</p>
            </div>
        </div>
    </footer>
</body>

</html>
