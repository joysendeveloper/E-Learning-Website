<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\lessonController;
use App\Http\Controllers\SubcategoryController;
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


// User Routes
Route::get('/', [HomeController::class, "index"]);
Route::get('/about', function () {
    return view("about");
});
Route::get("/course", [CourseController::class, "userCourse"]);
// show course details 
Route::get("/course/{id}", [CourseController::class, "courseDetails"]);
Route::get("/contact", function () {
    return view("contact");
});
Route::get("/feature", function () {
    return view("feature");
});
Route::get("/team", function () {
    return view("team");
});
Route::get("/detail", function () {
    return view("detail");
});
Route::get("/testimonial", function () {
    return view("testimonial");
});

// Admin Page Route 
Route::get("/admin", function () {
    return view("admin.index");
});

// Categories Route 
Route::get("/admin/addcate", [CategoryController::class, "index"]);
Route::post('/admin/addcate', [CategoryController::class, 'store']);
Route::get('admin/deletecate/{id}', [CategoryController::class, 'delete']);
Route::get('admin/updatecate/{id}', [CategoryController::class, 'update']);
Route::post('admin/editcate/{id}', [CategoryController::class, 'edit']);

// Subcategories Route
Route::get("/admin/showcate", [SubcategoryController::class, "index"]);
Route::post('/admin/addsubcate', [SubcategoryController::class, 'store']);
Route::get('admin/deletesubcate/{id}', [SubcategoryController::class, 'delete']);
Route::get('admin/updatesubcate/{id}', [SubcategoryController::class, 'update']);
Route::post('admin/editsubcate/{id}', [SubcategoryController::class, 'edit']);


// Instructor Route
Route::get("/instructor", function () {
    return view("instructor.index");
});

// Course Route 
// Admin Course Route 
Route::get("/admin/course", [CourseController::class, 'adminCourse']);
Route::post("/admin/course/{id}", [CourseController::class, 'showHideCourse']);
Route::post("/instructor/get_sub_cate", [CourseController::class, 'getSubCate']);
Route::resource("/instructor/course", CourseController::class);

// Lessons Route 
Route::get('instructor/addlesson/{id}', [lessonController::class, 'addLessonIndex']);
Route::post('instructor/addlesson', [lessonController::class, 'addlessonStore']);
Route::resource("/instructor/lessons", lessonController::class);
