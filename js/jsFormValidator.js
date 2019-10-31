
var $ = function(id) {	return document.getElementById(id);	}//end $
//Code To validate the Survey Form 

let validateForm = function() {
    event.preventDefault();
    let hasEmail = false;
    let hasMajor = false;
    let hasLetterGrade = false;
    let hasPizzaTopping = false;

    //Checking email
    let email = document.forms["survey"]["email"].value;
	//let email = $("email");

    if (email == "") {
        alert("Email must be filled out");
        return false;
    } else {
        hasEmail = true;
    }

    //Checking major 
    //let major = document.forms["survey"]["Majors"];
	//
    //for (let i = 0; i < Majors.length; i++) {
    //    if (Majors[i].checked) {
    //        hasMajor = true;
    //    }
    //}
    //if (hasMajor == false) {
    //    alert("You must declare a major");
    //    return false;
    //} 
	
	/* This function validates if the user selected at least one checkbox. */

    
	
	
		var checked = 0;
        //Create an Array.
        var selected = new Array();
 
        //Reference the checkbox form div.
        var Majors = document.getElementById("Majors");
 
        //Reference all the CheckBoxes in the div.
        var chks = Majors.getElementsByTagName("INPUT");
 
        // Loop and push the checked CheckBox value in Array.
        for (var i = 0; i < chks.length; i++) {
            if (chks[i].checked) {
                hasMajor = true;
            }//endif
        }//endfor
		if (hasMajor == false) {
			alert("You must declare a major");
		}//endif 
	

    //Checking grade
    let grade = document.forms["survey"]["grade"];

    for (let i = 0; i < grade.length; i++) {
        if (grade[i].checked) {
            hasLetterGrade = true;
        }
    }
    if (hasLetterGrade == false) {
        alert("What grade do you expect to get?");
        return false;
    }

    //Checking pizza topping
    let pizza = document.forms["survey"]["topping"];

    for (let i = 0; i < pizza.length; i++) {
        if (pizza[i].checked) {
            hasPizzaTopping = true;
        }
    }
    if (hasPizzaTopping == false) {
        alert("What your favorite pizza topping is of upmost importance!");
        return false;
    }

    let comboOfGradeAndPizza = hasLetterGrade && hasPizzaTopping;//combining the two radio buttons into one boolean

  /*   if (hasEmail && comboOfGradeAndPizza && hasMajor) {
		
        window.location.href = "../php/action.php";
    } */

}