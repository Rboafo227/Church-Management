<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/sweetalert2.css">
    <script type="text/javascript" src="assets/js/sweetalert2.all.js"></script>
    <title>Document</title>
</head>

<body>

</body>
<script>
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to Log Out!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((result) => {
        if (result.value) {
            Swal.fire(
                'Logged Out!',
                'See You Again.',
                'success',
                'timer: 1500',
                window.location.href = "logout.php"
            )
        }else{
            window.location.href = "index.php"
        }
    })
</script>

</html>