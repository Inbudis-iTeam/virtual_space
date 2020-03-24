@extends('layout')

@section('title') Bureaux @stop

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Bureaux</h4>
                        <p class="category">
                            <span>Liste des bureaux</span>
                            <a href="#addModal" data-toggle="modal" class="btn btn-sm btn-primary pull-right add_item" title="Ajouter un nouveau bureau"><i class="fa fa-plus"></i></a>
                        </p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th></th>
                                <th>Nom du bureau</th>
                                <th>Quartier</th>
                                <th>Type</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php $i = 0?>
                                @forelse ($bureaux as $bureau)
                                <?php $i++?>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$bureau['titre_bureau']}}</td>
                                    <td>{{$bureau['quartier']['titre_quart']}}</td>
                                    <td>{{$bureau['type_bureau']['titre_typburr']}}</td>
                                    <td class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <p>
                                                action
                                                <b class="caret"></b>
                                            </p>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{url('bureau/modify') ."/". $bureau['id']}}#addModal" class="modify_item" data-toggle="modal" data-titretype="{{$bureau['type_bureau']['id']}}"
                                                   data-titre="{{$bureau['titre_bureau']}}" data-titrequartier="{{$bureau['quartier']['id']}}">Modifier</a></li>
                                            <li>
                                                <a href="{{url('bureau/delete')."/". $bureau['id']}}" class="delete_item">Supprimer</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @empty
                                    <tr><td colspan="3" class="text-center">Aucun bureau enregistré dans le système. Ajoutez en un dès maintenant <br><a href="#addModal" data-toggle="modal" class="btn btn-info add_item">Ajouter</a></td></tr>
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
                <h4 class="modal-title" id="myModalLabel">Ajouter un bureau</h4>
            </div>
            <form method="post" action="{{url('/bureau/add')}}" id="addForm">
                <div class="modal-body">
                    <div id="message" class="text-center"></div>
                    <div class="form-group">
                        <input type="text" name="titre" id="nameItem" required class="form-control" placeholder="Nom du bureau">
                    </div>
                    <div class="form-group">
                        @if(count($typesBureau) == 0)
                            <a href="{{url('typebureau')}}" class="text-center">Ajoutez d'abord un type de bureau</a>
                        @else
                            <label for="type">Type de bureau</label>
                            <select name="type_bureau" required class="form-control" id="type">
                                <option value="" selected>Sélectionnez un type de bureau</option>
                                @foreach($typesBureau as $typeBureau)
                                    <option value="{{$typeBureau['id']}}">{{$typeBureau['titre_typburr']}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                    <div class="form-group">
                        @if(count($quartiers) == 0)
                            <a href="{{url('quartier')}}" class="text-center">Veuillez d'abord enregistrer un quartier</a>
                        @else
                            <label for="type">Quartier</label>
                            <select name="quartier" required class="form-control" id="quartier">
                                <option value="" selected>Sélectionnez un quartier</option>
                                @foreach($quartiers as $quartier)
                                    <option value="{{$quartier['id']}}">{{$quartier['titre_quart']}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary" id="addItem">Enregistrer</button>
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
                    title: 'Êtes vous sûr de vouloir supprimer?',
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

            $('.modify_item').on('click', function (e) {
                e.preventDefault();
                $('#myModalLabel').html('Modifier le bureau ' + '<b>'+$(this).data("titre")+'</b>');
                $("#message").html('');
                $('#addForm').attr("action", $(this).attr('href').split('#')[0]);
                $("#nameItem").val($(this).data("titre"));
                $("#type").val($(this).data("titretype"));
                $("#quartier").val($(this).data("titrequartier"));
            });

            $('.add_item').on('click', function (e) {
                e.preventDefault();
                $('#myModalLabel').html('Ajouter un bureau');
                $("#message").html('');
                $('#addForm').attr("action", "{{url('bureau/add')}}");
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
                        $('#addItem').text('Enregistrer').prop({disabled: false});
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