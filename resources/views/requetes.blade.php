@extends('layout')

@section('title') Requêtes @stop

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Requêtes</h4>
                        <p class="category">
                            <span>Reqêtes des utilisateurs</span>
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
                                <th>Emetteur</th>
                                <th>Libellé</th>
                                <th>Description</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php $i = 0?>
                                @forelse ($requetes as $requete)
                                <?php $i++?>
                                <tr>
                                    <td>{{$i}}</td>
                                    <td><a href="{{url('distributeurs/'.$requete['distributeur']['id_dist'])}}">{{$requete['distributeur']['nom_dist']}} {{$requete['distributeur']['nom_dist']}}</a></td>
                                    <td>{{$requete['titre_req']}}</td>
                                    <td>
                                        @if(strlen($requete['description_req']) > 50)
                                            {{(substr($requete['description_req'], 0, 49)."...")}}
                                        @else
                                            {{$requete['description_req']}}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('requetes')}}#addModal" class="modify_item" data-toggle="modal" data-description="{{$requete['description_req']}}" data-titre="{{$requete['titre_req']}}">Aperçu</a>
                                    </td>
                                </tr>
                                @empty
                                    <tr><td colspan="5" class="text-center">Aucune requete soumise</td></tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="12" class="text-center">
                                        @if(app('request')->input('p'))
                                            <a href="{{url('requetes')}}?q={{app('request')->input('q')}}&p=@if(app('request')->input('p') > 1){{app('request')->input('p') - 1}}@endif"
                                               class="btn btn-sm btn-info @if(app('request')->input('p') <= 1) disabled @endif">précédent</a>
                                            <a href="{{url('requetes')}}@if($i == 25)?q={{app('request')->input('q')}}&p={{app('request')->input('p') + 1}}@endif" class="btn btn-sm btn-info
                                                 @if($i < 25) disabled @endif">suivant</a>
                                        @else
                                            <a href="?q=" class="btn btn-sm btn-info disabled">précédent</a>
                                            <a href="{{url('requetes')}}@if($i == 25)?q={{app('request')->input('q')}}&p={{app('request')->input('p') + 1}}@endif" class="btn btn-sm btn-info
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
                <h4 class="modal-title" id="myModalLabel"></h4>
            </div>
            <div class="modal-body" id="myModalDescription"></div>
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
                $('#myModalLabel').html('<b>'+$(this).data("titre")+'</b>');
                $("#myModalDescription").html($(this).data("description"));
            });
        })
    </script>
@stop