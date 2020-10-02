<?php
    session_start();

    //jika tidak ada session/session kosong, maka user akan di arahkan ke halaman index
    if (empty($_SESSION['username'])) 
    {
        header("Location: ../");
    }
    //include koneksi database
    include "connection1.php";
?>
