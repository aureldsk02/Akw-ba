<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BusinessHour;
use Illuminate\Http\Request;

class BusinessHourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $businessHours = BusinessHour::all();
        return response()->json($businessHours);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'business_id' => 'required|exists:businesses,id',
            'day' => 'required|string|max:20',
            'open_morning' => 'nullable|date_format:H:i',
            'close_morning' => 'nullable|date_format:H:i|after:open_morning',
            'open_afternoon' => 'nullable|date_format:H:i',
            'close_afternoon' => 'nullable|date_format:H:i|after:open_afternoon',
            'is_closed' => 'boolean',
        ]);

        $businessHour = BusinessHour::create($validatedData);

        return response()->json($businessHour, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $businessHour = BusinessHour::findOrFail($id);
        return response()->json($businessHour);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $businessHour = BusinessHour::findOrFail($id);

        $validatedData = $request->validate([
            'business_id' => 'sometimes|required|exists:businesses,id',
            'day' => 'sometimes|required|string|max:20',
            'open_morning' => 'nullable|date_format:H:i',
            'close_morning' => 'nullable|date_format:H:i|after:open_morning',
            'open_afternoon' => 'nullable|date_format:H:i',
            'close_afternoon' => 'nullable|date_format:H:i|after:open_afternoon',
            'is_closed' => 'sometimes|boolean',
        ]);

        $businessHour->update($validatedData);

        return response()->json($businessHour);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $businessHour = BusinessHour::findOrFail($id);
        $businessHour->delete();

        return response()->json(null, 204);
    }
}
