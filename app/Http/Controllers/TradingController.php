<?php

namespace App\Http\Controllers;

use App\Http\Resources\TradingResource;
use App\Models\Trading;
use Illuminate\Http\Request;

class TradingController extends Controller
{
    public function index()
    {
        $trading = Trading::all();
        // dd($trading);
        return TradingResource::collection($trading->loadMissing(['buyer:id,name_contact']));
    }

    public function show($id)
    {
        $trading = Trading::findOrFail($id);
        return new TradingResource($trading->loadMissing(['buyer:id,name_contact']));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_trading' => 'required',
            'id_contact_buyer' => 'required',
            'trading_date' => 'required|date',
            'grand_total' => 'nullable'
        ]);

        $trading = Trading::create($validated);
        return new TradingResource($trading->loadMissing(['buyer:id,name_contact']));
    }

    public function update(Request $request ,$id)
    {
        $validated = $request->validate([
            'name_trading' => 'required',
            'id_contact_buyer' => 'required',
            'trading_date' => 'required|date',
            'grand_total' => 'nullable'
        ]);
        // dd($validated);

        $trading = Trading::findOrFail($id);
        $trading->update($validated);
        $trading->refresh();
        return new TradingResource($trading->loadMissing(['buyer:id,name_contact']));
    }

    public function destroy($id)
    {
        $sale_product = Trading::findOrFail($id);
        $sale_product->delete();
        return new TradingResource($sale_product->loadMissing(['buyer:id,name_contact']));
    }
}
