<?php 
    session_start();
    require('dbConnection.php');

    $query = "SELECT * FROM students";
    $query_run = mysqli_query($conn, $query);
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
                <div class="card-header">
                    <h4>Student Details 
                        <a href="student-create.php" class="btn btn-primary float-end">Add Student</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Student Name</th>
                                <th>Email</th>
                                <th>phone</th>
                                <th>Course</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if(mysqli_num_rows($query_run) > 0){
                                    foreach($query_run as $value){
                            ?>          
                                        <tr>
                                            <td><?php echo $value['id']; ?></td>
                                            <td><?php echo $value['name']; ?></td>
                                            <td><?php echo $value['email']; ?></td>
                                            <td><?php echo $value['phone']; ?></td>
                                            <td><?php echo $value['course']; ?></td>
                                            <td>
                                                <a href="student-view.php?id=<?php echo $value['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                <a href="student-edit.php?id=<?php echo $value['id']; ?>" class="btn btn-success btn-sm">Edit</a>

                                                <form action="code.php" method="POST" class="d-inline">
                                                    <input type="hidden" name="dele_hidden" value="2">
                                                    <button type="submit" name="delete_student" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr> 
                            <?php 
                                    }
                                }
                                else{
                                    echo "<h5>No Records Found </h5>";
                                }
                            ?>  
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>