<?php 
    session_start(); 
    require ('dbConnection.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PHP Learning</title>
  </head>
  <body>
   

    <div class="container mt-5">
        <?php include('message.php'); ?>       
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Edit
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php 
                            if(isset($_GET['id'])){
                                // $studentId = $_GET['id'];
                                $studentId = mysqli_real_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM students WHERE id = '$studentId'";
                                $query_run = mysqli_query($conn, $query);

                                if(mysqli_num_rows($query_run) > 0){
                                    $student = mysqli_fetch_array($query_run);
                                    ?>
                                        <form action="code.php" method="POST">
                                            <input type="hidden" name="stdID" value="<?=$student['id']; ?>">
                                            <div class="mb-3">
                                                <label>Student Name</label>
                                                <input type="text" name="name" value="<?=$student['name']; ?>" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label>Email</label>
                                                <input type="email" name="email" value="<?=$student['email']; ?>" class="form-control">
                                            </div> 
                                            <div class="mb-3">
                                                <label>Phone No</label>
                                                <input type="text" name="phone" value="<?=$student['phone']; ?>" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label>Student Course</label>
                                                <input type="text" name="course" value="<?=$student['course']; ?>" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <button class="btn btn-primary" type="submit" name="update_student">Update Student</button>
                                            </div> 
                                        </form>
                                    <?php
                                }
                                else{
                                    echo "<h5>No Such Id Found</h5>";
                                }
                            }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>