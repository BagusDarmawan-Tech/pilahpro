<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExpenseResource;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expene = Expense::all();
        // dd($expene);
        return ExpenseResource::collection($expene->loadMissing([
            'trading:id,name_trading',
            'sale:id,name_sale_product',
            'purchase:id,name_purchase_order',
        ]));
    }

    public function show($id)
    {
        $expense = Expense::findOrFail($id);
        // dd($expense);
        return new ExpenseResource($expense->loadMissing([
            'trading:id,name_trading',
            'sale:id,name_sale_product',
            'purchase:id,name_purchase_order',
        ]));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'price_expense' => 'required|int',
            'name_expense' => 'required|string|max:100',
            'note_expense' => 'nullable|string',
            'id_trading' => 'nullable',
            'id_sale_product' => 'nullable',
            'id_purchase_order' => 'nullable',
        ]);
        $expense = Expense::create($validated);
        return new ExpenseResource($expense->loadMissing(
            'trading:id,name_trading',
            'sale:id,name_sale_product',
            'purchase:id,name_purchase_order',
        ));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'price_expense' => 'required|int',
            'name_expense' => 'required|string|max:100',
            'note_expense' => 'nullable|string',
            'id_trading' => 'nullable',
            'id_sale_product' => 'nullable',
            'id_purchase_order' => 'nullable',
        ]);

        $expense = Expense::findOrFail($id);
        $expense->update($validated);
        return new ExpenseResource($expense->loadMissing(
            'trading:id,name_trading',
            'sale:id,name_sale_product',
            'purchase:id,name_purchase_order',
        ));
    }

    public function destroy($id){
        $expense = Expense::findOrFail($id);
        $expense->delete();
        return new ExpenseResource($expense);
    }}
