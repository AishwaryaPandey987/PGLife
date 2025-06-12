<?php
 $conn=mysqli_connect( "127.0.0.1", "root", "", "pglife");

 if(mysqli_connect_errno()){
  //Throw error message based on ajax or not
  echo "Failed to connect with mysql ! Please contact to admin";
  return;
 }
