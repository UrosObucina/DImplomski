<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    // update moze da se uradi ali kakav razmotriti jos!!
    public function insertRoom()
    {
        $room = new Room();
        $room->insertRoom();
        //return 'usao';
    }
    public function getRoom()
    {
        $room = new Room();
        $room->getRoom();
    }
    public function deleteRoom(){
        $room = new Room();
        $room->deleteRoom();
    }
}
