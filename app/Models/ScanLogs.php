<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScanLogs extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bread()
    {
        return $this->belongsTo('App\Models\Breads', 'breads_id');
    }
}
