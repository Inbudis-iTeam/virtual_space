@extends('layout')

@section('title') Mot de passe @stop

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="card" style="padding: 20px">
                    <div class="header">
                        <h4 class="title">Modifier votre mot de passe</h4>
                    </div>
                    <div class="content table-responsive table-full-width margin-top">
                        <form method="post" action="{{url('/admin/modify_password')}}" id="modifyPasswordForm">
                            <div id="message" class="text-center"></div>
                            <div class="form-group">
                                <input type="password" required name="old_password" id="passwordItem" class="form-control" placeholder="Ancien mot de passe">
                            </div>
                            <div class="form-group">
                                <input type="password" required name="new_password" id="confirmPasswordItem" class="form-control" placeholder="Nouveau mot de passe">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" id="modify">MODIFIER</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script type="text/javascript">
        $(function () {
            $('#modifyPasswordForm').on('submit', function (e) {
                e.preventDefault();
                var url = $(this).attr('action');
                var data = $(this).serialize();
                $("#message").html('');
                $.ajax({
                    url: url,
                    data: data,
                    type: 'post',
                    beforeSend: function () {
                        $('#modify').text('Patientez...').prop({disabled: true});
                        $("#message").html("");
                    },
                    complete: function () {
                        $('#modify').text('MODIFIER').prop({disabled: false});
                    },
                    success: function (data) {
                        if(data.status){
                            $("#message").html("<span class='text-success'>"+data.message+"</span>");
                            $('#passwordItem').val('');
                            $('#confirmPasswordItem').val('');
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