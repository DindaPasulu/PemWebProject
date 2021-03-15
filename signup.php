<?php
// Include config file
require_once "config.php";
 // Define variable and set to null by default
 $fnameErr = $lnameErr = $emailErr = $genderErr = $bdateErr = $passErr = "";
 $fname = $lname = $email = $gender = $bdate = $pass = "";

 function test_input($data)
 {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
 }
 if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
    //Validate firstname
   if (empty($_POST["first_name"]))
   {
     $fnameErr = "Name is required";
   }
   else
   {
     $fname = test_input($_POST["first_name"]);
     // Check if the name contains only letters and spaces
     if (!preg_match("/^[a-zA-Z ]*$/",$fname))
     {
       $fnameErr = "Only letters and spaces are allowed";
     }
   }
   //Validate lastname
   if (empty($_POST["last_name"]))
   {
     $lnameErr = "Name is required";
   }
   else
   {
     $lname = test_input($_POST["last_name"]);
     // Check if the name contains only letters and spaces
     if (!preg_match("/^[a-zA-Z ]*$/",$lname))
     {
       $lnameErr = "Only letters and spaces are allowed";
     }
   }
   //Validate email
   if (empty($_POST["email"]))
   {
     $emailErr = "Mailbox is required";
   }
   else
   {
     $email = test_input($_POST["email"]);
     // Check whether the mailbox is legal
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
     {
       $emailErr = "Illegal mailbox format";
     }
   }
   //Validate gender
   if (empty($_POST["gender"]))
   {
     $genderErr = "Gender is required";
   }
   else
   {
     $gender = test_input($_POST["gender"]);
   }
   
   //Validate birthdate
   if (empty($_POST["birth_date"]))
   {
    $bdateErr = "birth date is required"; 
   }
   else
   {
     $bdate = test_input($_POST["birth_date"]);
     if (!preg_match ("/^[0-9]*$/", $bdate) ) {  
        $bdateErr = "Only numeric value is allowed.";  
        }  
   }

   //Validate password
   if(!empty($_POST["password"])) {
    $pass = test_input($_POST["password"]);
    if (strlen($_POST["password"]) <= '8') {
        $passErr = "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#",$pass)) {
        $passErr = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$pass)) {
        $passErr = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$pass)) {
        $passErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
    else {
        $passErr = "Please enter password   ";
   }
 }

}
// Check input errors before inserting in database
if(empty($fnameErr) && empty($lnameErr) && empty($emailErr) && empty($passErr) && empty($bdateErr) && empty($genderErr)) 
{
    // Prepare an insert statement
    $query = "INSERT INTO customers(first_name, last_name, email, pass, birth_date, gender) VALUES (?, ?, ?, ?, ?, ?)";
     
    if($stmt = $mysqli->prepare("select time from timetable where route=? and day=? and station=?")){
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param($stmt, "ssssss", $param_fname, $param_lname, $param_email, $param_pass, $param_bdate, $param_gender);
        
        // Set parameters
        $param_fname = $fname;
        $param_lname = $lname;
        $param_email = $email;
        $param_pass = $pass;
        $param_bdate = $bdate;
        $param_gender = $gender;
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records created successfully. Redirect to landing page
            header("location: login.html");
            exit();
        } else{
            echo "Something went wrong. Please try again later.";
        }
    // Close statement
    $stmt->close();
    }
     
}

// Close connection
$mysqli -> close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="frontend\stylesstyle.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>

  <title>Registration Form</title>
  <style type="text/css">
    
    .error {
      color: #FF0000;
    }
  </style>
  <script>
        $('#datepicker').datepicker();
    </script>
</head>
<body>
<br><br>  
</form>
<div class="container">
<h1 style="text-align: center">Create Account</h1><br><br>
<div class="wrapper" style="align-content: center">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
    <div class="form-group <?php echo (!empty($fnameErr)) ? 'has-error' : ''; ?>">
        <label>First Name:</label>
        <input type="text" name="firstName" placeholder="First Name" value="<?php echo $fname; ?>">
        <span class="error">* <?php echo $fnameErr; ?> </span>
        <br><br>               
    </div>
    <div class="form-group <?php echo (!empty($lnameErr)) ? 'has-error' : ''; ?>">
        <label>Last Name:</label>
        <input type="text" name="firstName" placeholder="Last Name" value="<?php echo $lname; ?>">
        <span class="error">* <?php echo $lnameErr; ?> </span>
        <br><br>               
    </div> 
    <div class="form-group <?php echo (!empty($emailErr)) ? 'has-error' : ''; ?>">
        <label>Username/E-mail: </label>
        <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>">
        <span class="error">* <?php echo $lnameErr; ?> </span>
        <br><br>               
    </div>  
    <div class="form-group <?php echo (!empty($passErr)) ? 'has-error' : ''; ?>">
        <label>Password: </label>
        <input type="password" name="password" placeholder="Password" value="<?php echo $pass; ?>">
        <span class="error">* <?php echo $passErr; ?> </span>
        <br><br>               
    </div>  
    <div class="form-group <?php echo (!empty($bdateErr)) ? 'has-error' : ''; ?>">
        <label>Birth Date:</label>
        <input type="date" class="form-control" id="datepicker" placeholder="MM/DD/YYYY" value="<?php echo $bdate; ?>">  
        <span class="error"><?php echo $bdateErr; ?> </span>  
    <br><br> 
    </div> 
    <div class="form-group <?php echo (!empty($genderErr)) ? 'has-error' : ''; ?>">
        <label>Gender:  </label>
        <input type="radio" name="gender" value="male"> Male  
        <input type="radio" name="gender" value="female"> Female  
        <br><br>               
    </div>                        
	<a href="login.html">Already have an account? Click here</a><br><br>
	<button input type="submit" name="submit" >SignUp</button>
    <br><br>                             
</form>  
    </div>
    </div>
</body>
</html>