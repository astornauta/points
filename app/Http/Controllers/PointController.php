<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Point;

class PointController extends Controller
{
    // View all points
    public function index()
    {
        $points = Point::all();
        return response()->json($points, 200);
    }

    // Store new point
    public function store(Request $request)
    {
        $point = Point::create($request->all());
        return response()->json($point, 201);
    }

    // Show specific point
    public function show($id)
    {
        $point = Point::findOrFail($id);
        return response()->json($point, 200);
    }

    // Update specific point
    public function update(Request $request, $id)
    {
        $point = Point::findOrFail($id);
        $point->update($request->all());
        return response()->json($point, 202);
    }

    // Delete specific point
    public function delete($id)
    {
        $point  = Point::destroy($id);
        return response()->json(204);
    }
}
