<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">

	<title>Register New Student</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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

  <form class="form-style-9" action="register-new-student-insert.php" method="POST" id="form1">
    <div class="form-style-heading">
      <center>
      <h3>REGISTER A NEW STUDENT</h3>
    </center>
    </div>
    <ul>
    <li>
      <label for="">Student Name</label>
        <input type="text" name="student_Name" class="field-style field-split align-left" placeholder="Enter Student Name" required />
    </li>
    
    <li>
      <label for="">Certificate Number</label>
        <input type="text" name="cert_number" class="field-style field-split align-left" placeholder="Enter certification number " required />
    </li>

    <li>
      <label for="">Identificatin number</label>
        <input type="text" name="identification_number" class="field-style field-split align-left" placeholder="Enter identification number " required />
    </li>
  
   
    <li>
    <input type="submit" name="submit" value="submit" />
    </li>
    </ul>
    </form>
    <script>
$(document).ready(function(){
    $('#form1').submit(function(event){
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'register-new-student-insert.php', // Path to  PHP script handling insertion
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