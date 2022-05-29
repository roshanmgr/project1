const loanamount = document.getElementById("loanamount");
const email = document.getElementById("email");
const esewa_username = document.getElementById("esewa_username");
const esewa_num = document.getElementById("esewa_num");


function formValidation() {

//Loan Amount Valition
if(loanamount.value === ""){
    document.getElementById("rLoanamountErr").innerHTML ="* Please Enter Amount";
    return false;
}

if(loanamount.value < 100) {
    document.getElementById("rLoanamountErr").innerHTML="* Please Enter Amount between RS 100 to 5,000";
    return false;
}

if(loanamount.value > 5000) {
    document.getElementById("rLoanamountErr").innerHTML="* Please Enter Amount between RS 100 to 5,000";
    return false;
}


//email validation
if(email.value === ""){
    document.getElementById("rEmailErr").innerHTML = "* Please enter your email !";
    return false;
}

if(email.value.length < 9 || email.value.length > 40){
    document.getElementById("rEmailErr").innerHTML="* Invalide Email address";
    email.focus();
    return false;
}

if(!email.value.match(/^[A-za-z0-9._]{3,}@[A-Za-z]{3,6}[.]{1}[A-Za-z.]{2,6}$/)){
    document.getElementById("rEmailErr").innerHTML="* Invalide email address";
    email.focus();
    return false;
}

//Esewa username validation
if(esewa_username.value === ""){
    document.getElementById("rEsewa_usernameErr").innerHTML="* Please enter your esewa username!"
    return false;
}

if(!esewa_username.value.match(/^[a-z\sA-z]+$/)){
    document.getElementById("rEsewa_userameErr").innerHTML="* Invalide name";
    esewa_username;
    return false;
}

if (esewa_username.value.length < 2 || esewa_username.value.length > 30) {
    document.getElementById("rEsewa_usernameErr").innerHTML="* Invalide name";
    return false;
}

 //Esewa number validation
 if(esewa_num.value === ""){
    document.getElementById("rEsewa_numErr").innerHTML="* Please Enter esewa number!";
    return false;
} 

if(!esewa_num.value.match(/\d$/)){
    document.getElementById("rEsewa_numErr").innerHTML="* Invalide Esewa number";
    return false;
}

if(esewa_num.value.length < 10){
    document.getElementById("rEsewa_numErr").innerHTML="* Phone number must be 10 digits";
    return false;
}

if(esewa_num.value.length > 10){
    document.getElementById("rEsewa_numErr").innerHTML="* Phone number must be 10 digits";
    return false;
}

if(!esewa_num.value.match(/^((98)|(97))[0-9]{8}$/)) {
    document.getElementById("rEsewa_numErr").innerHTML="* Invalide Phone Number Must Start with 98 or 97!";
    return false;
}
return true;
}
