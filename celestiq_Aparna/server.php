<!DOCTYPE html>
<html>
<head>
     <title>Login Page</title>
     <style>
         table, td, th {  
                    border: 2px solid #000000;
                    text-align: left;
                    }

         table {
              table-align:center;
              background-color: antiquewhite;
              border-collapse: collapse;
              width: 100%;
              }

        th, td {
                text-align:center;
                padding: 15px;
               }
     </style>
</head>
<?php

   $conn = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server

   $db = mysqli_select_db($conn,"registration"); // Selecting Database from Server

   // Check connection

   if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

   $email = $_POST['email'];

   $password = $_POST['pass'];

   $sql="SELECT * FROM users WHERE email = '$email' and password_1 = '$password' ";
   
   $result = mysqli_query($conn, $sql);

   if ($result==TRUE)

   {
     
   //display data in the form of table
	       echo "<table border='3'><tr>
                     <th>First name</th>
                     <th>Last name</th>
                     <th>Email Id</th>
                     <th>Contact number</th>
                     <th>Accont created date</th>
                     <th>Last login</th>
                     </tr>";
     // output data of each row

    while ($row = mysqli_fetch_assoc($result))

   {
    echo "<tr>";
    echo"<td>". $row["first_name"]."</td>"; 
    echo"<td>". $row["last_name"]."</td>"; 
    echo"<td>". $row["email"]."</td>"; 
    echo"<td>". $row["contact_no"]."</td>";
    echo"<td>". Date($row["date"])."</td>";  
    echo"<td>". Date($row["login_date"])."</td>";
   }
     echo "</table>";
   }
   else
   {  
     echo"Invalid UserId and Password";
   }
 
	 //Update DATETIME for LAST LOGIN
	 
	   //current date and time
       $date = date('Y-m-d h:i:s');
	   
	   //update date and time for to fetch last login, when new logged in
       $SqlUpdate="UPDATE `users` set login_date='$date' where email='$email' and password_1='$password'";
	   
	   //execute update query
       mysqli_query($conn, $SqlUpdate);
    

// close database connection
  
 mysqli_close($conn);
?>
</html>