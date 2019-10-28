//This functin will evalute what the user entered

let ValidateUserSearch = function() {
	
    event.preventDefault();
    let has_User_Entered_A_Search = false;
    

    //Checking what the user typed in the search box 
   // let userSearch = document.forms["myForm"]["SearchBar"].value; 
   
   
	let userSearch = document.forms["userSearchBarForm"]["SearchBar"].value;
	
	
	
	
	

    if (userSearch == "") 
	{
        alert("Please Enter your search Pretty Please");
        return false;
    } else {
        has_User_Entered_A_Search = true;
    }

     
   

    if (has_User_Entered_A_Search) {
		
        window.location.href = "../php/result.php";
    }

}//end validateForm function