<?php
error_reporting(-1);
$db = mysqli_connect("127.0.0.1", "teemosha", "Letovo1", "survey");
if($db->connect_error)
    die("Connection failed: " . $db->connect_error);
if(isset($_POST)){
    $name_ts = transliterator_transliterate('Any-Latin; Latin-ASCII;', $_POST['name']);
    $surname_ts = transliterator_transliterate('Any-Latin; Latin-ASCII;', $_POST['surname']);
    $grade = $_POST['grade'];
    $team = $_POST['team'];
    $search_res_1 = $db->query("SELECT * FROM participants WHERE name='".$name_ts."'AND surname='".$surname_ts."'AND grade=".$grade);
    $search_res_2 = $db->query("SELECT * FROM participants WHERE name='".$surname_ts."'AND surname='".$name_ts."'AND grade=".$grade);
    if(mysqli_num_rows($search_res_1) + mysqli_num_rows($search_res_2) == 0){
    if(!mysqli_query($db, "INSERT IGNORE INTO participants (grade, name, surname, team) VALUES ('".$grade."', '".$name_ts."','".$surname_ts."', '".$team."' )")){
        echo "<img src='images/failure.gif'><br>".mysqli_error($db);
    }
    else{
        echo "<img src='images/success.gif'>";
    }
    }
    else echo "<img src='images/failure.gif'><br><br><h2>THE USER IS ALREADY REGISTERED</h2>";
}
?>