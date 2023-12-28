<?php
include_once 'login_controller.php';


if (isset($_POST["submit"])) {
    $_SESSION["current-room"] = $_POST["submit"];
}

if(isset($_POST["message"])) {
    $user_id = $_SESSION["user_id"];
    $room_id = $_SESSION["current-room"];
    $room = new Room();
    $room->insertChat($_POST["message"], $user_id, $room_id);
    exit;
}

if (isset($_POST["getMessage"])) {
    $room_id = $_SESSION["current-room"];
    echo json_encode($room->getChat($room_id));
    exit;
}

$roomObj = new Room();
$members = $roomObj->selectMembers($_SESSION["current-room"]);




