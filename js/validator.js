	function validateForm() { 
    var fname = document.forms["register"]["first_name"].value; 
	var lname = document.forms["register"]["last_name"].value; 
    var pass = document.forms["register"]["pass"].value; 
     
    if (fname == "" || lname="") { 
        alert("Your full name must be filled out");
		document.register.first_name.focus();
		document.register.last_name.focus();
        return false;
    }
	
    if (pass == "") { 
        alert("Password must be filled out."); 
        return false; 
    }if(pass.length<3){
		alert("Password must have at least 3 characters."); 
        return false; 
	}
	if(pass!=$cpass){
	alert("Password does not match");
	return false;
	}
	}
