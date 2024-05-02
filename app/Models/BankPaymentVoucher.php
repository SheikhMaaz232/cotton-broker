<?php

namespace App\Models;

use App\Attachments;
use App\Bank;
use Illuminate\Database\Eloquent\Model;

class BankPaymentVoucher extends Model
{
    const PER_PAGE = 10;
    const FILE_PATH = 'uploads/vouchers/bpv/';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'project_id', 'bank_id', 'f_year_id','bpv_no','cheque_no','account_no','paid_to','date','wht','description','amount','created_by','updated_by'
    ];
\
    public function project()
    {
        return $this->hasOne(Project::class, 'id', 'project_id');
    }

    public function bank()
    {
        return $this->hasOne(Bank::class, 'id', 'bank_id');
    }

    public function attachments()
    {
        return $this->hasMany(Attachments::class, 'attachmentable_id', 'id');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
            'category'=>'required',
            'image' =>  'required',
            'pdf' =>  'required',
        ]);
        $baseSlug = Str::slug($request->name);
        $uniqueSlug = $baseSlug;
        $counter = 1;
        while (Collection::where('slug', $uniqueSlug)->exists()) {
            $uniqueSlug = $baseSlug . '-' . $counter;
            $counter++;
        }
        $collection = new Collection();
        $collection->name = $request->name;
        $collection->slug = $uniqueSlug;
        $collection->category_id = $request->category;
        // Image store code
        if ($image = $request->file('image')) {
            $destinationPath = 'collection-image/';
            $profileImage = $uniqueSlug . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $collection->image = $profileImage;
        }
        // Image store code
        if ($pdf = $request->file('pdf')) {
            $pdfPath = 'collection-pdf/';
            $colPdf = $uniqueSlug . '.' . $pdf->getClientOriginalExtension();
            $pdf->move($pdfPath, $colPdf);
            $collection->pdf = $colPdf;
        }
        $collection->save();
        return redirect()->route('admin.collection.index')->with('success','Collection created successfully');
    }
}
