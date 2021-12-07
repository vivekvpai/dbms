<?php
	function get_user_count(){
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"test");
		$user_count = "";
		$query = "select count(*) as user_count from details";
		$query_run = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($query_run)){
                $user_count = $row['user_count'];
            }
		return($user_count);
        }
    
?>