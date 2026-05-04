<?php

namespace App\Http\Controllers;

use App\Http\Resources\TradingDetailResource;
use App\Models\TradingDetail;
use Illuminate\Http\Request;

class TradingDetailController extends Controller
{
    public function index()
    {
        $trading_details = TradingDetail::all();
        // dd($trading_details);
        return TradingDetailResource::collection($trading_details->loadMissing([
            'trading:id,name_trading',
            'type_product:id,name_product'
        ]));
    }

    public function show($id)
    {
        $trading_detail = TradingDetail::findOrFail($id);
        return new TradingDetailResource($trading_detail->loadMissing([
            'trading:id,name_trading',
            'type_product:id,name_product'
        ]));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_type_product' => 'required',
            'id_trading' => 'required',
            'weight_product' => 'required|integer',
            'price_product' => 'required|integer',
            'total_bag_trading' => 'nullable|integer',
        ]);

        $validated['total_price_product'] = $validated['weight_product'] * $validated['price_product'];

        $sale_product = TradingDetail::create($validated);
        return new TradingDetailResource($sale_product->loadMissing([
            'trading:id,name_trading',
            'type_product:id,name_product'
        ]));
    }

    public function update(Request $request, $id)
    {
        $sale_product = TradingDetail::findOrFail($id);

        $validated = $request->validate([
            'id_type_product' => 'required',
            'id_trading' => 'required',
            'weight_product' => 'required|integer',
            'price_product' => 'required|integer',
            'total_bag_trading' => 'required|integer',
        ]);

        $validated['total_price_product'] = $validated['weight_product'] * $validated['price_product'];

        $sale_product->update($validated);

        return new TradingDetailResource($sale_product->loadMissing([
            'trading:id,name_trading',
            'type_product:id,name_product'
        ]));
    }

    public function destroy($id)
    {
        $trading_detail = TradingDetail::findOrFail($id);
        $trading_detail->delete();
        return new TradingDetailResource($trading_detail->loadMissing([
            'trading:id,name_trading',
            'type_product:id,name_product'
        ]));
    }
}
