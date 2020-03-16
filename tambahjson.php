<html>
<head>
<title>Sistem Booking Gedung</title>
</head>
<body>
<?php
if (isset ($_POST['Nama'])) {
$url = 'https://falkonvirus.000webhostapp.com/jsonmhsw.php';
//$data = "[{\"Nama\":\".$_POST['Nama'].\",\"Alamat\":\".$_POST['Alamat'].\",\"Telepon\":\".$_POST['Telepon'].\",\\"Email\":\".$_POST['Email'].\"}]";//
$data="{\"Nama\":\"".$_POST['Nama']."\",\"Alamat\":\"".$_POST['Alamat']."\",\"Telepon\":\"".$_POST['Telepon']."\",\"Email\":\"".$_POST['Email']."\"}";
echo "datanya ".$data;
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$response = curl_exec($ch);
echo "response ".$response;
curl_close($ch);
}
?>
<form method="POST" action="tambahjson.php">
<table>
<tr>
<td>Nama</td>
<td><input type="text" name="Nama" id="Nama"></td>
</tr>
<tr>
<td>Alamat</td>
<td><input type="text" name="Alamat" id="Alamat"></td>
</tr>
<tr>
<td>Telepon</td>
<td><input type="text" name="Telepon" id="Telepon"></td>
</tr>
<tr>
<td>Email</td>
<td><input type="text" name="Email" id="Email"></td>
</tr>
<tr>
<tr>
<tr>
<td><input type="submit" name="submit" id="submit" value="Tambah"></td>
<td></td>
</tr>
</table>
</form>
</body>
</html>
