<?php
session_start();
session_destroy();
echo "<script>location.href = '../../../views/login.php';  </script>";
exit();
?>