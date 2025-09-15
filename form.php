<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'aniweb';
// Establish database connection
$conn =mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check connection
if (!$conn) 
{
    die("error detected".mysqli_error($conn));
}

if(isset($_POST['submit']))
{
$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$adults = $_POST['num_adults'];
$children = $_POST['num_children'];
$pnumber = $_POST['mobile_number'];
$date = $_POST['visit_date'];
$time = $_POST['visit_time'];

}
// Insert data into table
$sql = "INSERT INTO tickets (firstname, lastname, num_adults, num_children, mobile_number , visit_date, visit_time ) VALUES ('$fname','$lname','$adults','$children','$pnumber','$date','$time')";

if ($conn->query($sql) === TRUE)
{
    echo"New record created successfully";
} 
else {
    echo "Error: ".$sql."<br>".$conn->error;
}
$conn->close();*/
?>