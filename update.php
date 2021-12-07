<?php
    require('function.php');
    session_start();
    if($_SESSION['id'] == session_id())
    {
        $connection = mysqli_connect ("localhost","root","");
        $db = mysqli_select_db ($connection,"test");
        $name = "";
        $cono ="";
        $date = "";
        $gender = "";
        $query = "select * from details where name = '$_GET[id]'";
        $query_run = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($query_run)){
            $name = $row['name'];
            $cono = $row['cono'];
            $date = $row['date'];
            $gender = $row['gender'];
        }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="scss/update_s.scss">
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
                <li class="nav-item"><a class="nav-link " href="show.php"> Show</a></li> &nbsp
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

    <div class="contaioner-fluid header col-lg-12">
        <div class="row justify-content-center">
            <form action="" method="post" class="p-3 col-lg-6 ">
                <div class="form-group">
                    <label>contact Name :</label>
                    <input type="text" name="name" id="name" class="form-control"  placeholder="Enter name " value="<?php echo $name;?>" required> <br>
                </div>

                <div class="form-group">
                    <label>Contact No :</label>
                    <input type="number" name="cono" id="cono" class="form-control"  placeholder="Enter number " value="<?php echo $cono;?>" required> <br>
                </div>

                <div class="form-group">
                    <label>DOB :</label>
                    <input type="date" name="date" id="date" class="form-control" value="<?php echo $date;?>" required> <br>
                </div>
                
                <?php 
                    if($gender == "male")
                    {
                        ?>
                            <div class="form-group">
                                <label> Gender : </label> &nbsp
                                <input type="radio" id="male" name="gender" value="male" required checked>
                                <label for="male"> Male </label> &nbsp
                                <input type="radio" id="female" name="gender" value="female" required>
                                <label for="female"> Female </label><br>
                            </div>
                        <?php
                    }
                ?>

                <?php 
                    if($gender == "female")
                    {
                        ?>
                            <div class="form-group">
                                <label> Gender : </label> &nbsp
                                <input type="radio" id="male" name="gender" value="male" required >
                                <label for="male"> Male </label> &nbsp
                                <input type="radio" id="female" name="gender" value="female" required checked>
                                <label for="female"> Female </label><br>
                            </div>
                        <?php
                    }
                ?>

                
                <button class="btn btn-primary" name="update">Update</button>
            </form>
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
    
    if(isset($_POST['update'])){
        $connection = mysqli_connect ("localhost","root","");
        $db = mysqli_select_db ($connection,"test");
        $query = "update details set name = '$_POST[name]', email = '$_SESSION[email]', cono = '$_POST[cono]', date = '$_POST[date]', gender = '$_POST[gender]' where name = '$_GET[id]'";
        $query_run = mysqli_query($connection,$query);

        ?>
        <script type="text/javascript">
            alert("updated successfully...");
            window.location.href = "show.php";
        </script>
    <?php
    }
?>
