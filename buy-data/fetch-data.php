<?php

$conn = new mysqli("localhost", "root", "", "bitmo");


if(isset($_POST['dataType'])){
    $network = $_POST['network'];
    $dataType = $_POST['dataType'];


    $sql = "SELECT * FROM data_plans WHERE network='$network' AND data_type='$dataType'";
    $res = $conn->query($sql);
    
   echo "<option>Select Data Plan</option>";
    while($row = $res->fetch_assoc()){
      echo "<option value='{$row['plan_id']}' >".$row['plan_name']."</option>";
    }
    
    // echo json_encode($data);

}




?>