<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\CompanyScope;

class Product extends Model
{
    use HasFactory, SoftDeletes, CompanyScope;

    protected $fillable = [
        'company_id',
        'name','barcode','sku',
        'group_id','unit_id','brand_id',
        'min_quantity','package','term','whole',
        'image','status','view','description','type'
    ];  

    public function group()
    {
        return $this->belongsTo(Reference::class);
    }

    public function unit()
    {
        return $this->belongsTo(Reference::class);
    }

    public function brand()
    {
        return $this->belongsTo(Reference::class);
    }
}
