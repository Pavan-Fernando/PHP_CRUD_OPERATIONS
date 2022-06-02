<?php
session_start();

   require 'dbConnection.php';

   if(isset($_POST['delete_student'])){

        $studentID = mysqli_real_escape_string($conn, $_POST['dele_hidden']); 

        $query = "DELETE FROM students WHERE id='studentID' "; 

        $query_run = mysqli_query($conn, $query);

        if($query_run){
            
            $_SESSION['message'] = "Student Deleted Sucessfully!!";
            header("Location: index.php");
            exit(0);
        }
        else{

            $_SESSION['message'] = "Student not Deleted!!";
            header("Location: index.php");
            exit(0);
        }
   }

   if(isset($_POST['update_student'])){

        $studentID = mysqli_real_escape_string($conn, $_POST['stdID']);
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $course = mysqli_real_escape_string($conn, $_POST['course']);

        $query = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' WHERE id='$studentID'"; 
        $query_run = mysqli_query($conn, $query);

        if($query_run){
            
            $_SESSION['message'] = "Student Updated Sucessfully!!";
            header("Location: index.php");
            exit(0);
        }
        else{

            $_SESSION['message'] = "Student not Updated!!";
            header("Location: index.php");
            exit(0);
        }
   }
   
   if(isset($_POST['save_student'])){

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $course = mysqli_real_escape_string($conn, $_POST['course']);

        $query = "INSERT INTO students (name, email, phone, course) VALUES ('$name', '$email', '$phone', '$course')";

        if(mysqli_query($conn, $query)){
            
            $_SESSION['message'] = "Student Created Sucessfully!!";
            header("Location: student-create.php");
            exit(0);
        }
        else{

            $_SESSION['message'] = "Student not Created!!";
            header("Location: student-create.php");
            exit(0);
        }
   }
?>