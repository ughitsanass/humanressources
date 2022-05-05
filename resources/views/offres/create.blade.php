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
                    <h4 class="text-right">Editer le profil</h4>
                </div>


                <form action="{{ route('offres.store') }}" method="POST">
                    @csrf

                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Intitulé de l'offre</label><input name="type" type="text"
                                                                                                class="form-control"
                                                                                                value="{{old('type')}}"
                                                                                                placeholder="intitulé de l'offre">

                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Ville</label><input name="ville" type="text"
                                                                                                      class="form-control"
                                                                                                      value="{{old('ville')}}"
                                                                                                      placeholder="Ville">

                        </div>
                    </div>


                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Diplôme requis</label><input name="diplome_requis" type="text"
                                                                                                      class="form-control"
                                                                                                      value="{{old('diplome_requis')}}"
                                                                                                      placeholder="diplôme requis">

                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Rémunération</label><input name="remuneration" type="text"
                                                                                                      class="form-control"
                                                                                                      value="{{old('remuneration')}}"
                                                                                                      placeholder=remuneration>

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
















