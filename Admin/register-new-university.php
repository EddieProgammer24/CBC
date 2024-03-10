<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Register New University</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
     include('sidebar.php');   
  ?> 
  <?php
  include "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $code = $_POST['code'];
  $Uname=$_POST['Uname'];
  

  $sql = "INSERT INTO university (University_code, University_Name)
   VALUES ('$code', '$Uname')";
  
  if ($conn->query($sql) === TRUE) {
    echo '<script type="text/javascript">';
    echo 'alert("University added succesfully");';
    echo 'window.location=\'register-new-university.php\';';
    echo '</script>';
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();  // Close the database connection
}
  ?>

  <form  action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="POST" class="form-style-9">
    <div class="form-style-heading">
      <center>
      <h3>REGISTER A NEW UNIVERSITY</h3>
    </center>
    </div>
    <ul>
    <li>
      <label for="" >University Code:</label>
        <input type="number" name="code" class="field-style field-split align-left" placeholder="Enter University Code" required />
    </li>
    <li>
      <label for="">University Name:</label>
        <input type="text" name="Uname" class="field-style field-split align-left" placeholder="Enter University Name" required />
    </li>
    <table>
      <div>
        <center>
          <h3 class="form-style-heading">REGISTERED UNIVERSITIES</h3>
        </center>
      </div>
     
          <thead>
              <tr>
                  <th>ID</th>
                  <th>University Code</th>
                  <th>University Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
              </tr>
          </thead>
          <tbody>
              <?php
include "connect.php";
$sql= "SELECT * FROM university";  

      $row = mysqli_query($conn,$sql);
      
                 if(!empty($row))
                 foreach($row as $rows)
                { 
              ?>
              <tr >
                  <td><?php echo $rows['id'];?></td>
                  <td><?php echo $rows['University_code']; ?></td>
                  <td><?php echo $rows['University_Name']; ?></td>
                  <td> <a  class ="" href="edit-university-info.php?id=<?php echo $rows['id']; ?>">Edit</a></td>
                  <td> <a  class ="" href="admin_delete_data.php?Id=<?php echo $rows['University_code']?>">Delete</a></td> 
              </tr>
              <?php } ?>
          </tbody>
      </table><br>
  
    <li>
    <input type="submit" value="Submit" />
    <input type="submit" value="Reset" />
    </li>
    </ul>
    </form>
</body>
</html>