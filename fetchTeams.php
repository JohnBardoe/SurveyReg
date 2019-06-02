<?php
$db = mysqli_connect("127.0.0.1", "teemosha", "Letovo1", "survey");
if($db->connect_error)
    die("Connection failed: " . $db->connect_error);
$result = mysqli_query($db,"SELECT * FROM participants");
$prts = array(array(array(),array(),array(),array(),array()), //7grade, teams 1-5
    array(array(),array(),array(),array(),array()), //8grade, teams 1-5
    array(array(),array(),array(),array(),array(),array())); //9grade, teams 1-6
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        array_push($prts[$row["grade"]][$row["team"]],$row["name"]." ".$row["surname"]);
    }
}
echo json_encode($prts);
?>