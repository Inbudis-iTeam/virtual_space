<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Login</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <h4 class="title text-center">INBUDIS | <span class="text-info">ADMIN</span></h4>
                    <div class="col-md-4 col-lg-offset-4 col-sm-8 col-sm-offset-2" style="margin-top: 40px; padding: 100px; box-shadow: #1F77D0 2px 2px 7px">
                        <div class="card">
                            <div class="header">

                            </div>
                            <div class="content">
                                <form action="{{url('/login')}}" method="post" id="loginForm">
                                    <div class="form-group text-center">
                                        <img src="assets/img/authentication.svg" alt="" width="100px" height="100px">
                                    </div>
                                    <div class="form-group text-center" id="message"></div>
                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control" required placeholder="Nom d'utilisateur">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" required placeholder="Mot de passe">
                                    </div>
                                    <button class="btn btn-info btn-block" id="login_btn">LOGIN</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap-notify.js"></script>
<script>
    $(function () {
        $('#loginForm').on('submit', function (e) {
           e.preventDefault();
           var url = $(this).attr('action');
           var data = $(this).serialize();
           console.log(data);
           $.ajax({
               url: url,
               data: data,
               type: 'post',
               beforeSend: function () {
                   $('#login_btn').text('LOGIN ...').prop({disabled: true});
                   $("#message").html("");
               },
               complete: function () {
                   $('#login_btn').text('LOGIN').prop({disabled: false});
               },
               success: function (data) {
                   if(data.status){
                       $("#message").html("<span class='text-success'>"+data.message+"</span>");
                       setTimeout(function () {
                           window.location.reload();
                       }, 2000);
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


</html>
