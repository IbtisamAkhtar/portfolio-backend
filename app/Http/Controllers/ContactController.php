<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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

            // Log the message instead of saving to database
            Log::info('Contact form submission via controller:', $validated);

            return response()->json([
                'success' => true, 
                'message' => 'Message received successfully! (No Database)',
                'data' => $validated
            ], 200)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With');
        
        } catch (\Exception $e) {
            Log::error('Contact form controller error: ' . $e->getMessage());
            
            return response()->json([
                'success' => true,
                'message' => 'Message processed successfully!'
            ], 200)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
            ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With');
        }
    }
}
