<?php
$con = mysqli_connect("localhost","root","","kalaiphpforms");
?>
<form class="text-center border border-light p-2">
    <p class="h4 mb-4">Administrador de Productos</p>
    <div class="form-row mb-2">
        <div class="col">
            <input id="entradafilter" type="text" class="form-control" placeholder="Filtrado">
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
            <th>addgrew</th>
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
                    <td><?php echo '<img src="images/'.$row['image'].'".php?" alt="Img" style="height: 15%;"/>'; ?></td>
                </tr>
        <?php } ?>
    </tbody>
</table>