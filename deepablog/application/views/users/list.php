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
        <?php if(!empty($users_data)){
            $i = 0;
            foreach($users_data as $val)
            {
                $i++;
         ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $val->name; ?></td>
            <td><?php echo $val->email; ?></td>
            <td><?php echo $val->address; ?></td>
            <td><button class="btn-blue">Edit</button><button class="btn-red">Delete</button></td>
        </tr>
    <?php } }else{ ?>
        <tr> <td> No records found</td> </tr>
     <?php }?>
    </table>
</body>
</html>