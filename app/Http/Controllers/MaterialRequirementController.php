<?php

namespace App\Http\Controllers;

use App\Models\MaterialRequirement;
use Illuminate\Http\Request;

class MaterialRequirementController extends Controller
{
    //
    private $material;

    public function __construct()
    {
        $this->material = new MaterialRequirement();
    }

    public function insertMaterialRequirement()
    {
        $this->material->insertMaterialRequirement();
        return;
    }
    public function getUserRequirement()
    {
        $requirement = $this->material->getUserRequirement();
        return $requirement;
    }
    public function delete()
    {
        $this->material->deleteRequirement(1);
    }
}
