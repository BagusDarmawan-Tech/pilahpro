<?php

namespace App\Http\Controllers;

use App\Http\Resources\TypeProductResource;
use App\Models\TypeProduct;
use Illuminate\Http\Request;

class TypeProductController extends Controller
{
    public function index()
    {
        $type_product = TypeProduct::all();
        return TypeProductResource::collection($type_product);
    }

    public function show($id)
    {
        $type_product = TypeProduct::findOrFail($id);
        return new TypeProductResource($type_product);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_product' => 'required|string|max:100',
            'note_product' => 'nullable|string',
        ], [
            'name_product.required' => 'Nama produk wajib diisi.',
            'name_product.string'   => 'Nama produk harus berupa teks.',
            'name_product.max'      => 'Nama produk maksimal 255 karakter.',
        ]);

        $purchase_trip = TypeProduct::create($validated);
        return new TypeProductResource($purchase_trip);
    }


    public function update(Request $request ,$id)
    {
        $validated = $request->validate([
            'name_product' => 'required|string|max:100',
            'note_product' => 'nullable|string',
        ], [
            'name_product.required' => 'Nama produk wajib diisi.',
            'name_product.string'   => 'Nama produk harus berupa teks.',
            'name_product.max'      => 'Nama produk maksimal 255 karakter.',
        ]);

        $type_product = TypeProduct::findOrFail($id);
        $type_product->update($validated);
        return new TypeProductResource($type_product);
    }

    public function destroy($id)
    {
        $type_product = TypeProduct::findOrFail($id);
        $type_product->delete();
        return new TypeProductResource($type_product);
    }
}
