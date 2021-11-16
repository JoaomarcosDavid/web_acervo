<?php

    // $con = mysqli_connect('localhost','sistemasemetod43','WxVjw6uczkow','sistemasemetod43');

	$conn = mysqli_connect('localhost','root','','webacervo');
	if($conn){
 		// echo "connection sucessfull";
	}else{
		echo mysqli_error($conn);
	}


?>