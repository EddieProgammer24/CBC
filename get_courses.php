<?php
// Establish connection to database
$connection = mysqli_connect("localhost", "root", "", "jsuars");

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Fetch courses based on selected university
$universityId = $_GET['university_id'];
$query = "SELECT Course_Code, Course_Name FROM course WHERE University_Code = ?";
$stmt = mysqli_prepare($connection, $query);

// Bind the parameter
mysqli_stmt_bind_param($stmt, "i", $universityId);

// Execute the query
mysqli_stmt_execute($stmt);

// Get the result
$result = mysqli_stmt_get_result($stmt);

// Check if query executed successfully
if (!$result) {
    echo "Error: " . mysqli_error($connection);
    exit();
}

// Populate dropdown with courses
$options = "";
while ($row = mysqli_fetch_assoc($result)) {
    $options .= "<option value='" . $row['Course_Code'] . "'>" . $row['Course_Name'] . "</option>";
}

// Close connection
mysqli_close($connection);

echo $options;
?>
