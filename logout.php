<?php
    include('included_functions.php');
    session_start();
    session_destroy();
    redirect_to('index.php');
?>
