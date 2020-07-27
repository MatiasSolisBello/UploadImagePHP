<?php 
    if(isset($_POST['register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $address = $_POST['address'];

        move_uploaded_file($image_tmp,"../images/$image");
        $con = mysqli_connect("localhost","root","","kalaiphpforms");
        $query = "insert into user (name,email,image,address) values ('$name','$email','$image','$address')";
        $result = mysqli_query($con, $query);
        if($result==1) {       
            header('Location: ../index.php');
            
        }
        else {      
            echo "Insertion Failed";
        }
    }
?>

<html lang="en">
<head>
    <?php require_once("../include/header.php"); ?>
    <title>Upload</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
</head>
<body>
    <div class="container h-50">
    <div class="row h-50 justify-content-center align-items-center">
    <form action="add.php" method="post" enctype="multipart/form-data"> 
    <br><br>         
        <lable align="right">Name:</lable>
        <div class="form-group">
          <input type="text" name="name" class="form-control" 
          placeholder="Name" autofocus required>
        </div>
        <lable align="right">Email:</lable>
        <div class="form-group">
          <input type="email" name="email" class="form-control" 
          placeholder="Correo" autofocus required>
        </div>
        <lable align="right">Image:</lable>  <br>       
        <div class="form-group">
          <input type="file" name="image" id="profile-img" class="form-control" 
          placeholder="Imagen" autofocus required>
        </div>                   
        <img src="" id="profile-img-tag" width="100px" />

        <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function (e) {
                        $('#profile-img-tag').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#profile-img").change(function(){
                readURL(this);
            });
        </script><br>
                        
        <lable align="right">Address</lable>
        <div class="form-group">
          <input type="text" name="address" class="form-control" 
          placeholder="Direccion" autofocus required>
        </div>
        <br>
        <input type="submit" name="register"  class="btn btn-success btn-block" value="submit" />
                                
    </form>
    </div>
    </div>
</body>
</html>