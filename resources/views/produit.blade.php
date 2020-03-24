@extends('layout')

@section('title') Produits @stop
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Produits</h4>
                        <p class="category">
                            <span>Liste des produits</span>
                            <a href="#addModal" data-toggle="modal" class="btn btn-sm btn-primary pull-right add_item" title="Ajoutez un nouveau produit"><i class="fa fa-plus"></i></a>
                        </p>
                        <div class="margin-top">
                            <form action="" method="get">
                                <input type="hidden" name="p" value="{{app('request')->input('p')}}">
                                <div class="form-group">
                                    <input type="search" name="q" class="form-control" placeholder="Rechercher...">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="content table-responsive table-full-width">
                        <table class="table table-hover table-striped">
                            <thead>
                                <th>#</th>
                                <th>Nom du produit</th>
                                <th>Reference</th>
                                <th>Description</th>
                                <th>Prix</th>
                                <th>Stock</th>
                                <th>Stock alerte</th>
                                <th>Stock d'approvisionnement</th>
                                <th>Catégorie</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php $i = 0?>
                                @forelse ($produits as $produit)
                                <?php $i++?>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{$produit['nom_prod']}}</td>
                                    <td>{{$produit['reference_prod']}}</td>
                                    <td>{{$produit['description_prod']}}</td>
                                    <td><b>{{$produit['prix_prod']}} XFA</b></td>
                                    <td>{{$produit['qtestock_prod']}}</td>
                                    <td>{{$produit['stockalerte_prod']}}</td>
                                    <td>{{$produit['stockappro_prod']}}</td>
                                    <td>{{$produit['categorie_produit']['titre_catpro']}}</td>
                                    <td class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <p>
                                                action
                                                <b class="caret"></b>
                                            </p>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{url('produit/modify') ."/". $produit['id_prod']}}#addModal" class="modify_item" data-toggle="modal"
                                                   data-nom="{{$produit['nom_prod']}}" data-reference_prod="{{$produit['reference_prod']}}"
                                                   data-description="{{$produit['description_prod']}}" data-prix="{{$produit['prix_prod']}}"
                                                   data-qtestock="{{$produit['qtestock_prod']}}" data-stockalerte="{{$produit['stockalerte_prod']}}"
                                                   data-stockappro="{{$produit['stockappro_prod']}}" data-categorie="{{$produit['categorie_produit']['id_catpro']}}">Modifier</a></li>
                                            <li>
                                                <a href="{{url('produit/delete')."/". $produit['id_prod']}}" class="delete_item">Supprimer</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @empty
                                    <tr><td colspan="10" class="text-center">Aucun produit enregistré. Ajoutez s'en un dès maintenant <br><br><a href="#addModal" data-toggle="modal" class="btn btn-info add_item">Ajouter</a></td></tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="10" class="text-center">
                                    @if(app('request')->input('p'))
                                        <a href="{{url('produits')}}?q={{app('request')->input('q')}}&p=@if(app('request')->input('p') > 1){{app('request')->input('p') - 1}}@endif"
                                           class="btn btn-sm btn-info @if(app('request')->input('p') <= 1) disabled @endif">précédent</a>
                                        <a href="{{url('produits')}}@if($i == 25)?q={{app('request')->input('q')}}&p={{app('request')->input('p') + 1}}@endif" class="btn btn-sm btn-info
                                             @if($i < 25) disabled @endif">suivant</a>
                                    @else
                                        <a href="?q=" class="btn btn-sm btn-info disabled">précédent</a>
                                        <a href="{{url('produits')}}@if($i == 25)?q={{app('request')->input('q')}}&p={{app('request')->input('p') + 1}}@endif" class="btn btn-sm btn-info
                                             @if($i < 25) disabled @endif">suivant</a>
                                    @endif
                                </td>
                            </tr>
                            </tfoot>
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
                <h4 class="modal-title" id="myModalLabel">Ajouter une nouveau produit</h4>
            </div>
            <form method="post" action="{{url('/produit/add')}}" id="addForm">
                <div class="modal-body">
                    <div id="message" class="text-center"></div>
                    <div class="form-group">
                        <input type="text" name="nom" id="nom" required class="form-control" placeholder="Nom du produit">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="description" placeholder="Description du produit" id="description" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="prix">Prix du produit</label>
                        <input type="number" name="prix" id="prix" required class="form-control" placeholder="Prix du produit">
                    </div>
                    <div class="form-group">
                        <label for="qtestock">Stock</label>
                        <input type="number" name="qtestock" id="qtestock" required class="form-control" placeholder="Quantité en stock">
                    </div>
                    <div class="form-group">
                        <label for="stockalerte">Stock alerte</label>
                        <input type="number" name="stockalerte" id="stockalerte" required class="form-control" placeholder="Quantité alerte">
                    </div>
                    <div class="form-group">
                        <label for="stockalerte">Stock d'approvisionnement</label>
                        <input type="number" name="stockappro" id="stockappro" required class="form-control" placeholder="Stock d'approvisionnement">
                    </div>
                    <div class="form-group">
                        <label for="categorie">Catégorie du produit</label>
                        <select name="categorie" class="form-control" id="categorie">
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
                $('#myModalLabel').html('Modifier la catégorie ' + '<b>'+$(this).data("nom")+'</b>');
                $("#message").html('');
                $('#addForm').attr("action", $(this).attr('href').split('#')[0]);
                $("#nom").val($(this).data("nom"));
                $("#description").val($(this).data("description"));
                $("#prix").val($(this).data("prix"));
                $("#qtestock").val($(this).data("qtestock"));
                $("#stockalerte").val($(this).data("stockalerte"));
                $("#stockappro").val($(this).data("stockalerte"));
                $("#categorie").val($(this).data("categorie"));
            });

            $('.add_item').on('click', function (e) {
                e.preventDefault();
                $('#myModalLabel').html('Ajouter une nouvelle catégorie');
                $("#message").html('');
                $('#addForm').attr("action", "{{url('produit/add')}}");
                $("#nom").val('');
                $("#description").val('');
                $("#prix").val('');
                $("#qtestock").val('');
                $("#stockalerte").val('');
                $("#stockappro").val('');
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