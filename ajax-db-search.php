<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "mvDB";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
if (isset($_GET['term'])) {
     
   $query = "SELECT * FROM Movie WHERE Title LIKE '%{$_GET['term']}%' LIMIT 10";
    $result = mysqli_query($conn, $query);
 
    if (mysqli_num_rows($result) > 0) {
     while ($user = mysqli_fetch_array($result)) {
      $res[] = $user['Title'];
     }
    } else {
      $res = array();
    }
    //return json res
    echo json_encode($res);
}
?>