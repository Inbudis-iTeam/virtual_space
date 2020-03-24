@extends('layout')

@section('title') Distributeurs @stop

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Distributeurs</h4>
                            <p class="category">
                                <span>Liste des distributeurs</span>
                                <a href="#addModal" data-toggle="modal" class="btn btn-sm btn-primary pull-right add_item" title="Ajouter un nouveau distributeur"><i class="fa fa-plus"></i></a>
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
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Sexe</th>
                                    <th>Tel</th>
                                    <th>Date de naissance</th>
                                    <th>Email</th>
                                    <th>Ville</th>
                                    <th>Matricule</th>
                                    <th>Matricule de l'héritier</th>
                                    <th></th>
                                    <th></th>
                                </thead>
                                <tbody>
                                <?php $i = 0?>
                                @forelse ($distributeurs as $distributeur)
                                    <?php $i++?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$distributeur['nom_dist']}}</td>
                                        <td>{{$distributeur['prenom_dist']}}</td>
                                        <td>@if($distributeur['sexe_dist'] == 1) M @else F @endif</td>
                                        <td>{{$distributeur['phone_dist']}}</td>
                                        <td>{{$distributeur['datenaiss_dist']}}</td>
                                        <td>{{$distributeur['mail_dist']}}</td>
                                        <td>{{$distributeur['ville']['titre_ville']}}</td>
                                        <td>{{$distributeur['matricule_dist']}}</td>
                                        <td>{{$distributeur['heritier_dist']}}</td>
                                        <td><a href="{{url('distributeurs')."/".$distributeur['id_dist']}}" class="btn btn-primary">Détails</a></td>
                                        <td class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <p>
                                                    action
                                                    <b class="caret"></b>
                                                </p>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{url('distributeur/modify') ."/". $distributeur['id_dist']}}#addModal" class="modify_item" data-toggle="modal"
                                                       data-nom_dist="{{$distributeur['nom_dist']}}" data-prenom_dist="{{$distributeur['prenom_dist']}}"
                                                       data-sexe_dist="{{$distributeur['sexe_dist']}}" data-phone_dist="{{$distributeur['phone_dist']}}"
                                                       data-mail_dist="{{$distributeur['mail_dist']}}" data-datenaiss_dist="{{$distributeur['datenaiss_dist']}}"
                                                       data-matricule_dist="{{$distributeur['matricule_dist']}}" data-heritier_dist="{{$distributeur['heritier_dist']}}"
                                                       data-ville="{{$distributeur['ville']['id']}}" data-type_user="{{$distributeur['type_user']['id']}}"
                                                       data-categorie_user="{{$distributeur['categorie_user']['id']}}">Modifier</a></li>
                                                <li><a href="{{url('distributeur/delete')."/". $distributeur['id_dist']}}" class="delete_item">Supprimer</a></li>
                                                <li><a href="{{url('migrations')."/". $distributeur['id_dist']}}">Migrations</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="12" class="text-center">Aucun distributeur enregistré dans le système</td></tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="12" class="text-center">
                                            @if(app('request')->input('p'))
                                                <a href="{{url('distributeurs')}}?q={{app('request')->input('q')}}&p=@if(app('request')->input('p') > 1){{app('request')->input('p') - 1}}@endif"
                                                   class="btn btn-sm btn-info @if(app('request')->input('p') <= 1) disabled @endif">précédent</a>
                                                <a href="{{url('distributeurs')}}@if($i == 25)?q={{app('request')->input('q')}}&p={{app('request')->input('p') + 1}}@endif" class="btn btn-sm btn-info
                                                 @if($i < 25) disabled @endif">suivant</a>
                                            @else
                                                <a href="?q=" class="btn btn-sm btn-info disabled">précédent</a>
                                                <a href="{{url('distributeurs')}}@if($i == 25)?q={{app('request')->input('q')}}&p={{app('request')->input('p') + 1}}@endif" class="btn btn-sm btn-info
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
    </div>
