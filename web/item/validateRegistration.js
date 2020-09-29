var nameJS = document.getElementById('name');
var email = document.getElementById('email');
var phone = document.getElementById('phone');
var gender = document.getElementsByName('gender');
var password = document.getElementById('pass');
var choosen;

function validateForm() {
    for (var i = gender.length - 1; i >= 0; i--) {
        if(gender[i].checked) {
            choosen = gender[i];
        }
    };

    if(	nameJS.value.length >= 3 && 
        email.value.indexOf("@") == email.value.lastIndexOf("@") &&
        isNaN(phone.value) == false &&
        choosen != "" &&
        password.value.length >= 8) {

        phone = phone.toString();

        //document.myForm.submit();
        alert("Your name has been registered!");
        window.location.href="Get_Locker.html";
        
    } else {
        alert("Fail to join forum");
    }
}
