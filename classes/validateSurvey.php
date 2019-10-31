<?
function validateDBSurvey()
{
	var hasEmail =false;
	
	if(!isset($_POST('email'))(
		echo"PHP - A email is Required.";
	)else{
		hasEmail=true;
		
	}
	
	if(hasEmail)
	{
		 window.location.href = "../php/surveyResult.php";
	}
	
	
	
	
}

?>