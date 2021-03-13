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
        <h1><b>Dashboard</b></h1>
        </div>
        <br><br>
        <div class="row justify-content-center">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">MENU</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="manage_menu_adm.php" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">CUSTOMER</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
        </div>
</body>
</html>