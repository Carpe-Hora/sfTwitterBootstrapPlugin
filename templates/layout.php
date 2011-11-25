<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include_title() ?>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_javascripts() ?>
    <!-- fallback -->
    <script>window.jQuery || document.write('<script src="<?php javascript_path('/sfTwitterBootstrapPlugin/js/jquery-1.7.min.js')?>">\x3C/script>')</script>

    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le styles -->
    <?php include_stylesheets() ?>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="/favicon.ico">
  </head>
  <body>
    <?php include_component('sfTwitterBootstrap', 'header'); ?>

    <div class="container-fluid">
      <?php echo $sf_content ?>
    </div>

    <script>$(function () { prettyPrint() })</script>

  </body>
</html>