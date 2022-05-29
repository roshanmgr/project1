
const name = document.getElementById("name");
const mobile_num = document.getElementById("mobile_num");
const age = document.getElementById("age");
const password = document.getElementById("password");
const gender = document.getElementById("gender");
const guardian_name = document.getElementById("guardian_name");
const relationship = document.getElementById("relationship");
const guardian_num = document.getElementById("guardian_num");


function formValidation() {


    //name validation
    if(name.value === ""){
        document.getElementById("rNameErr").innerHTML="* Please enter your name!"
        return false;
    }

    if(!name.value.match(/^[a-z\sA-z]+$/)){
        document.getElementById("rNameErr").innerHTML="* Invalide name";
        name;
        return false;
    }

    if (name.value.length < 2 || name.value.length > 30) {
        document.getElementById("rNameErr").innerHTML="* Invalide name";
        name;
        return false;
    }

     //phonenumber validation 
     if(mobile_num.value === ""){
        document.getElementById("rMobile_numErr").innerHTML="* Please Enter Your phone number!";
        return false;
    } 

    if(!mobile_num.value.match(/\d$/)){
        document.getElementById("rMobile_numErr").innerHTML="* Invalide phone number";
        return false;
    }

    if(mobile_num.value.length < 10){
        document.getElementById("rMobile_numErr").innerHTML="* Phone number must be 10 digits";
        return false;
    }

    if(mobile_num.value.length > 10){
        document.getElementById("rMobile_numErr").innerHTML="* Phone number must be 10 digits";
        return false;
    }

    if(!mobile_num.value.match(/^((98)|(97))[0-9]{8}$/)) {
        document.getElementById("rMobile_numErr").innerHTML="* Invalide Phone Number Must Start with 98 or 97!";
        phoneNumber.focus();
        return false;
    }

     //age validation
     if(age.value === ""){
        document.getElementById("rAgeErr").innerHTML="* Please enter your age!";
        return false;
    }

    if(!age.value.match(/\d$/)){
        document.getElementById("rAgeErr").innerHTML="* INvalide Age";
        return false;
    }

    if(age.value.length < 2 || age.value.length > 2) {
        document.getElementById("rAgeErr").innerHTML="* Invalide Age";
        return false;
    }
    
    if(age.value < 0){
        document.getElementById("rAgeErr").innerHTML="* Age cannot be negative";
        return false;
    }
    
    // //Gender validation
    if(gender.value === ""){
        document.getElementById("rGenderErr").innerHTML="* Please select your gender!";
        return false;
    }
    //password validation
    if(password.value === ""){
        document.getElementById("rPasswordErr").innerHTML="* password can't be empty";
        return false;
    }

    if(!password.value.match(/^.{5,15}$/)) {
        document.getElementById("rPasswordErr").innerHTML="* Password length must be between 5-15 characters!";
        return false;
    }

        //Guardian name validation
        if(guardian_name.value === ""){
            document.getElementById("rGuardian_nameErr").innerHTML="* Please enter name!"
            return false;
        }
    
        if(guardian_name.value.match(/\d$/)){
            document.getElementById("rGuardian_nameErr").innerHTML="*  yo Invalide name";
            return false;
        }
    
        if (guardian_name.value.length < 2) {
            document.getElementById("rGuardian_nameErr").innerHTML="* Invalide name";
            return false;
        }

        if (guardian_name.value.length > 30) {
            document.getElementById("rGuardian_nameErr").innerHTML="* Invalide name";
            return false;
        }

            //Relationship validation
    if(relationship.value === ""){
        document.getElementById("rRelationshipErr").innerHTML="* Please enter your Relation!"
        return false;
    }

    if(!relationship.value.match(/^[a-z\sA-z]+$/)){
        document.getElementById("rRelationshipErr").innerHTML="* Invalide";
        return false;
    }

    if (relationship.value.length < 2 || relationship.value.length > 30) {
        document.getElementById("rRelationshipErr").innerHTML="* Invalide";
        return false;
    }

    // Guardian phonenumber validation 
    if(guardian_num.value === ""){
        document.getElementById("rGuardian_numErr").innerHTML="* Please Enter Your phone number!";
        return false;
    } 

    if(!guardian_num.value.match(/\d$/)){
        document.getElementById("rGuardian_numErr").innerHTML="* Invalide phone number";
        return false;
    }

    if(guardian_num.value.length < 10){
        document.getElementById("rGuardian_numErr").innerHTML="* Phone number must be 10 digits";
        return false;
    }

    if(guardian_num.value.length > 10){
        document.getElementById("rGuardian_numErr").innerHTML="* Phone number must be 10 digits";
        return false;
    }

    if(!guardian_num.value.match(/^((98)|(97))[0-9]{8}$/)) {
        document.getElementById("rGuardian_numErr").innerHTML="* Invalide Phone Number Must Start with 98 or 97!";
        return false;
    }

    //Loan Amount Valition
    if(loanamount.value === ""){
        document.getElementById("rLoanamountErr").innerHTML ="* Please Enter Amount";
        return false;
    }

    if(loanamount.value.length < 100 || age.value.length > 5000) {
        document.getElementById("rLoanamountErr").innerHTML="* Please Enter Amount between RS 100 to 5,000";
        return false;
    }


    //email validation
    if(email.value === ""){
        document.getElementById("rEmailErr").innerHTML = "* Please enter your email !";
        return false;
    }

    if(email.value.length < 9 || email.value.length > 40){
        document.getElementById("rEmailErr").innerHTML="* Give proper email address";
        email.focus();
        return false;
    }

    if(!email.value.match(/^[A-za-z0-9._]{3,}@[A-Za-z]{3,6}[.]{1}[A-Za-z.]{2,6}$/)){
        document.getElementById("rEmailErr").innerHTML="* It's not a proper email";
        email.focus();
        return false;
    }


    //citizenShip number validation
    if(!citizenShip.value === ""){
        document.getElementById("rCitizenErr").innerHTML="* Please enter CitizenShip number!";
        return false;
    }

    if(!citizenShip.value.match(/\d$/)){
        document.getElementById("rCitizenErr").innerHTML="* It's not CitizenShip number";
        citizenShip.focus();
        return false;
    }

    if(citizenShip.value <= 0){
        document.getElementById("rCitizenErr").innerHTML="* It's not CitizenShip number";
        citizenShip.focus();
        return false;
    }

    if(citizenShip.value.length < 4){
        document.getElementById("rCitizenErr").innerHTML="* Enter your proper CitizenShip Number";
        citizenShip.focus();
        return false;
    }

    if(citizenShip.value.length > 20){
        document.getElementById("rCitizenErr").innerHTML="* Enter your proper CitizenShip Number";
        citizenShip.focus();
        return false;
    }


    //message validation
    if(message.value === ""){
        document.getElementById("rMessageErr").innerHTML="* Please enter your message!";
        return false;
    }

    if(message.value.length < 10){
        document.getElementById("rMessageErr").innerHTML="* Please enter proper message!";
        return false;
    }

    if(message.value.length > 50){
        document.getElementById("rMessageErr").innerHTML="* Give short message";
        return false;
    }

    return true;
}