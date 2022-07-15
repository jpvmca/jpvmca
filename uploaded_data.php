<?php
   session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
      </tr>
    </thead>
    <tbody>
        <?php
                  $servername = "localhost";
        $username = "softfix_sessioncrud";
        $password = "92VbjlIJY";
        $dbname = "softfix_sessioncrud";
                
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                
                $sql = "SELECT * FROM session_crud";
                $result = $conn->query($sql);
                $i = 1;
                if ($result->num_rows > 0) {
                   foreach($result as  $k)  
                    {
                       ?>  
                      <tr>
                        <td><?=$i++;?></td>
                        <td><?=$k['first_name'];?></td>
                        <td><?=$k['last_name'];?></td>
                        <td><?=$k['email'];?></td>
                        <td><?=$k['contact'];?></td>
                        <td><?=$k['address'];?></td>
                        
                      </tr>
                       <?php
                    }
                }
                $conn->close(); 
           
        ?>
    </tbody>
  </table>
</div>

</body>
</html>
