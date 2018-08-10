<?php
  global $activar_login, $servidor_path;
  $usuario_nombre = ($activar_login) ? explode(" ", $_SESSION["usuario"]->nombre)[0] : "";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Framework | Dashboard </title>

    <base href="<?php echo $servidor_path; ?>" />

    <link rel="shortcut icon" href="public/images/favicon.png">

    <!-- Bootstrap -->
    <link href="public/librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="public/librerias/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="public/librerias/nprogress/css/nprogress.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="public/librerias/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="public/librerias/bootstrap-datepicker/css/bootstrap-datepicker.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="public/librerias/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="public/librerias/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="public/librerias/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="public/librerias/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="public/librerias/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <!-- SweetAlert -->
    <link href="public/librerias/sweetalert/css/sweetalert.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="public/css/custom.css" rel="stylesheet">
    <?php echo "<link href='public/css/". $_REQUEST["contenido"] .".css' rel='stylesheet'>"; ?>
  </head>

  <body class="nav-sm">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <div class="clearfix"></div>

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section menu_top">
                <ul class="nav side-menu">
                  <li class="<?php echo ($_REQUEST["contenido"] == 'usuario') ? "active" : ""; ?>" ><a href="<?php echo $servidor_path; ?>usuario"><i class="fa fa-user"></i> Usuarios </span></a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <!--<div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>-->

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user-circle-o fa-2x"></i>&nbsp;<?php echo $usuario_nombre; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <?php
                    if($activar_login){
                      echo '
                      <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="'. $servidor_path .'seguridad/logout"><i class="fa fa-sign-out pull-right"></i> Salir</a></li>
                      </ul>';
                    }
                  ?>
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row contenido">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <?php include_once("views/". $_REQUEST["contenido"] .".php");?>
                </div>
              </div>
            </div>
        </div>
        <!-- /page content -->

      </div>
    </div>

    <!-- jQuery -->
    <script src="public/librerias/jquery/js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="public/librerias/bootstrap/js/bootstrap.js"></script>
    <!-- NProgress -->
    <script src="public/librerias/nprogress/js/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="public/librerias/Chart.js/js/Chart.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="public/librerias/bootstrap-progressbar/js/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="public/librerias/moment/js/moment.min.js"></script>
    <script src="public/librerias/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="public/librerias/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js"></script>
     <!-- Datatables -->
    <script src="public/librerias/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="public/librerias/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="public/librerias/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="public/librerias/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <!-- SweetAlert -->
    <script src="public/librerias/sweetalert/js/sweetalert.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script type="text/javascript">
      var path_servidor = "<?php echo $servidor_path; ?>";
    </script>
    <script src="public/js/general.js"></script>
    <?php if($_REQUEST['contenido'] != 'reporte' && $_REQUEST['contenido'] != 'contacto') echo '<script src="public/js/catalogos.js"></script>'; ?>
    <script src="public/js/custom.js"></script>
    <?php echo "<script src='public/js/". $_REQUEST["contenido"] .".js'></script>"; ?>
  </body>
</html>
