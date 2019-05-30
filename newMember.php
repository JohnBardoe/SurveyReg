<?php
$db = mysqli_connect("127.0.0.1", "teemosha", "Letovo1", "survey");
if($db->connect_error)
    die("Connection failed: " . $db->connect_error);
if(isset($_POST)){
    if(!mysqli_query($db, "INSERT INTO participants (grade, name, surname, team) VALUES ('".$_POST['grade']."', '".$_POST['name']."','".$_POST['surname']."', '".$_POST['team']."' )")){
        echo "<img src='images/failure.gif'><br>".mysqli_error($db);
    }
    else{
        echo "<img src='images/success.gif'>";
    }
}
?>