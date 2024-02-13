<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\PropertyCollection;
use App\Http\Resources\V1\PropertyResource;
use App\Models\Property;
use App\Http\Requests\V1\StorePropertyRequest;
use App\Http\Requests\V1\UpdatePropertyRequest;
use Illuminate\Http\Request;
use App\Filters\V1\PropertyFilter;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filter = new PropertyFilter();
        $filterItems = $filter->transform($request);
        return new PropertyCollection(Property::where($filterItems)->paginate()->appends($request->query()));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        return new PropertyResource(Property::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //Get Single Property
        return new PropertyResource($property);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        $property->update($request->all());
        return new PropertyResource($property);

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
