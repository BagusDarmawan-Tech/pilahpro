<?php

namespace App\Http\Controllers;

use App\Http\Resources\SaleProductDetailResource;
use App\Models\SaleProductDetail;
use Illuminate\Http\Request;

class SaleProductDetailDetailController extends Controller
{
    public function index()
    {
        $sale_product = SaleProductDetail::all();
        return SaleProductDetailResource::collection($sale_product->loadMissing(['purchase_order:id,name_purchase_order']));
    }

    public function show($id)
    {
        $type_product = SaleProductDetail::findOrFail($id);
        return new SaleProductDetailResource($type_product->loadMissing(['buyer:id,name_contact']));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_sale_product' => 'required',
            'id_contact_buyer' => 'required',
            'date_sale_product' => 'required|date',
        ]);

        $sale_product = SaleProductDetail::create($validated);
        return new SaleProductDetailResource($sale_product->loadMissing(['buyer:id,name_contact']));
    }


    public function update(Request $request ,$id)
    {
        $validated = $request->validate([
            'name_sale_product' => 'required',
            'id_contact_buyer' => 'required',
            'date_sale_product' => 'required|date',
        ]);

        $sale_product = SaleProductDetail::findOrFail($id);
        $sale_product->update($validated);
        return new SaleProductDetailResource($sale_product->loadMissing(['buyer:id,name_contact']));
    }

    public function destroy($id)
    {
        $sale_product = SaleProductDetail::findOrFail($id);
        $sale_product->delete();
        return new SaleProductDetailResource($sale_product->loadMissing(['buyer:id,name_contact']));
    }
}
