<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
</head>
<body>
    <h1>Crud app</h1>
    <a href="<?php echo base_url('Users/create'); ?>"><button class="btn-blue">Add</button></a>
    <table border="1">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Address</td>
            <td>Action</td>
        </tr>
        <tr>
            <td>1</td>
            <td>shiv</td>
            <td>shiv@gmail.com</td>
            <td>delhi</td>
            <td><button class="btn-blue">Edit</button><button class="btn-red">Delete</button></td>
        </tr>
    </table>
</body>
</html>