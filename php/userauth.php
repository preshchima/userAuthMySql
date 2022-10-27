<?php

require_once "../config.php";

//register users
function registerUser($fullnames, $email, $password, $gender, $country){
    //create a connection variable using the db function in config.php
    $conn = db();
    $query = "SELECT * FROM Students WHERE email='$email'";
    $result = mysqli_query($conn, $query);
       //check if user with this email already exist in the database
       if (mysqli_num_rows($result) >= 1){
        echo "<script>alert('User email already exists')</script>";
        header('refresh: 1; url=../forms/register.html');
       }else{
        $query = "INSERT INTO `Students`(`full_names`, `country`, `email`, `gender`, `password`) VALUES ('$fullnames','$country', '$email', '$gender', '$password')";
        $result = mysqli_query($conn, $query);
        if ($result){
            echo "<script>alert('User successfully created')</script>";
            header("refresh: 1; url=../forms/login.html");

        }
        else{
            echo "<script>alert('An error occured, please try again')</script>";
        }
       }
}


//login users
function loginUser($email, $password){
    $conn = db();
       
    $query = "SELECT * FROM Students WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0){
        session_start();
        $_SESSION['username'] = $email;
        header("Location: ../dashboard.php");
    }else {
        header("Location: ../forms/login.html?message=invalid");
    }
  
   
}


function resetPassword($email, $password){
    $conn = db();
    $query = "SELECT * FROM Students WHERE email='$email'";
    $result = mysqli_query($conn,$query);
    if (mysqli_num_rows($result) > 0){

    $query = "UPDATE Students SET password='$password' WHERE email='$email'";
    $result = mysqli_query($conn,$query);

    if ($result){
        echo "<script> alert('Password updated successfully')</script>";
        header("refresh: 1; url=../forms/login.html");

    }else{
        echo "<script> alert('User does not exist')</script>";
        header("refresh: 1; url=../forms/resetpassword.html");
    }
    }else {
    echo "error occurred";
    }
}

function getusers(){
    $conn = db();
    $sql = "SELECT * FROM Students";
    $result = mysqli_query($conn, $sql);
    echo"<html>
    <head></head>
    <body>
    <center><h1><u> ZURI PHP STUDENTS </u> </h1> 
    <table border='1' style='width: 700px; background-color: magenta; border-style: none'; >
    <tr style='height: 40px'><th>ID</th><th>Full Names</th> <th>Email</th> <th>Gender</th> <th>Country</th> <th>Action</th></tr>";
    if(mysqli_num_rows($result) > 0){
        while($data = mysqli_fetch_assoc($result)){
            //show data
            echo "<tr style='height: 30px'>".
                "<td style='width: 50px; background: blue'>" . $data['id'] . "</td>
                <td style='width: 150px'>" . $data['full_names'] .
                "</td> <td style='width: 150px'>" . $data['email'] .
                "</td> <td style='width: 150px'>" . $data['gender'] . 
                "</td> <td style='width: 150px'>" . $data['country'] . 
                "</td>
                <form action='action.php' method='post'>
                <input type='hidden' name='id'" .
                 "value=" . $data['id'] . ">".
                "<td style='width: 150px'> <button type='submit', name='delete'> DELETE </button>".
                "</tr>";
        }
        echo "</table></table></center></body></html>";
    }
    //return users from the database
    //loop through the users and display them on a table
}


function logout(){
    if($_SESSION['username']){
        session_unset();
        session_destroy();
        header("location: ../index.php?message=logout");
    }else{
        header("location: ../forms/login.php");
    }
}

 function deleteaccount($id){
     $conn = db();
     $query = "SELECT * FROM Students WHERE id=$id";
     $result = mysqli_query($conn,$query);
     if (mysqli_num_rows($result) > 0){
     //delete user with the given id from the database
     $query = "DELETE FROM Students WHERE id=$id";
     $result = mysqli_query($conn, $query);
     if ($result){
        echo "<script>alert('User Deleted')</script>";
        header("refresh: 1; url=action.php?all=");
     }
    }
 }
