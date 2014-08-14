<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title><?php wp_title(); ?></title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo  get_stylesheet_directory_uri() ?>/style.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container-topo">
  <div class="row" style="ver">
    <div class="col-md-6">
      <a href="<?php echo site_url() ?>">
        <img src="http://placehold.it/295x55&text=Logo" alt="" class="img-thumbnail">
      </a>
    </div>
    <div class="col-md-4" style="text-align:right">
      <!-- <a href="">Minha conta</a> -->
    </div>
    <div class="col-md-2" style="text-align:right">
      
      <a href="<?php echo site_url() ?>/registro" class="btn btn-primary">Efetuar Registro</a>
    </div>
  </div>
</div>