<?php
    ob_start();
    session_start();
    $user        = $_POST['id_user'];
    $password    = $_POST['password_user'];
    $_SESSION['id_user'] = $id_user;
        $Open = mysqli_connect("localhost","root","","penjualan");
            if (!$Open){
            die ("Koneksi ke Engine MySQL Gagal !");
                }
        $Koneksi = mysqli_select_db($Open,"penjualan");
            if (!$Koneksi){
            die ("Koneksi ke Database Gagal !");
            }
    $sql = "SELECT * FROM admin where id_user='$user'";
    $qry = mysqli_query($sql);
    $num = mysqli_num_rows($qry);
    $row = mysqli_fetch_array($qry);

    if ($num==0 OR $password!=$row['password_user']) {
    ?>
        <script language="JavaScript">
            alert('ID atau Password tidak sesuai !');
            document.location='index.php';
        </script>
    <?php
    }
    else {
        $_SESSION['penjualan']=1;
        header("Location: home.php");
    }
    mysqli_close($Open); //Tutup koneksi engine MySQL
?>