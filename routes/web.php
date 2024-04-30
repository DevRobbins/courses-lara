<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('login', [LoginController::class, 'create'])->name('login');
Route::post('login', [LoginController::class, 'store']);
Route::post('logout', [LoginController::class, 'destroy'])->middleware('auth');

Route::middleware('auth')->group(function() {
    Route::get('/', function () {
        return inertia('Home', [
            'name' => 'Tom Robbins',
            'frameworks' => [
                'Laravel', 'Vue', 'Inertia'
            ]
        ]);        
    });
    
    Route::get('/users', function () {
        // sleep(2);
        return inertia('Users/Index', [
            'time' => now()->toTimeString(),
            // 'users' => App\Models\User::all()->select('id','name')
            'users' => App\Models\User::query()
                ->when(Request::input('search'), function($query, $search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id, 
                    'name' => $user->name
                ]),
            'filters' => Request::only(['search'])
        ]);
    });
    
    Route::get('/users/create', function () {    
        return inertia('Users/Create');
    });
    
    Route::post('/users', function () {    
        // validate request
        $attributes = Request::validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
    
        // Create User
        App\Models\User::create($attributes);
    
        // Redirect
        return redirect('/users');    
    });
    
    Route::get('/settings', function () {
        return inertia('Settings');
    });
});
