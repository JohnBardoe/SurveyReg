<?php
error_reporting(-1);
$db = mysqli_connect("127.0.0.1", "teemosha", "Letovo1", "survey");
if($db->connect_error)
    die("Connection failed: " . $db->connect_error);
if(isset($_POST)){
    $name_ts = transliterator_transliterate('Russian-Latin/BGN', $_POST['name']);
    $surname_ts = transliterator_transliterate('Russian-Latin/BGN', $_POST['surname']);
    var_dump($name_ts, $surname_ts);
    $grade = $_POST['grade'];
    $team = $_POST['team'];
    $search_res = $db->query("SELECT * FROM participants WHERE name='".$name_ts."'AND surname='".$surname_ts."'AND grade=".$grade);
    if(mysqli_num_rows($search_res) == 0){
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