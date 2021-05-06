<?php

include 'db.php';


if(isset($_POST['insert'])){
    
    $name  = clean($_POST['name']);
    $NIP = clean($_POST['NIP']);
    $email = clean($_POST['email']);
    $pelajaran = clean($_POST['pelajaran']);
    
    $query = "INSERT INTO `teacher` (name,NIP,email,pelajaran) VALUES ('".escape($name)."','".escape($NIP)."','".escape($email)."','".escape($pelajaran)."') ";
    
    $result = mysqli_query($conn,$query);
    
    if($result){
        
        header('location:../teacher.php');
    }
    
}


?>