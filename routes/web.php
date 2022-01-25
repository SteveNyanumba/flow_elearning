<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\ChatsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\Lecturer\TimetableController;
use App\Http\Controllers\LecturersController;
use App\Http\Controllers\LessonsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\TimetableController as AdminsTimetableController;
use App\Http\Controllers\UnitsController;
use App\Models\Day;
use App\Models\Faculty;
use App\Models\Unit;
use App\Services\CalendarService;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'faculties' => Faculty::all(),
    ]);
})->name('home');

Route::prefix('admin')->middleware(['auth:sanctum', 'verified', 'admin'])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\Users\AdminController@dashboard')->name('admin.dashboard');
    // Route::get('/calendar', 'App\Http\Controllers\CalendarController@index')->name('admin.calendar');

    Route::resource('admins', AdminsController::class);
    Route::resource('lecturers', LecturersController::class);
    Route::resource('students', StudentsController::class);
    Route::resource('units', UnitsController::class);
    Route::resource('courses', CoursesController::class);
    Route::resource('timetable', AdminsTimetableController::class);
    Route::get('/timetable-data/{id}', function (CalendarService $calendarService, $id) {
        $days = Day::all();
        $calendarData = $calendarService->generateCalendarDataOneLec($id);

        return [
            'days' => $days,
            'calendarData' => $calendarData
        ];
    });
    Route::post('/assign-lecturer/{id}', function (Request $request, $id) {
        $request->validate([
            'id_array.*' => 'required|integer'
        ]);

        $unit = Unit::find($id);
        $unit->lecturers()->attach($request->id_array);
        return response('Successfully assigned your Lecturers', 200);
    });
    Route::post('/detatch-lecturer/{unit_id}/{lecturer_id}', function ($unit_id, $lecturer_id) {

        $unit = Unit::find($unit_id);
        $unit->lecturers()->detach($lecturer_id);
        return response('Successfully detached your Lecturer', 200);
    });
});






Route::prefix('lecturer')->middleware(['auth:sanctum', 'verified', 'lecturer'])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\Users\LecturersController@dashboard')->name('lecturer.dashboard');
    Route::get('/timetable', 'App\Http\Controllers\Users\LecturersController@timetable')->name('lecturer.timetable');
    Route::get('/class/{id}', 'App\Http\Controllers\Users\LecturersController@class')->name('lecturer.class');
});

Route::prefix('student')->middleware(['auth:sanctum', 'verified', 'student'])->group(function () {
    Route::get('/dashboard', 'App\Http\Controllers\Users\StudentsController@dashboard')->name('student.dashboard');
    Route::get('/timetable', 'App\Http\Controllers\Student\MainController@timetable')->name('student.timetable');
    Route::get('/enroll', 'App\Http\Controllers\Student\MainController@enrollment')->name('student.enrollment');
    Route::post('/enroll/{lesson_id}', 'App\Http\Controllers\Student\MainController@enroll')->name('student.enrollment.store');
    Route::get('/class/{id}', 'App\Http\Controllers\Student\MainController@class')->name('student.class');
});






Route::redirect('/admin', '/admin/dashboard', 301);
Route::redirect('/lecturer', '/lecturer/dashboard', 301);
Route::redirect('/student', '/student/dashboard', 301);


/**
 * The API Routes
 */
Route::get('/chat/messages/{lessonId}', 'App\Http\Controllers\ChatsController@messages');
Route::post('/chat/lesson/{lessonId}/message', 'App\Http\Controllers\ChatsController@newMessage');
