@extends('layout')

@section('title') {{$distributeur['nom_dist']}} @stop

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Commandes</h4>
                            <p class="category">
                                <span>Commandes de <b> {{$distributeur['prenom_dist']}} {{$distributeur['nom_dist']}}</b></span>
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
                                    <th>Numéro</th>
                                    <th>Date</th>
                                    <th>Quantité</th>
                                    <th>Montant</th>
                                    <th>Total TTC</th>
                                    <th>Etat</th>
                                    <th>Mode de payement</th>
                                    <th></th>
                                </thead>
                                <tbody>
                                <?php $i = 0?>
                                @forelse ($commandes as $commande)
                                    <?php $i++?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$commande['numero_command']}}</td>
                                        <td>{{$commande['date_command']}}</td>
                                        <td>{{$commande['quantite_command']}}</td>
                                        <td>{{$commande['montant_command']}}</td>
                                        <td>{{$commande['totalttc_command']}}</td>
                                        <td>@if($commande['etat_command'] == 1) <span class="badge bg-success">validé</span> @else <span class="badge bg-info">En cours</span> @endif</td>
                                        <td>{{$commande['mode_payement']['titre_modpay']}}</td>
                                        <td><a href="{{url('distributeurs/'.$distributeur['id_dist'])}}#addModal" data-total="{{$commande['totalttc_command']}}" data-id="{{$commande['id_command']}}" data-numero="{{$commande['numero_command']}}" class="btn btn-primary modify_item" data-toggle="modal">Détails</a></td>
                                    </tr>
                                @empty
                                    <tr><td colspan="9" class="text-center">Aucune commande passée</td></tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="12" class="text-center">
                                            @if(app('request')->input('p'))
                                                <a href="{{url('distributeurs/'.$distributeur['id_dist'])}}?q={{app('request')->input('q')}}&p=@if(app('request')->input('p') > 1){{app('request')->input('p') - 1}}@endif"
                                                   class="btn btn-sm btn-info @if(app('request')->input('p') <= 1) disabled @endif">précédent</a>
                                                <a href="{{url('distributeurs/'.$distributeur['id_dist'])}}@if($i == 25)?q={{app('request')->input('q')}}&p={{app('request')->input('p') + 1}}@endif" class="btn btn-sm btn-info
                                                 @if($i < 25) disabled @endif">suivant</a>
                                            @else
                                                <a href="?q=" class="btn btn-sm btn-info disabled">précédent</a>
                                                <a href="{{url('distributeurs/'.$distributeur['id_dist'])}}@if($i == 25)?q={{app('request')->input('q')}}&p={{app('request')->input('p') + 1}}@endif" class="btn btn-sm btn-info
                                                 @if($i < 25) disabled @endif">suivant</a>
                                            @endif
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-user">
                        <div class="image">
                            <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="..."/>
                        </div>
                        <div class="content">
                            <div class="author">
                                <a href="#">
                                    <img class="avatar border-gray" src="{{url('assets/img/faces/face-3.jpg')}}" alt="..."/>

                                    <h4 class="title">{{$distributeur['prenom_dist']}} {{$distributeur['nom_dist']}}<br/>
                                        <small>{{$distributeur['phone_dist']}}</small>
                                    </h4>
                                </a>
                            </div>
                            <p class="description text-center">
                                Matricule: {{$distributeur['matricule_dist']}} <br>
                                <a href="mailto:{{$distributeur['mail_dist']}}">{{$distributeur['mail_dist']}}</a>
                            </p>
                        </div>
                        <hr>
                        <div class="text-center">
                            <h3>{{$njangui['montant_njang']}} NKAP</h3>
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
                <h4 class="modal-title" id="myModalLabel">Détails de la commande</h4>
            </div>
            <div id="message" class="text-center"></div>
            <div class="modal-body table-responsive" id="myModalBody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            </div>
        </div>
    </div>
</div>

@section('scripts')

    <script type="text/javascript">
        $(function () {
            $('.modify_item').on('click', function (e) {
                e.preventDefault();
                $('#myModalLabel').html('<b> Commande numéro '+$(this).data("numero")+'</b>');
                $('#myModalBody').html("<p class='text-center'>Chargement...</p>");

                var table = "<table class='table table-hover table-striped'>" +
                    "<thead><tr><th>Qte</th><th>PU</th><th>Montant</th><th>Produit</th></tr></thead>";
                for(var i=0; i < 5; i++){
                    table += "<tr><td>10</td><td>200</td><td>2000 NKAP</td> <td>Produit 1</td></tr>"
                }
                table += "<tr><td colspan='4'>Total: <b>"+$(this).data("total")+" NKAP</b></td></tr></table>";
                $('#myModalBody').html(table);
                $.ajax({
                    url: "{{url('commandes')}}" + '/' + $(this).data('id'),
                    type: 'get',
                    beforeSend: function () {
                    },
                    complete: function () {
                        // $('#addItem').text('Enregistrer').prop({disabled: false});
                    },
                    success: function (data) {
                        if(data.ligneCdes){
                            console.log(data.ligneCdes);
                            $("#message").html("<span class='text-success'>Good</span>");
                        }else{
                            $("#message").html("<span class='text-danger'>Aucune ligne de commande trouvée</span>");
                        }
                    },
                    error: function () {
                        $("#message").html("<span class='text-warning'>Une erreur est survenue.Vérifiez votre connexion internet ou reéssayez</span>");
                    }
                })
            });
        })
    </script>
@stop