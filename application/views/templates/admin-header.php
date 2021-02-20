<!DOCTYPE html>
<style>
  * {box-sizing: border-box;}

  body { 
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
  }

  .header {
    overflow: hidden;
    background-color: white;
    padding: 20px 10px;
  }

  .header a {
    float: left;
    color: black;
    text-align: center;
    
    text-decoration: none;
    font-size: 18px;
    width: 100px; 
  }

  .header a.logo {
    font-size: 25px;
    font-weight: bold;
  }

  .header a:hover {
    background-color: white;
    color: black;
  }

  .header a.active {
    color: black;
    text-decoration-line: underline;
    text-decoration-color: #0d7e39;
    text-decoration-thickness: 0.3em;
  }

  .header-right {
    float: right;
  }

  @media screen and (max-width: 500px) {
    .header a {
      float: none;
      display: block;
      text-align: left;
    }

    .header-right {
      float: none;
    }
  }
</style>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Company test</title>

  <!-- Bootstrap Core CSS -->
  <link href="<?= base_url() ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- MetisMenu CSS -->
  <link href="<?= base_url() ?>assets/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="<?= base_url() ?>assets/css/sb-admin-2.css" rel="stylesheet">

  <!-- Morris Charts CSS -->
  <!-- <link href="<?= base_url() ?>assets/plugins/morrisjs/morris.css" rel="stylesheet"> -->


  <!-- Custom Fonts -->
  <link href="<?= base_url() ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>

<body>
  <div id="wrapper">
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" role="navigation" style="margin-bottom: 0;height: 70px; background-color: white;">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="" href="index.html"><svg width="100" height="100">
          <circle cx="70" cy="35" r="28" stroke="#0d7e39" stroke-width="2" fill="white"></circle>
          Sorry, your browser does not support inline SVG.
          <text fill="#0d7e39" font-size="16" font-family="Verdana" x="47" y="41">LOGO</text>
        </svg></a>
      </div>
      <!-- /.navbar-header -->

      <div class="header">

        <div class="header-right">

          <a class="<?=($this->uri->uri_string()=== 'news')?'active':''?>" href="<?= base_url() ?>news">Home</a>
          <a class="<?=($this->uri->uri_string()=== 'news/state')?'active':''?>" href="<?= base_url() ?>news/state">State</a>
          <a class="<?=($this->uri->uri_string()=== 'news/district')?'active':''?>" href="<?= base_url() ?>news/district">District</a>

          <a class="<?=($this->uri->uri_string()=== 'news/child')?'active':''?>" href="<?= base_url() ?>news/child">Child</a>

          <a href="<?= base_url() ?>users/logout"><img src="<?= base_url() ?>download.png" width="43%">Logout</a>
        </div>
      </div>
    </nav>
  </div>

