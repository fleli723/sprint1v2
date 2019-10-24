function validateForm() {
	
	var checkEmail =0;
	var x = document.forms["survey"]["email"].value;
	if(!x == "") {
		checkEmail++;
	}
	
	var grade = document.getElementsByName("grade");
	var check1 = 0;
	for(i=0;i<grade.length;i++){
		if(grade[i].checked){
			check1++;
			break;
		}
	}
	
	var topping = document.getElementsByName("topping");
	var check2 = 0;
	for(i=0;i<topping.length;i++){
		if(topping[i].checked){
			check2++;
			break;
		}
    }
	
	var major = document.getElementsByName("major");
	var check3 = 0;
	for(i=0;i<major.length;i++){
		if(major[i].checked){
			check3++;
			break;
		}
    }
	
	
	
	if(check1 && check2 && check3 && checkEmail){
		return true;
	}
	
	
	else {
		alert("You need to fill out the whole form");
		return false;
	}
	
	
  
  
}