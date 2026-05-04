<?php

namespace App\Http\Controllers;

use App\Http\Resources\SaleProductDetailResource;
use App\Models\SaleProductDetail;
use Illuminate\Http\Request;

class DetailSaleProduct extends Controller
{
    public function index()
    {
        $sale_product = SaleProductDetail::all();
        //    dd(\App\Models\SaleProduct::withTrashed()->find(1));
        return SaleProductDetailResource::collection($sale_product->loadMissing([
            'purchase_order:id,name_purchase_order',
            'sale_product:id,name_sale_product',
            'type_product:id,name_product'
        ]));
    }

    public function show($id)
    {
        $type_product = SaleProductDetail::findOrFail($id);
        return new SaleProductDetailResource($type_product->loadMissing([
            'purchase_order:id,name_purchase_order',
            'sale_product:id,name_sale_product',
            'type_product:id,name_product'
        ]));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_type_product' => 'required',
            'id_sale_product' => 'required',
            'id_purchase_order' => 'required',
            'weight_product' => 'required|integer',
            'price_product' => 'required|integer',
            'total_bag_sale_product' => 'required|integer',
        ]);

        $validated['total_price_product'] = $validated['weight_product'] * $validated['price_product'];

        $sale_product = SaleProductDetail::create($validated);
        return new SaleProductDetailResource($sale_product->loadMissing([
            'purchase_order:id,name_purchase_order',
            'sale_product:id,name_sale_product',
            'type_product:id,name_product'
        ]));
    }

    public function update(Request $request, $id)
    {
        $sale_product = SaleProductDetail::findOrFail($id);

        $validated = $request->validate([
            'id_type_product'      => 'required',
            'id_sale_product'      => 'required',
            'id_purchase_order'    => 'required',
            'weight_product'       => 'required|integer',
            'price_product'        => 'required|integer',
            'total_bag_sale_product' => 'required|integer',
        ]);

        $validated['total_price_product'] = $validated['weight_product'] * $validated['price_product'];

        $sale_product->update($validated);

        return new SaleProductDetailResource($sale_product->loadMissing([
            'purchase_order:id,name_purchase_order',
            'sale_product:id,name_sale_product',
            'type_product:id,name_product'
        ]));
    }

    public function destroy($id)
    {
        $sale_product = SaleProductDetail::findOrFail($id);
        $sale_product->delete();
        return new SaleProductDetailResource($sale_product->loadMissing([
            'purchase_order:id,name_purchase_order',
            'sale_product:id,name_sale_product',
            'type_product:id,name_product'
        ]));
    }
}
