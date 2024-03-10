<?php

include "connect.php";

if(isset($_POST['update'])){
    $ucode = $_POST['University_code'];
    $university_id = $_POST['university_id'];
    $uname = $_POST['University_Name'];

    $sql = "UPDATE `university` SET `University_code`='$ucode',`University_Name`='$uname' WHERE `id`='$university_id'";

    $result = $conn->query($sql);

    if($result == TRUE) {
        echo "Record updated succefully.";
       header('Location:register-new-university.php');
    }else{
        echo "Eroor:" . $sql . "<br>" . $conn->error;
    }
}

if(isset($_GET['id'])){
    $university_id = $_GET['id'];

    $sql = "SELECT * FROM  `university` WHERE `id`='$university_id'";

    $result = $conn->query($sql);

    if($result->num_rows > 0) { 

    while($row = $result->fetch_assoc()){
        $U_code = $row['University_code'];
        $uname = $row['University_Name'];
        $id = $row['id'];
    }
    ?>


<!DOCTYPE html>
<html>
<head>
    <title> Register New University</title>
<link rel="stylesheet" href="style.css">

</head>
<body>

<?php
         include('sidebar.php');   
    ?> 


    <form action="" method="post" class="form-style-9">
         <div class="form-style-heading">
      <center>
      <h3>REGISTER A NEW UNIVERSITY</h3>
    </center>
    </div>

    <ul>
        <li>
            <label for="" >University Code:</label>
             <input type="text" name="University_code" class="field-style field-split align-left" value="<?php echo $U_code;?>">
            <input type="hidden" name="university_id" value="<?php echo $id;?>">
        </li>

        <li>
             <label for="">University Name:</label>
            <input type="text" name="University_Name" class="field-style field-split align-left" value="<?php echo $uname;?>">
        </li>        
            <br>
    <li>
    <input type="submit" value="Update" name="update" />
    <input type="submit" value="Reset" />
    </li>
    
    </ul>
        
    </form>

</body>
</html>
<?php

}else{
    header('Location:view.php');
}
}
?>