alert("connected!");
/* var $ = function(id) {	return document.getElementById(id);	}//end $
	
window.onload = function() {
	alert("connected!");
	//Create event handlers
	//$("frmSearch").reset();
	$("txtSearchBar").focus();					//Gives the search field the FOCUS on load
	$("txtSearch").onblur = validateSearch;	//If the search field is left then call the 
	$("btnReset").onclick = resetForm;
	$("BtnSubmit").onclick = validateForm;		 */ 
}//end window.onload

//This functin will evalute what the user entered
/* alert("connection");
let ValidateUserSearch = function($Search_Bar_Name) {
	
    event.preventDefault();
    let has_User_Entered_A_Search = false;
    

    //Checking what the user typed in the search box 
   // let userSearch = document.forms["myForm"]["SearchBar"].value; 
   
   
	let userSearch = document.forms["userSearchBarForm"]["Search_Bar_Name"].value;
	
	
	
	
	

    if (userSearch == "") 
	{
        alert("Please Enter your search Pretty Please");
        return false;
    } else {
        has_User_Entered_A_Search = true;
    } */

   /* This function validates the text search that the user entered. */

/* function validateSearch() {
	   alert("connected!");
	var ptr = $("txtSearchBar");
	//ar err = $("errSearch");
	if (ptr.value == "") || (ptr.value == " ") {
		alert("Please correct the designated errors and submit again.");
	}//end if */
	
	
//}//end validateSearch  
 
/* function noShortCircuitAnd() {
	var result = true;		//The function returns True if all the conditions are true, but does not short-circuit
							//(quit when false is found).
	
		for (var i=0; i<arguments.length; i++)
			result = result && arguments[i];	
			//go through each argument and AND it with the previous
		return result;
}//end noShortCircuitAnd

 /*	This function ensures all form fields are valid before submitting the form data.*/
/* function validateForm() {
	if (noShortCircuitAnd (
			validateSearch())) {  
		return true;   //Go ahead and submit form
	}else {
		alert("Please correct the designated errors and submit again.");
		return false;  //Cancel the form submit
	}//end if
}//end validateForm */

    /* if (has_User_Entered_A_Search) {
		
        window.location.href = "../php/result.php";
    } */

}//end validateForm function */