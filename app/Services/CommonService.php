<?php

namespace App\Services;

/*
 * Class CommonService
 * @package App\Services
 * */

use App\Attachments;
use App\Bank;
use App\Models\DocumentSubType;
use App\Models\DocumentType;
use App\Models\Donor;
use App\Models\GovtDocumentTypes;
use App\ThamaticArea;

class CommonService
{

    private $companyService;
    private $projectService;

    public function __construct(CompanyService $companyService, ProjectService $projectService)
    {
        $this->companyService = $companyService;
        $this->projectService = $projectService;
    }

    /*
     * Get drop down data.
     * @return array $result.
     * */
    public function vouchersDropDownData()
    {
        $result = [
            'companies' => $this->companyService->getCompanies(),
            'projects' => $this->projectService->getProjects(),
            'banks' => Bank::pluck('name', 'id'),
            'donors' => Donor::pluck('name', 'id'),
            'thamaticAreas' => ThamaticArea::pluck('name', 'id'),
        ];

        return $result;
    }

    public function getAttachments($attachmentable_type, $attachmentable_id)
    {
        return Attachments::where('attachmentable_type', $attachmentable_type)->where('attachmentable_id', $attachmentable_id)->get();
    }

    public function viewAttachment($fileName, $path, $redirectRoute)
    {
        $file = public_path($path . $fileName);
        if (file_exists($file) || !is_dir($fileName)) {
            $path = public_path($path. $fileName);
            header('Content-Type: application/pdf');
            header('Content-Disposition: inline; filename=' . $path);
            header('Content-Transfer-Encoding: binary');
            header('Accept-Ranges: bytes');

            readfile($path);
        } else {
            session()->flash('error', __('No file exists.'));
        }
    }

    /*
     *
     * Function to delete attachment.
     * @param: $id, $type, $path
     * */
    function deleteAttachment($id, $type){
        $attachment = Attachments::where('id', $id)->where('attachmentable_type', $type)->first();
        $path = public_path('uploads/vouchers/'.$type .'/'. $attachment->file);
        if($type == 'project'){
            $path = public_path('uploads/projects/'. $attachment->file);
        }
        if($type == 'govt-document'){
            $path = public_path('uploads/documents/govt-documents/'. $attachment->file);
        }
        if(!empty($attachment)){
            if($attachment->delete())
            unlink($path);
            return true;
        }

        return false;
    }

    /*
     * Get drop down data.
     * @return array $result.
     * */
    public function documentsDropDownData()
    {
        $result = [
            'documentTypes' => $this->getDocumentTypes(),
            'documentSubTypes' => $this->getAllDocumentSubTypes(),
            'govtDocumentTypes' => $this->getGovtDocumentTypes(),
        ];

        return $result;
    }

    /*
        * Get list of document types.
        * @param $request
        *
        * @return array $data.
        * */
    public function getDocumentTypes()
    {
        return DocumentType::pluck('name','id');
    }

    /*
        * Get list of govt document types.
        * @param $request
        *
        * @return array $data.
        * */
        public function getGovtDocumentTypes()
        {
            return GovtDocumentTypes::pluck('name','id');
        }

    /*
        * Get list of document sub types.
        * @param $request
        *
        * @return array $data.
        * */
        public function getAllDocumentSubTypes()
        {
            return DocumentSubType::pluck('name','id');
        }

    /*
        * Get list of document sub types.
        * @param $request
        *
        * @return array $data.
        * */
    public function getDocumentSubTypes($deptId)
    {
        return DocumentSubType::select('name','id')->where('document_type_id', $deptId)->get();
    }

}