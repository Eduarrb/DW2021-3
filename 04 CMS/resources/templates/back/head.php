<?php
    if(!isset($_SESSION['user_id']) && !isset($_SESSION['user_nombres']) && !isset($_SESSION['user_apellidos']) && !isset($_SESSION['user_rol'])){
        redirect('../');
    }
    if($_SESSION['user_rol'] != 'admin' && $_SESSION['user_rol'] != 'god'){
        redirect('../');
    }

?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://cdn.tiny.cloud/1/i7333ti0ulwjf7tjj5m2pxoewnow6iywff87xklpyfz6asu5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="vendor/jquery/jquery.min.js"></script>

</head>

<body id="page-top">