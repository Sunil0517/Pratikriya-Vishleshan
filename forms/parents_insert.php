<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php
		$conn = mysqli_connect("localhost", "root", "", "feedback_forms");
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$question_1 = $_REQUEST['question_1'];
		$question_2 = $_REQUEST['question_2'];
		$question_3 = $_REQUEST['question_3'];
		$question_4 = $_REQUEST['question_4'];
		$question_5 = $_REQUEST['question_5'];
		$question_6 = $_REQUEST['question_6'];
		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO parents_feedback VALUES ('$question_1',
			'$question_2','$question_3','$question_4','$question_5','$question_6')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>data stored in a database successfully."
				. " Please browse your localhost php my admin"
				. " to view the updated data</h3>";

			echo nl2br("\n$question_1\n $question_2\n "
				. "$question_3\n $question_4\n $question_5\n $question_6");
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>
</html>
