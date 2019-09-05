<?php

namespace App\Http\Controllers;

use App\CBanco;
use Illuminate\Http\Request;

class CBancoController extends Controller
{
    function index(Request $request) {
        if ($request->isJson()) {
            $banco = CBanco::all();
            return response()->json($banco, 200);
        }
        return response()->json(['error' => 'Unauthorized'], 401, []);
    }

    // function CrearCuenta(Request $request) {
    //     if ($request->isJson()) {
    //         $data = $request->json()->all();
    //         $cuenta = CCuentasBancarias::create([
    //             'alias' => $data['alias'],
    //             'id_banco' => $data['id_banco'],
    //             'ultimos_digitos' => $data['ultimos_digitos']
    //         ]);
    //         return response()->json($cuenta, 201);
    //     }
    //     return response()->json(['error' => 'Unauthorized'], 401, []);
    // }

    // function ActualizaCuenta(Request $request, $id) {
    //     if ($request->isJson()) {
    //         $data = $request->json()->all();
    //         $cuenta = CCuentasBancarias::find($id);
    //         if (!empty($cuenta)) {
    //             $cuenta->fill($request->all());
    //             $cuenta->save();
    //             return response()->json($cuenta, 201, []);
    //         }
    //         return response()->json(['error' => 'No encontrado'], 401, []);
    //     }
    //     return response()->json(['error' => 'Unauthorized'], 401, []);
    // }

    // function EliminaCuenta(Request $request, $id) {
    //     if ($request->isJson()) {
    //         $data = $request->json()->all();
    //         $cuenta = CCuentasBancarias::find($id);
    //         if (!empty($cuenta)) {
    //             $cuenta->delete();
    //             return \response()->json($cuenta, 201, []);
    //         }
    //         return response()->json(['error' => 'No encontrado'], 401, []);
    //     }
    //     return response()->json(['error' => 'Unauthorized'], 401, []);
    // }
}
