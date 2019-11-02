<?
/* This function validates the user inputs on the survey form. If there are errors
then the user is shown a alert box with a list of the form errors. If there are no 
errors then the form is submitted and the Survey Results page is shown. */
function validateSurvey() {
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$errors = array();  //sets our survey errors to an array
		//check for errors
		//Validate E-mail (Make sure it is not blank and a valid E-mail Address.)
		if(($_POST['email'])=="") {
			$errors['email']= "PHP - E-mail Address is a required field.";
		}elseif(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
			$errors['email']= "PHP - Enter a valid email address i.e  johnsmith@sample.com";
		}//end if
		
		//Validate the Major checkboxes
		if (empty($_POST['major'])) {
			 $errors['major']= "PHP - You must select at least one major.";
		}//end if
		
		//Validate the Grade Radio Buttons
		if (empty($_POST['grade'])) {
			 $errors['grade']= "PHP - You must select a grade.";
		}//end if
		
		//Validate the Pizza Topping radio buttons.
		if (empty($_POST['pizzaTopping'])) {
			 $errors['pizzaTopping']= "PHP - You must select a pizza topping.";
		}//end if
		
		//if there are no errors then lets show the Survey Results
		if(count($errors) == 0) {
			//transfer $_POST variables to a Session
			foreach ($_POST as $key => $value) {
				${$key} = $value;
				$_SESSION[$key] = $value;
			}//end foreach
			header("Location: surveyResult.php");
			exit();
		}else{
			//Show an alert box with a list of errors so the user can make corrections.
			echo '<script>alert("'.implode("\\n", $errors).'");</script>';
		}//endif
	}//end if
}//end vallidate Survey function
?>