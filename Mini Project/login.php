if (isset($_POST["loginPL"])) {
$username = $_POST["usernamePL"];
$password = $_POST["passwordPL"];

$result = mysqli_query($conn, "SELECT * FROM pelanggan WHERE username = '$username' AND password = '$password'");
$cek = mysqli_num_rows($result);
while ($pass = mysqli_fetch_array($result)) {
$id_pelanggan = $pass['id_pelanggan'];
$nama_pelanggan = $pass['nama_pelanggan'];
}

if ($cek > 0) {
$_SESSION["LoginPL"] = true;
$_SESSION["id"] = $id_pelanggan;
$_SESSION["nama"] = $nama_pelanggan;
header("Location: UserRiwayat.php");
exit;
} else {
echo ("Login Gagal!!");
}
$error = true;
}

if (isset($_POST["loginAD"])) {
$username = $_POST["usernameAD"];
$password = $_POST["passwordAD"];

$result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
$cek = mysqli_num_rows($result);
while ($results = mysqli_fetch_array($result)) {
$id_admin = $results['id_admin'];
$nama = $results['nama'];
}

if ($cek > 0) {
$_SESSION["LoginAD"] = true;
$_SESSION["id"] = $id_admin;
$_SESSION["nama"] = $nama;
header("Location: AdminService.php");
exit;
}
$error = true;
}

if (isset($_POST["loginPM"])) {
$username = $_POST["usernamePM"];
$password = $_POST["passwordPM"];

$result = mysqli_query($conn, "SELECT * FROM pemilik WHERE username = '$username'");
$cek = mysqli_num_rows($result);
while ($results = mysqli_fetch_array($result)) {
$id_pemilik = $results['id_pemilik'];
$nama = $results['nama'];
}

if (mysqli_num_rows($result) == 1) {
$_SESSION["LoginPM"] = true;
$_SESSION["id"] = $id_pemilik;
$_SESSION["nama"] = $nama;
header("Location: OwnerService.php");
exit;
}

$error = true;
}