const Name = document.getElementById("name");
const email = document.getElementById("email");
const mobileNum = document.getElementById("mobilenum");

var nameError = false;
var emailError = false;
var mobileError = false;

function validate(input){   
    
    switch(input){
        case "Name":
            // Name field contains alphabet characters and character spaces
            Value = Name.value.trim();
            x = Name.parentElement;            
            regexp = /^[a-zA-Z]+([a-zA-Z\s]+){0,}$/;
            if (regexp.test(Value) == false){
                Name.style.borderColor = "red"
                small = x.querySelector("small");
                small.style.color = "red";
                small.innerHTML = "Name field can only contain alphabet characters and character spaces.";
                nameError = true;
            }
            else{
                Name.style.borderColor = "#90EE90";                
                small = x.querySelector("small");                
                small.innerHTML = "";
                nameError = false;
            }            
            break;

        case "email":
            // contains user name part follows by @ and a domain name part
            // username contains word characters including "-" and "."
            // domain name contains 2 to 3 address extensions
            // last extension must have 2 to 3 characters
            Value = email.value.trim();
            x = email.parentElement;           
            regexp = /^[\w.-]+@(\w+\.){1,2}(\w){2,3}$/;
            if (regexp.test(Value) == false){
                email.style.borderColor = "red"
                small = x.querySelector("small");
                small.style.color = "red";
                small.innerHTML = "E-mail is invalid! Only 3 extensions allowed with final extension having 2/3 characters";
                emailError = true;
            }
            else{
                email.style.borderColor = "#90EE90";                
                small = x.querySelector("small");                
                small.innerHTML = "";
                emailError = false;
            }        
            break;

        case "mobilenum":
            // minimum 8 digits , max 10 digits , no dashes
            Value = mobileNum.value 
            x = mobileNum.parentElement;  
            var validNumber = /^\d{8,10}$/;        
            if (validNumber.test(Value)== false){
                mobileError = true;
                mobileNum.style.borderColor = "red";
                small = x.querySelector("small");
                small.style.color = "red";
                small.innerHTML = "Invalid mobile number - should contain at least 8 digits and at most 10 digits with no symbols(-/+)";
            }  
            else{
                mobileError = false;
                mobileNum.style.borderColor = "#90EE90";
                small = x.querySelector("small");
                small.style.color = "red";
                small.innerHTML = "";
            }          
            break;          
    }
}

function finalValidate(){
    if (nameError || emailError || mobileError){
        alert("Please check again the input fields.");
        return false;
    }
    else{
        return true;
    }
}