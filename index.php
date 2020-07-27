<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <?php require_once("include/header.php"); ?>
</head>
<body>
    <?php
        $con = mysqli_connect("localhost","root","","kalaiphpforms");
    ?>
    <form class="text-center border border-light p-2">
    <p class="h4 mb-4">Administrador de Productos</p>
    <div class="form-row mb-2">
        <div class="col">
            <input id="entradafilter" type="text" class="form-control" placeholder="Filtrado">
        </div>
        <div>
            <a href="model/add.php" class="btn btn-success">Agregar producto</a>
        </div>
    </div>
</form>
    <!-- ADD TASK FORM -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>email</th>
                <th>image</th>
                <th>address</th>
            </tr>
        </thead>
        <tbody class="contenidobusqueda">
            <?php
            $query = "SELECT * from user";
            $result_tasks = mysqli_query($con, $query);    
            while($row = mysqli_fetch_assoc($result_tasks)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo '<img src="images/'.$row['image'].'".php?" alt="Img" style="height: 12%;"/>'; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td>
                    <!--BOTONES-->
                    <a href="404.php?id=<?php echo $row['id']?>" 
                    class="btn btn-secondary"><i class="fas fa-marker"></i>
                    <br>

                    <a href="model/delete.php?id=<?php echo $row['id']?>" 
                    class="btn btn-danger"><i class="far fa-trash-alt"></i>
                    <br>

                    <a href="model/buy.php?id=<?php echo $row['id']?>" 
                    class="btn btn-primary"><i class="fas fa-shopping-cart"></i>
                    </a>
                </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php require_once("include/footer.php"); ?>
</body>
</html>


