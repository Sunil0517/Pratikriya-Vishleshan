<?php

        include './db_connection.php';
        session_start();
        $insert = false;
        
        if(isset($_GET['submit'])){
            $con=OpenCon();

            if(!$con){
            die("not connect to database" . mysqli_connect_error());
            }
            
            $college_id=$_SESSION['college_id'];
            $fname=$_GET['firstname'];
            $lname=$_GET['lastname'];
            $fullname=$fname." ".$lname;
            $student_id=$fname."123";
            $dob=$_GET['dob'];
            $email=$_GET['email'];
            $mobile=$_GET['mobile'];
            $course_type=$_GET['course_type'];
            $depart=$_GET['dept_name'];
            $batch=$_GET['batch'];
            $semester=$_GET['sem'];
            $section=$_GET['section'];
            $parent_name=$_GET['fathername'];
            $parent_email=$_GET['fatheremail'];
            $status="Active";
            $role="Student";

            $sql= "SELECT * FROM technvxg_pratikriya_vishleshan.course WHERE course_type='$course_type' AND specialisation='$depart';";
                $result = mysqli_query($con,$sql);
                $row=mysqli_num_rows($result);
                if($row>0){
                    while($rows=mysqli_fetch_array($result)){
                        $course_id=$rows['course_id'];
                    }
                }
            
            $data="INSERT INTO technvxg_pratikriya_vishleshan.student VALUES ('$student_id','$fullname','$college_id','$dob','$email','$course_id','$semester','$batch','$parent_email','$status','$section','$parent_name');";
            $data1="INSERT INTO technvxg_pratikriya_vishleshan.login_cred VALUES ('$role','$college_id','$email','$mobile');";
            $con->query($data);
            $con->query($data1);
            $con->close();
    }

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
          src="img/All_India_Council_for_Technical_Education_logo-removebg-preview.png" alt="person">
        <h2 class="h5 text-white text-uppercase mb-0"></h2>
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
        </li>
        <li class="sidebar-item"><a class="sidebar-link" href="Send_parent_feedback.html">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#real-estate-1"> </use>
            </svg>Parent </a></li>
        <li class="sidebar-item"><a class="sidebar-link" href="#Alumini" data-bs-toggle="collapse">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#browser-window-1"> </use>
            </svg>Alumini </a>
          <ul class="collapse list-unstyled " id="Alumini">
            <li><a class="sidebar-link" href="add_alumini.php">Add/Edit</a></li>
            <li><a class="sidebar-link" href="Send_Alumini_feedback.html">Send Feedback</a></li>
  
          </ul>
        </li>
        <li class="sidebar-item"><a class="sidebar-link" href="#Employer" data-bs-toggle="collapse">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#browser-window-1"> </use>
            </svg>Employer </a>
          <ul class="collapse list-unstyled " id="Employer">
            <li><a class=" sidebar-link" href="add_employer.php">Add/Edit</a></li>
            <li><a class="sidebar-link" href="send_employer_feedback.html">Send Feedback</a></li>
          </ul>
        </li>
        <li class="sidebar-item"><a class="sidebar-link" href="Profile">
            <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
              <use xlink:href="#user-1"> </use>
            </svg>Profiel </a>
        </li>
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
                </svg></a><a class="navbar-brand ms-2" href="index.html">
                <div class="brand-text d-none d-md-inline-block text-uppercase letter-spacing-0"><span
                    class="text-white fw-normal text-xs">Pratikriya </span><strong
                    class="text-primary text-sm">Vishleshan</strong></div>
              </a></div>
            <ul class="nav-menu mb-0 list-unstyled d-flex flex-md-row align-items-md-center">

              <!-- Log out-->
              <li class="nav-item"><a class="nav-link text-white text-sm ps-0" href="login.php"> <span
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
   <section class="py-5">
    <div class="container-fluid">


      <div class="row">
        <form class="row g-0 needs-validation" novalidate>
          <div>
            <p>***To enter the list of all Student in respective format(Firstname, Lastname, email, Mobile
              number,Program name, Department,Birth-date)***</p>
          </div>
          <div class="mb-3">
            <label for="formFileDisabled" class="form-label">Disabled file input example</label>
            <input class="form-control" type="file" id="formFileDisabled" required>
          </div>
          <div class="mb-3">
            <input class="button btn btn-primary" type="submit" value="Submit" />
          </div>
        </form>
      </div>
      <div class="row">
        <form class="row g-0 needs-validation" method="get" novalidate>
          <p>***To enter Single Student***</p>
          <div class="mb-3">
            <label for="fname" class="form-label">First Name</label>
            <input type="Text" class="form-control" name="firstname" required>
          </div>
          <div class="mb-3">
            <label for="lname" class="form-label">Last Name</label>
            <input type="Text" class="form-control" name="lastname">
          </div>
          <div class="mb-3">
            <label for="birthdate" class="form-label">Birth-date</label>
            <input type="date" class="form-control" id="birthdate" name="dob" required>
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="Email" class="form-control" name="email" required>
          </div>

          <div class="mb-3">
            <label for="phone" class="form-label">Phone no.(+91)</label>
            <input type="tel" class="form-control" name="mobile" pattern="[0-9]{10}" required>
          </div>

          <div class="mb-3">
                <label for="programName" class="form-label">Program Name</label>
                <select id="programName" class="form-select" value="" name="course_type" onchange="makeDeptSubMenu(this.value)">
                    <option value=""  disabled  selected   style="background-color: #aaa; color: #fff">Select Program Name</option>
                    <option value="BachelorOfTechnology">Bachelor Of Technology</option>
                    <option value="MasterOfTechnology">Master Of Technology</option>
                </select>   
              </div>
              <div class="mb-3">
                    <label for="dept_name" class="form-label">Department</label>
                    <select id="dept_name" class="form-select" name="dept_name">
                        <option value="" disabled selected>Department</option>
                    </select>
              </div>
          <div class="mb-3">
            <label for="batch" class="form-label">Batch [YYYY-YYYY]</label>
            <input type="text" class="form-control" name="batch" placeholder="YYYY-YYYY">
          </div>
          <div class="mb-3">
            <label for="Semester" class="form-label">Semester</label>
            <!-- <select id="Batch_id" class="form-select" name="batch_name" required>
                  <option value="BachelorOfTechnology">Select Semester</option> -->
            <select id="Batch_id" class="form-select" value="" name="sem" required>
              <option value="" disabled selected style="background-color: #aaa; color: #fff">Select Semester</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="Section" class="form-label">Section [X]</label>
            <input type="text" class="form-control" name="section" placeholder="X">
          </div>

          <div class="mb-3">
            <label for="fathername" class="form-label">Father/Guardian Name</label>
            <input type="Text" class="form-control" name="fathername">
          </div>
          <div class="mb-3">
            <label for="Guardianemail" class="form-label">Guardian Email</label>
            <input type="Email" class="form-control" name="fatheremail" required>
          </div>


          <input class="button btn btn-primary" type="submit" value="Sumbit" name="submit" />
        </form>
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

    //programs and departments
    var course_type = {
        BachelorOfTechnology:
          ["Aeronautical Engineering", "Agricultural Engineering", "Automobile Engineering", "Biotechnology Engineering", "Chemical Engineering", "Civil Engineering", "Computer Science and Engineering", "Electrical and Electronics Engineering", "Mechanical Engineering", "Electronics & Communication"],
        MasterOfTechnology: ["Aerospace Engineering", "Agricultural Engineering", "Aeronautical Engineering", "Artificial Intelligence and Machine Leraning", "Automobile/Automotive Engineering", "Biotechnology Engineering", "Computer Science and Engineering", "Chemical Engineering", "Civil Engineering", "Electrical Engineering", "Electrical and Electronics Engineering", "Mechanical Engineering", "Information Technology"],
      };
      function makeDeptSubMenu(value) {
        if (value.length == 0)
          document.getElementById(
            "dept_name"
          ).innerHTML = `<option value="" disabled selected>Plese Choose Department </option>`;
        else {
          var deptOptions = "";
          for (deptId in course_type[value]) {
            deptOptions +=
              "<option>" + course_type[value][deptId] + "</option>";
          }
          document.getElementById("dept_name").innerHTML = deptOptions;
        }
      }


  </script>
  <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>

</html>
