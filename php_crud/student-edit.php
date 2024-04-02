<?php
session_start();
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>EDIT</title>
  </head>
  <body>
   <div class="container mt-5">

<?php 
include('message.php');
?>


    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Student Edit
                        <a href="index.php"class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                <?php
                if(isset($_GET['id']))
                {
                 $student_id = mysqli_real_escape_string($con, $_GET['id']);//protecting from sql injection
                    $query = "SELECT  * FROM student WHERE id='$student_id' ";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run)> 0)
                    {
                    $student = mysqli_fetch_array($query_run);
                    ?>
                            <form action="code.php" method="POST">
                                <input type ="hidden"name="student_id"value="<?= $student['id']; ?>"

                        <div class="mb-3">
                        <label>Student Name</label>
                                <input type="text"name="name"value="<?=$student['name'] ?>" class="form-control">
                        </div>                 
                        <div class="mb-3">
                        <label>Student Email</label>
                                <input type="text"name="email"value="<?=$student['email'] ?>" class="form-control">
                        </div> 
                        <div class="mb-3">
                        <label>Student Phone</label>
                                <input type="text"name="phone"value="<?=$student['phone'] ?>" class="form-control">
                        </div> 
                        <div class="mb-3">
                        <label>Student Course</label>
                                <input type="text"name="course" value="<?=$student['course'] ?>"class="form-control">
                        </div>  
                        <div class="mb-3">
                            <button type="submit"name="update_student" class="btn btn-primary">Update Student</button>
                        </div>


                        </form>
                             <?php
                    
                    }
                    else
                    {
                      echo "<h4>No Such Id Found</h4>";
                    }

                }
                ?>

                    </div>
                </div>
            </div>
        </div>

    </div>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>