<?php
// Include config file
require_once "config.php";
if(isset($_POST['add_menu'])){
    $title = $_POST['title'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    //$gambar = file($_POST['gambar']);

    $direktori = "images/";  

    $tmp_name = $_FILES["images"]["tmp_name"];
    $name = pathinfo($_FILES["images"]["name"], PATHINFO_EXTENSION);
    $nama_baru = $_POST['title'].".".$name;
    move_uploaded_file($tmp_name, $direktori."/".$nama_baru);
    $gambar = $nama_baru;

    $query_tambah_masakan = "INSERT INTO menu VALUES ('','$title','$price','$category','$description','$gambar')";
    $sql_tambah_masakan= mysqli_query($mysqli, $query_tambah_masakan);
    if($sql_tambah_masakan){
    if(isset($_REQUEST['batal_menu'])){
    //echo $_REQUEST['hapus_menu'];
    if(isset($_SESSION['edit_menu'])){
      unset($_SESSION['edit_menu']);
    }
  }

  if(isset($_POST['ubah_menu'])){
    $title = $_POST['title'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $gbr = $_FILES["gambar"]["name"];

    $query_ubah_masakan = "UPDATE menu SET title = '$title', price = '$price', category = '$category', description = '$description' WHERE id_menu = '$id_masakan'";;
    $sql_ubah_masakan = mysqli_query($conn, $query_ubah_masakan);

    //$gambar = file($_POST['gambar']);
    if($gbr != "" || $gbr != null){
      $direktori = "gambar/";  

      $tmp_name = $_FILES["images"]["tmp_name"];
      $name = pathinfo($_FILES["images"]["name"], PATHINFO_EXTENSION);
      $nama_baru = $_POST['title'].".".$name;
      unlink('images/'.$gambar_masakan);
      move_uploaded_file($tmp_name, $direktori."/".$nama_baru);
      $gambar = $nama_baru;

      $query_ubah_gambar = "UPDATE menu SET img = '$gambar' WHERE id_menu = '$id_masakan'";;
      $sql_ubah_gambar = mysqli_query($mysqli, $query_ubah_gambar);
    }

    if($sql_ubah_masakan){
      unset($_SESSION['edit_menu']);
    }
  }
?>
 
<!DOCTYPE html>
<html>
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
    <script type="text/javascript">
    function preview(gambar,idpreview){
    var gb = gambar.files;
    for (var i = 0; i < gb.length; i++){
      var gbPreview = gb[i];
      var imageType = /image.*/;
      var preview=document.getElementById(idpreview);            
      var reader = new FileReader();
      if (gbPreview.type.match(imageType)) {
        preview.file = gbPreview;
        reader.onload = (function(element) { 
          return function(e) { 
            element.src = e.target.result; 
          }; 
        })(preview);
        reader.readAsDataURL(gbPreview);
        } else{
          alert("Type file tidak sesuai. Khusus image.");
        }
                   
        }    
    }
    </script>
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
                        <div class="control-group">
                            <label class="control-label">Nama Masakan:</label>
                            <div class="controls">
                            <?php 
                                if(isset($_SESSION['edit_menu'])){
                            ?>
                            <input name="" type="text" value="<?php echo $title; ?>" class="span11" placeholder="Nama Masakan" disabled=""/>
                            <input name="nama_masakan" type="hidden" value="<?php echo $title; ?>" class="span11" placeholder="Nama Masakan"/>
                            <?php
                                } else {
                            ?>
                            <input name="nama_masakan" type="text" value="" class="span11" placeholder="Nama Masakan"/>
                            <?php
                            }
                            ?>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Harga / Porsi :</label>
                            <div class="controls">
                            <input name="harga" type="text" value="<?php echo $harga; ?>" class="span11" placeholder="Rupiah" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Gambar Masakan :</label>
                                <div class="control-group">
                                    <div class="controls">
                                        <input class="span11" value="" name="images" type="file" accept="image/*"  onchange="preview(this,'previewne')"/>
                                    </div>
                                </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"></label>
                            <div class="control-group">
                                <div class="controls">
                                    <img src="images/<?php echo $gambar_masakan;?>" id="previewne" class="rounded border p-1" style="width:110px; height:70px;">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                        <?php
                            if(isset($_SESSION['edit_menu'])){
                        ?>
                            <button type="submit" name="ubah_menu" class="btn btn-info"><i class='icon icon-save'></i>&nbsp; Simpan Perubahan</button>
                        <?php
                            } else {
                        ?>
                        <button type="submit" name="tambah_menu" class="btn btn-success"><i class='icon icon-plus'></i>&nbsp; Tambahkan</button>
                        <?php
                            }
                        ?>
                        <button type="submit" name="batal_menu" class="btn btn-danger"><i class='icon icon-remove'></i>&nbsp; Batalkan</a>
                        </div>
                        <a href="add_menu.php" class="btn btn-danger">Cancel</a>
                    </form>
            </div>
        </div>    
    </div>
</body>
</html>