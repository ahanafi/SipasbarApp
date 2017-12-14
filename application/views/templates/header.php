<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PPB Application | Dashboard Page</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/ionicons/css/ionicons.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/_all-skins.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/flat/blue.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datepicker/datepicker3.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/select2.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-toggle/css/bootstrap-toggle.min.css'); ?>">
</head>
<style>
  .ctr{
    text-align: center !important;
  }
  .navbar-nav>li> a.logout, .navbar-nav>li> a.logout:hover{
    background: #dd4b39 !important;
    border:none;
    position: relative;
    display: block;
    padding: 15px 20px;
    line-height: 20px;
    color: #fff;
  }
  nav>li> form > a.logout {
    position: relative;
    display: block;
    padding: 10px 15px;
  }
  .select2-container--default .select2-selection--multiple .select2-selection__choice{
    background-color: #3c8dbc !important;
    border-color: #367fa9 !important;
    border-radius: 0px !important;
  }
  .select2-container--default .select2-selection--multiple .select2-selection__choice__remove{
    color: #fff !important;
  }
  .select2-container--default.select2-container--focus .select2-selection--multiple{
    border-color: #d2d6de !important;
  }
  .select2-container--default .select2-selection--multiple{
    border-color: #d2d6de !important;
    border-radius: 0px !important;
    padding: 0px 6px !important;
  }
  .select2-results__option .select2-results__option--hightlighted{
    border-radius: 0px !important;
  }
  .toggle{
    width: 100% !important;
    border-radius: 0px !important;
  }
</style>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">