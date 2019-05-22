<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Damage;

class DamageController extends Controller
{
    //
    private $damage;
    public function __construct()
    {
        $this->damage = new Damage();
    }

    public function insertDamage()
    {
        $this->damage->insertDamage();
    }
    public function deleteDamage($id)
    {
        // pitaj da li postoji => pa ga onda izbrisi
        $this->damage->deleteDamage($id);
    }
    public function updateDamage()
    {
        $this->damage->updateDamage();
    }
}
