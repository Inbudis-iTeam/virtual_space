@extends('layout')

@section('title') Annonces @stop

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Annonces</h4>
                        <p class="category">
                            <span>Annonces d'INBUDIS</span>
                            <a href="#addModal" data-toggle="modal" class="btn btn-sm btn-primary pull-right add_item" title="Ajoutez une nouvelle annonce"><i class="fa fa-plus"></i></a>
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
                        @forelse ($annonces as $annonce)
                            <div class="card center-block" style="width: 400px; display: inline-block; padding: 10px">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <p>action<b class="caret"></b></p>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('annonces/modify') ."/". $annonce['id_anno']}}#addModal" class="modify_item" data-toggle="modal"
                                               data-titre="{{$annonce['titre_anno']}}" data-description="{{$annonce['description_anno']}}">Modifier</a></li>
                                        <li>
                                            <a href="{{url('annonces/delete')."/". $annonce['id_anno']}}" class="delete_item">Supprimer</a>
                                        </li>
                                    </ul>
                                </div>
                                <img src="{{$annonce['media_anno']}}" style="max-width: 400px;" alt="">
                                <h4>{{$annonce['titre_anno']}}</h4>
                                <p>{{$annonce['description_anno']}}</p>
                            </div>
                        @empty
                            <div class="text-center">
                                <p>Aucune annonce. Ajoutez s'en une maintenant</p>
                                <a href="#addModal" data-toggle="modal" class="btn btn-info add_item">Ajouter</a>
                            </div>
                        @endforelse
                        <?php $i = count($annonces)?>
                        @if($i > 0)
                            <div class="text-center">
                                @if(app('request')->input('p'))
                                    <a href="{{url('annonces')}}?q={{app('request')->input('q')}}&p=@if(app('request')->input('p') > 1){{app('request')->input('p') - 1}}@endif"
                                       class="btn btn-sm btn-info @if(app('request')->input('p') <= 1) disabled @endif">précédent</a>
                                    <a href="{{url('annonces')}}@if($i == 25)?q={{app('request')->input('q')}}&p={{app('request')->input('p') + 1}}@endif" class="btn btn-sm btn-info
                                         @if($i < 25) disabled @endif">suivant</a>
                                @else
                                    <a href="?q=" class="btn btn-sm btn-info disabled">précédent</a>
                                    <a href="{{url('annonces')}}@if($i == 25)?q={{app('request')->input('q')}}&p={{app('request')->input('p') + 1}}@endif" class="btn btn-sm btn-info
                                         @if($i < 25) disabled @endif">suivant</a>
                                @endif
                            </div>
                        @endif
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
                <h4 class="modal-title" id="myModalLabel">Ajouter une nouvelle annonce</h4>
            </div>
            <form method="post" enctype="multipart/form-data" action="{{url('/annonces/add')}}" id="addForm">
                <div class="modal-body">
                    <div id="message" class="text-center"></div>
                    <div class="form-group">
                        <input type="text" name="titre" id="titre" required class="form-control" placeholder="Titre de l'annonce">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="description" required id="description" cols="30" rows="10" placeholder="Description de l'annonce"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" accept="image/*" name="media" id="media" class="form-control">
                        <small class="text-danger"><i class="fa fa-warning"></i> Les images qui constituent les annonces doivent avoir les mêmes dimensions</small>
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
                $('#myModalLabel').html('Modifier l\'annonce ' + '<b>'+$(this).data("titre")+'</b>');
                $("#message").html('');
                $('#addForm').attr("action", $(this).attr('href').split('#')[0]);
                $("#titre").val($(this).data("titre"));
                $("#description").val($(this).data("description"));
                $("#media").val('');
            });

            $('.add_item').on('click', function (e) {
                e.preventDefault();
                $('#myModalLabel').html('Ajouter une nouvelle annonce');
                $("#message").html('');
                $('#addForm').attr("action", "{{url('annonces/add')}}");
                $("#titre").val('');
                $("#description").val('');
                $("#media").val('');
            });

            $('#addForm').on('submit', function (e) {
                e.preventDefault();
                var url = $(this).attr('action');
                var formdata = (window.FormData) ? new FormData($(this)[0]) : null;
                var data = (formdata !== null) ? formdata : $(this).serialize();
                $("#message").html('');
                $.ajax({
                    url: url,
                    data: data,
                    type: 'post',
                    processData: false,
                    contentType: false,
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