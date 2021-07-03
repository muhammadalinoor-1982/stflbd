<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;

class AgroProductImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key=>$value){
            if($key>0){
                DB::table('agro_products')->insert([
                    'agro_id'=>$value[0],
                    'name'=>$value[1],
                    'description'=>$value[2],
                    'color'=>$value[3],
                    'size'=>$value[4],
                    'quantity'=>$value[5],
                    'regular_prise'=>$value[6],
                    'special_prise'=>$value[7],
                    'discount_prise'=>$value[8],
                    'bulk_prise'=>$value[9],
                    'cultivation_time'=>$value[10],
                    'harvesting_time'=>$value[11],
                    'image'=>$value[12],
                    'status'=>$value[13],
                    'creator'=>$value[14],
                    'updater'=>$value[15],
                ]);
            }
        }
    }
}
