//Code To validate the Form 
let validateForm = function() {
    event.preventDefault();
    let hasEmail = false;
    let hasMajor = false;
    let hasLetterGrade = false;
    let hasPizzaTopping = false;

    //Checking email
    let email = document.forms["survey"]["email"].value;

    if (email == "") {
        alert("Email must be filled out Pretty Please");
        return false;
    } else {
        hasEmail = true;
    }

    //Checking major 
    let major = document.forms["survey"]["major"];

    for (let i = 0; i < major.length; i++) {
        if (major[i].checked) {
            hasMajor = true;
        }
    }
    if (hasMajor == false) {
        alert("You must declare a major");
        return false;
    }

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

    if (hasEmail && comboOfGradeAndPizza && hasMajor) {
		
        window.location.href = "../php/action.php";
    }

}