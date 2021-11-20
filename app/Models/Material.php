<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    public function itemMaterial()
    {
        return $this->hasMany(ItemMaterial::class, 'vc_materialid', 'vc_id');
    }

    protected $fillable = ['vc_id' ,'vc_titlematerial', 'vc_description'];

    protected $hidden = ['created_at', 'updated_at'];

    protected $casts = ['vc_id' => 'string'];

    protected $primaryKey = 'vc_id';

    protected $appends = ['material_item'];

    public function getMaterialItemAttribute() {
        return ItemMaterial::where('vc_materialid', $this->vc_id)->get();
    }
}
