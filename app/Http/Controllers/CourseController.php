<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Course;
use App\Models\Subcategories;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::get();
        $courses = Course::paginate(5);
        $data = compact('categories', 'courses');
        return view('instructor.addcourse', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $imageName = 'img-' . time() . '.' . $req->file('image')->getClientOriginalExtension();
        $req->file("image")->storeAs('public/images', $imageName);

        $course = new Course();
        $course->category_id = $req->category_id;
        $course->subcate_id = $req->subcate_id;
        $course->instructor_name = $req->instructor_name;
        $course->course_title = $req->course_title;
        $course->course_description = $req->course_description;
        $course->lessons = $req->lessons;
        $course->regular_price = $req->regular_price;
        $course->discount_price = $req->discount_price;
        $course->image = $imageName;
        $course->save();

        return redirect()->back()->with('success', 'Course Added Success');
        // echo "<pre>";
        // print_r($req->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::get();
        $course = Course::get()->find($id);
        $data = compact('categories', 'course');
        return view('instructor.updatecourse', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $course = Course::find($id);

        $uploadImageName =  $req->file("image")->getClientOriginalName();

        if ($course->image == $uploadImageName) {
            $imageName = $uploadImageName;
            // echo "Image Not Updated";
        } else {
            $imageName = 'img-' . time() . '.' . $req->file('image')->getClientOriginalExtension();
            $req->file("image")->storeAs('public/images', $imageName);
            $course->image = $imageName;
            // echo "Image Updated";
        }


        $course->category_id = $req->category_id;
        $course->subcate_id = $req->subcate_id;
        $course->instructor_name = $req->instructor_name;
        $course->course_title = $req->course_title;
        $course->course_description = $req->course_description;
        $course->lessons = $req->lessons;
        $course->regular_price = $req->regular_price;
        $course->discount_price = $req->discount_price;

        $course->save();

        return redirect('/instructor/course');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::find($id)->delete();
        return redirect()->back();
    }

    public function getSubCate()
    {
        $cate_id = $_POST['id'];
        $data = Categories::join('Subcategories', 'Categories.id', 'Subcategories.category_id')
            ->where('Categories.id', $cate_id)
            ->get();
        // $data = "Joy Sen";
        return response()->json($data);
    }
    // Admin Routes 

    public function adminCourse()
    {
        $courses = Course::paginate(10);
        $data = compact('courses');
        return view("admin.course", $data);
    }

    public function showHideCourse($id)
    {
        $course = Course::find($id);
        $show_on_user = $course->show_on_user;
        if ($show_on_user) {
            $course->show_on_user = 0;
        } else {
            $course->show_on_user = 1;
        }
        $course->save();
        return redirect()->back();
    }
    public function userCourse()
    {
        $courses = Course::get();
        return view('course', compact('courses'));
    }
    public function courseDetails($id)
    {
        $course = Course::where('id', $id)->first();
        // dd($course);
        return view('detail', compact('course'));
    }
}
