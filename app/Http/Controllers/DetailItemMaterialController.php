<?php

namespace App\Http\Controllers;

use App\Models\DetailItemMaterial;
use Illuminate\Http\Request;

class DetailItemMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param string $materialId
     * @param int $itemMaterialId
     * @return \Illuminate\Http\Response
     */
    public function index($materialId, $itemMaterialId)
    {
        return DetailItemMaterial::where('vc_materialid', $materialId)->where('int_item_materialid', $itemMaterialId)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param string $materialId
     * @param int $itemMaterialId
     * @param  int  $order
     * @return \Illuminate\Http\Response
     */
    public function show($materialId, $itemMaterialId, $order)
    {
        return DetailItemMaterial::where('vc_materialid', $materialId)->where('int_item_materialid', $itemMaterialId)->where('int_order', $order)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailItemMaterial  $detailItemMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailItemMaterial $detailItemMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailItemMaterial  $detailItemMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailItemMaterial $detailItemMaterial)
    {
        //
    }
}
