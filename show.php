<?php
    require('function.php');
    session_start();
    if($_SESSION['id'] == session_id())
    {
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection,"test");
        $name = "";
        $cono = "";
        $date = "";
        $gender = "";
        $count = 0;
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Show</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- CSS -->
    <link rel="stylesheet" href="scss/show.scss">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <nav class="navbar navbar-dark navbar-expand-sm navbar-color">
        <div class="container">
            <a class="navbar-brand" href="#"> DBMS MINI PROJECT </a>
            <ul class="nav navbar-nav navbar navbar-right">
                <li class="nav-item"><a class="nav-link " href="dashboard.php"> Home</a></li> &nbsp
                <li class="nav-item"><a class="nav-link " href="add.php"> Add</a></li> &nbsp
                <li class="nav-item"><a class="nav-link active" href="show.php"> Show</a></li> &nbsp
                <li class="nav-item "><a class="nav-link btn-pd" href="logout.php"> Logout</a></li> &nbsp  
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div cla="col-lg-12">
            <div class="row">
                <h2>Welcome : <?php echo $_SESSION['email'] ?> </h2>
            </div>
        </div>
    </div>

    <div class="container ">
        <div class="scrol">
            <table class="table table-hover table-bordered pd" >
                <thead class="table-info">
                    <tr>
                        <th> S.no </th>
                        <th> Contact Name </th>
                        <th> Contact No </th>
                        <th >DOB </th>
                        <th> Gender</th>
                        <th> Options </th>
                    </tr>
                </thead>

                <!--php show student-->
                <?php

                    $query = "select * from details ORDER BY name";
                    $query_run = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($query_run))
                    {
                        $name = $row['name'];
                        $cono = $row['cono'];
                        $date = $row['date'];
                        $gender = $row['gender'];
                        $count = $count + 1 ;
                        ?>

                        <tr>
                            <th scope="row"><?php echo $count ?></th>
                            <th><?php echo $name ?></th>
                            <td><?php echo $cono ?></td>
                            <td><?php echo $date ?></td>
                            <td><?php echo $gender ?></td>
                            <td>
                                <a type="button" class="btn btn-success" href="update.php?id=<?php echo $row['name'];?>"> Update</a> &nbsp &nbsp
                                <a type="button" class="btn btn-danger" href="delete.php?id=<?php echo $row['name'];?>"> Delete </a>
                            </td>
                        </tr>

                        <?php
                    
                    }
                ?>                            
                

            </table>
        </div>
    </div>

    <footer class="footer col-lg-12">
        <div class="container-fluid">
            <div class="row">             

                <div class="offset-1 col-lg-2 align-self-center">
                    <div class="text-center">
                        <p>
                        DBMS Hands on session <br>
                            Dept of ISE.
                        </p>
                    </div>
                </div>

                <div class="offset-1 col-lg-3">
                    <h6>Page creator</h6>
                    <h7>About Me</h7>
                    Web Developer<br>
                    Vivek V Pai<br>
                    7 sem, ISE<br>
                    Don Bosco Institute of Technology<br>
                </div>

                <div class="col-lg-3 col-sm-5 offset-1">
                    <h5>For creation mail to :</h5>
                    <i class="fa fa-envelope fa-lg"></i>paivivek002@gmail.com <br> <br>
                    <a href="https://www.linkedin.com/in/vivek-v-pai-6b674b1b8/" target="_blank" class="fa fa-linkedin"></a>   
                    <a href="#" target="_blank" class="fa fa-github"></a>
                </div>
                    
            </div>
        </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<?php 
    }
    else
        {
            header("location:login.php");
        } 
?>