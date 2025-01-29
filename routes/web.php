<?php

use App\Http\Controllers\BackupController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\YearController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(static function (): void {
    Route::resources([
        'teachers' => TeacherController::class,
        'students' => StudentController::class,
        'years' => YearController::class,
        'periods' => PeriodController::class,
        'notes' => NoteController::class,
        'subjects' => SubjectController::class,
        'backup' => BackupController::class,
        'reports' => ReportController::class
    ]);
});

require __DIR__ . '/auth.php';
