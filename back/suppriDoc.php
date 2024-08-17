<?php
include_once './../back/crudDoctor.php';

$Doctor = new CrudUser();
$Doctor->deleteUser($_GET["id_user"]);

// Redirect to doctorTab.php after deletion
echo '<div>User deleted successfully.</div>';
header('Location: doctorTab.php');
exit;
?>
