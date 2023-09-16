<?php

namespace Database\Seeders;

use App\Models\Shipment;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShipmentCSVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            $csvFile = fopen(public_path("data.csv"), "r");
            $firstline = true;
            while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
                if ($firstline) {
                   $firstline = false;
                    continue;
                }

                if (empty(Shipment::where('shipment_id', $data[0])->get()->toarray())) {
                    foreach ($data as $element) $element=ltrim($element, ' ');

                    DB::table('shipments')->insert([
                        'shipment_id' => $data[0],
                        'purchase_date' => Carbon::createFromFormat('M j Y h:i:s A', ltrim($data[1],' '))->format('Y-n-d H:i:s'),
                        'ship-to_name' => ltrim($data[2],' '),
                        'customer_email' => ltrim($data[3],' '),
                        'grant_total' => ltrim($data[4],' '),
                        'status' => ltrim($data[5],' ')
                    ]);
                }
            }

        }
        catch(\Exception $e) {

        } finally {
            fclose($csvFile);
        }


    }
}
