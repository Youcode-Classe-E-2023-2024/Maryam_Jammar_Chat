<?php
if(isset($_POST['submit'])){
    $room_profile = $_POST['room_profile'];
    $room_name = $_POST['room_name'];
    $creator = $_SESSION['user_id'];
    $members = $_POST['members'];

    global $roomO;

    $room_id = $roomO->create_room($room_profile, $room_name, $creator);

    foreach ($members as $member):
        $roomO->insertMembers($member, $room_id);

    endforeach;

    header('Location: index.php?page=room');

}