<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\ExamController as AdminExamController;
use App\Http\Controllers\Admin\ExamTypeController as AdminExamTypeController;
use App\Http\Controllers\Admin\SyllabusController as AdminSyllabusController;
use App\Http\Controllers\Admin\TeamController as AdminTeamController;
use App\Http\Controllers\Frontend\FileController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ExamController;
use App\Http\Controllers\Frontend\ExamTypeController;
use App\Http\Controllers\Frontend\SyllabusController;
use App\Http\Controllers\Frontend\TeamController;
use App\Models\Exam;
use App\Models\ExamType;
use App\Models\Syllabus;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

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

/*
|--------------------------------------------------------------------------
| Breadcrumbs Routes Start
|--------------------------------------------------------------------------
*/

Breadcrumbs::for('home', function (BreadcrumbTrail $trail): void {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('exams', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Exams', route('exams'));
});

Breadcrumbs::for('show.exam', function (BreadcrumbTrail $trail, $id): void {
    $exam = Exam::where('id', $id)->first();
    $trail->parent('exams');
    $trail->push($exam->name, route('show.exam', ['id' => $id]));
});
Breadcrumbs::for('show.categories', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Categories', route('show.categories'));
});
Breadcrumbs::for('show.category', function (BreadcrumbTrail $trail, $id): void {
    $category = ExamType::where('id', $id)->first();
    $trail->parent('show.categories');
    $trail->push($category->name, route('show.category', ['id' => $id]));
});
Breadcrumbs::for('show.syllabus', function (BreadcrumbTrail $trail, $id): void {
    $syllabus = Syllabus::where('id', $id)->first();
    $trail->parent('show.category', $syllabus->exam_type_id);
    $trail->push($syllabus->name, route('show.syllabus', ['id' => $id]));
});
Breadcrumbs::for('show.team', function (BreadcrumbTrail $trail): void {
    $trail->parent('home');
    $trail->push('Team', route('show.team'));
});
/*
|--------------------------------------------------------------------------
| Breadcrumbs Routes Ends
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Email Verificaation Routes Start
|--------------------------------------------------------------------------
*/
Route::get('/email/verify', function () {
    return view('front.auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
/*
|--------------------------------------------------------------------------
| Email verification Routes Ends
|--------------------------------------------------------------------------
*/

Route::get('/',  [HomeController::class, 'index'])->name('home');

/*
|--------------------------------------------------------------------------
| User Routes Starts
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'user/'], function () {

    // Authentication Routes
    Route::get('sign-in', [AuthController::class, 'userSignIn'])->name('user.sign.in');
    Route::post('sign-in', [AuthController::class, 'userSignInPost'])->name('user.sign.in.post');
    Route::get('sign-up', [AuthController::class, 'userSignUp'])->name('user.sign.up');
    Route::post('sign-up', [AuthController::class, 'userSignUpPost'])->name('user.sign.up.post');
    Route::get('logout', [AuthController::class, 'logout'])->name('user.logout');

    // Exam Page Routes
    Route::get('exams',  [ExamController::class, 'index'])->name('exams');
    Route::get('exam/{id}',  [ExamController::class, 'show'])->name('show.exam')->where('id', '[0-9]+');

    //Category Page Route
    Route::get('categories', [ExamTypeController::class, 'index'])->name('show.categories');
    Route::get('category/{id}', [ExamTypeController::class, 'show'])->name('show.category')->where('id', '[0-9]+');
    Route::get('syllabus/{id}', [SyllabusController::class, 'show'])->name('show.syllabus')->where('id', '[0-9]+');

    //Team Page Route
    Route::get('team', [TeamController::class, 'index'])->name('show.team');
});

/*
|--------------------------------------------------------------------------
| User Routes Ends
|--------------------------------------------------------------------------
*/


Route::group(['prefix' => 'admin/'], function () {

    // Admin Login
    Route::get('sign-in', [AdminAuthController::class, 'adminSignIn'])->name('admin.sign.in');
    Route::post('sign-in', [AdminAuthController::class, 'adminSignInPost'])->name('admin.sign.in.post');
    Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    // Admin Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Admin Exams Page
    Route::get('exams', [AdminExamController::class, 'index'])->name('admin.exams');
    Route::post('exam', [AdminExamController::class, 'create'])->name('admin.add.exam');
    Route::get('exam/{id}', [AdminExamController::class,  'delete'])->name('admin.delete.exam')->where('id', '[0-9]+');

    // Admin Category Page
    Route::get('categories', [AdminExamTypeController::class,  'index'])->name('admin.categories');
    Route::post('category', [AdminExamTypeController::class,  'create'])->name('admin.add.category');
    Route::get('category/{id}', [AdminExamTypeController::class,  'delete'])->name('admin.delete.category')->where('id', '[0-9]+');

    // Admin Syllabus Page
    Route::get('syllabi', [AdminSyllabusController::class,  'index'])->name('admin.syllabi');
    Route::post('syllabus', [AdminSyllabusController::class,  'create'])->name('admin.add.syllabus');
    Route::get('syllabus/{id}', [AdminSyllabusController::class,  'delete'])->name('admin.delete.syllabus')->where('id', '[0-9]+');
    Route::get('syllabus/file/{id}', [FileController::class,  'show'])->name('show.syllabus.file')->where('id', '[0-9]+');


    //Category Page Route
    Route::get('team', [AdminTeamController::class, 'index'])->name('admin.team');
    Route::post('team', [AdminTeamController::class, 'create'])->name('admin.add.member');
    Route::get('team/member/{id}', [AdminTeamController::class, 'delete'])->name('admin.delete.member');
});
