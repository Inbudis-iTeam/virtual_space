@extends('layout')

@section('title') Catégories de produit @stop

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Catégories de produit</h4>
                        <p class="category">
                            <span>Liste des catégories</span>
                            <a href="#addModal" data-toggle="modal" class="btn btn-sm btn-primary pull-right add_item" title="Ajoutez une nouvelle catégorie"><i class="fa fa-plus"></i></a>
                        </p>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>#</th>
                                <th>Libellé de la catégorie</th>
                                <th>Catégorie parent</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php $i = 0?>
                                @forelse ($categoriesProduit as $categorieProduit)
                                <?php $i++?>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$categorieProduit['titre_catpro']}}</td>
                                    <td>@if($categorieProduit['categorie_produit']){{$categorieProduit['categorie_produit']['titre_catpro']}}@else ---- @endif</td>
                                    <td class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <p>
                                                action
                                                <b class="caret"></b>
                                            </p>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{url('categorie_produit/modify') ."/". $categorieProduit['id_catpro']}}#addModal" class="modify_item" data-toggle="modal"
                                                   data-titre="{{$categorieProduit['titre_catpro']}}"
                                                   data-parent="@if($categorieProduit['categorie_produit']){{$categorieProduit['categorie_produit']['id_catpro']}}@endif">Modifier</a></li>
                                            <li>
                                                <a href="{{url('categorie_produit/delete')."/". $categorieProduit['id_catpro']}}" class="delete_item">Supprimer</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @empty
                                    <tr><td colspan="4" class="text-center">Aucune catégorie enregistrée. Ajoutez s'en une dès maintenant <br><br><a href="#addModal" data-toggle="modal" class="btn btn-info add_item">Ajouter</a></td></tr>
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
                <h4 class="modal-title" id="myModalLabel">Ajouter une nouvelle catégorie</h4>
            </div>
            <form method="post" action="{{url('/categorie_produit/add')}}" id="addForm">
                <div class="modal-body">
                    <div id="message" class="text-center"></div>
                    <div class="form-group">
                        <input type="text" name="titre" id="nameItem" required class="form-control" placeholder="Libellé de la catégorie">
                    </div>
                    <div class="form-group">
                        <label for="categorie">Catégorie parent</label>
                        <select name="categorie" class="form-control" id="categorie">
                            <option value="" selected>Sélectionnez une catégorie parent</option>
                            @foreach($categoriesProduit as $categorieProduit)
                                <option value="{{$categorieProduit['id_catpro']}}">{{$categorieProduit['titre_catpro']}}</option>
                            @endforeach
                        </select>
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
                $('#myModalLabel').html('Modifier la catégorie ' + '<b>'+$(this).data("titre")+'</b>');
                $("#message").html('');
                $('#addForm').attr("action", $(this).attr('href').split('#')[0]);
                $("#nameItem").val($(this).data("titre"));
                $("#categorie").val($(this).data("parent"));
            });

            $('.add_item').on('click', function (e) {
                e.preventDefault();
                $('#myModalLabel').html('Ajouter une nouvelle catégorie');
                $("#message").html('');
                $('#addForm').attr("action", "{{url('categorie_produit/add')}}");
                $("#nameItem").val('');
                $("#categorie").val('');
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