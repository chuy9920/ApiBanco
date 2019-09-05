<?php

namespace App\Http\Controllers;

use App\CCuentasBancarias;
use Illuminate\Http\Request;

class CCuentasBancariasController extends Controller
{
    function index(Request $request) {
        if ($request->isJson()) {
            $cuenta = CCuentasBancarias::all();
            return response()->json($cuenta, 200);
        }
        return response()->json(['error' => 'Unauthorized'], 401, []);
    }

    function CrearCuenta(Request $request) {
        if ($request->isJson()) {
            $data = $request->json()->all();
            $cuenta = CCuentasBancarias::create([
                'alias' => $data['alias'],
                'id_banco' => $data['id_banco'],
                'ultimos_digitos' => $data['ultimos_digitos']
            ]);
            return response()->json($cuenta, 201);
        }
        return response()->json(['error' => 'Unauthorized'], 401, []);
    }

    function ActualizaCuenta(Request $request, $id) {
        if ($request->isJson()) {
            $data = $request->json()->all();
            $cuenta = CCuentasBancarias::find($id);
            if (!empty($cuenta)) {
                $cuenta->fill($request->all());
                $cuenta->save();
                return response()->json($cuenta, 201, []);
            }
            return response()->json(['error' => 'No encontrado'], 401, []);
        }
        return response()->json(['error' => 'Unauthorized'], 401, []);
    }

    function EliminaCuenta(Request $request, $id) {
        if ($request->isJson()) {
            $data = $request->json()->all();
            $cuenta = CCuentasBancarias::find($id);
            if (!empty($cuenta)) {
                $cuenta->delete();
                return response()->json($cuenta, 201, []);
            }
            return response()->json(['error' => 'No encontrado'], 401, []);
        }
        return response()->json(['error' => 'Unauthorized'], 401, []);
    }

    function getCuentasBanco(Request $request) {
        if ($request->isJson()) {
            // $results = DB::select("SELECT * FROM 	c_bancos");
            $results = app('db')->select("SELECT * FROM obtenerCuentas");
            return response()->json($results, 200);
        }
    }

    function getCuenta(Request $request, $id) {
        if ($request->isJson()) {
            // $results = DB::select("SELECT * FROM 	c_bancos");
            $results = app('db')->select("SELECT * FROM obtenerCuentas WHERE id = " . $id);
            return response()->json($results, 200);
        }
    }
}
