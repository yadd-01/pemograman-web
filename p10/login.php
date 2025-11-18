<?php
$username = $_POST['username'];
$password = $_POST['pass'];
if (($username == "yad") && ($password == "yad") ||
    ($username == "admin") && ($password == "admin")) {
    echo "Login sukses";
}
else {
    echo "Login gagal";
}
?>