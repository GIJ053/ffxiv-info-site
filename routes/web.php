<?php

use App\Models\Job;
use App\Models\Role;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware('auth')->group(function () {

});

Route::get('/', function () {
    return Inertia::render('Home', [
        'roles' => Role::with('jobs')->get()
    ]);
});

Route::get('/jobs/{job:slug}/actions', function (Job $job) {
    return Inertia::render('Actions', [
        'job' => $job,
        'actions' => $job->Actions()->orderBy('level', 'asc')->get(),
    ]);
});

Route::get('/jobs/{job:slug}/traits', function (Job $job) {
    return Inertia::render('Traits', [
        'job' => $job,
        'traits' => $job->Passives()->orderBy('level', 'asc')->get(),
    ]);
});

Route::get('/settings', function () {
    return Inertia::render('Settings');
});



require __DIR__.'/auth.php';
