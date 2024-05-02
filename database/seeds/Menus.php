<?php

use Illuminate\Database\Seeder;

class Menus extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'name' => 'BRV',
            ],
            [
                'name' => 'BPV',
            ],
            [
                'name' => 'CPV',
            ],
            [
                'name' => 'CRV',
            ],
            [
                'name' => 'JV',
            ],
            [
                'name' => 'Documents',
            ],
            [
                'name' => 'User Registration',
            ],
            [
                'name' => 'Company Registration',
            ],
            [
                'name' => 'Project Registration',
            ],
            [
                'name' => 'Donor Registration',
            ],
            [
                'name' => 'Bank Registration',
            ],
            [
                'name' => 'Financial Year',
            ]
        ];

        foreach($menus as $area){
            \App\Menu::create($area);
        }
    }
}
