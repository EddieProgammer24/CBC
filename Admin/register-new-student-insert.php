<?php
include "connect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['student_Name'];
    $cert_number=$_POST['cert_number'];
    $id = $_POST['identification_number'];


   $query = "SELECT * FROM student_info WHERE Cert_Number = '$cert_number'";

   $result = mysqli_query($conn, $query);

   if (mysqli_num_rows($result) > 0) {
      
       echo 'duplicate';
   } else {
     
       $insert_query = "INSERT INTO student_info ( Cert_Number, Student_Name, Id_Number)
       VALUES ('$cert_number','$name', '$id')";
       if (mysqli_query($conn, $insert_query)) {
       
           echo 'success';
       } else {
           
           echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
       }
   }
}
?>
  