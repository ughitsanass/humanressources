
    <div class="card" style="width:100%">

        <div class="card-content">


            <table class="table is-hoverable" >
                <thead>
                <tr>

                    <th>offre</th>
                    <th>offre</th>
                    <th style="float: right ; margin-right: 0"> Actions</th>

                </tr>
                </thead>
                <tbody>
                @foreach($offres as $offre)
                    <tr>
                        <td>{{ $offre->id }}</td>
                        <td><strong>{{$offre->type }}</strong></td>

                        </a>

                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <footer class="card-footer">

        </footer>
    </div>
