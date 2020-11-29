<?php
  include('conn.php');
  if (mysqli_connect_errno())
    echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $id=$_POST['user-id'];
  $pw=$_POST['user-password'];
  $sql = "SELECT * FROM users WHERE id='$id'";
  $result = mysqli_query($conn, $sql);

  if(empty($id) || empty($pw)){
    $message = "ID or password is blank!";
    echo "<script type='text/javascript'>alert('$message'); history.back(-2); </script>";
  }
  else if( $result->num_rows == 1) {
    $row = mysqli_fetch_array($result);
    print_r($row);
    if( $pw == $row['password']) {
      session_start();
      $_SESSION['user-id']=$id;
      header('Location: ./menu.html');
    }
    else {
      $message = "Wrong Password!";
      echo "<script type='text/javascript'>alert('$message'); history.back(-2); </script>";
    }
  }
  else {
    $message = "ID does not exist!";
    echo "<script type='text/javascript'>alert('$message'); history.back(-2); </script>";
  }
?>