<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content=
		"width=device-width, initial-scale=1.0">
  <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap"
      rel="stylesheet"
    />  
	<title>
	  Faculty Feedback Form
	</title>

	<style>

		/* Styling the Body element i.e. Color,
		Font, Alignment */
		body {
			background-color: #e9ecef;
			font-family: Verdana;
			text-align: center;
		}
    h1{
      font-family: "Inter", sans-serif;
    }
		/* Styling the Form (Color, Padding, Shadow) */
    .form_questions{
      /* background-color:#f8f9fa; */
			max-width: 800px;
			margin: 30px auto;
      margin-bottom: 1px;
			/* padding: 30px 25px; */
			/* box-shadow: 2px 5px 10px rgba(0, 0, 0, 0.5); */
    }
		/* Styling form-control Class */
		.form-control {
			text-align: left;
			margin-bottom: 25px;
      background-color:#f8f9fa;
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
		.form-control input,
		.form-control select,
		.form-control textarea {
			border: 1px solid #777;
			border-radius: 2px;
			font-family: inherit;
			padding: 10px;
			display: block;
			width: 95%;
		}

		/* Styling form-control Radio
		button and Checkbox */
		.form-control input[type="radio"],
		.form-control input[type="checkbox"] {
			display: inline-block;
			width: auto;
		}
    .radio_{
      padding-left: 15px;
    }
    .question{
      display: block;
      margin-bottom: 15px;
    }
    .submit_button{
       margin-top: 10px;
        background-color: #1367C9;
        color: white;
        font-family: inherit;
        font-size: 20px;
        padding: 15px 25px;
        border-radius: 5px;
        box-shadow: 5px 5px 15px #343a40;
        cursor: pointer;
    }
		.last_question{
			margin-bottom: 5px;
		}
	</style>
</head>

<body>
	<h1>FACULTY FEEDBACK FORM</h1>
  <div>
    <!-- <script>document.write(/\d{4}/.exec(Date())[0])</script> -->
    <!-- <label for="year">Year:</label>
    <input type="number" id="year" name="year" min="2022" max="2100"> -->
  </div>
	<!-- Create Form -->
	<form id="form" action="faculty_insert.php" method="post">
		<div class = "form_questions">
      <div class="form-control">
			<label class="question">
				1. The books/journals etc. prescribed/listed as reference materials
              are relevant, updated and cover the entire syllabus.
			</label>
			<div class = "radio_">
        <label for="question_1"><input type="radio" id="question_1_answer_1" name="question_1" value="Exellent">Exellent</input></label>
			  <label for="question_1"><input type="radio" id="question_1_answer_2" name="question_1" value="Good">Good</input></label>
			  <label for="question_1"><input type="radio" id="question_1_answer_3" name="question_1" value="Average">Average</input></label>
			  <label for="question_1"><input type="radio" id="question_1_answer_4" name="question_1" value="Below avg">Below Average</input></label>
			  <label for="question_1"><input type="radio" id="question_1_answer_5" name="question_1"  value="Poor">Poor</input></label>
      </div>
		</div>
    <div class="form-control">
			<label class="question">
        2.The courses/syllabus of the subjects taught by me increased my
              interest, knowledge, and perspective in the subject area.
			</label>
			<div class = "radio_">
        <label for="question_2"><input type="radio" id="question_2_answer_1" name="question_2" value="Exellent">Exellent</input></label>
			<label for="question_2"><input type="radio" id="question_2_answer_2" name="question_2" value="Good">Good</input></label>
			<label for="question_2"><input type="radio" id="question_2_answer_3" name="question_2" value="Average">Average</input></label>
			<label for="question_2"><input type="radio" id="question_2_answer_4" name="question_2" value="Below avg">Below Average</input></label>
			<label for="question_2"><input type="radio" id="question_2_answer_5" name="question_2"  value="Poor">Poor</input></label>
      </div>
		</div>
    <div class="form-control">
			<label class="question">
				3.The curriculum has given me full freedom to adopt new
              techniques/strategies of teaching such as group discussions,
              seminar presentations and learner's participation.
			</label>
			<div class="radio_">
        <label for="question_3"><input type="radio" id="question_3_answer_1" name="question_3" value="Exellent">Exellent</input></label>
			<label for="question_3"><input type="radio" id="question_3_answer_2" name="question_3" value="Good">Good</input></label>
			<label for="question_3"><input type="radio" id="question_3_answer_3" name="question_3" value="Average">Average</input></label>
			<label for="question_3"><input type="radio" id="question_3_answer_4" name="question_3"value="Below avg">Below Average</input></label>
			<label for="question_3"><input type="radio" id="question_3_answer_5" name="question_3"  value="Poor">Poor</input></label>
      </div>
		</div>
    <div class="form-control">
			<label class="question">
				4. I have the freedom to adopt new techniques/strategies of testing
              assessment of students.
			</label>
      <div class="radio_">
        <label for="question_4"><input type="radio" id="question_4_answer_1" name="question_4" value="Exellent">Exellent</input></label>
			<label for="question_4"><input type="radio" id="question_4_answer_2" name="question_4" value="Good">Good</input></label>
			<label for="question_4"><input type="radio" id="question_4_answer_3" name="question_4" value="Average">Average</input></label>
			<label for="question_4"><input type="radio" id="question_4_answer_4" name="question_4" value="Below avg">Below Average</input></label>
			<label for="question_4"><input type="radio" id="question_4_answer_5" name="question_4"  value="Poor">Poor</input></label>
      </div>

		</div>
    <div class="form-control">
			<label class="question">
				5.ICT facilities in the college are adequate and satisfactory.
			</label>
			<div class="radio_">
      <label for="question_5"><input type="radio" id="question_5_answer_1" name="question_5" value="Exellent">Exellent</input></label>
			<label for="question_5"><input type="radio" id="question_5_answer_2" name="question_5" value="Good">Good</input></label>
			<label for="question_5"><input type="radio" id="question_5_answer_3" name="question_5" value="Average">Average</input></label>
			<label for="question_5"><input type="radio" id="question_5_answer_4" name="question_5" value="Below avg">Below Average</input></label>
			<label for="question_5"><input type="radio" id="question_5_answer_5" name="question_5"  value="Poor">Poor</input></label>
      </div>
		</div>
    <div class="form-control last_question">
			<label class="question">
				6.Faculty Room is adequate and available in the Institute.
			</label>
			<div class="radio_">
      <label for="question_6"><input type="radio" id="question_6_answer_1" name="question_6" value="Exellent">Exellent</input></label>
			<label for="question_6"><input type="radio" id="question_6_answer_2" name="question_6" value="Good">Good</input></label>
			<label for="question_6"><input type="radio" id="question_6_answer_3" name="question_6" value="Average">Average</input></label>
			<label for="question_6"><input type="radio" id="question_6_answer_4" name="question_6" value="Below avg">Below Average</input></label>
			<label for="question_6"><input type="radio" id="question_6_answer_5" name="question_6"  value="Poor">Poor</input></label>
      </div>
		</div>
    </div>
		<button class="submit_button" type="submit" value="submit">
			Submit
		</button>
	</form>
</body>

</html>
