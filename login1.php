<?php
    //include koneksi database
    include "connection.php";

    //jika tombol login ditekan, maka akan mengirimkan variabel yang berisi username dan password
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $userpass = $_POST['password']; //password yang di inputkan oleh user lewat form login

        //query ke database
        $sql = mysqli_query($db, "SELECT username, level_user, password   FROM agen WHERE username = '$username'");

        list($username, $level_user, $password) = mysqli_fetch_array($sql);

        //jika data ditemukan dalam database, maka akan melakukan validasi dengan password_verify
        if (mysqli_num_rows($sql) > 0) {
              
            /* validasi login dengan password_verify */
            if (password_verify($userpass, $password)) {
                if ($level_user==1) {
                //buat session baru
                session_start();
                $_SESSION['username'] = $username;
                
                //jika login berhasil sebagai admin, user akan diarahkan ke halaman home admin
                header("Location: index2.html");
                die();
             }

            else if ($level==2) {  

                //buat session baru
                session_start();
                $_SESSION['username'] = $username;
                
                //jika login berhasil sebagai guest, user akan diarahkan ke halaman home guest
                header("Location: index2.html");
                die();
             }}
            else{

                //jika password salah
               echo '<script language="javascript">
                     window.alert("Password atau Username salah, silakan coba lagi!");
                      window.location.href="./";
                     </script>';
            }
            }
        else {
                //Jika password dan username kosongs, maka user akan diarahkan ke form login dan menampilkan pesan error
                echo '<script language="javascript">
                       window.alert("Password atau Username salah, silakan coba lagi!");
                     window.location.href="./";
                      </script>';
            }
        }
        
?>