<?php

use Illuminate\Database\Seeder;

class DocumentSubTypes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $documentSubTypes = [
            [
                'document_type_id' => '1',
                'name' => 'HRRR'
            ],
            [
                'document_type_id' => '1',
                'name' => 'Climate Change'
            ],
            [
                'document_type_id' => '1',
                'name' => 'Health & Neutrition'
            ],
            [
                'document_type_id' => '1',
                'name' => 'Sustainable Liveyhoods'
            ],
            [
                'document_type_id' => '1',
                'name' => 'Social Development Public Health'
            ],
            [
                'document_type_id' => '1',
                'name' => 'Social Development Education'
            ],
            [
                'document_type_id' => '1',
                'name' => 'CBID / DID'
            ],
            [
                'document_type_id' => '1',
                'name' => 'Fundamental Rights'
            ],
            [
                'document_type_id' => '1',
                'name' => 'HID'
            ],
            [
                'document_type_id' => '2',
                'name' => 'Finance & Accounts'
            ],
            [
                'document_type_id' => '2',
                'name' => 'Admin'
            ],
            [
                'document_type_id' => '2',
                'name' => 'Logistic / Procurement'
            ],
            [
                'document_type_id' => '2',
                'name' => 'HRM'
            ],
            [
                'document_type_id' => '2',
                'name' => 'Safety & Security'
            ],
            [
                'document_type_id' => '3',
                'name' => 'MEAL'
            ],
            [
                'document_type_id' => '3',
                'name' => 'Audits'
            ],
            [
                'document_type_id' => '3',
                'name' => 'Evaluations'
            ],
            [
                'document_type_id' => '3',
                'name' => 'Assessment'
            ],
        ];

        foreach($documentSubTypes as $documentType){
            \App\Models\DocumentSubType::create($documentType);
        }
    }
}
