<?php
	session_start();
	if($_SESSION['id'] == session_id())
	{
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"test");
	$query = "delete from details where name = '$_GET[id]'";
	$query_run = mysqli_query($connection,$query);
	
    }
    else
        {
            header("location:login.php");
        } 
?>
?>
<script type="text/javascript">
	alert("Deleted...");
	window.location.href = "show.php";
</script>