<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">
    
    
    <title>report</title>
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
        <form class="form-style-9" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <div class="form-style-heading">
      <center>
      <h3>Print Report </h3>
    </center>
    </div>
    <ul>
    <li>
    <label for="">Student Lists</label>
    <select id="sess1" name="sess1" class="field-style field-split align-right">
        <option value="">Filter by Year</option>
        <option value="">Select University</option>
        <option value="">Select University</option>
    </select><br><br>
    </li>
    <li>
    <label for="">University lists</label>
    <select id="sess2" name="sess2" class="field-style field-split align-right">
        <option value="">Filter Type</option>
        <option value="">Select University</option>
        <option value="">Select University</option>
    </select><br><br>
    </li>
    
    <li>
    <label for="">Courses</label>
    <select id="sess3" name="sess4" class="field-style field-split align-right">
        <option value="">Filter by Level</option>
        <option value="">Select University</option>
        <option value="">Select University</option>
    </select><br><br>


    <li>
    <input type="submit" class="bi bi-printer" name="submit" value="print" />
   
    </li>
    </ul>
	</section>
	
	

	<script src="script.js"></script>
</body>
</html>