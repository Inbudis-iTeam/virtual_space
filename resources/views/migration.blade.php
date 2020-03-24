@extends('layout')

@section('title') Migrations de distributeurs @stop

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Distributeurs</h4>
                            <p class="category">
                                <span>Voir les migrations des distributeurs</span>
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
                                        <td><a href="{{url('migrations')."/". $distributeur['id_dist']}}" class="btn btn-primary">Migrations</a></td>
                                    </tr>
                                @empty
                                    <tr><td colspan="11" class="text-center">Aucun distributeur enregistré dans le système</td></tr>
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