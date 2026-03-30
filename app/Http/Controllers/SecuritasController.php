<?php

namespace App\Http\Controllers;

use App\Http\Resources\SecuritasResource;
use App\Models\Securitas;
use Illuminate\Http\Request;

class SecuritasController extends Controller
{
    public function index(){
        $securitas = Securitas::all();

        return SecuritasResource::collection($securitas);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
        'name_securitas' => 'required|max:100',
        'code_securitas' => 'required|max:10',
        ]);

        // return response()->json('berhasil');
        $securitas = Securitas::create($validated);
        return new SecuritasResource($securitas);

    }

    public function update(Request $request, $id){
        $validated = $request->validate([
        'name_securitas' => 'required|max:100',
        'code_securitas' => 'required|max:10',
        ]);

        // return response()->json('berhasil');
        $securitas = Securitas::findOrFail($id);
        $securitas->update($validated);
        return new SecuritasResource($securitas);
    }

    public function destroy($id){
        $securitas = Securitas::findOrFail($id);
        $securitas->delete();
        return new SecuritasResource($securitas);
    }

}
