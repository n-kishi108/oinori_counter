<?php
function get_count() {
    $mysqli = new mysqli('localhost', 'root', '', 'oinori');
    $select = "SELECT `cnt` FROM `counter` WHERE `userid`='admin'";
    $result = $mysqli->query($select);
    if($result != ''){
        while($row = $result->fetch_assoc()) {
            return $row['cnt'];
        }
    }else{
        return '0';
    }
};

$count = get_count();

$mysqli = new mysqli('localhost', 'root', '', 'oinori');
$num = intval($count);
$num++;
$update = "UPDATE `counter` SET `cnt` = $num WHERE `userid`='admin'";
$result = $mysqli->query($update);
if($result) {
    $request = get_count();
    echo $request;
}else{
    echo $count;
}
?>