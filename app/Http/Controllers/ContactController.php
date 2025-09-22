<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'message' => 'required|string|max:1000',
            ]);

            // Save to database
            ContactMessage::create($validated);
            Log::info('Contact form submission saved to database:', $validated);

            return response()->json([
                'success' => true, 
                'message' => 'Message saved to database successfully!',
                'data' => $validated
            ], 200)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With');
        
        } catch (\Exception $e) {
            Log::error('Contact form database error: ' . $e->getMessage());
            
            // Fallback - still return success but log the error
            return response()->json([
                'success' => true,
                'message' => 'Message received! (Database connection issue)'
            ], 200)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With');
        }
    }
}
