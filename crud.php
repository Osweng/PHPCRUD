<?php
    include 'conn.php';
    $name = "";
    $age = "";
    $email = "";
    $gpa = "";
    $id = "";
    $edit = false;
    
    if (isset($_POST['save'])) {
      $name = $_POST['name'];
      $age = $_POST['age'];
      $email = $_POST['email'];
      $gpa = $_POST['gpa'];
    
     $sql = "INSERT INTO student (name,age,email,gpa) VALUES ('$name','$age','$email','$gpa')";
     if (mysqli_query($conn, $sql)) { 
       $_SESSION['message'] = "?><script>alert('Student Record Successfully Added!')</script><?php";
        header("Location: read.php");
       } else {
        mysqli_close($conn);
       }
       
    }  
    if (isset($_POST['update'])) {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $age = $_POST['age'];
      $email = $_POST['email'];
      $gpa = $_POST['gpa'];
    
      mysqli_query($conn, "UPDATE student SET name='$name', age='$age', email='$email', gpa='$gpa' WHERE id=$id");
      $_SESSION['message'] = "?><script>alert('Student Record Successfully Updated!')</script><?php";
      header('location: read.php');
    }


    if (isset($_GET['delete'])) {
      $id = $_GET['delete'];
      
      mysqli_query($conn, "DELETE FROM student WHERE id=$id");
      $_SESSION['message'] = "?><script>alert('Student Record Successfully Deleted!')</script><?php";
      header('location: read.php');
    }
?>

