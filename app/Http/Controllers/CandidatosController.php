<?php

namespace App\Http\Controllers;

use App\Candidato;
use App\Http\Requests\ActualizarCandidatoRequest;
use App\Http\Requests\CandidatoRequest;
use Illuminate\Http\Request;

class CandidatosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $index = Candidato::all();
            return response()->json([
                'success'=> true,
                'data'=> $index, 'message' => 'resolvio la petición'
            ], 200);

        } catch (\Exception $exception) {
            return response()->json([
                'data' => $exception,
                'success' => false,
                'message' => 'Fallo de excepción CandidatosController@index'
            ], 404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CandidatoRequest $request)
    {
        try{
            $candidato = new Candidato;
            $candidato->surname             = $request->surname;
            $candidato->email               = $request->email;
            $candidato->name                = $request->name;
            $candidato->phone               = $request->phone;
            $candidato->date_of_interview   = $request->date_of_interview;
            $candidato->rating              = $request->rating;
            $candidato->save();
            return response()->json([
                'success'=> true,
                'data'=> $candidato, 'message' => 'resolvio la petición'
            ], 200);
        } catch(\Exception $exception){
            return response()->json([
            'data' => $exception,
            'success' => false,
            'message' => 'Fallo de excepción CandidatosController@store'
         ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $show= Candidato::findOrFail($id);
            return response()->json([
                'success'=> true,
                'data'=> $show, 'message' => 'resolvio la petición'
            ], 200);
        } catch(\Exception $exception){
            return response()->json([
            'data' => $exception,
            'success' => false,
            'message' => 'Fallo de excepción CandidatosController@show'
        ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ActualizarCandidatoRequest $request, Candidato $candidato)
    {
        try {
            $candidato->update($request->all());
            return response()->json([
                'success'=> true,
                'data'=> $candidato, 'message' => 'resolvio la petición'
            ], 200);
        } catch(\Exception $exception){
            return response()->json([
            'data' => $exception,
            'success' => false,
            'message' => 'Fallo de excepción CandidatosController@show'
        ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $candidato=Candidato::findOrFail($id);
            $candidato->delete();
            return response()->json([
                'success'=> true,
                'data'=> $candidato, 'message' => 'resolvio la petición'
            ], 200);
        } catch(\Exception $exception){
            return response()->json([
                'data' => $exception,
                'success' => false,
                'message' => 'Fallo de excepción CandidatosController@destroy'
            ], 404);
        }
    }
}
