<?php

namespace App\Services;

/*
 * Class UploadFileService
 * @package App\Services
 * */

use App\Attachments;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UploadFileService
{

    const UPLOAD_PATH = 'public/uploads/';
    /*
     * Store company data.
     * @param $model
     * @param $where
     * @param $data
     *
     * @return object $object.
     * */
    public function findUpdateOrCreate($model, array $where, array $data)
    {
        $object = $model::firstOrNew($where);

        foreach ($data as $property => $value) {
            $object->{$property} = $value;
        }
        $object->save();

        return $object;
    }

    public function dataArray($request)
    {
        $data = $request->except('_token');
        $data['created_by'] = Auth::user()->id;
        $data['updated_by'] = Auth::user()->id;
        $data['f_year_id'] = 1;
        $data['date'] = Carbon::parse($request['date'])->format('Y-m-d');

        return $data;
    }

    /*
     * Upload attachment.
     * @return Response.
     * *
     */
    public function uploadFile($request, $inserted, $type, $path)
    {
        foreach ($request['file'] as $file) {
            $fileName = Str::random(20);
            $attachments = [
                'attachmentable_id' => $inserted->id,
                'attachmentable_type' => $type,
                'file' => $fileName. '_'. '('.$file->getClientOriginalName().')'
            ];
            Attachments::create($attachments);
            $file->move(self::UPLOAD_PATH.$path, $fileName. '_'. '('.$file->getClientOriginalName(). ')');
            return $file->getClientOriginalName();
        }
    }

}

