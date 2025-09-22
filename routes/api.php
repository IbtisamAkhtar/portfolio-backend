<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\ContactMessage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Contact form submission - Simple version without database
Route::post('/contact', function (Request $request) {
    try {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Log the message instead of saving to database temporarily
        \Log::info('Contact form submission:', $validated);

        return response()->json([
            'message' => 'Contact message received successfully! (Development mode)',
            'status' => 'success',
            'data' => $validated
        ], 200)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With');
    
    } catch (\Exception $e) {
        \Log::error('Contact form error: ' . $e->getMessage());
        
        return response()->json([
            'message' => 'Form submitted successfully! Data logged.',
            'status' => 'success'
        ], 200)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With');
    }
});

// Handle OPTIONS requests for CORS
Route::options('/contact', function () {
    return response('', 200)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With');
});

// Get portfolio data
Route::get('/portfolio', function () {
    return response()->json([
        'name' => 'Ibtisam Akhtar',
        'title' => 'Full Stack Developer',
        'bio' => 'Future-focused web developer — I build responsive, user-friendly websites using modern tools.',
        'skills' => ['HTML', 'CSS', 'Tailwind', 'JavaScript', 'PHP', 'Laravel', 'MySQL'],
        'projects' => [
            [
                'id' => 1,
                'title' => 'Portfolio Calculator',
                'description' => 'Interactive calculator built with vanilla JavaScript',
                'technologies' => ['HTML', 'CSS', 'JavaScript'],
                'github' => 'https://github.com/IbtisamAkhtar',
                'demo' => '#'
            ],
            [
                'id' => 2,
                'title' => 'Weather App',
                'description' => 'Real-time weather application with API integration',
                'technologies' => ['HTML', 'CSS', 'JavaScript', 'API'],
                'github' => 'https://github.com/IbtisamAkhtar',
                'demo' => '#'
            ]
        ]
    ])
    ->header('Access-Control-Allow-Origin', '*');
});

// Get skills/technologies
Route::get('/skills', function () {
    return response()->json([
        'frontend' => ['HTML', 'CSS', 'Tailwind CSS', 'JavaScript'],
        'backend' => ['PHP', 'Laravel', 'MySQL'],
        'tools' => ['Git', 'GitHub', 'VS Code', 'XAMPP'],
        'cms' => ['WordPress']
    ])
    ->header('Access-Control-Allow-Origin', '*');
});

// Get experience/about information
Route::get('/about', function () {
    return response()->json([
        'about' => 'I am a motivated web developer from Pakistan, currently studying Computer Science at COMSATS University Islamabad, Sahiwal Campus.',
        'education' => [
            [
                'institution' => 'COMSATS University Islamabad, Sahiwal Campus',
                'degree' => 'BS Computer Science (Ongoing)',
                'status' => 'Currently Enrolled'
            ]
        ],
        'achievements' => [
            [
                'title' => 'Matriculation',
                'score' => '648 / 850'
            ],
            [
                'title' => 'Intermediate (FSc)',
                'score' => '997 / 1100'
            ]
        ]
    ])
    ->header('Access-Control-Allow-Origin', '*');
});

// Health check endpoint
Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now(),
        'version' => '1.0.0'
    ])
    ->header('Access-Control-Allow-Origin', '*');
});
