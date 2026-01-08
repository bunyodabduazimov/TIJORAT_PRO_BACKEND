<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\CompanyScope;

class Reference extends Model
{
    use HasFactory, SoftDeletes, CompanyScope; 

    protected $fillable = [
        'company_id',
        'parent_id',
        'name',
        'code',
        'range',
        'description',
        'active',
        'type'
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
}
