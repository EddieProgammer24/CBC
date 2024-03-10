<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">
	<title>Register New Course</title>
	 <!-- Include SweetAlert library -->
	 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   
</head>
<body>

<?php
    include "siderbar.php";
    ?>



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
       <!--
      	<a href="#" class="nav-link">Categories</a>
      -->
			<form action="#">
				<div class="form-input">
					<input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
      <!--
        	<a href="#" class="notification">
				<i class='bx bxs-bell' ></i>
				<span class="num">8</span>
			</a>
      -->

			<a href="#" class="profile">
				<img src="img/people.png">
			</a>
		</nav>

  <!--
    form
  -->
 

  <form class="form-style-9" action="register-new-course-insert.php" method="POST" id="submitForm">
    <div class="form-style-heading">
      <center>
      <h3>REGISTER A NEW COURSE</h3>
    </center>
    </div>
    <ul>
    <li>
      <label for="">Course Code:</label>
        <input type="number" name="course_code" class="field-style field-split align-left" placeholder="Enter Course Code" required />
    </li>
    <li>
      <label for="">Course Name:</label>
        <input type="text" name="course_name" class="field-style field-split align-left" placeholder="Enter Course Name" required/>
    </li>
    <li>
      <label for="">University Code:</label>
        <input type="number" name="university_code" class="field-style field-split align-left" placeholder="Enter University Code" required />
    </li>
    <table>
    <thead>
        <tr>
            <th>Course Code</th>
            <th>Course Name</th>
            <th>University Code</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
     <tbody>
              <?php
include "connect.php";
$sql= "SELECT * FROM course";  

      $row = mysqli_query($conn,$sql);
      
                 if(!empty($row))
                 foreach($row as $rows)
                { 
              ?>
              <tr >
                  <td><?php echo $rows['Course_Code']; ?></td>
                  <td><?php echo $rows['Course_name']; ?></td>
                  <td><?php echo $rows['University_Code']; ?></td>
                  <td> <a  class ="" href="admin-edit-course.php?Id=<?php echo $rows['Course_Code']?>">Edit</a></td>
                  <td> <a  class ="" href="admin-delete-course.php?Id=<?php echo $rows['Course_Code']?>">Delete</a></td> 
              </tr>
              <?php } ?>
          </tbody>
</table><br>
  
    <li>
    <input type="submit" name="submit" value="submit" />
    <input type="reset" value="Reset" />
    </li>
    </ul>
    </form>
    <script>
$(document).ready(function(){
    $('#submitForm').submit(function(event){
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'register-new-course-insert.php', // Path to  PHP script handling insertion
            data: formData,
            success: function(response){
                if(response == 'duplicate'){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Data already exists!',
                    });
                } else if(response == 'success'){
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Data inserted successfully!',
                    });
                    location.reload();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response,
                    });
                }
            }
        });
    });
});
</script>
	</section>
	
	

	<script src="script.js"></script>
</body>
</html>