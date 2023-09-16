<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Shipment extends Model
{
    use HasFactory;

    protected $fillable = ['shipment_id', 'purchase_date', 'ship-to_name', 'customer_email', 'grant_total', 'status'];
   /* protected $dateFormat = 'M j Y h:i:s A';
    protected $casts = [
        'purchase_date' => 'datetime:M j Y h:i:s A'
    ];
*/
}
