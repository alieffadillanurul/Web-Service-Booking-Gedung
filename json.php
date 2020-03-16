<?php
 
$connect=mysqli_connect("localhost", "id12804657_gedung", "alief0400","id12804657_booking_gedung");
 
$query = "SELECT * from customer ";
$padil = mysqli_query($connect,$query) or die(mysqli_error());
 
$arr = array();
while ($row = mysqli_fetch_assoc($padil)) {
    $temp = array(
    "nama" => $row["Nama"],
    "alamat" => $row["Alamat"], 
    "no" => $row["Telepon"],
    "email" => $row["Email"]);
   
    array_push($arr, $temp);
}
 
$data = json_encode($arr);
 
echo "{\"MENAMPILKAN DATA CUSTOMER\":" . $data . "}";
?>
