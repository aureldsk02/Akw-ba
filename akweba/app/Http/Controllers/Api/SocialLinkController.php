<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialLinks = SocialLink::all();
        return response()->json($socialLinks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'business_id' => 'required|exists:businesses,id',
            'platform' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'is_active' => 'boolean',
        ]);

        $socialLink = SocialLink::create($validatedData);

        return response()->json($socialLink, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $socialLink = SocialLink::findOrFail($id);
        return response()->json($socialLink);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $socialLink = SocialLink::findOrFail($id);

        $validatedData = $request->validate([
            'business_id' => 'sometimes|required|exists:businesses,id',
            'platform' => 'sometimes|required|string|max:255',
            'url' => 'sometimes|required|url|max:255',
            'is_active' => 'sometimes|boolean',
        ]);

        $socialLink->update($validatedData);

        return response()->json($socialLink);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $socialLink = SocialLink::findOrFail($id);
        $socialLink->delete();

        return response()->json(null, 204);
    }
}
