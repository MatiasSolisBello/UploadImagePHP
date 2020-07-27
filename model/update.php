<?php
$con = mysqli_connect("localhost","root","","kalaiphpforms");

$name = '';
$email = '';
$image = '';
$image_tmp ='';
$address = '';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM user WHERE id= $id";
    $result = mysqli_query($con, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $email = $row['email'];
        $image = $row['image'];
        //$image_tmp =$row['image_tmp'];
        $address = $row['address'];

    }
}

if(isset($_POST['update'])){
    $id = $_GET['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $address = $_POST['address'];


    $query = "UPDATE producto SET 
    name = '$name', 
    email = '$email',
    image = '$image',
    image_tmp = '$image_tmp',
    address = '$address' WHERE id = $id";

    mysqli_query($con, $query);
    header('Location: ../index.php');
}
?>

<!-- BOOTSTRAP 4 -->
<link rel="stylesheet" href="https://bootswatch.com/4/yeti/bootstrap.min.css">

<!--FORMULARIO-->
<div class="container h-50">
    <div class="row h-50 justify-content-center align-items-center">
    <form action="update.php?id=<?php echo $_GET['id']; ?>" method="POST">
    <br>
    <br>
    <h1>Actualizar</h1>
    <br>
    <lable align="right">Name:</lable>
    <div class="form-group">
        <input type="text" name="name" class="form-control" 
        value="<?php echo $name; ?>" placeholder="Name">
    </div>

    <lable align="right">Email:</lable>
    <div class="form-group">
        <input type="email" name="email" class="form-control" 
        value="<?php echo $email; ?>" placeholder="email">
    </div>

    <lable align="right">Image:</lable>  <br>  
    <div class="form-group">
        <input type="file" name="image" id="profile-img" class="form-control" 
        placeholder="Imagen" autofocus required >
    </div> 
    <img src="" id="profile-img-tag" width="100px"/>

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
        value="<?php echo $address; ?>" placeholder="Direccion" autofocus required>
    </div>
    <br>


    <input type="submit" name="update" class="btn btn-success btn-block" value="Actualizar">
    </form>
    </div>
</div> -->
<?php require_once("../include/footer.php"); ?>