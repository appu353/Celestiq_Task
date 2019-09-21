<?php

   $conn = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server

   $db = mysqli_select_db($conn,"registration"); // Selecting Database from Server

   if(isset($_POST['submit']))  { // Fetching variables of the form which travels in URL

   $firstname = $_POST['fname'];

   $lastname = $_POST['lname'];

   $email = $_POST['email'];

   $contact_no = $_POST['mno'];

   $password_1 = $_POST['pwd'];

    $date = date("y-m-d");

   $login_date = date("y-m-d  h:i:sa");


   if($firstname !=''||$lastname !=''||$email !=''||$contact_no !=''||$password_1!='')  {
  
    //Insert Query of SQL

    mysqli_query($conn,"insert into users(first_name,last_name,email,contact_no,password_1,date,login_date) values('$firstname', '$lastname', '$email', '$contact_no', '$password_1','$date', '$login_date')");

    header("location:registerSuccess.html");
   }
     else  {

          echo "<p>Insertion Failed <br/> Some Fields are Blank....!!</p>";
   }
}

mysqli_close($conn); // Closing Connection with Server
?>