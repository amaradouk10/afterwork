<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/inscripconect.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>
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
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 mt-4">
                    <h3 class="bg-danger text-center">Statut des jours</h3>
                    <table class="table table-bordered mt-5">
                        <thead>
                            <tr>
                                <td scope="col">Jour</td>
                                <td scope="col">Place</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jours as $j)
                           <tr>
                                <td>{{ $j->libellejours }}</td>
                                <td>{{ $j->place }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-lg-5 col-md-8 col-sm-12 col-xd-12 mt-4">
                    <form action="{{ Route('insertday') }}" method="POST">
                        @csrf
                            <label for="exampleFormControlInput1">Entrez un jour</label>
                            <input type="text" name="libellejours" class="form-control" id="exampleFormControlInput1">
                            <button type="submit" class="btn btn-outline-primary justify-content-center mt-3">Enoyez</button>
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