@stop
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Ajouter un distributeur</h4>
            </div>
            <form method="post" action="{{url('/distributeur/add')}}" id="addForm">
                <div class="modal-body">
                    <div id="message" class="text-center"></div>
                    <div class="form-group">
                        <input type="text" name="nom" id="nom" required class="form-control" placeholder="Nom du distributeur">
                    </div>
                    <div class="form-group">
                        <input type="text" name="prenom" id="prenom" required class="form-control" placeholder="Prénom du distributeur">
                    </div>
                    <div class="form-group">
                        <input type="text" name="matricule" id="matricule" required class="form-control" placeholder="Matricule du distributeur">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Modifier le mot de passe du distributeur">
                    </div>
                    <div class="form-group">
                        <input type="tel" name="phone" id="phone" required class="form-control" placeholder="Numéro de téléphone">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" required class="form-control" placeholder="Email du distributeur">
                    </div>
                    <div class="form-group">
                        <input type="date" name="datenaiss" id="datenaiss" required class="form-control" placeholder="Date de naissance">
                    </div>
                    <div class="form-group">
                        <label for="sexe">Sexe</label>
                        <select name="sexe" required class="form-control" id="sexe">
                            <option value="1">Homme</option>
                            <option value="0">Femme</option>
                        </select>
                    </div>
                    <div class="form-group">
                        @if(count($typesUser) == 0)
                            <a href="{{url('type_user')}}" class="text-center text-danger">Ajoutez d'abord un type de distributeur</a>
                        @else
                            <label for="type">Type de distributeur</label>
                            <select name="type_user" required class="form-control" id="type">
                                @foreach($typesUser as $typeUser)
                                    <option value="{{$typeUser['id']}}">{{$typeUser['titre_typuser']}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                    <div class="form-group">
                        @if(count($categoriesUser) == 0)
                            <a href="{{url('categorie_user')}}" class="text-center text-danger">Ajoutez d'abord une catégorie de distributeur</a>
                        @else
                            <label for="categorie">Catégorie du distributeur</label>
                            <select name="categorie_user" required class="form-control" id="categorie">
                                @foreach($categoriesUser as $categorieUser)
                                    <option value="{{$categorieUser['id']}}">{{$categorieUser['titre_catuser']}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                    <div class="form-group">
                        @if(count($villes) == 0)
                            <a href="{{url('ville')}}" class="text-center text-danger">Veuillez d'abord enregistrer une ville</a>
                        @else
                            <label for="ville">Ville</label>
                            <select name="ville" required class="form-control" id="ville">
                                @foreach($villes as $ville)
                                    <option value="{{$ville['id']}}">{{$ville['titre_ville']}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                    <div class="form-group">
                        @if(count($bureaux) == 0)
                            <a href="{{url('bureau')}}" class="text-center text-danger">Veuillez d'abord ajouter un bureau</a>
                        @else
                            <label for="bureau">Bureau</label>
                            <select name="bureau" required class="form-control" id="bureau">
                                @foreach($bureaux as $bureau)
                                    <option value="{{$bureau['id']}}">{{$bureau['titre_bureau']}}</option>
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
                $('#myModalLabel').html('<b>'+$(this).data("nom_dist")+' '+ $(this).data("prenom_dist") +'</b>');
                $("#message").html('');
                $('#addForm').attr("action", $(this).attr('href').split('#')[0]);
                $("#nom").val($(this).data("nom_dist"));
                $("#prenom").val($(this).data("prenom_dist"));
                $("#matricule").val($(this).data("matricule_dist"));
                $("#password").val("");
                $("#phone").val($(this).data("phone_dist"));
                $("#email").val($(this).data("mail_dist"));
                $("#datenaiss").val($(this).data("datenaiss_dist"));
                $("#sexe").val($(this).data("sexe_dist"));
                $("#ville").val($(this).data("ville"));
                $("#type").val($(this).data("type_user"));
                $("#categorie").val($(this).data("categorie_user"));
            });

            $('.add_item').on('click', function (e) {
                e.preventDefault();
                $('#myModalLabel').html('Ajouter un distributeur');
                $("#message").html('');
                $('#addForm').attr("action", "{{url('distributeur/add')}}");
                $("#nom").val($(this).data("nom"));
                $("#prenom").val($(this).data("prenom"));
                $("#matricule").val($(this).data("matricule_dist"));
                $("#password").val("");
                $("#phone").val($(this).data("phone_dist"));
                $("#email").val($(this).data("mail_dist"));
                $("#datenaiss").val($(this).data("datenaiss_dist"));
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