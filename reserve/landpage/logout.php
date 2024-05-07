<?php 
session_start();
echo "try";
unset($_SESSION['status']);
echo "<script>alert('Logout success');window.location.href='../userlog/index.php'</script>";
?>