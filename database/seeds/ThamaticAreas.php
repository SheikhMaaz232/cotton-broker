<?php

use Illuminate\Database\Seeder;

class ThamaticAreas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            [
                'name' => 'DRR & HRRR (Disaster Risk Reduction, Humanitarian  Response Recovery and Rehabilitation)',
            ],
            [
                'name' => 'Sustainable Livelihoods and Food and Nutrition Security',
            ],
            [
                'name' => 'Social Development  ( Primary Education, Public Health)',
            ],
            [
                'name' => 'Human and Invitational Development (HID)',
            ],
            [
                'name' => 'Cross Cutting Themes (Resilience, Gender Mainstreaming, Environment',
            ],
            [
                'name' => 'Fundamental Rights',
            ]

            ];

        foreach($areas as $area){
            \App\ThamaticArea::create($area);
        }
    }
}
