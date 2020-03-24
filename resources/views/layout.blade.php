<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>@yield('title')</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="{{url('assets/css/animate.min.css')}}" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="{{url('assets/css/light-bootstrap-dashboard.css?v=1.4.0')}}" rel="stylesheet"/>


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="{{url('assets/css/demo.css')}}" rel="stylesheet" />


        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="{{url('assets/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />

    </head>
    <body>
        <div class="wrapper">
            <div class="sidebar" data-color="purple" data-image="{{url("assets/img/sidebar-5.jpg")}}">
                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="http://www.creative-tim.com" class="simple-text">
                            INBUDIS
                        </a>
                    </div>

                    <ul class="nav">
                        <li @if(url()->current() == url("home")) class="active" @endif>
                            <a href="{{url("home")}}">
                                <i class="pe-7s-graph"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li @if(url()->current() == url("admin")) class="active" @endif>
                            <a href="{{url("admin")}}">
                                <i class="pe-7s-user"></i>
                                <p>Admins</p>
                            </a>
                        </li>
                        <li @if(url()->current() == url("ville")) class="active" @endif>
                            <a href="{{url("ville")}}">
                                <i class="pe-7s-note2"></i>
                                <p>Villes</p>
                            </a>
                        </li>
                        <li @if(url()->current() == url("quartier")) class="active" @endif>
                            <a href="{{url('quartier')}}">
                                <i class="pe-7s-news-paper"></i>
                                <p>Quartier</p>
                            </a>
                        </li>
                        <li class="dropdown @if(url()->current() == url("bureau") || url()->current() == url("typebureau")) active @endif">
                            <a data-toggle="collapse" href="#bureauMenu" role="button" aria-expanded="false" aria-controls="bureauMenu">
                                <i class="pe-7s-science"></i>
                                <p>Bureau</p>
                            </a>
                            <ul class="collapse" id="bureauMenu">
                                <li><a href="{{url('bureau')}}">Bureaux</a></li>
                                <li><a href="{{url('typebureau')}}">Type de bureau</a></li>
                            </ul>
                        </li>
                        <li class="dropdown @if(url()->current() == url("distributeurs") || url()->current() == url("type_user") || url()->current() == url("categories_user")) active @endif">
                            <a data-toggle="collapse" href="#utilisateurMenu" role="button" aria-expanded="false" aria-controls="utilisateurMenu">
                                <i class="pe-7s-map-marker"></i>
                                <p>Utilisateurs</p>
                            </a>
                            <ul class="collapse" id="utilisateurMenu">
                                <li><a href="{{url('distributeurs')}}">Distributeurs</a></li>
                                <li><a href="{{url('type_user')}}">Type d'utilisateur</a></li>
                                <li><a href="{{url('categories_user')}}">Catégorie d'utilisateur</a></li>
                            </ul>
                        </li>

                        <li @if(url()->current() == url("requetes")) class="active" @endif>
                            <a href="{{url('commandes')}}">
                                <i class="pe-7s-ticket"></i>
                                <p>Commandes</p>
                            </a>
                        </li>
                        <li class="dropdown @if(url()->current() == url("produits") || url()->current() == url("categorie_produit")) active @endif">
                            <a data-toggle="collapse" href="#produitMenu" role="button" aria-expanded="false" aria-controls="produitMenu">
                                <i class="pe-7s-shopbag"></i>
                                <p>Produits</p>
                            </a>
                            <ul class="collapse" id="produitMenu">
                                <li><a href="{{url('produits')}}">Produits</a></li>
                                <li><a href="{{url('categorie_produit')}}">Catégories de produit</a></li>
                            </ul>
                        </li>
                        <li class="dropdown @if(url()->current() == url("migrations") || url()->current() == url("type_migration")) active @endif">
                            <a data-toggle="collapse" href="#migrationMenu" role="button" aria-expanded="false" aria-controls="migrationMenu">
                                <i class="pe-7s-shopbag"></i>
                                <p>Migrations</p>
                            </a>
                            <ul class="collapse" id="migrationMenu">
                                <li><a href="{{url('migrations')}}">Migrations</a></li>
                                <li><a href="{{url('type_migration')}}">Type de migration</a></li>
                            </ul>
                        </li>
                        <li @if(url()->current() == url("annonces")) class="active" @endif>
                            <a href="{{url('annonces')}}">
                                <i class="pe-7s-news-paper"></i>
                                <p>Annonces</p>
                            </a>
                        </li>
                        <li @if(url()->current() == url("requetes")) class="active" @endif>
                            <a href="{{url('requetes')}}">
                                <i class="pe-7s-chat"></i>
                                <p>Requêtes</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="{{url("home")}}">Dashboard</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-left">
                                <li>
                                    <a href="{{url("home")}}" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-dashboard"></i>
                                        <p class="hidden-lg hidden-md">Dashboard</p>
                                    </a>
                                </li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <p>
                                            <i class="pe-7s-user fa-2x"></i>
                                            <b class="caret"></b>
                                        </p>

                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url("/admin/modify_password")}}">Changer de mot de passe</a></li>
                                        <li>
                                            <a href="{{url('logout')}}">Déconnexion</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{url('logout')}}">
                                        <p>Déconnexion</p>
                                    </a>
                                </li>
                                <li class="separator hidden-lg"></li>
                            </ul>
                        </div>
                    </div>
                </nav>


                @yield('content')

                <!-- FOOTER -->
                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="pull-left">
                            <ul>
                                <li>
                                    <a href="#">
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Company
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Portfolio
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        Blog
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <p class="copyright pull-right">
                            &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                        </p>
                    </div>
                </footer>

            </div>
        </div>

    </body>
    <!--   Core JS Files   -->
    <script src="{{url('assets/js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src="{{url('assets/js/light-bootstrap-dashboard.js?v=1.4.0')}}" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="{{url('assets/js/chartist.min.js')}}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{url('assets/js/bootstrap-notify.js')}}"></script>
    <script src="{{url('assets/js/sweetalert2@9.js')}}"></script>


    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    @yield('scripts')

</html>
