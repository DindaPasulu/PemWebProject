<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$title = $price = $category = $description = $id = $img = "";
$title_err = $price_err = $category_err = $description_err = $id_err = $img_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate Title
    $input_title = trim($_POST["title"]);
    if (empty($input_title)) {
        $title_err = "Title is required";
      } else {
        $title = test_input($_POST["title"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/",$title)) {
          $title = "Only letters and white space allowed";
        }
      }
    //Validate category
    $input_category = trim($_POST["category"]);
    if (empty($input_title)) {
        $category_err = "Please fill the category";
      } else {
        $category = test_input($_POST["category"]);
      }

    //Validate Description
    $input_desc = trim($_POST["description"]);
    if (empty($input_desc)) {
        $description_err = "Please fill the description";
      } else {
        $description = test_input($_POST["description"]);
      }
    
      //Validate Price
    $input_price = trim($_POST["price"]);
    if (empty($input_price)) {
        $price_err = "Please fill the price";
      } else {
        $price = test_input($_POST["price"]);
      }

    // Validate id
    $input_id = trim($_POST["id_menu"]);
    if(empty($input_id)) {
        $id_err = "Please enter the id";     
    } else{
        $id_err = "Please enter a positive integer value.";
    }

    // Validate img
    $input_img = trim($_POST["img"]);
    if(empty($input_img)) {
        $img_err = "Please upload the image";     
    } else{
        $img_err = "Image is required";
    }

    // Check input errors before inserting in database
    if(empty($title_err) && empty($category_err) && empty($description_err) && empty($price_err) && empty($img_err) && empty($id_err)) 
    {
        // Prepare an insert statement
        $query = "INSERT INTO menu (title, category, description, price, img, id_menu) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($mysqli, $query)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_title, $param_category, $param_desc, $param_price, $param_img, $param_id);
            
            // Set parameters
            $param_title = $title;
            $param_category = $category;
            $param_desc = $description;
            $param_price = $price;
            $param_img = $img;
            $param_id = $id;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index_adm.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        $stmt -> close();
    }
    
    // Close connection
    $mysqli -> close();
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Menu</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="frontend/libraries/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="frontend/styles/main.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
        .error {color: #FF0000;}
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
                <div class="col-md">
                    <div class="page-header">
                        <h2>Create Menu</h2>
                    </div>
                    <!--<p>Please fill this form and submit to add student record to the database.</p>-->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($id_err)) ? 'has-error' : ''; ?>">
                            <label>ID</label>
                            <input type="text" name="ID" pattern=".{3,}" title="Max 3 char" class="form-control" 
                            value="<?php echo $id; ?>">
                            <span class="error"><?php echo $id_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($img_err)) ? 'has-error' : ''; ?>">
                            <label>Image File</label>
                            <input type="file" name="jpg_file" class="form-control"value="<?php echo $img; ?>">
                        </div>
                        <div class="form-group <?php echo (!empty($title_err)) ? 'has-error' : ''; ?>">
                            <label>Title</label>
                            <input type="text" name="Title" class="form-control" value="<?php echo $title; ?>">
                            <span class="error"><?php echo $title_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($category_err)) ? 'has-error' : ''; ?>">
                            <label>Category</label>
                            <input type="text" name="Category" class="form-control" value="<?php echo $category; ?>">
                            <span class="error"><?php echo $category_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($price_err)) ? 'has-error' : ''; ?>">
                            <label>Price</label>
                            <input type="text" name="Price" class="form-control" value="<?php echo $price; ?>">
                            <span class="error"><?php echo $price_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($description_err)) ? 'has-error' : ''; ?>">
                            <label for="comment">Description</label>
                            <textarea class="form-control" rows="5" id="comment" name="text"value="<?php echo $description; ?>"></textarea>
                            <span class="error"><?php echo $description_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="manage_menu_adm.php" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>      
    </div>
</body>
</html>