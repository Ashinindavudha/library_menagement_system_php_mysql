<?php include "nav/head.php"?>
<?php
include("../_actions/server.php");
$result = mysqli_query($link, "SELECT * FROM categories WHERE id='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);

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
     <?php include "nav/sidebar.php"?>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
     <?php include "nav/navbar.php"?>
      <!-- End Navbar -->
      <div class="content">
      <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Form Elements</h4>
                  </div>
                </div>
                <div class="card-body ">
                  <form method="post" action="../_actions/categoryUpdate.php" class="form-horizontal">
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Category Name</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="text" name="category" class="form-control" value="<?= $row['category'] ?>">
                          <span class="bmd-help">A block of help text that breaks onto a new line.</span>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer ">
                  <div class="row">
                    <div class="col-md-9">
                    <input type="hidden" name="id" value="<?=$row['id']?>"/>

                      <button type="submit" name="update" class="btn btn-fill btn-primary">Add Category</button>
                    </div>
                  </div>
                </div>
                  </form>
                </div>

              </div>
            </div>
        <!-- form end -->
      </div>

      <?php include "nav/footer.php"?>
    </div>
  </div>


  <?php include "nav/RightSidebar.php"?>