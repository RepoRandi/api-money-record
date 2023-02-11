<?php
include "../connection.php";

$id_user = $_POST['id_user'];
$id_history = $_POST['id_history'];
$date = $_POST['date'];

$sql = "SELECT * FROM history
        WHERE
        id_user='$id_user' AND id_history='$id_history' AND date='$date'
        ";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode(array(
        "success" => true,
        "data" => $data[0]
    ));
} else {
    echo json_encode(array(
        "success" => false
    ));
}
