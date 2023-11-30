
<?php
 $name = $_POST['name'];
 $mobile = $_POST['mobile']; 
 $email = $_POST['email'];
 $origin = $_POST['origin'];
 $destination = $_POST['destination'];
 $material = $_POST['material'];

 $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "order_tracking";
 
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 
 if (!$conn) {
     die("Sorry we failed to connect : " . mysqli_connect_error());
 } else {
     echo "Connection was successfull<br>";
 }

 $sql = "INSERT INTO `enquiry` (`name` ,`mobile`, `email` , `origin` , `destination` , `material`)VALUES('$name' ,'$mobile', '$email' , '$origin', '$destination', '$material')";
 $result = mysqli_query($conn, $sql);
 if($result){
     echo "<strong>Successful</strong> Your entry has been submitted successfully... <br>";
 }
 else{
     echo "Not successfull because of :" .mysqli_error($conn);
 }

/*$sql = "SELECT * FROM `registration`";
$result = mysqli_query($conn, $sql);

 $num = mysqli_num_rows($result);
 echo $num;

 if($num> 0){
    while($row = mysqli_fetch_assoc($result)){
    echo var_dump($row);
    echo "<br>";
 }
}*/

?>
