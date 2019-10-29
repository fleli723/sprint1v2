var $ = function(id) {	return document.getElementById(id);	}//end $
	
window.onload = function() {
	//Create event handlers
	//$("frmSurvey").reset();			//Clear previous entries in FF
	$("txtEmail").focus();			//Gives the email field the FOCUS on load
	$("txtEmail").onblur = validateEmail;	//If the email field is left then call the
	$("rdoGradeA").onclick = clearGradeError;
	$("rdoGradeB").onclick = clearGradeError;
	$("rdoGradeC").onclick = clearGradeError;
	$("rdoGradeD").onclick = clearGradeError;
	$("rdoGradeF").onclick = clearGradeError;
	
	$("chkMajor1").onchange = validateMajors;
	$("chkMajor2").onchange = validateMajors;
	$("chkMajor3").onchange = validateMajors;
	$("chkMajor4").onchange = validateMajors;
	$("chkMajor5").onchange = validateMajors;
	$("chkMajor6").onchange = validateMajors;
	
	
	$("rdoPizzaToppingSausage").onchange = clearPizzaToppingError;
	$("rdoPizzaToppingPepperoni").onchange = clearPizzaToppingError;
	$("rdoPizzaToppingBacon").onchange = clearPizzaToppingError;
	//$("rdoPizzaToppingGreenPepper").onchange = clearPizzaToppingError;
	//$("rdoPizzaToppingJalepeno").onchange = clearPizzaToppingError;
	$("rdoPizzaToppingMushroom").onchange = clearPizzaToppingError;
	//$("rdoPizzaToppingBlackOlive").onchange = clearPizzaToppingError;
	//$("rdoPizzaToppingOnion").onchange = clearPizzaToppingError;

	$("btnReset").onclick = resetForm;
	//$("btnSubmit").onclick = validateForm; //handled in the View file 'surveyEdit.php' used for js file debug only		 
}//end window.onload

/* This function validates the email address that the user entered. */
function validateEmail() {
	var ptr = $("txtEmail");
	var err = $("errEmail");
	var emailAddy = ptr.value;
	var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
	
	if (emailAddy == "") {
		err.style.visibility = "visible";
		err.title = "Java - This is a required field.";
	}else if (emailAddy != "") {
		if (!emailAddy.match(emailPattern)) {
			err.style.visibility = "visible";
			err.title = "Java - Enter a valid email address such as johndoe123@gmail.com.";
		}else{
			err.style.visibility = "hidden";
		}//end if
	}// end if
	return err.style.visibility == "hidden";
}//end validateEmailAddress

/* This function validates if the user selected at least one checkbox. */
function validateMajors() {
    var err = $('errMajor');
	var checked = 0;
	//function GetSelected() {
        //Create an Array.
        var selected = new Array();
 
        //Reference the checkbox form div.
        var Majors = document.getElementById("Majors");
 
        //Reference all the CheckBoxes in the div.
        var chks = Majors.getElementsByTagName("INPUT");
 
        // Loop and push the checked CheckBox value in Array.
        for (var i = 0; i < chks.length; i++) {
            if (chks[i].checked) {
                checked++;
            }//endif
        }//endfor
		if (checked == 0) {
			err.style.visibility = "visible";
			err.title = "Java - You must select atleat one Major.";
		}else{
			err.style.visibility = "hidden";
		}//endif
}//end

/* This function was copied (with slight modification) from 
   Murach's JavaScript and DOM Scripting book (Murach and Associates, 2009)
	
	This function determines which radio button in the group specified in the parameter
	is selected and returns a pointer to that object.
*/
var getSelectedRadioButton = function (groupName) {
	var buttons = document.getElementsByName(groupName);
	for (var i=0; i<buttons.length; i++) {
		if (buttons[i].checked) {
			return buttons[i];
		}//end if
	}//end for
}//end getSelectedRadioButton

/* This function ensures the user has selected one of the grade options.*/
function validateGrade() {
	var err = $('errGrade');
	//err.style.visibility = "hidden";
	if(!getSelectedRadioButton('grade')) {
		err.style.visibility = "visible";
		err.title = "Java - You must select a grade.";
	}//end if
	return err.style.visibility=="hidden";
}//

/* This function hides the grade error marker (whenever a radio button is selected).*/
function clearGradeError() {
	$("errPizzaTopping").style.visibility = "hidden";
}//end clearGradeError

/* This function ensures the user has selected one of the pizzaTopping options.*/
function validatePizzaTopping() {
	var err = $('errPizzaTopping');
	err.style.visibility = "hidden";
	if(!getSelectedRadioButton('pizzaTopping')) {
		err.style.visibility = "visible";
		err.title = "Java- You must select a favorite PizzaTopping.";
	}//end if
	return err.style.visibility=="hidden";
}//

/* This function hides the grade error marker (whenever a radio button is selected).*/
function clearPizzaToppingError() {
	$("errPizzaTopping").style.visibility = "hidden";
}//end clearGradeError

/* This function accepts any number of parameters.  The function returns True if all the conditions are 
true, but does not short-circuit (quit when false is found). All conditions are evaluated.*/
function noShortCircuitAnd() {
	var result = true;		//The function returns True if all the conditions are true, but does not short-circuit
					//(quit when false is found).
		for (var i=0; i<arguments.length; i++)
			result = result && arguments[i];	
			//go through each argument and AND it with the previous
		return result;
}//end noShortCircuitAnd

/*This function clears all the form error markers and resets the form fields.*/
function resetForm() {
	//Hide all error markers
	var images = document.getElementsByTagName("img");
	for (var i=0; i<images.length; i++) {
		if(images[i].id.indexOf("err")==0) 
			images[i].style.visibility = "hidden";	
	}//end for
	$("txtEmail").focus();
}//end resetForm

/*	This function ensures all form fields are valid before submitting the form data.*/
function validateForm() {
	if (noShortCircuitAnd (
			validateEmail(),
			validateGrade(),
			validatePizzaTopping(),
			validateMajors()
			)) {  
		return true;   //Go ahead and submit form
	}else {
		return false;  //Cancel the form submit
	}//end if
}//end validateForm
