<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class DetailItemMaterial extends Pivot
{
    protected $fillable = ['vc_materialid', 'int_item_materialid', 'int_order', 'text_content'];

    protected $hidden = ['updated_at', 'created_at'];
}
