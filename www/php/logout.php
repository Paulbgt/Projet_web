<!-- // *[English]* This function is used to disconnect from his account -->
<!-- // *[Français]* Cette fonction permet de se déconnecter de son compte-->

<?php
session_start();
session_destroy();
header('Location: ../index');
?>
