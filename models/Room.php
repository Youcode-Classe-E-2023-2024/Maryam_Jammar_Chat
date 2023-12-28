<?php

class Room extends Database
{
    public $room_id;
    public $name_room;
    public $creator;

    /**
     * @return mixed
     */
    public function getRooms(){
        $this->query('SELECT * FROM room');
        return $this->multiple();
    }

    /**
     * @param $room_profile
     * @param $room_name
     * @param $creator
     * @return mixed
     */
    public function create_room($room_profile, $room_name, $creator){
        $this->query("INSERT INTO room(room_name, creator, room_profile) VALUES (:room_name, :creator, :room_profile)");
        $this->bind(':room_name', $room_name);
        $this->bind(':creator', $creator);
        $this->bind(':room_profile', $room_profile);

        $this->execute();
        return $this->dbh->lastInsertId();

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

    public function insertMembers($user_id, $room_id){
        $this->query('INSERT INTO room_member(user_id, room_id) VALUES (:user_id, :room_id)');
        $this->bind(':user_id', $user_id);
        $this->bind(':room_id', $room_id);

        $this->execute();
    }

    /**
     * @return mixed
     */
    public function selectMembers($user_id){
        $this->query("select * from room_member
                            inner join users on users.user_id = room_member.user_id
                            inner join room on room.room_id = room_member.room_id
                            where room_member.room_id = room.room_id;
    ");
        $this->bind(':user_id', $user_id);
        return $this->multiple();
    }
}

$roomO = new Room();