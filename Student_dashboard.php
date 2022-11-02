<?php
  session_start();
  include './db_connection.php';
  $insert = false;
  $student_id=$_SESSION['student_id'];
  if($student_id){
  if(true){

  $con=OpenCon();

  if(!$con){
      die("not connect to database" . mysqli_connect_error());
  }
  $arr=array();
  $status=0;
  // $feedback_type=2;
  // $role='Faculty';
  // $college_id=$_SESSION['college_id'];
  // $faculty_id=$_SESSION['faculty_id'];
  $course_id=$_SESSION['course_id'];
  $semester=$_SESSION['semester'];
  $batch=$_SESSION['batch'];
  // $student_id=$_SESSION['student_id'];
  $sub=array();
  $faculty=array();
  $feedback_id=array();
  // $r=array();
  $sql=mysqli_query($con,"SELECT technvxg_pratikriya_vishleshan.student_feed_a.feedback_id,technvxg_pratikriya_vishleshan.student_a.feedback_id as fb_id,technvxg_pratikriya_vishleshan.student_feed_a.subject_id,technvxg_pratikriya_vishleshan.student_feed_a.faculty_name FROM technvxg_pratikriya_vishleshan.student_feed_a 
  left join technvxg_pratikriya_vishleshan.student_a
  on technvxg_pratikriya_vishleshan.student_feed_a.feedback_id= technvxg_pratikriya_vishleshan.student_a.feedback_id
  and technvxg_pratikriya_vishleshan.student_a.student_id='Dharmik123' and technvxg_pratikriya_vishleshan.student_feed_a.college_id='C-25195' and technvxg_pratikriya_vishleshan.student_feed_a.stat_us=1 and curdate()<=technvxg_pratikriya_vishleshan.student_feed_a.closing_date");

  // $sql1=mysqli_query($con,"SELECT feedback_id FROM technvxg_pratikriya_vishleshan.student_feed_a where college_id='$college_id' ");
  while($result=mysqli_fetch_assoc($sql))
  {
        if($result['fb_id']==null){
          $sub_id = $result['subject_id'];
          $sql1=mysqli_query($con,"SELECT sub_name from technvxg_pratikriya_vishleshan.subject where subject_id='$sub_id';");
          $result1=mysqli_fetch_array($sql1);
          array_push($sub,$result1[0]);
          array_push($feedback_id,$result['feedback_id']);
          array_push($faculty,$result['faculty_name']);
        }
    
  }

  $sql3=mysqli_query($con,"SELECT * from technvxg_pratikriya_vishleshan.college where AISHE_id='$college_id' ");
  // $row3=mysqli_num_rows($sql3);
  while($rows3=mysqli_fetch_array($sql3)){
    $college_name=$rows3['clg_name'];
  }

  }
  $ct=count($feedback_id);
  $check=0;
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Student Dashboard</title>
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
  <link rel="shortcut icon" href="img/favicon.ico">
  <!-- Tweaks for older IEs-->
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      
        <!-- css for popup window in the form submitting by monty on dynamic work  -->
        <style>
          body {
            font-family: Arial, Helvetica, sans-serif;
          }
          * {
            box-sizing: border-box;
          }
    
          input[type="text"],
          input[type="email"],
          input[type="tel"],
          select,
          textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
          }
    
          label {
            padding: 12px 12px 12px 0;
            display: inline-block;
          }
    
          input[type="submit"] {
            background-color: rgb(245, 167, 10);
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
          }
    
          input[type="submit"]:hover {
            background-color: rgb(246, 175, 35);
          }
          .submit_button {
            margin-top: 10px;
          }
          .container_1 {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
          }
    
          .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
          }
          .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px;
          }
    
          /* Clear floats after the columns */
          .row:after {
            content: "";
            display: table;
            clear: both;
          }
    
          /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
          @media only screen and (max-width: 600px) {
            .col-25,
            .col-75,
            input[type="submit"] {
              width: 100%;
              margin-top: 0;
            }
          }
    
          /* The Modal (background) */
          .modal_1 {
            margin-left: 7%;
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            /* background-color: rgb(0, 0, 0); /* Fallback color 
            background-color: rgba(0, 0, 0, 0.4); Black w/ opacity */
          }
    
          /* Modal Content */
          .modal_1-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
          }
    
          /* The Close Button */
          .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
          }
    
          .close:hover,
          .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
          }
          @media only screen and (max-width :600px) {
            .modal_1{
              margin:0px ;
            }
            .modal_1-content{
              width: 100%;
              margin: auto;
              padding: 0px;
            }
          }
        </style>
        <style>
          /* Styling the Body element i.e. Color,
      Font, Alignment */
          body {
              background-color: #e9ecef;
              font-family: Verdana;
              text-align: center;
          }
  
          h1,
          h2,
          h3 {
              font-family: "Inter", sans-serif;
          }
  
          /* Styling the Form (Color, Padding, Shadow) */
          .form_questions {
              /* background-color:#f8f9fa; */
              max-width: 800px;
              margin: 30px auto;
              margin-bottom: 1px;
              /* padding: 30px 25px; */
              /* box-shadow: 2px 5px 10px rgba(0, 0, 0, 0.5); */
          }
  
          /* Styling form-control Class */
          .form-control1 {
              text-align: left;
              margin-bottom: 25px;
              background-color: #f8f9fa;
              padding: 30px 25px;
              border-radius: 8px;
              box-shadow: 3px 3px 32px -17px rgba(0, 0, 0, 0.5);
          }
  
          /* Styling form-control Label */
          .radio_ label {
              display: block;
              margin-bottom: 10px;
          }
  
          /* Styling form-control input,
      select, textarea */
          .form-control1 input,
          .form-control1 select,
          .form-control1 textarea {
              border-radius: 2px;
              font-family: inherit;
              display: block;
          }
  
          /* Styling form-control Radio
      button and Checkbox */
          .form-control1 input[type="radio"],
          .form-control1 input[type="checkbox"] {
              display: inline-block;
              width: auto;
          }
  
          .radio_ {
              padding: 15px;
          }
  
          .question {
              display: block;
              margin-bottom: 15px;
          }
  
          .submit_button {
              margin-top: 10px;
              background-color: #52be73;
              border: none;
              color: white;
              font-family: inherit;
              font-size: 20px;
              padding: 15px 25px;
              border-radius: 5px;
              box-shadow: 0px 0px 9px 0px rgba(0, 0, 0, 0.75);
              cursor: pointer;
          }
  
          .last_question {
              margin-bottom: 5px;
          }
  
          .expression {
              margin-bottom: 10px;
              color: #f8d210;
              text-shadow: 0px 0px 5px rgb(250, 222, 82, 0.81);
          }
  
          .slider {
              -webkit-appearance: none;
              width: 100%;
              height: 16px;
              background: #d3d3d3;
              outline: none;
              opacity: 0.7;
              -webkit-transition: 0.2s;
              transition: opacity 0.2s;
          }
  
          .slider:hover {
              opacity: 1;
          }
  
          .slider::-webkit-slider-thumb {
              -webkit-appearance: none;
              appearance: none;
              width: 25px;
              height: 25px;
              background: #52be73;
              cursor: pointer;
          }
  
          .slider::-moz-range-thumb {
              width: 25px;
              height: 25px;
              background: #52be73;
              cursor: pointer;
          }
      </style>
