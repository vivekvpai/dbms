<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS -->
    <link rel="stylesheet" href="scss/login_style.scss">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
        <div class="col-lg-12">
            <div class="row justify-content-center">
                <div class="box1"></div>
                <div class="box2"></div>
                <div class="card col-lg-6">
                    <div class="card-header bg-warning text-white"><h2>Login</h2></div>
                    <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                            <button type="submit" name="login" class="btn btn-success">Login</button>
                            <a href="index.php" class="btn btn-primary"> Sign Up </a>
                        </form>
                        <!-- code for login -->
                        <?php
                            session_start();
                            if(isset($_POST['login']))
                            {
                                $connection = mysqli_connect("localhost","root","");
                                $db = mysqli_select_db($connection,"test");
                                $query = "select * from user where email = '$_POST[email]'";
                                $query_run = mysqli_query($connection,$query);
                                while($row = mysqli_fetch_assoc($query_run))
                                {
                                    if($row['email'] == $_POST['email'])
                                    {
                                        if ($row['password'] == $_POST['password'] ) 
                                        {
                                            $_SESSION['email'] = $row['email'];
                                            $_SESSION['id'] = session_id();
                                            header("Location:dashboard.php");
                                            exit();
                                        }
                                    
                                        else
                                        {
                                        ?>
                                            <div class="alert alert-danger" role="alert">
                                                Wrong Password!
                                            </div>
                                        <?php
                                        }
                                    }
                                    
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
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