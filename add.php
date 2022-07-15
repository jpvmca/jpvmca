<?php
   session_start();
  if(!empty($_POST)){
      if($_POST['submit'] == 'add_data' ){
            $x = array(
                'first_name' => $_POST['first_name'],
                'last_name'  => $_POST['last_name'],
                'contact'    => $_POST['contact'],
                'email'      => $_POST['email'],
                'address'    => $_POST['address']
            );

            if(isset($_SESSION['tabledata']) && !empty($_SESSION['tabledata'])){
                $y = $_SESSION['tabledata'];
                array_push($y['table'] , $x);
                $_SESSION['tabledata'] = $y;
            }else{
                $data['table'][0]      = $x;
                $_SESSION['tabledata'] = $data;
            }      
            header('location:index.php');
      }
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
  <h2>Add Data In Session</h2>
  <form method="POST">

    <div class="form-group">
      <label for="first_name">First Name</label>
      <input type="text" class="form-control" required  placeholder="Enter First Name" id="first_name" name="first_name">
    </div>

    <div class="form-group">
      <label for="last_name">Last Name</label>
      <input type="text" class="form-control"  required placeholder="Enter Last Name" id="last_name" name="last_name">
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" required id="email" placeholder="Enter email" name="email">
    </div>
    
    <div class="form-group">
      <label for="contact">Contact</label>
      <input type="number"  class="form-control" required  placeholder="Enter Last Name" id="contact" name="contact">
    </div>
    
    <div class="form-group">
      <label for="address">Address</label>
      <input type="text" class="form-control" required placeholder="Enter Address" id="address" name="address">
    </div>

    <button type="submit" name="submit" value="add_data" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
