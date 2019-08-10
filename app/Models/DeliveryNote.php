<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 25-May-19
 * Time: 11:29 AM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class DeliveryNote extends Model
{
    protected $table = 'delivery_note';
    protected $primaryKey = 'id_delivery';

    CONST CREATED_AT = 'publishing_date';
    CONST UPDATED_AT = NULL;

    public $fillable = ['publishing_date', 'material_name', 'material_quantity'];

    public function getOne($id)
    {
        return DeliveryNote::where($this->primaryKey, $id)->first();
    }

    public function getAll()
    {
       return $delivery = DeliveryNote::all();
    }

    public function insertDeliveryNote()
    {
        $quantity = 1;
        $id_material = 1;
        //$delivery = DeliveryNote::where($this->primaryKey, 1)->first();
        $stock = Stock::where('id_stock_material', $id_material)->first();
        $old_quantity = $stock->material_quantity;
        if (!empty($stock) && $stock->material_quantity > 0) {
            $delivery = DeliveryNote::create(['material_name' => 'Ekseri', 'material_quantity' => $quantity]);
            $stock->material_quantity = $old_quantity - $quantity;
            $stock->save();
            // TODO Mora da se kreira i relacija izmedju ova dva
            $delivery->stockDelivery()->save($stock);
            echo 'ima materiajala, moze da se napravi otpremnica';
        } else {
            echo 'nema materijala, zatrazi kasnije';
        }
    }

    public function stockDelivery()
    {
        return $this->belongsToMany('App\Models\Stock', 'relation_m_n_stock_delivery', 'id_delivery', 'id_stock');
    }

    public function updateDelivery()
    {
        $delivery = DeliveryNote::where($this->primaryKey, 1)->first();

        if ($delivery->has('stockDelivery')) {
            dd($delivery);
        } else {
            echo 'ne valja ti nesto';
        }
    }
}