<?php

namespace App\Http\Controllers;

use App\Models\SaleProduct;
use App\Http\Resources\SaleProductResource;
use Illuminate\Http\Request;

class SaleProductController extends Controller
{
    public function index()
    {
        $sale_product = SaleProduct::all();
        return SaleProductResource::collection($sale_product->loadMissing(['buyer:id,name_contact']));

    }

    public function show($id)
    {
        $type_product = SaleProduct::findOrFail($id);
        return new SaleProductResource($type_product->loadMissing(['buyer:id,name_contact']));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_sale_product' => 'required',
            'id_contact_buyer' => 'required',
            'date_sale_product' => 'required|date',
        ]);

        $sale_product = SaleProduct::create($validated);
        return new SaleProductResource($sale_product->loadMissing(['buyer:id,name_contact']));
    }


    public function update(Request $request ,$id)
    {
        $validated = $request->validate([
            'name_sale_product' => 'required',
            'id_contact_buyer' => 'required',
            'date_sale_product' => 'required|date',
        ]);

        $sale_product = SaleProduct::findOrFail($id);
        $sale_product->update($validated);
        return new SaleProductResource($sale_product->loadMissing(['buyer:id,name_contact']));
    }

    public function destroy($id)
    {
        $sale_product = SaleProduct::findOrFail($id);
        $sale_product->delete();
        return new SaleProductResource($sale_product->loadMissing(['buyer:id,name_contact']));
    }

}
