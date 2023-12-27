<?php
if(isset($_POST['submit'])){
    $room_profile = $_POST['room_profile'];
    $room_name = $_POST['room_name'];
    $creator = $_POST['creator'];

    header('Location: index.php?page=room');


}