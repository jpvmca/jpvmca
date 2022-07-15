<?php
   session_start();

   if(!empty($_POST)){
     if($_POST['submit'] == 'upload_data' ){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "softfix_sessioncrud";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        if(isset($_SESSION['tabledata']) && !empty($_SESSION['tabledata'])){
            $data = $_SESSION['tabledata']['table'] ;
            if(!empty($data)){
                foreach($data as $x => $k)  
                {
                    $sql = "INSERT INTO session_crud (first_name, last_name, email , contact , address)
                    VALUES ( '".$k['first_name']."', '".$k['last_name']."', '".$k['email']."' , '".$k['contact']."' , '".$k['address']."')";
                    $conn->query($sql);
                }  
                $_SESSION['tabledata'] = '';
                echo "Uploaded Successfully!!";
            }
        }          
        $conn->close(); 
     } 
   }    
   if(isset($_GET['delete'])){
        $y = $_SESSION['tabledata'];
        unset($y['table'][$_GET['delete']]);
        $_SESSION['tabledata'] = $y;
        header('location:index.php');
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>View Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container pt-5">
  <h2>Session Crud <a href="add.php"><button class="btn btn-primary btn-sm">Add </button></a> 
      <form method="post">
          <button class="btn btn-info" type="submit" name="submit" value="upload_data" >Upload Data</button>
      </form>
      <a href="uploaded_data.php"> <button class="btn btn-dark" type="button" >View Uploaded Data</button></a>
     </h2>
  
  <table class="table">
    <thead>
      <tr>
        <th>Sn.</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Address</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        <?php
             if(isset($_SESSION['tabledata']) && !empty($_SESSION['tabledata'])){
                $data = $_SESSION['tabledata']['table'] ;
                if(!empty($data)){
                    $i=1;
                    foreach($data as $x => $k)  
                    {
                       ?>  
                      <tr>
                        <td><?=$i++;?></td>
                        <td><?=$k['first_name'];?></td>
                        <td><?=$k['last_name'];?></td>
                        <td><?=$k['email'];?></td>
                        <td><?=$k['contact'];?></td>
                        <td><?=$k['address'];?></td>
                        <td>
                            <a href="edit.php?id=<?=$x;?>">
                                <button class="btn btn-primary btn-sm">Edit</button>
                            </a>
                            <a href="index.php?delete=<?=$x;?>">
                                <button class="ml-1 btn btn-sm btn-danger">Delete</button>
                            </a>
                        </td>
                      </tr>
                       <?php
                    }
                }
             }
        ?>
    </tbody>
  </table>
</div>

</body>
</html>
