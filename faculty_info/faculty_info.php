<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./faculty_info.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Student|Info</title>
</head>

<body>
    <div class="main">
        <div class="head">
            <header>Faculty Information</header>
        </div>
        <br><br>
        <div class="search">
            <div class="search_head">
                <img src="./search-512.png" alt="" width="40px" style="float: left;top: 0;">
                <h1>Search</h1>
            </div>
            <div class="search_box">
                <form action="" method="GET">
                    <label for="" style="margin-left: 15%;">Faculty Name</label>
                    <input style="border: none;border-bottom-style: groove;outline: none;width: 18%;font-size: 20px;" type="text" name="student_name" id="student_name">
                    <!-- <label style="margin-left: 1%;" for="">Rol</label>
                    <input style="border: none;border-bottom-style: groove;outline: none;width: 18%;margin-left: 1%;font-size: 20px;" type="text" name="roll_no" id="roll_no"> -->
                    <label style="margin-left: 1%;" for="">Role</label>
                    <select style="border: none;border-bottom-style: groove;outline: none;width: 18%;margin-left: 1%;font-size: 20px;" name="sem" id="sem">
                        <option value="none"> </option>
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">3rd</option>
                        <option value="4th">4th</option>
                        <option value="5th">5th</option>
                        <option value="6th">6th</option>
                        <option value="7th">7th</option>
                        <option value="8th">8th</option>
                      </select>
                    <label style="margin-left: 1%;" for="">Course</label>
                    <select style="border: none;border-bottom-style: groove;outline: none;width: 18%;margin-left: 1%;font-size: 20px;" name="course" id="course">
                        <option value="none"> </option>
                        <option value="B.Tech(CS)">B.Tech(CS)</option>
                        <option value="B.Tech(ME)">B.Tech(ME)</option>
                        <option value="B.Tech(CE)">B.Tech(CE)</option>
                        <option value="B.Tech(EE)">B.Tech(EE)</option>
                        <option value="B.Tech(EC)">B.Tech(EC)</option>
                      </select>
                    <br><br><br>
                    <div class="batan">
                        <input class="button button1" type="submit" value="Search" name="search">
                        <input class="button button2" type="reset" value="Reset" name="reset">
                    </div>
                </form>
            </div>
        </div>
        <?php
        $connection = mysqli_connect("localhost","root","","test");
        $query_run=0;
        if(isset($_GET['search'])){
            $sem=$_GET['sem'];
            $student_name=$_GET['student_name'];
            $roll_number=$_GET['roll_no'];
            $course=$_GET['course'];
            $query="SELECT * FROM `student` WHERE sem='$sem' OR student_name='$student_name' OR roll_number='$roll_number' OR course='$course'";
            $query_run=mysqli_query($connection,$query);
        }
        ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Student Name</th>
                            <th scope="col">Roll Number</th>
                            <th scope="col">Course</th>
                            <th scope="col">sem</th>
                            <th scope="col">DOB</th>
                            <th scope="col">Mail_Id</th>
                            <th scope="col">Mobile no.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                    $row_no= mysqli_num_rows($query_run);
                        if($row_no>0){
                            while($row=mysqli_fetch_array($query_run)){
                    ?>
                            <tr>
                                <th><input type="checkbox" name="select" id="select"></th>
                                <td>
                                    <?php echo $row['student_name'];?>
                                </td>
                                <td>
                                    <?php echo $row['roll_number'];?>
                                </td>
                                <td>
                                    <?php echo $row['course'];?>
                                </td>
                                <td>
                                    <?php echo $row['sem'];?>
                                </td>
                                <td>
                                    <?php echo $row['dob'];?>
                                </td>
                                <td>
                                    <?php echo $row['student_mail'];?>
                                </td>
                                <td>
                                    <?php echo $row['student_mobile'];?>
                                </td>
                            </tr>
                            <?php            
                            }
                        }
                        else{
                            echo "No Record found";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
    </div>
</body>

</html>