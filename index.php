<?php
  session_start();
  include './db_connection.php';
  $insert = false;
  $role=$_SESSION['role'];
  if($role){
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pratikriiya Vishleshan</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Google fonts - Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <!-- Choices CSS-->
  <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
  <!-- Custom Scrollbar-->
  <link rel="stylesheet" href="vendor/overlayscrollbars/css/OverlayScrollbars.min.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="css/custom.css">
  <!-- Favicon-->
  <link rel="shortcut icon" href="img/All_India_Council_for_Technical_Education_logo-removebg-preview.png">
  <!-- Tweaks for older IEs-->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>

<body>
  <!-- Side Navbar -->
  <nav class="side-navbar">
    <!-- Sidebar Header    -->
    <div class="sidebar-header d-flex align-items-center justify-content-center p-3 mb-3">
      <!-- User Info-->
      <div class="sidenav-header-inner text-center"><img class="img-fluid rounded-circle avatar mb-3"
          src="./download-removebg-preview.png" alt="person">
        <h2 class="h5 text-white text-uppercase mb-0">Techno India NJR Institute Of Technology</h2>
        <p class="text-sm mb-0 text-muted">Head Of Institute</p>
      </div>
      <!-- Small Brand information, appears on minimized sidebar--><a class="brand-small text-center" href="index.php">
        <p class="h1 m-0">PV</p>
      </a>
    </div>
    <!-- Sidebar Navigation Menus--><span
        class="text-uppercase text-gray-500 text-sm fw-bold letter-spacing-0 mx-lg-2 heading">Main</span>
      <ul class="list-unstyled">
        <li class="sidebar-item"><a class="sidebar-link" href="index.php">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#real-estate-1"> </use>
            </svg>Home </a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="add_department.php">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#browser-window-1"> </use>
            </svg>Department </a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="#FACULTY" data-bs-toggle="collapse">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#browser-window-1"> </use>
            </svg>Faculty </a>
          <ul class="collapse list-unstyled " id="FACULTY">
            <li><a class="sidebar-link" href="add_faculty.php">Add/Edit</a></li>
            <li><a class="sidebar-link" href="send_faculty_feedback.php">Send Feedback</a></li>
  
          </ul>
        </li>
        <li class="sidebar-item"><a class="sidebar-link" href="#STUDENT" data-bs-toggle="collapse">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#browser-window-1"> </use>
            </svg>Student </a>
          <ul class="collapse list-unstyled " id="STUDENT">
            <li><a class="sidebar-link" href="add_Student.php">Add/Edit</a></li>
            <li><a class="sidebar-link" href="send_student_feedback.php">Send Feedback</a></li>
  
          </ul>
      </ul>

  </nav>
  <div class="page">
    <!-- navbar-->
    <header class="header">
      <nav class="navbar">
        <div class="container-fluid">
          <div class="d-flex align-items-center justify-content-between w-100">
            <div class="d-flex align-items-center"><a
                class="menu-btn d-flex align-items-center justify-content-center p-2 bg-gray-900" id="toggle-btn"
                href="#">
                <svg class="svg-icon svg-icon-sm svg-icon-heavy text-white">
                  <use xlink:href="#menu-1"> </use>
                </svg></a><a class="navbar-brand ms-2" href="index.php">
                <div class="brand-text d-none d-md-inline-block text-uppercase letter-spacing-0"><span
                    class="text-white fw-normal text-xs">Pratikriya </span><strong
                    class="text-primary text-sm">Vishleshan</strong></div>
              </a></div>
            <ul class="nav-menu mb-0 list-unstyled d-flex flex-md-row align-items-md-center">

              <!-- Log out-->
              <li class="nav-item"><a class="nav-link text-white text-sm ps-0" href="login.php" onclick="<?php unset($role);session_unset();?>" > <span
                    class="d-none d-sm-inline-block">Logout</span>
                  <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                    <use xlink:href="#security-1"> </use>
                  </svg></a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- Main Body -->
    </section>
    <section class="py-5">
      <div class="container-fluid">
        <div class="row align-items-stretch gy-4">
          <!-- Overall Report-->
          <div class="col-lg-3">
            <div class="card text-left  mb-0" ; style="background-color:#17a2bb; height: 200px;">
              <div class="card-body">
                <h2 class="fw-bold fw-normal mb-4card-title">Overall Report</h2>
                <p class="">Here is the overall report of the Student and Faculty.</p>
                <a href="./Overall_Reports.html" class="btn btn-primary">Check</a>
              </div>
            </div>
          </div>

          <!-- Semester Report-->
          <div class="col-lg-3">
            <div class="card text-left mb-0" ;" style="background-color:#ffc107;height: 200px;">
              <div class="card-body">
                <h2 class="fw-bold fw-normal mb-4card-title">Semester Report</h2>
                <p class="">Here is the semester wise report of the Student and Faculty.</p>
                <a href="./Semester_result_p_f.html" class="btn btn-primary">Check</a>
              </div>
            </div>
          </div>

          <!-- yearly Report-->
          <div class="col-lg-3">
            <div class="card text-left  mb-0" ; style="background-color:#17a2bb;height: 200px;">
              <div class="card-body">
                <h2 class="fw-bold fw-normal mb-4card-title">Yearly Report</h2>
                <p class="">Here is the overall report of the Student and Faculty.</p>
                <a href="./Yearly_result.html" class="btn btn-primary">Check</a>
              </div>
            </div>
          </div>

          <!-- Feedback Report-->
          <div class="col-lg-3">
            <div class="card text-left  mb-0" ;" style="background-color:#ffc107;height: 200px;">
              <div class="card-body">
                <h2 class="fw-bold fw-normal mb-4card-title">Feedback Report</h2>
                <p class="">Here is the semester wise report of the Student and Faculty.</p>
                <a href="./feedback_graph_student.php" class="btn btn-primary">Check</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Header Section-->
  </div>
  <!-- JavaScript files-->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/just-validate/js/just-validate.min.js"></script>
  <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
  <script src="vendor/overlayscrollbars/js/OverlayScrollbars.min.js"></script>
  <script src="js/charts-home.js"></script>
  <!-- Main File-->
  <script src="js/front.js"></script>
  <script>
    // ------------------------------------------------------- //
    //   Inject SVG Sprite - 
    // ------------------------------------------------------ //
    function injectSvgSprite(path) {

      var ajax = new XMLHttpRequest();
      ajax.open("GET", path, true);
      ajax.send();
      ajax.onload = function (e) {
        var div = document.createElement("div");
        div.className = 'd-none';
        div.innerHTML = ajax.responseText;
        document.body.insertBefore(div, document.body.childNodes[0]);
      }
    }
    // this is set to BootstrapTemple website as you cannot 
    // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
    // while using file:// protocol
    // pls don't forget to change to your domain :)
    injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');


  </script>
  <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>

</html>
<?php
}
else{
  header("Location: ./login.php");
}
?>