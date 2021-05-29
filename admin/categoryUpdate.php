<?php include("nav/head.php") ?>
<?php
    require_once("../_actions/server.php");
    $name ="";
    $name_err = "";

    if (isset($_POST["id"]) && !empty($_POST["id"])) {
        //Get hidden input value
        $id = $_POST["id"];

        // Validate name
        $input_name = trim($_POST["category"]);
        if (empty($input_name)) {
            $name_err = "Please enter a Category Name";
        } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("option"=>array("regexp"=>"/^[a-zA-Z\s]+/")))) {
            $name_err = "Please enter a valid name";
        }else {
            $name = $input_name;
        }

        // check input errors before inserting in database
        if (empty($name)) {
            // prepare an update statement
            $sql = "UPDATE categories SET category=? WHERE id=?";

            if ($stmt = mysqli_prepare($link, $sql)) {
                //bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sssi", $param_name, $param_id);
                //set parameters 
                $param_name = $name;
                $param_id = $id;
                //Attempt to execute the parepared statement 
                if (mysqli_stmt_execute($stmt)) {
                    //Records updated successfully. Redirect to Landing page
                    header("location: categoryIndex.php");
                    exit();
                } else {
                    echo "Oops! Something went wrong. Please try again later";
                }
            }
            //Close statement
            mysqli_stmt_close($stmt);
        }
        //close connection
        mysqli_close($link);
    } else {
        //check existence of id parameter before processing 
        if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
            //get url parameter 
            $id = trim($_GET["id"]);
            //prepare a select statement
            $sql = "SELECT * FROM categories WHERE id = ?";
            if ($stmt = mysqli_prepare($link, $sql)) {
                //bind variables to the prepared statement as parameter
                mysqli_stmt_bind_param($stmt, "i", $param_id);
                //set parameters
                $param_id = $id;
                //Attempt to execute
                if (mysqli_stmt_execute($stmt)) {
                    $result = mysqli_stmt_get_result($stmt);
                    if (mysqli_num_rows($result) == 1) {
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        //retrieve individual field value
                        $name = $row["category"];
                    } else {
                        // url doesn't contain valid id. redirect to error page
                        header("location: ../error.php");
                        exit();
                    } 
                } else {
                    echo "Oops! Something went wrong. please try again later.";
                }
            }

            //close statement 
            mysqli_stmt_close($stmt);
            //close connection
            mysqli_close($link);
        } else {
            header("location: ../error.php");
        }
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
      <div class="col-md-12">
              <div class="card ">
                <div class="card-header card-header-rose card-header-text">
                  <div class="card-text">
                    <h4 class="card-title">Form Elements</h4>
                  </div>
                </div>
                <div class="card-body ">
                  <form method="post" action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" class="form-horizontal">
                    <div class="row">
                      <label class="col-sm-2 col-form-label">Category Name</label>
                      <div class="col-sm-10">
                        <div class="form-group">
                          <input type="text" name="category" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                          <span class="invalid-feedback"><?php echo $name_err;?></span>

                          <!-- <span class="bmd-help">A block of help text that breaks onto a new line.</span> -->
                        </div>
                      </div>
                    </div>
                    <div class="card-footer ">
                  <div class="row">
                    <div class="col-md-9">
                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>

                      <button type="submit" class="btn btn-fill btn-primary">Add Category</button>
                    </div>
                  </div>
                </div>
                  </form>
                </div>
                
              </div>
            </div>
        <!-- form end -->
      </div>

      <?php include("nav/footer.php") ?>
    </div>
  </div>
  
  
  <?php include("nav/RightSidebar.php") ?>