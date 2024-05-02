<?php

use Illuminate\Database\Seeder;

class GovtDocumentTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $documentTypes = [
            [
                'name' => 'Rescue 1122',
            ],
            [
                'name' => 'District Administration',
            ],
            [
                'name' => 'DDMA',
            ],
            [
                'name' => 'PDMA',
            ],
            [
                'name' => 'NDMA',
            ],
            [
                'name' => 'EAD',
            ],
            [
                'name' => 'FBR',
            ],
            [
                'name' => 'Livestock Department',
            ],
            [
                'name' => 'Agriculture Department',
            ],
            [
                'name' => 'Education Department',
            ],
            [
                'name' => 'Government Agencies',
            ],
            [
                'name' => 'SECP',
            ],
            [
                'name' => 'Others',
            ],
        ];

        foreach($documentTypes as $documentType){
            \App\Models\GovtDocumentTypes::create($documentType);
        }
    }
}
