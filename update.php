<?php
session_start();
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
      <title>ADMIN PAGE</title>
      <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style></style>
<body>

            <?php if (isset($_SESSION['message'])):?>
            <div class="message">
            <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);       
            ?>
            </div>
  <?php endif ?>
        <div class='box'>
           <form class="login" align=center method="POST" action="crud.php">
            <h1><p class='header'>Update Record</p></h1>
            <div class="input">
                <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>">
            </div>
            <div class="input">
                <input type="int" name="age" placeholder="Age" value="<?php echo $age; ?>">
            </div>
            <div class="input">
                <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>">
            </div>
            <div class="input">
                <input type="float" name="gpa" placeholder="Gpa" value="<?php echo $gpa; ?>">
            </div>
            <div class="input">
              <?php if ($edit == false): ?>
                <button class="btn" type="submit" name="save" >Save</button>
              <?php else: ?>
                <button class="btn" type="submit" name="update" >Update</button>
                <div class="input">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
              </div>
              <?php endif ?>
              </div>
          </form>
        </div>
</body>
</html>
