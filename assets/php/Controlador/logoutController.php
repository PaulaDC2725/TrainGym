<?php
session_start();
session_destroy();
echo "<script>location.href = '../../../views/index.php';  </script>";
exit();
?>