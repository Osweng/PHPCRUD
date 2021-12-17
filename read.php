<?php
include 'crud.php';
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $edit = true;
    
    $record = mysqli_query($conn, "SELECT * FROM student WHERE id= $id");
    $data = mysqli_fetch_array($record);

    $id = $data['id'];
    $name = $data['name'];
    $age = $data['age'];
    $email = $data['email'];
    $gpa = $data['gpa'];

  }
?>

<!DOCTYPE html>
<head>
      <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
</style>
<body>
            <?php if (isset($_SESSION['message'])):?>
            <div class="message">
            <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);       
            ?>
            </div>
  <?php endif ?>
    <div class='table'> 
    <h1><p class='header' align='center' >Student Record</p></h1>         
    <table class='content-table'>
        <thead>
            <tr>
              <th>ID</th>
              <th>NAME</th>
              <th>AGE</th>
              <th>EMAIL</th>
              <th>GPA</th>
              <th>ACTION</th>
           </tr>
        </thead>
        </div>
      <?php
          $result = mysqli_query($conn, "SELECT * FROM student");
         while ($row = mysqli_fetch_assoc($result)) {
      ?>
            <tr>
              <td><?php echo $row["id"]; ?></td>
              <td><?php echo $row["name"]; ?></td>
              <td><?php echo $row["age"]; ?></td>
              <td><?php echo $row["email"]; ?></td>
              <td><?php echo $row["gpa"]; ?></td>
              <td><a href="update.php?edit=<?php echo $row["id"]; ?>" class="edit_btn">Edit</a>
                <a href="read.php?delete=<?php echo $row["id"]; ?>" class="del_btn">Delete</a></td>
            </tr>
      <?php
          }
      ?>
    </div>
    </table>
        <div class='login'>
            <div class="input">
                <button class="btn"><a href = "index.php">HOME<a></button> 
            </div> 
            <div class="input">
                <button class="btn"><a href = "add.php">ADD<a></button>
            </div>
        </div>

</body>
</html>