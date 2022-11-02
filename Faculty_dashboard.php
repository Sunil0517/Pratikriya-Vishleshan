<?php
                    session_start();
                    include './db_connection.php';
                    $insert = false;
                    $faculty_id=$_SESSION['faculty_id'];
                    if(true){
                        
                        $con=OpenCon();

                        if(!$con){
                            die("not connect to database" . mysqli_connect_error());
                        }
                        $status=0;
                        $status1=0;
                        $feedback_type=2;
                        $role='Faculty';
                        // $college_id=$_SESSION['college_id'];
                        $course_id=$_SESSION['course_id'];
                        $sql= "SELECT * FROM faculty_feedinfo WHERE course_id='$course_id';";
                        $result = mysqli_query($con,$sql);
                        $row=mysqli_num_rows($result);
                        if($row>0){
                            while($rows=mysqli_fetch_array($result)){
                                $feedback_id=$rows['feedback_id'];
                                $status=$rows['stat_us'];
                            }
                        }



                        $sql2= "SELECT * FROM faculty_feedback WHERE faculty_id='$faculty_id' AND feedback_id='$feedback_id';";
                        $result2 = mysqli_query($con,$sql2);
                        $row2=mysqli_num_rows($result2);
                        if(!$row2 and $status){
                            $status1 = 1;
                        }
                        

                        $insert = false;
                        if(isset($_POST['submit'])){
                            $Q1=$_POST['question_1'];
                            $Q2=$_POST['question_2'];
                            $Q3=$_POST['question_3'];
                            $Q4=$_POST['question_4'];
                            $Q5=$_POST['question_5'];
                            $filling_date=date("Y-m-d");
                            $data="INSERT INTO faculty_feedback VALUES ('$filling_date','$faculty_id','$Q1','$Q2','$Q3','$Q4','$Q5','$feedback_id');";
                            $con->query($data);
                            header("Location: ./Faculty_dashboard.php");
                        
                        }
                        // echo $status;
                        // echo $course_id;
                        // $data = "INSERT INTO `faculty`(`faculty_name`, `faculty_id`, `college_id`, `DOB`, `email`, `course_id`, `role`) VALUES ('$fname','$faculty_id','$college_id','$dob','$email','$course_id','$role');";
                        // $data1 = "INSERT INTO `login_cred`(`role`, `college_id`, `username`, `password`) VALUES ('$role','$college_id','$email','$password');";
                        // $result = mysqli_query($con,$data);
                        // $con->query($data);
                        // $con->query($data1);
                        $con->close();

                        
                    }
                
?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Faculty Dashboard</title>
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
</head>

