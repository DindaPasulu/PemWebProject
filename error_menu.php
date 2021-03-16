<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 750px;
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
                <div class="col-md">
                    <div class="page-header">
                        <h1>Invalid Request</h1>
                    </div>
                    <div class="alert alert-danger fade in">
                        <p>Sorry, you've made an invalid request. Please <a href="index.php" class="alert-link">go back</a> and try again.</p>
                    </div>
                </div>
            </div>        
    </div>
</body>
</html>