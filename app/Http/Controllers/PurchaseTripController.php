<?php

namespace App\Http\Controllers;

use App\Models\PurchaseTrip;
use App\Http\Resources\PurchaseTripResource;
use Illuminate\Http\Request;

class PurchaseTripController extends Controller
{
    public function index()
    {
        $purchase_trips = PurchaseTrip::all();
        return PurchaseTripResource::collection($purchase_trips->loadMissing(['purchase_order:id,name_purchase_order']));
    }

    public function show($id){
        $purchase_trip = PurchaseTrip::with('purchase_order:id,name_purchase_order')->findOrFail($id);
        return new PurchaseTripResource($purchase_trip->loadMissing(['purchase_order:id,name_purchase_order']));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'note_purchase_trip' => 'required',
            'id_purchase_order' => 'required',
            'date_purchase_trip' => 'required|date',
            'purchase_order' => 'required',
            'location_trip' => 'required',
            'price_per_kg' => 'required|integer',
            'weight_gross' => 'required|integer',
            'total_paid' => 'required|integer',
            'total_bag_purchase_product' => 'required|integer',
        ]);

        $purchase_trip = PurchaseTrip::create($validated);
        return new PurchaseTripResource($purchase_trip->loadMissing('purchase_order:id,name_purchase_order'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'note_purchase_trip' => 'required',
            'id_purchase_order' => 'required',
            'date_purchase_trip' => 'required|date',
            'purchase_order' => 'required',
            'location_trip' => 'required',
            'price_per_kg' => 'required|integer',
            'weight_gross' => 'required|integer',
            'total_paid' => 'required|integer',
            'total_bag_purchase_product' => 'required|integer',
        ]);

        $purchase_trip = PurchaseTrip::findOrFail($id);
        $purchase_trip->update($validated);
        return new PurchaseTripResource($purchase_trip->loadMissing(['purchase_order:id,name_purchase_order']));
    }

    public function destroy($id){
        $purchase = PurchaseTrip::findOrFail($id);
        $purchase->delete();
        return new PurchaseTripResource($purchase);
    }
}
