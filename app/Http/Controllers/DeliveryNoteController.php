<?php

namespace App\Http\Controllers;

use App\Models\DeliveryNote;
use Illuminate\Http\Request;

class DeliveryNoteController extends Controller
{
    //
    private $delivery;

    public function __construct()
    {
        $this->delivery = new DeliveryNote();
    }

    public function getAll()
    {
        return $this->delivery->getAll();
    }

    public function getOne($id)
    {
        return json_decode($this->delivery->getOne($id), true);
    }

    public function insertDelivery()
    {
        $this->delivery->insertDeliveryNote();
    }

    public function stockDeliveryRelation()
    {
        $this->delivery->insertStockForDelivery();
    }

    public function deleteDamage($id)
    {
        // pitaj da li postoji => pa ga onda izbrisi
        //$this->delivery->deleteDamage($id);
    }

    public function updateDamage()
    {
        //$this->delivery->updateDamage();
    }
}
