<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipment;
class DataController extends Controller
{
    public function find(){
        return json_encode(Shipment::all()->toarray());
    }

    public function findWithLimit($offset,$limit){
        return json_encode(Shipment::offset($offset)->limit($limit)->get()->toarray());
    }
    public function findWithPagination($pagination){
        return json_encode(Shipment::paginate($pagination)->toarray());
    }
    
    public function findByCriteria($criteria,$value){
        return json_encode(Shipment::where($criteria,$value)->get()->toarray());
    }

}
