<?php

use Illuminate\Database\Seeder;

class DocumentTypes extends Seeder
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
                'name' => 'Programme',
            ],
            [
                'name' => 'Support Programme',
            ],
            [
                'name' => 'Quality and Accountability',
            ],
        ];

        foreach($documentTypes as $documentType){
            \App\Models\DocumentType::create($documentType);
        }
    }
}
