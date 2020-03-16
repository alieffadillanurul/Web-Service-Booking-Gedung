<?php
// Check for the path elements
// Turn off error reporting
error_reporting(0);

// Report runtime errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors
error_reporting(E_ALL);

// Same as error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);

// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
echo "isinya data===".$request;
echo "method===".$method;
echo "|||";
//$input = json_decode(file_get_contents('php://input'),true);
 $input = file_get_contents('php://input');
$link = mysqli_connect('localhost', 'id12804657_gedung', 'alief0400','id12804657_booking_gedung');
mysqli_set_charset($link,'utf8');
 
$data = preg_replace('/[^a-z0-9_]+/i','',array_shift($request));
echo "isinya data===".$data;
echo "|||";
$id = array_shift($request);
echo "isinya data===".$id;
echo "|||";


if (strcmp($data, 'data') ==0) {
 switch ($method) {
 case 'GET':
     {
    if (empty($id))
    {
    $sql = "select * from customer"; 
    echo "select * from customer ";break;
    }
    else
    {
         $sql = "select * from customer where Nama='$id'";
         echo "select * from customer where Nama='$id'";break;
        
        
    }
    
    
    
    
     }
 }
 
 
 
 $padil = mysqli_query($link,$sql);
 
 if (!$padil) {
 http_response_code(404);
 die(mysqli_error());
 }
 
 
 
 
 if ($method == 'GET') {
 $hasil=array();
 while($row = mysqli_fetch_array($padil, MYSQLI_ASSOC))
 {
 $hasil[]=$row;
 } 
 $hasil1 = array('status' => true, 'message' => 'Data show succes', 'data' => $hasil);
 echo json_encode($hasil1);
 
 } 
   
}

else{
 $hasil1 = array('status' => false, 'message' => 'Access Denied');
 echo json_encode($hasil1);
}

if ($method == 'POST') {
        echo "Method POST";
        echo "Data input ".$input;
        
        ////
        
        $json = json_decode($input, true);
        echo "json =".$json["Nama"] ;
        echo "Proses".$json->Nama;
        $namacs=$json["Nama"];
        $alamatcs=$json["Alamat"];
        $nocs=$json["Telepon"];
        $emailcs=$json["Email"];

		$querycek = "SELECT Nama,Alamat,Telepon,Email FROM customer WHERE Nama ='$namacs'";
		echo "query select ".$querycek;
		$padil=mysqli_query($link,$querycek);
		echo "result =".$padilt;
		
		if ( $rowcount == 0)
		{
		$query = "INSERT INTO customer (
		Nama,
		Alamat,
		Telepon,
		Email)
		VALUES (				
		'$namacs',
		'$alamatcs',
		'$nocs',
		'$emailcs')";
		echo "query ".$query;
		mysqli_query($link,$query);
		}
		else if ($rowcount > 0)
		{
		$query = "UPDATE customer SET
		Alamat = '$alamatcs'
		Telepon = '$nocs'
		Email = '$emailcs'
		WHERE Nama = '$namacs'";
		echo "query ".$query;
		mysqli_query($link,$query);
		}
        
        
        
        
        /////
        }
        
mysqli_close($link);
?>
