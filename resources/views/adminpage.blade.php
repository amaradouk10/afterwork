<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                   <form action="{{ Route('insertday') }}" method="POST">
                        @csrf
                            <label for="exampleFormControlInput1">Entrez un jour</label>
                            <select type="text" name="libellejours" class="form-control" id="exampleFormControlInput1">
                                <option value="Lundi">Lundi</option>
                                <option value="Mardi">Mardi</option>
                                <option value="Mercredi">Mercredi</option>
                                <option value="Jeudi">Jeudi</option>
                                <option value="Vendredi">Vendredi</option>
                                <option value="Samedi">Samedi</option>
                                <option value="Dimanche">Dimanche</option>
                            </select>
                            <button type="submit" class="btn btn-outline-primary justify-content-center mt-3">Enoyez</button>
                    </form>
                    <form action="{{ route('placeinsert') }}" method="POST" >
                        @csrf
                            <label for="exampleFormControlInput1" class="mt-5">Choisissez une heure</label>
                            <select  name="heure" class="form-control" id="exampleFormControlInput1">
                                <option value="17h/19h">17h/19h</option>
                                <option value="19h/21h">19h/21h</option>
                                <option value="9h/12h">9h/12h</option>
                                <option value="12h/17h">12h/17h</option>
                            </select>
                            <label for="exampleFormControlInput1">Entrez un nombre de place</label>
                            <input type="number" class="form-control" id="exampleFormControlInput1" name="place">
                            <button type="submit" class="btn btn-outline-primary justify-content-center mt-3">Enoyez</button>
                    </form>

                </div>
                <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                <H3 class="bg-danger text-center mt-4">Liste des inscrits</H3>
                <table class="table table-bordered mt-5">
                    <thead>
                        <tr>
                            <td scope="col">Nom</td>
                            <td scope="col">Prenom</td>
                            <td scope="col">Email</td>
                            <td scope="col">statut</td>
                            <td scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($utilisateurs as $us)
                        <tr>
                             <td>{{ $us->nom }}</td>
                             <td>{{ $us->prenom }}</td>
                             <td>{{ $us->mail }}</td>
                             <td>{{ $us->statut }}</td>
                             <td class="d-flex">
                                 @if ($us->statut=='passif')
                                 <a href="validate/{{ $us->id }}" class="btn btn-primary m-1">valider</a>
                                 <a href="delete/{{ $us->id }}"  class="btn btn-danger m-1">supprimer</a>
                                 @else()
                                 <a href="delete/{{ $us->id }}"  class="btn btn-danger m-1">supprimer</a>
                                 @endif
                             </td>
                         </tr>
                             @endforeach
                    </tbody>
                </table>


                <H3 class="bg-danger text-center mt-5">Liste de reservation</H3>
                <table class="table table-bordered mt-5">
                    <thead>
                        <tr>
                            <td scope="col">Email</td>
                            <td scope="col">Jour</td>
                            <td scope="col">Heure</td>
                            <td scope="col">statut</td>
                            <td scope="col">Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservation as $reserv)
                        <tr>
                             <td>{{ $reserv->mail }}</td>
                             <td>{{ $reserv->jour }}</td>
                             <td>{{ $reserv->heure }}</td>
                             <td>{{ $reserv->statut }}</td>
                             <td class="d-flex">
                                 @if ($reserv->statut=='passif')
                                 <a href="validereserve/{{ $reserv->id }}" class="btn btn-primary m-1">valider</a>
                                 <a href="deletereserve/{{ $reserv->id }}"  class="btn btn-danger m-1">supprimer</a>
                                 @else()
                                 <a href="deletereserve/{{ $reserv->id }}"  class="btn btn-danger m-1">supprimer</a>
                                 @endif
                             </td>
                         </tr>
                             @endforeach
                    </tbody>
                </table>

                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container-fluid" style="background-image:linear-gradient(180deg,#E90505, #680000)">
            <div class="row footer mt-5">
                <p class="copyright">2021-Simplon BF/AUF</p>
            </div>
        </div>
    </footer>
</body>
</html>







