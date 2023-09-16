<?php

namespace Database\Seeders;

use App\Models\Shipment;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipmentXMLSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $xmlString = file_get_contents(public_path('data.xml'));
        $xmlObject = simplexml_load_string($xmlString);

        $json = json_encode($xmlObject);
        $data = json_decode($json, true);

        $rows=$data['Worksheet']['Table']['Row'];
        unset($rows[0]);

        foreach ($rows as $row) {
            if(empty(Shipment::where('shipment_id',$row['Cell'][0]['Data'])->get()->toarray())){
                DB::table('shipments')->insert([
                    'shipment_id' => $row['Cell'][0]['Data'],
                    'purchase_date' => Carbon::createFromFormat('M j Y h:i:s A', $row['Cell'][1]['Data'])->format('Y-n-d H:i:s'),
                    'ship-to_name' => $row['Cell'][2]['Data'],
                    'customer_email' => $row['Cell'][3]['Data'],
                    'grant_total' => $row['Cell'][4]['Data'],
                    'status' => $row['Cell'][5]['Data']
                ]);
            }
        }

    }
}
