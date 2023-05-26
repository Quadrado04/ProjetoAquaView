<?php
    session_start();
    unset($_SESSION["user"]);
    unset($_SESSION["adm"]);
    header("Location: ../../index.php");