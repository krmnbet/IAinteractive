<?php
  global $servidor_path;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Framework | Login </title>
        <base href="<?php echo $servidor_path; ?>" />
        <link rel="shortcut icon" href="public/images/favicon.png">
        <!-- Bootstrap -->
        <link href="public/librerias/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="public/librerias/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- SweetAlert -->
        <link href="public/librerias/sweetalert/css/sweetalert.css" rel="stylesheet">
        <!-- Custom css -->
        <link href="public/css/login.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4" id="formulario">
                    <div class="account-wall">
                        <form class="form-signin" id="frm">
                            <input id="usuario" type="text" class="form-control requerido" placeholder="Usuario" autofocus>
                            <input id="contrasena" type="password" class="form-control requerido" placeholder="Contraseña">
                            <button class="btn btn-lg btn-primary btn-block" type="button" id="login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="public/librerias/jquery/js/jquery.min.js"></script>
        <!-- SweetAlert -->
        <script src="public/librerias/sweetalert/js/sweetalert.min.js"></script>
        <!-- Custom js -->
        <script type="text/javascript">
          var path_servidor = "<?php echo $servidor_path; ?>";
        </script>
        <script src="public/js/general.js"></script>
        <script src="public/js/public/index.js"></script>

    </body>
</html>
