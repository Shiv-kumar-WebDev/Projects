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
    <form action="<?php echo base_url('Users/insert') ?>" method="post" >
        <h1>Enter Data</h1>
        <input type="text" placeholder="Name" name="name">
        <input type="email" placeholder="Email" name="email">
        <input type="text" placeholder="Address" name="address">
        <input type="submit" value="submit">
    </form>
</body>
</html>