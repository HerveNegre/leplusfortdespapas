<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Tableau de bord Le plus fort des papas
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
 <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class=" {{ 'dashboard' == request()->path() ? "active" : "" }}">
            <a href="/dashboard">
              <i class="now-ui-icons design_app"></i>
              <p>Table de matières</p>
            </a>
          </li>
          <li class=" {{ 'ordersAdmin' == request()->path() ? "active" : "" }}">
            <a href="/ordersAdmin">
              <i class="fas fa-truck"></i>
              <p>Commandes</p>
            </a>
          </li>
          <li class=" {{ 'categoryAdmin' == request()->path() ? "active" : "" }}">
            <a href="/categoryAdmin">
              <i class="fas fa-book"></i>
              <p>Catégories</p>
            </a>
          </li>
          <li class=" {{ 'productAdmin' == request()->path() ? "active" : "" }}">
            <a href="/productAdmin">
              <i class="now-ui-icons ui-1_bell-53"></i>
              <p>Produits</p>
            </a>
          </li>
          <li class=" {{ 'role-register' == request()->path() ? "active" : "" }}">
            <a href="/role-register">
              <i class="now-ui-icons users_single-02"></i>
              <p>Utilisateurs</p>
            </a>
          </li>
        </ul>
      </div>
    </div> 
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Tableau de bord</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form class="px-3">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li>
                <a class="px-3" href="#" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                  {{ Auth::user()->name }} <i class="now-ui-icons users_single-02"></i>
                  
                  <a class="px-3" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                    Se déconnecter
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-lg">
        <canvas id="bigDashboardChart"></canvas>
      </div>
      <div class="content">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">Tableau de bord</h5>
                <h4 class="card-title d-flex justify-content-center"> Modifier un Utilisateur</h4>
              </div>
              <div class="card-body">
                    <form action="/role-register-update/{{ $users->id }}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }} <!--fonction qui valide la mis à jour -->

                        <div class="form-group">
                            <label>Nom</label>
                            <input type="text" class="form-control" name="name" id="name" value="{{ $users->name }}">
                        </div>
                        <div class="form-group">
                            <label>Grade</label>
                            <select name="usertype" id="usertype" class="form-control">
                                <option value="-">Utilisateur</option>
                                <option value="admin">Administrateur</option>
                            </select>
                        </div>
                        <div class="form-group">
                          <label>Statut</label>
                          <select name="isBan" id="isBan" class="form-control">
                              <option value="0">Actif</option>
                              <option value="1">Banni</option>
                          </select>
                      </div>
                        <button type="submit" class="btn btn-success">Modifier</button>
                        <a href="/role-register" type="submit" class="btn btn-danger">Retour</a>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class=" container-fluid ">
          <div class="copyright" id="copyright">
            &copy;
            <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>
            Benjamin, Quentin, Brice et Herve by Coding Academy Lyon Octobre 2020
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>