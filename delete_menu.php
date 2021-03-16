
<?php
// Process delete operation after confirmation
if(isset($_POST["id_menu"]) && !empty($_POST["id_menu"])){
    // Include config file
    require_once "config.php";
    
    // Prepare a delete statement
    $query = "DELETE FROM menu WHERE id_menu = ?";
    
    if($stmt = mysqli_prepare($mysqli, $query)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_POST["id_menu"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            // Records deleted successfully. Redirect to landing page
            header("location: index.php");
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($mysqli);
} else{
    // Check existence of id parameter
    if(empty(trim($_GET["id_menu"]))){
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Record</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="frontend/libraries/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="frontend/styles/main.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
    <header>
    <nav class="row navbar navbar-expand-md navbar-light bg-white">
            <a href="#" class="navbar-brand">
                <img src="frontend/images/foodland.png" alt="Logo FoodLand">
            </a>

            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
             <span class="navbar-toggler-icon"></span> 
            </button>

            <div class="collapse navbar-collapse" id="navb">
                <ul class="navbar-nav ml-auto mr-3">
                    <li class="nav-item mx-md-2 active">
                        <a href="" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" id="dropmenu" data-toggle="dropdown">Menu
                        </a>
                        <div class="dropdown-menu">
                            <a href="" class="dropdown-item">Western food</a>
                            <a href="" class="dropdown-item">Asian food</a>
                            <a href="" class="dropdown-item">Arabic food</a>
                        </div>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a href="" class="nav-link">Promo</a>
                    </li>
                </ul>
                <!-- Mobile button -->
                <form class="form-inline d-sm-block d-md-none">
                    <button class="btn btn-login my-2 my-sm-0 mx-1 mx-sm-0">
                        Log Out
                    </button>
                </form>

                <!-- Desktop button -->
                <form class="form-inline my-2 my-lg-0 d-none d-md-block">
                    <button formaction="login.html" class="btn btn-login btn-navbar-right my-2 my-sm-0 px-4 mx-md-1">
                        Log Out
                    </button>
                </form>
            </div>
        </nav>
	</header>
</head>
<body>
    <div class="wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Delete Record</h1>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id_menu"]); ?>"/>
                            <p>Are you sure to delete this data?</p><br>
                            <p>
                                <input type="submit" value="Yes" class="btn btn-danger">
                                <a href="manage_menu_adm.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>     
    </div>
</body>
</html>