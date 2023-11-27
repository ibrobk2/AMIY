<?php
$conn = new mysqli("localhost", "root", "", "bitmo");


if(isset($_POST['plan_id'])){
    $plan_id = $_POST['plan_id'];


$sql = "SELECT amount FROM data_plans WHERE plan_id=$plan_id"; 
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();

    echo $row['amount'];

}else{
    echo 0;
}


}


?>