<?php
   session_start();

   if(!empty($_POST)){
        if($_POST['submit'] == 'edit_data' ){
            
            $x = array(
                'first_name' => $_POST['first_name'],
                'last_name'  => $_POST['last_name'],
                'contact'    => $_POST['contact'],
                'email'      => $_POST['email'],
                'address'    => $_POST['address']
            );
            $id = $_POST['id'];

            if(isset($_SESSION['tabledata']) && !empty($_SESSION['tabledata'])){
                $y = $_SESSION['tabledata'];
                $y['table'][$id] = $x;
                $_SESSION['tabledata'] = $y;
            }   
            header('location:index.php');
        }
    }


  if(isset($_GET['id'])){
        $arr        = $_SESSION['tabledata'];
        $arr_c      = array_column($arr, $_GET['id']);
        $arr_c      = $arr_c[0];
        $first_name = $arr_c['first_name'];
        $last_name  = $arr_c['last_name'];
        $contact    = $arr_c['contact'];
        $email      = $arr_c['email'];
        $address    = $arr_c['address'];
        $id         = $_GET['id'];
  }else{
     header('location:index.php');
  } 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Session Crud Add</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Edit Data</h2>
  <form method="POST">
    <input type="hidden" name="id" value="<?=$id;?>" />
    <div class="form-group">
      <label for="first_name">First Name</label>
      <input type="text" class="form-control" value="<?=$first_name;?>"  required placeholder="Enter First Name" id="first_name" name="first_name">
    </div>

    <div class="form-group">
      <label for="last_name">Last Name</label>
      <input type="text" class="form-control" value="<?=$last_name;?>" required placeholder="Enter Last Name" id="last_name" name="last_name">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" value="<?=$email;?>" id="email" required placeholder="Enter email" name="email">
    </div>
    
    <div class="form-group">
      <label for="contact">Contact</label>
      <input type="number"  value="<?=$contact;?>" class="form-control"  required placeholder="Enter Last Name" id="contact" name="contact">
    </div>
    
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" class="form-control" value="<?=$address;?>" required placeholder="Enter Address" id="address" name="address">
    </div>

    <button type="submit" name="submit" value="edit_data" class="btn btn-default">Update</button>
  </form>
</div>

</body>
</html>
