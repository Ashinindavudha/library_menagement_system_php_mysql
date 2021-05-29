<?php include "nav/head.php"?>

<body class="off-canvas-sidebar">
  <?php include "nav/navbar.php"?>
  <div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('assets/img/login.jpg'); background-size: cover; background-position: top center;">
      <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
      <div class="container">

      <div class="wrapper wrapper-full-page">
    <div class="page-header error-page header-filter" style="background-image: url('../../assets/img/clint-mckoy.jpg')">
      <!--   you can change the color of the filter page using: data-color="blue | green | orange | red | purple" -->
      <div class="content-center">
        <div class="row">
          <div class="col-md-12">
            <h1 class="title">404</h1>
            <h2>Page not found :(</h2>
            <h4>Ooooups! Looks like you got lost.</h4>
          </div>
        </div>
      </div>
        <?php if (isset($_GET['incorrect'])): ?>
        <div class="alert alert-warning text-center">
          Incorrect Email or Password
        </div>
        <?php endif?>
      </div>
     <?php include "nav/footer.php"?>