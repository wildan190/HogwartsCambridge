<?php
include 'includes/db.php';
?>

<?php 

if(isset($_GET['update'])){
    
    
    $id = $_GET['update'];
    

$query = "SELECT * FROM teacher WHERE id = $id";

$result = mysqli_query($conn,$query);

if(mysqli_num_rows($result) > 0){
    
    while($row = mysqli_fetch_array($result)){
        
            $name  = $row['name'];
            $NIP = $row['NIP'];
            $email = $row['email'];
            $pelajaran = $row['pelajaran'];
            $image = $row['image'];

        }
    }
}

if(isset($_POST['update'])){
    

    $name         = clean($_POST['name']);
    $NIP        = clean($_POST['NIP']);
    $email        = clean($_POST['email']);
    $pelajaran = clean($_POST['pelajaran']);
    $image_name   = $_FILES['image']['name'];
    $image        = $_FILES['image']['tmp_name'];

    $location     = "images/".$image_name;

    move_uploaded_file($image, $location);

    $query  = "UPDATE teacher SET ";
    $query .= "name = '".escape($name)."', ";
    $query .= "NIP = '".escape($NIP)."', ";
    $query .= "email = '".escape($email)."', ";
    $query .= "pelajaran = '".escape($pelajaran)."', ";
    $query .= "image = '{$image_name}' ";
    $query .= "WHERE id = {$id} ";
    
    $result = mysqli_query($conn,$query);
    
    if($result){
        
        header('location:teacher.php');
    }
    else
    {
        die('error' . mysql_error($conn));
    }
    
}

?>
<div class="container">
    <div class="jumbotron text-center">
        <h2>Crud Application Using PHP</h2>
    </div>
    <br>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" class="form-control" placeholder="Enter Name" value="<?php echo $name ?>">
    </div>
    <div class="form-group">
        <label for="name">NIP:</label>
        <input type="text" name="NIP" class="form-control" placeholder="Enter NIP" value="<?php echo $NIP ?>">
    </div>
    <div class="form-group">
        <label for="name">Email:</label>
        <input type="text" name="email" class="form-control" placeholder="Enter email" value="<?php echo $email ?>">
    </div>
    <div class="form-group">
        <label for="name">Pelajaran:</label>
        <input type="text" name="pelajaran" class="form-control" placeholder="Enter Pelajaran" value="<?php echo $pelajaran ?>">
    </div>
    <div class="form-group">
        <label for="name">Image:</label>
        <img src= "<?= "images/".$image?>" alt="" width="100px" height="100px" class="thumbnail">
        <input type="file" name="image" class="form-control" placeholder="Enter email" value="<?php echo $email ?>">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Update data" name="update">
    </div>
</form>

</div>
