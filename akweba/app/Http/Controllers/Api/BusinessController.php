<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Services\SiteGenerator;

class BusinessController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'business_type' => 'required|string|max:255',
            'website' => 'nullable|url|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'theme' => 'required|string|in:classic,modern,elegant',
            'has_ecommerce' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $data = $request->all();
            $data['slug'] = Str::slug($data['name']);
            
            $business = Business::create($data);

            // Génération du site avec IA
            $siteGenerator = new SiteGenerator($business);
            try {
                $generationResult = $siteGenerator->generateWithAI();
            } catch (\Exception $e) {
                \Log::error('Erreur génération site IA: ' . $e->getMessage());
                return response()->json([
                    'message' => 'Business created but site generation failed',
                    'id' => $business->id,
                    'error' => $e->getMessage()
                ], 500);
            }
            
            return response()->json([
                'message' => 'Business created and site generated successfully',
                'id' => $business->id,
                'site_url' => $generationResult['url']
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating business',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function generateSite($id)
    {
        $business = Business::find($id);
        if (!$business) {
            return response()->json([
                'message' => 'Business not found'
            ], 404);
        }

        try {
            $siteGenerator = new SiteGenerator($business);
            $generationResult = $siteGenerator->generateWithAI();

            return response()->json([
                'message' => 'Site generated successfully',
                'site_url' => $generationResult['url']
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Site generation failed',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
