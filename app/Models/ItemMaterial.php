<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ItemMaterial extends Pivot
{
    protected $fillable = ['vc_materialid', 'int_id', 'vc_title'];

    protected $hidden = ['created_at', 'updated_at'];
}
