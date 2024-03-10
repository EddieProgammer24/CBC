!DOCTYPE html>
<html>
<head>
    <title>Insert Data</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<form id="insertForm" method="post" action="insert.php">
    <input type="text" name="data_to_insert" placeholder="Enter data">
    <button type="submit">Submit</button>
</form>

<script>
$(document).ready(function(){
    $('#insertForm').submit(function(event){
        event.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
            type: 'POST',
            url: 'insert.php', // Path to  PHP script handling insertion
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

</body>
</html>
