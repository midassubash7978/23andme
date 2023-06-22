<?php
ini_set ("memory_limit","100GB");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "23andme";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$query = "SELECT * FROM `surnames_file01` UNION SELECT * FROM `surnames_file02` UNION SELECT * FROM `surnames_file03` UNION SELECT * FROM `surnames_file04`";
$result = $conn->query($query);
if ($result) {
    while($row = $result->fetch_assoc()){
      $content = json_decode($row['content'],true);
      $datas[] = $row['surname'];
      $datas[] = $content['census'];
      $data['data'][] = $datas; 
    }
} else {
    echo $query . "<br>" . $conn->error;exit;
}
echo json_encode($data);
?>