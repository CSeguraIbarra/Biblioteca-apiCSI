<?php

namespace App\Http\Controllers;

use App\Models\Lector;
use Illuminate\Http\Request;

class LectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lectores = Lector::all();
        return response()->json($lectores);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $lector = Lector::create($request->all());
        return response()->json($lector, 201);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Lector $lector)
    {
        return response()->json($lector);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lector $lector)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lector $lector)
    {
        $input = $request->all();
        $lector->update($input);
        return response()->json($lector, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lector $lector)
    {
        $lector->delete();
        return response()->json(null, 204);
    }
}
