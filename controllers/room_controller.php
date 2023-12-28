<?php
include_once 'controllers/login_controller.php';
if(isset($_POST['insertMembers'])){
    $creator = $_SESSION['user_id'];
    extract($_POST);

    global $roomO;

    $room_id = $roomO->create_room($room_profile, $room_name, $creator);


    foreach($members as $member) {
        $roomO->insertMembers($member, $room_id);
    }

    $room_members = $roomO->selectMembers($creator);

    header('Location: index.php?page=room');

}