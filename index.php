<?php include "nav/head.php"?>

<body class="off-canvas-sidebar">
  <?php include "nav/navbar.php"?>
  <div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter" filter-color="black" style="background-image: url('assets/img/login.jpg'); background-size: cover; background-position: top center;">
      <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
      <div class="container">


        <?php if (isset($_GET['incorrect'])): ?>
        <div class="alert alert-warning text-center">
          Incorrect Email or Password
        </div>
        <?php endif?>
      </div>
     <?php include "nav/footer.php"?>