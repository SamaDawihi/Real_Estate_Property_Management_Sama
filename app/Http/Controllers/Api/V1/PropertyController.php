<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Http\Requests\V1\StorePropertyRequest;
use App\Http\Requests\V1\UpdatePropertyRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Get All Properties
        return Property::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        return Property::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //Get Single Property
        return $property;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $property->update($request->all());
        return $property;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return response()->json(['message' => 'Property deleted successfully']);
    }
}
