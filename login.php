<?php
                    include './db_connection.php';
                    // session_start();
                    $insert = false;
                    
                    if(isset($_POST['submit'])){
                        session_start();
                        $con=OpenCon();
                        if(!$con){
                            die("not connect to database" . mysqli_connect_error());
                        }
                        $_SESSION['role']=$_POST['role'];
                        $_SESSION['username'] =$_POST['email'];
                        $_SESSION['password'] =$_POST['password'];
                        $role=$_SESSION['role'];
                        $username=$_SESSION['username'];
                        $password=$_SESSION['password'];
                        $sql= "SELECT * FROM login_cred WHERE role = '$role' AND username = '$username' AND password = '$password';";
                        $result = mysqli_query($con,$sql);
                        $dbrole=0;
                        $row=mysqli_num_rows($result);
                        if($row>0){
                            while($rows=mysqli_fetch_array($result)){
                                $dbrole=$rows['role'];
                            }
                        }
                        if($dbrole){
                        if($result and $dbrole=='HEI'){
                            header("Location: ./index.php");
                        }
                        else if($result and $dbrole=='Faculty'){
                            header("Location: ./Faculty_dashboard.php");
                            $sql1= "SELECT * FROM faculty WHERE email = '$username';";
                            $result1 = mysqli_query($con,$sql1);
                            $row1=mysqli_num_rows($result1);
                            if($row1>0){
                                while($rows1=mysqli_fetch_array($result1)){
                                    $_SESSION['course_id']=$rows1['course_id'];
                                    $_SESSION['faculty_id']=$rows1['faculty_id'];
                                    $_SESSION['faculty_name']=$rows1['faculty_name'];
                                }
                            }
                        }
                        else if($result and $dbrole=='Student'){
                          header("Location: ./Student_dashboard.php");
                          $sql2= "SELECT * FROM student WHERE email = '$username';";
                          $result2 = mysqli_query($con,$sql2);
                          $row2=mysqli_num_rows($result2);
                          if($row2>0){
                              while($rows2=mysqli_fetch_array($result2)){
                                  $_SESSION['course_id']=$rows2['course_id'];
                                  $_SESSION['student_id']=$rows2['student_id'];
                                  $_SESSION['student_name']=$rows2['student_name'];
                                  $_SESSION['batch']=$rows2['batch'];
                                  $_SESSION['semester']=$rows2['semester'];
                              }
                          }
                        }else{
                          header("Location: ./admin.html");
                        }
                        
                        // function SetSessionFaculty(){
                        //   $username1=$_POST['email'];
                        //   $college_id=$_SESSION['college_id'];
                        //   $sql1= "SELECT * FROM technvxg_pratikriya_vishleshan.faculty WHERE email = '$username' AND college_id = '$college_id';";
                        //     $result1 = mysqli_query($con,$sql1);
                        //     $row1=mysqli_num_rows($result1);
                        //     if($row1>0){
                        //         while($rows1=mysqli_fetch_array($result1)){
                        //             $_SESSION['course_id']=$rows1['course_id'];
                        //             $_SESSION['faculty_id']=$rows1['faculty_id'];
                        //             $_SESSION['faculty_name']=$rows1['faculty_name'];
                        //         }
                        //     }
                        // }
                        

                        $con->close();
                    }else{
                        echo "Please Check Your Credentials ";
                    }
                        
                    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Pratikriya Vishleshan | Login</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" type="image/x-icon" href="./img/All_India_Council_for_Technical_Education_logo-removebg-preview.png" />
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    .mainflex {
      display: flex;
      justify-content: space-around;
      height: 100vh;
      background: #52be73;
    }

    .mainflex-1 {
      padding-top: 5%;
      flex: 40%;
      display: flex;
      flex-direction: column;
      text-align: center;
      gap: 10px;
      font-size: 18px;
    }

    .mainflex-2 {
      padding-top: 13%;
      flex: 60%;
      height: 100%;
      background-color: #faf6e5;
      border-radius: 200px 0px 0px 1000px;
    }

    .heading {
      font-size: 3rem;
      color: azure;
    }

    .loginHeading {
      color: #0d4f8b;
    }

    .smallHeading {
      font-size: 1.75rem;
      color: azure;
      padding-top: 10px;
    }

    .formContainer {
      height: 100%;
      display: flex;
      flex-direction: column;

      align-items: center;
      gap: 10px;
    }

    .login-flex {
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 12px 20px;
      width: 30vw;
    }

    .button {
      font-size: 16px;
      margin-top: 10px;
      padding: 1vw 5vw;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      box-shadow: 0px 0px 10px 0px #f9d78f;
    }

    .button:hover {
      /* box-shadow: 2px 2px 2px 1px; */
      /**rgb(0, 198, 255, 0.5);**/
      box-shadow: 0px 0px 26px 0px #f9d78f;
    }

    .formContainer div select,
    .forgotPassword {
      cursor: pointer;
    }

    img {
      height: 150px;
    }

    @media only screen and (max-width: 800px) {
      .mainflex {
        flex-direction: column;
        width: 100%;
        gap: 20px;
      }

      .mainflex-1 {
        margin-top: 50px;
        width: 100%;
        padding: 10px;
      }

      .mainflex-2 {
        border-radius: 20px 20px 0px 0px;
        width: 100%;
      }

      .login-flex {
        width: 80%;
      }

      .button {
        width: 50%;
        height: 40px;
      }
    }
  </style>
</head>

<body>
  <div class="mainflex">
    <div class="mainflex-1">
      <div>
        <img src="./logo2.jpg" style="width:40%;height: 100%;padding-top:100px" alt="AICTE logo" />
      </div>
      <div class="heading">Welcome</div>
      <p class="p">Login to start exploring the Feedback form Program</p>
      <div class="smallHeading">General Information</div>
      <p class="p">1. Kindly login with your given username and password.</p>
      <p class="p">
        2. Do not share your credential details like password with anyone.
      </p>
    </div>
    <form class="mainflex-2" action="" method="post">
      <div class="formContainer">
        <div class="loginHeading heading">Login</div>
        <select class="login-flex" name="role">
          <option value="none" selected disabled hidden>Login As</option>
          <option value="HEI">HEI</option>
          <option value="HOD">HOD</option>
          <option value="Faculty">Faculty</option>
          <option value="Student">Student</option>
        </select>
        <input class="login-flex" type="email" id="mail" aria-describedby="emailHelp" name="email" placeholder="Enter email" />
        <input class="login-flex" type="password" id="Pass" name="password" placeholder="Password" />
        <button class="button" type="submit" name="submit">Login</button>
        <div class="forgotPassword">Forgot Password</div>
      </div>
    </form>
  </div>
</body>

</html>