<body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
        <!-- Sidebar Header    -->
        <div class="sidebar-header d-flex align-items-center justify-content-center p-3 mb-3">
            <!-- User Info-->
            <div class="sidenav-header-inner text-center"><img class="img-fluid rounded-circle avatar mb-3"
                    src="./download-removebg-preview.png" alt="person">
                <h2 class="h5 text-white text-uppercase mb-0"><?php echo $_SESSION['faculty_name'] ?></h2>
                <p class="text-sm mb-0 text-muted">Faculty</p>
            </div>
            <!-- Small Brand information, appears on minimized sidebar--><a class="brand-small text-center"
                href="index.html">
                <p class="h1 m-0">PV</p>
            </a>
        </div>
        <!-- Sidebar Navigation Menus--><span
            class="text-uppercase text-gray-500 text-sm fw-bold letter-spacing-0 mx-lg-2 heading">Main</span>
        <ul class="list-unstyled">
            <li class="sidebar-item"><a class="sidebar-link" href="Faculty_dashboard.php">
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                        <use xlink:href="#real-estate-1"> </use>
                    </svg>Home </a></li>
            <li class="sidebar-item"><a class="sidebar-link" href="Profile">
                    <svg class="svg-icon svg-icon-sm svg-icon-heavy me-xl-2">
                        <use xlink:href="#user-1"> </use>
                    </svg>Profile </a></li>

    </nav>
    <div class="page">
        <!-- navbar-->
        <header class="header">
            <nav class="navbar">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between w-100">
                        <div class="d-flex align-items-center"><a
                                class="menu-btn d-flex align-items-center justify-content-center p-2 bg-gray-900"
                                id="toggle-btn" href="#">
                                <svg class="svg-icon svg-icon-sm svg-icon-heavy text-white">
                                    <use xlink:href="#menu-1"> </use>
                                </svg></a><a class="navbar-brand ms-2" href="Faculty_dashboard.php">
                                <div class="brand-text d-none d-md-inline-block text-uppercase letter-spacing-0"><span
                                        class="text-white fw-normal text-xs">Pratikriya </span><strong
                                        class="text-primary text-sm">Vishleshan</strong></div>
                            </a></div>
                        <ul class="nav-menu mb-0 list-unstyled d-flex flex-md-row align-items-md-center">

                            <!-- Log out-->
                            <li class="nav-item"><a class="nav-link text-white text-sm ps-0" href="login.php" onclick=""> <span
                                        class="d-none d-sm-inline-block">Logout</span>
                                    <svg class="svg-icon svg-icon-xs svg-icon-heavy">
                                        <use xlink:href="#security-1"> </use>
                                    </svg></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <div id="Facultyflex" class="card-body ">
            <form id="form" action="" method="post">
                <div class="form_questions">
                    <div class="form-control">
                        <label class="question">
                            1. The books/journals etc. prescribed/listed as reference materials
                            are relevant, updated and cover the entire syllabus.
                        </label>
                        <div class="radio_">
                            <div class="expression" id="feedbackQuestion1">Average</div>
                            <label for="question_1"><input class="slider" type="range" id="question_1" name="question_1"
                                    min="1" max="5" onchange="feedbackValueBar(1,this.value)" /></label>
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="question">
                            2.The courses/syllabus of the subjects taught by me increased my
                            interest, knowledge, and perspective in the subject area.
                        </label>
                        <div class="radio_">
                            <div class="expression" id="feedbackQuestion2">Average</div>
                            <label for="question_2"><input class="slider" type="range" id="question_2" name="question_2"
                                    min="1" max="5" onchange="feedbackValueBar(2,this.value)" /></label>
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="question">
                            3.The curriculum has given me full freedom to adopt new
                            techniques/strategies of teaching such as group discussions, seminar
                            presentations and learner's participation.
                        </label>
                        <div class="radio_">
                            <div class="expression" id="feedbackQuestion3">Average</div>
                            <label for="question_3"><input class="slider" type="range" id="question_3" name="question_3"
                                    min="1" max="5" onchange="feedbackValueBar(3,this.value)" /></label>
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="question">
                            4. I have the freedom to adopt new techniques/strategies of testing
                            assessment of students.
                        </label>
                        <div class="radio_">
                            <div class="expression" id="feedbackQuestion4">Average</div>
                            <label for="question_4"><input class="slider" type="range" id="question_4" name="question_4"
                                    min="1" max="5" onchange="feedbackValueBar(4,this.value)" /></label>
                        </div>
                    </div>
                    <div class="form-control last_question">
                        <label class="question">
                            5.ICT facilities in the college are adequate and satisfactory.
                        </label>
                        <div class="radio_">
                            <div class="expression" id="feedbackQuestion5">Average</div>
                            <label for="question_5"><input class="slider" type="range" id="question_5" name="question_5"
                                    min="1" max="5" onchange="feedbackValueBar(5,this.value)" /></label>
                        </div>
                    </div>
                    <!-- <div class="form-control last_question">
                        <label class="question">
                            6.Faculty Room is adequate and available in the Institute.
                        </label>
                        <div class="radio_">
                            <div class="expression" id="feedbackQuestion6">Average</div>
                            <label for="question_6"><input class="slider" type="range" id="question_6_answer_1"
                                    name="question_6" min="1" max="5" onchange="feedbackValueBar(6,this.value);" /></label>
                        </div>
                    </div> -->
                </div>
                <input type="submit" class="submit_button" value="Submit" name="submit">
            </form>
        </div>
        <div id = "NoFeedbackFormMessage"></div>
        <!-- Header Section-->
    </div>
    <!-- JavaScript files-->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/just-validate/js/just-validate.min.js"></script>
    <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
    <script src="vendor/overlayscrollbars/js/OverlayScrollbars.min.js"></script>
    <!-- <script src="js/charts-home.js"></script> -->
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
        
        var colorChoice = ["#e0301e", "#eb8c00", "#F8D210", "#5cf088", "#16e955"];
        var shodowChoice = [
            " 0px 0px 5px rgb(231, 91, 75,0.81)",
            "0px 0px 5px rgb(255, 173, 51,0.81)",
            "0px 0px 5px rgb(250, 222, 82,0.81)",
            " 0px 0px 5px rgb(162, 246, 187,0.81)",
            "0px 0px 5px rgb(92, 240, 136,0.81)",
        ];
        var textChoice = ["Poor", "Below Average", "Average", "Good", "Exellent"];
        function feedbackValueBar(typeId, questionId) {
            document.getElementById(`feedbackQuestion${typeId}`).innerHTML =
                textChoice[questionId - 1];
            document.getElementById(`feedbackQuestion${typeId}`).style.color =
                colorChoice[questionId - 1];
            document.getElementById(`feedbackQuestion${typeId}`).style.textShadow =
                shodowChoice[questionId - 1];
        }

        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');
    </script>
    <script>
        let booleanValue = <?php echo $status1; ?>;
    var x = document.getElementById("Facultyflex");
        if (!booleanValue) {
            x.style.display = "none";
            document.getElementById("NoFeedbackFormMessage").innerHTML = "No Feedback Avalible";
            booleanValue = false;
        } else {
            x.style.display = "block";
            document.getElementById("NoFeedbackFormMessage").innerHTML = "";
            booleanValue = true;
        } 
    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
</body>

</html>