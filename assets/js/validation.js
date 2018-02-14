function ValidateUserLogin()
{
   var email = document.forms["loginform"]["emailid"].value;
   var password = document.forms["loginform"]["password"].value;
   var passw=  /^[A-Za-z]\w{2,14}$/; 
   var validate_email = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/; 
if(email.match(validate_email))   
{
if(password.match(passw))
{
return true;  
}
else
{
   alert('Password should be atleast 3 character');
}
}  
else  
{ 
alert('Invalid Email Id'); 
return false;  
}
}
function ValidateAdminLogin()
{
   var password = document.forms["adminform"]["password"].value;
   var passw=  /^[A-Za-z]\w{2,14}$/; 
if(password.match(passw))
{
return true;  
}
else
{
   alert('Password should be atleast 3 character');
} 
}
function valid()
{
   lenght lagani h mobile me nd baki cheeze validate krni h
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}