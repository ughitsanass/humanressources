@include('header')
    <!DOCTYPE html>
<html>
<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Créer une offre</title>
</head>
<body>


<style>
    body {
        background: rgb(99, 39, 120)
    }

    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .profile-button {
        background: rgb(99, 39, 120);
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #682773
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none
    }

    .back:hover {
        color: #682773;
        cursor: pointer
    }

    .labels {
        font-size: 11px
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8
    }
</style>

<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Candidater</h4>
                </div>


                @php
                    // liste de candidatures + verification de si le candidat à déja candidaté
                                            $question1 = DB::table('offres')
                                                            ->select('q1')
                                                            ->where('id',$offre)
                                                            ->get();
                                            foreach ($question1 as $q1) {
                                            }

                $question2 = DB::table('offres')
                                                            ->select('q2')
                                                            ->where('id',$offre)
                                                            ->get();
                                            foreach ($question2 as $q2) {
                                            }
                @endphp

                <form action="{{route('candidater',$offre)}}" method="POST">
                    @csrf
                    Questions pour le candidat :

                    <br>
                    <br>

                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Question 1</label><input name="q1" type="text"
                                                                                             class="form-control"
                                                                                             value="{{old('q1')}}"
                                                                                             placeholder="{{$q1->q1}}">

                        </div>
                    </div>
                    <div class="row mt-2">
                        <p>{{$q2->q2}}</p>
                        <div class="col-md-6"><label class="labels">Question 2</label><input name="q2" type="text"
                                                                                             class="form-control"
                                                                                             value="{{old('q2')}}"
                                                                                             placeholder="Question 2">

                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Question 3</label><input name="q3" type="text"
                                                                                             class="form-control"
                                                                                             value="{{old('q3')}}"
                                                                                             placeholder="Question 3">

                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Question 4</label><input name="q4" type="text"
                                                                                             class="form-control"
                                                                                             value="{{old('q4')}}"
                                                                                             placeholder="Question 4">

                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Question 5</label><input name="q5" type="text"
                                                                                             class="form-control"
                                                                                             value="{{old('q5')}}"
                                                                                             placeholder="Question 5">

                        </div>
                    </div>




                    <div class="field">
                        <div class="control">
                            <div style="margin-top: 2em">
                                <button class="btn btn-primary profile-button" type="submit">Enregistrer 2</button>
                                <a class="button is-info" href="{{ route('offres.index') }}">Retour à la liste</a>
                            </div>
                        </div>
                    </div>


                </form>
            </div>

        </div>

    </div>
</div>
</div>

</div>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
















