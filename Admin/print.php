<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter Students and Print PDF</title>
</head>
<body>

<h2>Filter Students and Print PDF</h2>

<form action="generate_pdf.php" method="post">
    <label for="registrationYear">Choose Registration Year:</label>
    <select name="registrationYear" id="registrationYear">
        <?php
        // Populate the dropdown with registration years from the database
        $years = range(date("Y"), 2000); // Adjust the range as needed
        foreach ($years as $year) {
            echo "<option value=\"$year\">$year</option>";
        }
        ?>
    </select>

    <button type="submit" name="submit">Print PDF</button>
</form>

</body>
</html>
