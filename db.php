
<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'sistema_usuario'
) or die(mysqli_erro($mysqli));

?>