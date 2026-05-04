<?php

namespace App\Http\Controllers;

use App\Http\Resources\PurchaseOrderResource;
use App\Models\PurchaseOrder;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $purchase_order = PurchaseOrder::all();
        return PurchaseOrderResource::collection($purchase_order->loadMissing(['contact:id,name_contact']));
    }

    public function show($id){
        $purchase_order = PurchaseOrder::with('contact:id,name_contact')->findOrFail($id);
        return new PurchaseOrderResource($purchase_order->loadMissing(['contact:id,name_contact']));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_contact_supplier' => 'required',
            'name_purchase_order' => 'required|string|max:255',
            'status' => 'required|integer',
            'date_purchase_order' => 'required|date',
            'notes_purchase_order' => 'nullable|string',
        ]);
        $purchase_order = PurchaseOrder::create($validated);
        return new PurchaseOrderResource($purchase_order->loadMissing('contact:id,name_contact'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_contact_supplier' => 'required',
            'name_purchase_order' => 'required|string|max:255',
            'status' => 'required|integer',
            'date_purchase_order' => 'required|date',
            'notes_purchase_order' => 'nullable|string',
        ]);

        $purchase = PurchaseOrder::findOrFail($id);
        $purchase->update($validated);
        return new PurchaseOrderResource($purchase->loadMissing(['contact:id,name_contact']));
    }

    public function destroy($id){
        $purchase = PurchaseOrder::findOrFail($id);
        $purchase->delete();
        return new PurchaseOrderResource($purchase);
    }
}
