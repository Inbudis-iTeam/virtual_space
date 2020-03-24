@extends('layout')

@section('title') Migrations {{$distributeur['nom_dist']}}@stop

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title"><a href="{{url('migrations')}}"><i class="fa fa-backward"></i></a> {{$distributeur['prenom_dist']}} {{$distributeur['nom_dist']}}</h4>
                        <p class="category">
                            <span>Niveau: <b>{{$migrations[count($migrations) - 1]['rang_migrat']}}</b></span>
                            <span class="text-primary">Bureau: <b>{{$migrations[count($migrations) - 1]['bureau']['titre_bureau']}}</b></span>
                            <a href="#addModal" data-toggle="modal" class="add_item pull-right btn btn-info">Effectuer une nouvelle migration</a>
                        </p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th></th>
                                <th>Rang</th>
                                <th>Type de migration</th>
                                <th>Bureau</th>
                                <th>Date de migration</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php $i = 0?>
                                @forelse ($migrations as $migration)
                                <?php $i++?>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$migration['rang_migrat']}}</td>
                                    <td>{{$migration['type_migration']['titre_typmig']}}</td>
                                    <td>{{$migration['bureau']['titre_bureau']}}</td>
                                    <td>{{$migration['date_migrat']}}</td>
                                    <td><a href="{{url('migrations/delete')."/".$distributeur['id_dist']."/".$migration['id_migrat']}}" class="btn btn-sm btn-danger delete_item"><i class="fa fa-trash-o"></i></a></td>
                                </tr>
                                @empty
                                    <tr><td colspan="6" class="text-center">Aucune migration.<a href="#addModal" data-toggle="modal" class="add_item">Effectuez</a> une migration </td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Effectuer une nouvelle migration</h4>
            </div>
            <form method="post" action="{{url('/migrations/add/').$distributeur['id_dist']}}" id="addForm">
                <div class="modal-body">
                    <div id="message" class="text-center"></div>
                    <div class="form-group">
                        <label for="rang">Rang</label>
                        <select name="rang" required class="form-control" id="rang">
                                <option value="DVI" @if($migrations[count($migrations) - 1]['rang_migrat'] == "DVI") selected @endif>Distributeur-vendeur indépendant</option>
                                <option value="VI" @if($migrations[count($migrations) - 1]['rang_migrat'] == "VI") selected @endif>vendeur indépendant</option>
                                <option value="VIL" @if($migrations[count($migrations) - 1]['rang_migrat'] == "VIL") selected @endif>vendeur indépendant lié</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bureau">Migrer vers un autre bureau</label>
                        <select name="bureau" required class="form-control" id="bureau">
                            @foreach($bureaux as $bureau)
                                <option value="{{$bureau['id']}}" @if($migrations[count($migrations) - 1]['bureau']['id_bureau'] == $bureau['id']) selected @endif>{{$bureau['titre_bureau']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="typeMigration">Type de migration</label>
                        <select name="type_migration" required class="form-control" id="typeMigration">
                            @foreach($typesMigration as $typeMigration)
                                <option value="{{$typeMigration['id_typmig']}}" @if($migrations[count($migrations) - 1]['type_migration']['titre_typmig'] == $typeMigration['id_typmig']) selected @endif>{{$typeMigration['titre_typmig']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary" id="addItem">Effectuer</button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')

    <script type="text/javascript">
        $(function () {
            $('.delete_item').on('click', function (e) {
                e.preventDefault();
                var url = $(this).attr('href');
                Swal.fire({
                    title: 'Êtes vous sûr de vouloir supprimer la migration?',
                    text: "L'opération de suppression est irreversible",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OUI',
                    cancelButtonText: 'NON'
                }).then(function (result) {
                    if(result.value){
                        $.ajax({
                            url: url,
                            type: "post",
                            success: function (data) {
                                if(data.status){
                                    Swal.fire(
                                        'Supprimé!',
                                        data.message,
                                        'success'
                                    )
                                }else{
                                    Swal.fire(
                                        'Echec!',
                                        data.message,
                                        'warning'
                                    )
                                }
                            },
                            error: function () {
                                Swal.fire(
                                    'Echec!',
                                    'Vérifiez votre connexion internet',
                                    'error'
                                )
                            }
                        });
                    }
                });
            });

            $('.add_item').on('click', function (e) {
                e.preventDefault();
                $('#myModalLabel').html('Ajouter une migration');
                $("#message").html('');
                $('#addForm').attr("action", "{{url('migrations/add/'.$distributeur['id_dist'])}}");
                $("#nameItem").val('');
                $("#passwordItem").val('');
                $("#confirmPasswordItem").val('');
            });

            $('#addForm').on('submit', function (e) {
                e.preventDefault();
                var url = $(this).attr('action');
                var data = $(this).serialize();
                $("#message").html('');
                console.log(data);
                $.ajax({
                    url: url,
                    data: data,
                    type: 'post',
                    beforeSend: function () {
                        $('#addItem').text('Patientez...').prop({disabled: true});
                        $("#message").html("");
                    },
                    complete: function () {
                        $('#addItem').text('Effectuer').prop({disabled: false});
                    },
                    success: function (data) {
                        if(data.status){
                            $("#message").html("<span class='text-success'>"+data.message+"</span>");
                        }else{
                            $("#message").html("<span class='text-danger'>"+data.message+"</span>");
                        }
                    },
                    error: function () {
                        $("#message").html("<span class='text-warning'>Vérifiez votre connexion internet</span>");
                    }
                })
            });
        })
    </script>
@stop