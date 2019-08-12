<?php
$cakeDescription = 'SimpleStock · Gestión de tu inventario de manera sencilla';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- =============== VENDOR STYLES ===============-->
    <!-- FONT AWESOME-->
    <link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.css">
    <!-- SIMPLE LINE ICONS-->
    <link rel="stylesheet" href="/vendor/simple-line-icons/css/simple-line-icons.css">
    <!-- ANIMATE.CSS-->
    <link rel="stylesheet" href="/vendor/animate.css/animate.css">
    <!-- WHIRL (spinners)-->
    <link rel="stylesheet" href="/vendor/whirl/dist/whirl.css">
    <!-- =============== PAGE VENDOR STYLES ===============-->
    <!-- =============== BOOTSTRAP STYLES ===============-->
    <link rel="stylesheet" href="/css/bootstrap.css" id="bscss">
    <!-- =============== APP STYLES ===============-->
    <link rel="stylesheet" href="/css/app.css" id="maincss">
    <link rel="stylesheet" href="/css/theme-e   .css" id="maincss">

    <?= $this->Html->css('custom.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="layout-fixed">
<div class="wrapper">
    <?= $this->element('header'); ?>
    <?= $this->element('sidebar'); ?>
    <section>
        <div class="content-wrapper">
            <div class="content-heading">
                <?= $pageTitle ?>
            </div>
            <?= $this->Flash->render() ?>
            <div class="row">
                <div class="col-12">
                    <?= $this->fetch('content') ?>
                </div>
            </div>
        </div>
    </section>
</div>


<!-- =============== VENDOR SCRIPTS ===============-->
<!-- MODERNIZR-->
<script src="/vendor/modernizr/modernizr.custom.js"></script>
<!-- JQUERY-->
<script src="/vendor/jquery/dist/jquery.js"></script>
<!-- BOOTSTRAP-->
<script src="/vendor/popper.js/dist/umd/popper.js"></script>
<script src="/vendor/bootstrap/dist/js/bootstrap.js"></script>
<!-- STORAGE API-->
<script src="/vendor/js-storage/js.storage.js"></script>
<!-- JQUERY EASING-->
<script src="/vendor/jquery.easing/jquery.easing.js"></script>
<!-- ANIMO-->
<script src="/vendor/animo/animo.js"></script>
<!-- SCREENFULL-->
<script src="/vendor/screenfull/dist/screenfull.js"></script>
<!-- LOCALIZE-->
<script src="/vendor/jquery-localize/dist/jquery.localize.js"></script>
<!-- =============== PAGE VENDOR SCRIPTS ===============-->
<!-- =============== APP SCRIPTS ===============-->
<script src="/js/app.js"></script>
</body>
</html>
