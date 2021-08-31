<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Psikotes-ku Papi Kostick</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="">
    <link rel="shortcut icon" href="">

    <link rel="stylesheet" href="<?php echo base_url('assets/css/normalize.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/themify-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/pe-icon-7-stroke.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/flag-icon.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/cs-skin-elastic.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/chartist.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jqvmap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/weather-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/fullcalendar.min.css'); ?>">
    <link href="<?php echo base_url('asset/vendor/bootstrap-table/bootstrap-table.min.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('asset/vendor/bootstrap-validator/css/bootstrapValidator.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('asset/vendor/bootstrap-select/css/bootstrap-select.min.css');?>">
    <style type="text/css">
        .judul {
                text-transform: uppercase; color: #02a2fe; font: 15px Helvetica, Arial, Sans-Serif;
                text-shadow: 1px 1px #191efc, 2px 2px #191efc, 3px 3px #02a2fe;
               -webkit-transition: all 0.12s ease-out;
               -moz-transition: all 0.12s ease-out;
               -o-transition: all 0.12s ease-out;
               font-size: 35px; letter-spacing: 1px;
           }

        .judul:hover {
            text-shadow: 1px 1px #191efc, 2px 2px #191efc, 3px 3px #191efc, 4px 4px #191efc, 5px 5px #191efc, 6px 6px #191efc;
        }
    </style>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/loading.css') ?>">
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav" id="accordionSidebar">
                    <li>
                        <a href="<?php echo base_url('admin/'); ?>"><i class="menu-icon ti-dashboard"></i>Dashboard </a>
                    </li>
                    <li class="menu-title">Master Data</li><!-- /.menu-title -->
                    <li>
                        <a href="<?php echo base_url('admin/peserta') ?>"> <i class="menu-icon fa fa-users"></i>Data Peserta </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/soal') ?>"> <i class="menu-icon fa fa-book"></i>Data Soal </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('admin/Pekerjaan') ?>"> <i class="menu-icon fa fa-tasks"></i>Data Pekerjaan </a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./"><h3 class="judul">PSIKOTES</h3></a>
                    <a class="navbar-brand hidden" href="./"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="<?= base_url(); ?>images/admin.png" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a href="<?php echo base_url('admin/logout') ?>" class="nav-link" href="#"><i class="fa fa-power-off"></i>Logout</a>
                        </div>
                    </div>

                </div>
            </div>
        </header>