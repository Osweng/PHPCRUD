<!DOCTYPE html>
<head>
        <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>

</style>
<body>
    <div class='table'>
        <table class='content-table'>
            <tbody>
            <thead>
                <tr>
                    <th>I.D.</th>
                    <th>NAME</th>
                    <th>AGE</th>
                    <th>EMAIL</th>
                    <th>GPA</th>
                </tr>
            </thead>

            <?php
            include 'conn.php';

            $sql = "SELECT * FROM student";
            $res = mysqli_query($conn,$sql);
   
            if(mysqli_num_rows($res) > 0){
                while ($row = mysqli_fetch_assoc($res)) {
                    echo "<tr>";
                    echo "<td>". $row['id'] ."</td>";
                    echo "<td>". $row['name'] ."</td>";
                    echo "<td>". $row['age'] ."</td>";
                    echo "<td>". $row['email'] ."</td>";
                    echo "<td>". $row['gpa'] ."</td>";
                    echo "</tr>";
                 }
        
                }else{

                }
            ?>
            <div class='login'>
                <div class='input'>
                <button class="btn"><a href = "index.php">Home<a></button>
                </div>
            </div>
    </tbody>  
    </div>
</body>
</table>
</html>