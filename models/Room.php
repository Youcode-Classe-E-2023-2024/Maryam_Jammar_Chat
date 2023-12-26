<?php

class Room extends Database
{
    public $room_id;
    public $name_room;
    public $creator;

    public function create_room($room_name, $creator){
        $this->query("INSERT INTO room(room_name, creator) VALUES (:room_name, :creator)");
        $this->bind(':room_name', $room_name);
        $this->bind(':creator', $creator);

        $this->execute();

    }

    public function edit_room($room_name, $creator, $room_id){
        $this->query("UPDATE room 
            SET room_name = :room_name,
                creator = :creator
            WHERE room_id = :room_id
    ");

        $this->bind(':room_name', $room_name);
        $this->bind(':creator', $creator);
        $this->bind(':room_id', $room_id);

        $this->execute();
    }

    public function delete_room($room_id){

        $this->query(" DELETE FROM room WHERE room_id = :room_id");
        $this->bind(':room_id', $room_id);

        $this->execute();
    }

}