</head>

<body>
  <!-- Side Navbar -->
  <nav class="side-navbar">
    <!-- Sidebar Header    -->
    <div class="sidebar-header d-flex align-items-center justify-content-center p-3 mb-3">
      <!-- User Info-->
      <div class="sidenav-header-inner text-center"><img class="img-fluid rounded-circle avatar mb-3"
          src="./download-removebg-preview.png" alt="person">
        <h2 class="h5 text-white text-uppercase mb-0">Techno India NJR Institute Of Technology</h2><br>
        <p class="text-sm mb-0 text-muted"><?php echo $_SESSION['student_name'] ?></p>
      </div>
      <!-- Small Brand information, appears on minimized sidebar--><a class="brand-small text-center"
        href="Student_dashboard.html">
        <p class="h1 m-0">PV</p>
      </a>
    </div>
    <!-- Sidebar Navigation Menus--><span
      class="text-uppercase text-gray-500 text-sm fw-bold letter-spacing-0 mx-lg-2 heading">Main</span>
    <ul class="list-unstyled">
      <li class="sidebar-item"><a class="sidebar-link" href="Student_dashboard.php">
          <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
            <use xlink:href="#real-estate-1"> </use>
          </svg>Home </a></li>
      <li class="sidebar-item"><a class="sidebar-link" href="Profile">
          <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
            <use xlink:href="#user-1"> </use>
          </svg>Profile </a>
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
              <li class="nav-item"><a class="nav-link text-white text-sm ps-0" href="login.php" onclick="<?php unset($student_id);session_unset();?>"> <span
                    class="d-none d-sm-inline-block">Logout</span>
                  <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                    <use xlink:href="#security-1"> </use>
                  </svg></a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- Counts Section -->
    <div class="mb-3 list-inline text-center">
      <h1 class="display-7 mt-3">STUDENT FEEDBACK ON FACULTY PERFORMANCE DURING THE CLASSROOM</h1>
    </div>
    <section class="py-5">
      <div class="container-fluid">
        <div class="row justify-content-left">
          <div id="feedback_details"></div>
        </div>
      </div>
    </section>
    <div class="mb-3 list-inline text-center">
      <h1 class="display-7 mt-3">STUDENT FEEDBACK ON CURRICULUM</h1>
    </div>
    <section class="py-5">
      <div class="container-fluid">
        <div class="row justify-content-left">
          <div class="partB">
        <div class="student_feedback_columnB  feedback_subject_detailsB" >
              <h2 class="h2 fw-bold">Institute Feedback Form</h2>
              <button type="button" id="part_b" class="btn btn-primary">Start</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Header Section-->
  </div>
  <!-- feedback form Popup on Submission    -->
  <section class="py-5">
    <div class="container-fluid">
      <div class="row justify-content-left">
  <div id="Part_A_Modal" class="modal_1">
    <!-- Modal content -->
    <div class="modal_1-content">
      <span onclick="document.getElementById('Part_A_Modal').style.display='none'"
        class="close"
        >&times;</span>
      <div class="container_1">
         <form id="form" action="" method="post">
      <div class="form_questions">
          <div class="form-control1">
              <label class="question">
                  1. Is teacher always punctual in coming to your class?
              </label>
              <div class="radio_">
                  <div class="expression" id="feedbackQuestion1">Average</div>
                  <label for="question_1"><input class="slider" type="range" id="question_1" name="question_1" min="1"
                          max="5" onchange="feedbackValue(1,this.value)" /></label>
              </div>
          </div>
          <div class="form-control1">
              <label class="question">
                  2. Does the teacher come well prepared for lecture in your class?
              </label>
              <div class="radio_">
                  <div class="expression" id="feedbackQuestion2">Average</div>
                  <label for="question_2"><input class="slider" type="range" id="question_2" name="question_2" min="1"
                          max="5" onchange="feedbackValue(2,this.value)" /></label>
              </div>
          </div>
          <div class="form-control1">
              <label class="question">
                  3. Does the teacher make efforts in teaching and explanation?
              </label>
              <div class="radio_">
                  <div class="expression" id="feedbackQuestion3">Average</div>
                  <label for="question_3"><input class="slider" type="range" id="question_3" name="question_3" min="1"
                          max="5" onchange="feedbackValue(3,this.value)" /></label>
              </div>
          </div>
          <div class="form-control1">
              <label class="question">
                  4. Do you understand what the teacher is teaching?
              </label>
              <div class="radio_">
                  <div class="expression" id="feedbackQuestion4">Average</div>
                  <label for="question_4"><input class="slider" type="range" id="question_4" name="question_4" min="1"
                          max="5" onchange="feedbackValue(4,this.value)" /></label>
              </div>
          </div>
          <div class="form-control1">
              <label class="question">
                  5. Do you feel comfortable asking question to teacher?
              </label>
              <div class="radio_">
                  <div class="expression" id="feedbackQuestion5">Average</div>
                  <label for="question_5"><input class="slider" type="range" id="question_5" name="question_5" min="1"
                          max="5" onchange="feedbackValue(5,this.value)" /></label>
              </div>
          </div>
          <div class="form-control1">
              <label class="question">
                  6. Are the equipment in the lab enough in and working conditions
              </label>
              <div class="radio_">
                  <div class="expression" id="feedbackQuestion6">Average</div>
                  <label for="question_6"><input class="slider" type="range" id="question_6" name="question_6" min="1"
                          max="5" onchange="feedbackValue(6,this.value)" /></label>
              </div>
          </div>
          <div class="form-control1">
              <label class="question">
                  7. Is the Lab in charge explaining the experiment properly
              </label>
              <div class="radio_">
                  <div class="expression" id="feedbackQuestion7">Average</div>
                  <label for="question_7"><input class="slider" type="range" id="question_7" name="question_7" min="1"
                          max="5" onchange="feedbackValue(7,this.value)" /></label>
              </div>
          </div>
          <div class="form-control1 last_question">
              <label class="question">
                  8.For the teacher's subject how much marks do you expect out of 100.
              </label>
              <div class="radio_">
                  <div class="expression" id="feedbackQuestion8">50</div>
                  <label for="question_8"><input class="slider" type="range" id="question_8" name="question_8" min="1"
                          max="100" onchange="feedbackValueOutOf100(8,this.value)" /></label>
              </div>
          </div>
      </div>
      <!-- <button class="submit_button" type="submit" value="submit" name="submit">Submit</button> -->
      <input class="submit_button" type="submit" value="Submit" name="submit">
  </form>
  <?php
  // while($check<$ct){
    $insert = false;
    if(isset($_POST['submit'])){
        // $fb_id=$feedback_id[$check];
        $fb_id=1;
        // $student_id="Dhar";
        $student_id=$_SESSION['student_id'];
        $Q1=$_POST['question_1'];
        $Q2=$_POST['question_2'];
        $Q3=$_POST['question_3'];
        $Q4=$_POST['question_4'];
        $Q5=$_POST['question_5'];
        $Q6=$_POST['question_6'];
        $Q7=$_POST['question_7'];
        $Q8=$_POST['question_8'];
        $filling_date=date("Y-m-d");
        $data="INSERT INTO technvxg_pratikriya_vishleshan.student_a VALUES ($fb_id,'$student_id',$Q1,$Q2,$Q3,$Q4,$Q5,$Q6,$Q7,$Q8,'$filling_date');";
        $con->query($data);
        header("Location: ./Student_dashboard.php");
    
    }
    // $check++;
  // }
  ?>
      </div>
    </div>
  </div>

  </div>
  </div>
  </section>


  <!-- feedback of Institution by students  -->
  <section class="py-5">
    <div class="container-fluid">
      <div class="row justify-content-left">
        <div id="Part_B_Modal" class="modal_1">
          <!-- Modal content -->
          <div class="modal_1-content">
            <span onclick="document.getElementById('Part_B_Modal').style.display='none'"
              class="close"
              >&times;</span>
            <div class="container_1">
        <form id="form" action="" method="post">
          <div class = "form_questions">
            <div class="form-control"> 
            <label class="question">
              1. Activities leading to Placement/Entrepreneurship/Lifelong learning/Field Projects and Internship
            </label>
            <div class = "radio_">
              <div class = "expression" id = "feedbackQuestion1">Average</div>
              <label for="question_1"><input class="slider"type="range" id="question_1" name="question_1" min = "1" max  ="5"
              onchange = "feedbackValue(1,this.value)"></label>
            </div>
          </div>
          <div class="form-control">
            <label class="question">
              2. Motivation and exposure to Co-Curricular/Extra-Curricular Activities in the Institute
            </label>
            <div class = "radio_">
              <div class = "expression" id = "feedbackQuestion2">Average</div>
              <label for="question_2"><input class="slider"type="range" id="question_2" name="question_2" min = "1" max  ="5"
                onchange = "feedbackValue(2,this.value)"></label>
            </div>
          </div>
          <div class="form-control">
            <label class="question">
              3. Assessment of examination at Institute Level
            </label>
            <div class="radio_">
              <div class = "expression" id = "feedbackQuestion3">Average</div>
              <label for="question_3"><input class="slider"type="range" id="question_3" name="question_3"min = "1" max  ="5"
                onchange = "feedbackValue(3,this.value)"></input></label>
            </div>
          </div>
          <div class="form-control">
            <label class="question">
              4. Does the faculty use ICT tools for teaching?
            </label>
            <div class="radio_">
            <div class = "expression" id = "feedbackQuestion4">Average</div>
              <label for="question_4"><input class="slider"type="range" id="question_4" name="question_4" min = "1" max  ="5"
                onchange = "feedbackValue(4,this.value)"></label>
            </div>
          </div>
          <div class="form-control last_question">
            <label class="question">
              5. Is the faculty successful in improving your understanding of concepts and principles in the subject?
            </label>
            <div class="radio_">
            <div class = "expression" id = "feedbackQuestion5">Average</div>
            <label for="question_5"><input class="slider"type="range" id="question_5" name="question_5" min = "1" max  ="5"
              onchange = "feedbackValue(5,this.value)"></label>
            </div>
          </div>
          </div>
          <button class="submit_button" type="submit" value="submit">
            Submit
          </button>
        </form>
        </div>
        </div>
        </div>
        </div>
        </div>
        </section>


























  <!-- JavaScript files-->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/just-validate/js/just-validate.min.js"></script>
  <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
  <script src="vendor/overlayscrollbars/js/OverlayScrollbars.min.js"></script>
  <!-- Main File-->
  <script src="js/front.js"></script>
  <script>
    // ------------------------------------------------------- //
    //   Inject SVG Sprite - 
    // ------------------------------------------------------ //
    function injectSvgSprite(path) {

      var ajax = new XMLHttpRequest();
      ajax.open("POST", path, true);
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

    let subjects = <?php echo json_encode($sub);?>;
    let subjectTeacher = <?php echo json_encode($faculty);?>;
    let feedbackDetailsCard = document.getElementById("feedback_details");
    if (subjects.length === 0) {
      feedbackDetailsCard.textContent = "Currently No feedback Avalible";
    } else {
      let feedbackHtml = "";
      feedbackHtml += `<div class="student_feedback_row">`;
      for (
        let subjectName = 0;
        subjectName < subjects.length;
        subjectName++
      ) {
        feedbackHtml += `<div  class="student_feedback_column" onclick="openFeedback('${subjects[subjectName]}_div_block')">
                <div id ="${subjects[subjectName]}_div_block" class="feedback_subject_details">
                <div class="feedback_subject_name">${subjects[subjectName]}</div>
                <div class="feedback_teacher_name">${subjectTeacher[subjectName]}</div>
                </div>
                </div>`;
      }
      feedbackHtml += `</div>`;
      feedbackDetailsCard.innerHTML = feedbackHtml;
    }
    function openFeedback(divID) {
      // window.location.href = "./Student_Form/PART(A).html"
         // Get the modal
         var feedback_subject_modal = document.getElementById("Part_A_Modal");
      // Get the button that opens the modal
      var addFacultyBtn = document.getElementById(divID);
      // var addStudentBtn = document.getElementById("add_student");
      // Get the <span> element that closes the modal
      // When the user clicks the button, open the modal
      addFacultyBtn.onclick = function () {
        feedback_subject_modal.style.display = "block";
      };
      addStudentBtn.onclick = function () {
        studentModal.style.display = "block";
      };
      // When the user clicks on <span> (x), close the modal

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function (event) {
        if (event.target == feedback_subject_modal) {
          feedback_subject_modal.style.display = "none";
        }
        
      };
    }

    
    
    

    let booleanValue = true;
    var x = document.getElementById("partB");
    if (!booleanValue) {
      x.style.display = "none";
      booleanValue = false;
    } else {
      x.style.display = "block";
      booleanValue = true;
    }

    function showform() {

    }
  </script>

  <!-- pop up script of part b form  for institutions  -->
  <script>

    
              // Get the modal
              var feedback_institute_Modal = document.getElementById("Part_B_Modal");
      // Get the button that opens the modal
      var addFacultyBtn = document.getElementById("part_b"); 

      // Get the <span> element that closes the modal
      // When the user clicks the button, open the modal
      addFacultyBtn.onclick = function () {
        feedback_institute_Modal.style.display = "block";
      };
      // When the user clicks on <span> (x), close the modal

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function (event) {
        if (event.target == feedback_institute_Modal) {
          feedback_institute_Modal.style.display = "none";
        }
        
      };
  </script>
  <!-- pop up js -->
  
  <script>
    let colorChoice = ["#e0301e", "#eb8c00", "#F8D210", "#5cf088", "#16e955"];
    let shodowChoice = [
        " 0px 0px 5px rgb(231, 91, 75,0.81)",
        "0px 0px 5px rgb(255, 173, 51,0.81)",
        "0px 0px 5px rgb(250, 222, 82,0.81)",
        " 0px 0px 5px rgb(162, 246, 187,0.81)", 
        "0px 0px 5px rgb(92, 240, 136,0.81)",
    ];
    let textChoice = ["Poor", "Below Average", "Average", "Good", "Excellent"];
    function feedbackValue(typeId, questionId) {
        document.getElementById(`feedbackQuestion${typeId}`).innerHTML =
            textChoice[questionId - 1];
        document.getElementById(`feedbackQuestion${typeId}`).style.color =
            colorChoice[questionId - 1];
        document.getElementById(`feedbackQuestion${typeId}`).style.textShadow =
            shodowChoice[questionId - 1];
    }
    function feedbackValueOutOf100(typeId, value) {
        let modValue = value / 100;
        if (modValue >= 0.01 && modValue <= 0.2) modValue = 1;
        else if (modValue >= 0.21 && modValue <= 0.4) modValue = 2;
        else if (modValue >= 0.41 && modValue <= 0.6) modValue = 3;
        else if (modValue >= 0.61 && modValue <= 0.8) modValue = 4;
        else modValue = 5;
        document.getElementById(`feedbackQuestion${typeId}`).innerHTML = value;
        document.getElementById(`feedbackQuestion${typeId}`).style.color =
            colorChoice[modValue - 1];
        document.getElementById(`feedbackQuestion${typeId}`).style.textShadow =
            shodowChoice[modValue - 1];
    }

    // on submit the form feedback popup we call this function 
    function redirect() {
        window.close;     
        window.opener.location.replace("E:\SIH Special\Last SIH\SIH_last1\SIH_last2\Student_dashboard.html");
    }

    n = new Date();
    y = n.getFullYear();
    m = n.getMonth() + 1;
    d = n.getDate();
    document.getElementById("date").innerHTML = m + "/" + d + "/" + y;
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