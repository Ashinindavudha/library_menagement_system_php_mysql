<?php include("nav/head.php") ?>
<?php
    session_start();
    if (!isset($_SESSION['user'])) {
      header('location: index.php');
      exit();
    }
  ?>
<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-mini">
          CT
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a></div>
     <?php include("nav/sidebar.php") ?>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
     <?php include("nav/navbar.php") ?>
      <!-- End Navbar -->
      <div class="content">
        <!-- category create data form start -->

        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
            <form class="form" method="post" action="../_actions/categoryCreate.php">
              <div class="card card-login card-hidden">
                <div class="card-header card-header-rose text-center">
                  <h4 class="card-title">Login</h4>
                  <div class="social-line">
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                      <i class="fa fa-facebook-square"></i>
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                      <i class="fa fa-twitter"></i>
                    </a>
                    <a href="#pablo" class="btn btn-just-icon btn-link btn-white">
                      <i class="fa fa-google-plus"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body ">
                  <p class="card-description text-center">Or Be Classical</p>
                  <span class="bmd-form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">face</i>
                        </span>
                      </div>
                      <input type="text" name="category" class="form-control" placeholder="Category Name...">
                    </div>
                  </span>
                  
                </div>
                <div class="card-footer justify-content-center">
                  <button type="submit" class="btn btn-rose btn-link btn-lg"> Lets Go</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- form end -->
      </div>

      <?php include("nav/footer.php") ?>
    </div>
  </div>
  
  
  <?php include("nav/RightSidebar.php") ?>