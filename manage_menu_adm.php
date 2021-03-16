<!DOCTYPE html>
<html lang="en">
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="frontend/libraries/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="frontend/styles/main.css">
	<script type="text/javascript">
        $(document).ready(function(){
            $('#example').DataTable();   
        });
    </script>
</head>
<body>
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
        <div class="container">
        <h1><b>Manage Menu</b></h1>
        </div><br>
		<div class="main-content">
			<div class="container">
                <div class="col-md" id="menu">
                    <a href="add_menu.php" class="float-right btn btn-success btn-lg">+Menu</a>
                    <br>
                    <br>
				<?php
					/*if(isset($_SESSION['login']))
					{
						echo $_SESSION['login'];
						unset($_SESSION['login']);
					}*/
				?>
				<br><br>
				<?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $query = "SELECT * FROM menu ORDER BY 1 ASC;";
                    if($result = $mysqli -> query($query)){
                        if($row_count = $result->num_rows > 0){
                            echo "<table id='example' class='table table-bordered table-hover'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>Title</th>";
                                        echo "<th>Category</th>";
                                        echo "<th>Price</th>";
                                        echo "<th>Description</th>";
                                        echo "<th>Picture</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch_array()){
                                    echo "<tr>";
                                        echo "<td>" . $row['id_menu'] . "</td>";
                                        echo "<td>" . $row['title'] . "</td>";
                                        echo "<td>" . $row['category'] . "</td>";
                                        echo "<td>" . $row['price'] . "</td>";
                                        echo "<td>" . $row['description'] . "</td>";
                                        echo "<td>" . $row['img'] . "</td>";
                                        echo "<td>";
                                            echo "<a href='update_menu.php?id=". $row['id_menu'] ."' title='Update Record'><i class='fa fa-edit'></i><a>";
                                            echo "<a href='delete_menu.php?id=". $row['id_menu'] ."' title='Delete Record'><i class='fa fa-trash fa-lg'></i><a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                          
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not execute $query. " . $mysqli->error;
                    }
                    
                    // Close connection
                    $mysqli -> close();
                    ?>
                    </div>
                </div>
                
		</div>
</body>
</html>