<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::get();
        $data = compact('courses');
        return view("instructor.addlessons", $data);
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
    public function addLessonIndex($id)
    {
        $total_lesson = DB::table('courses')
            ->where('id', $id)
            ->select('lessons')
            ->first()
            ->lessons;
        $lesson_added = DB::table('lessons')
            ->where('course_id', $id)
            ->get();
        $lesson_added = count($lesson_added);


        return view('instructor/addsinglelesson', compact('id', 'total_lesson', 'lesson_added'));
    }
    public function addlessonStore(Request $req)
    {

        $lesson = new Lesson();

        if (isset($req->lesson_video_link)) {
            // Youtube Video 
            $lesson->video_path = $req->lesson_video_link;;
            $lesson->video_from = 'youtube';
        } elseif (isset($req->lesson_video)) {
            // Video From Local Disk
            $video_name = 'video-' . time() . '.' . $req->file('lesson_video')->getClientOriginalExtension();
            $req->file('lesson_video')->storeAs('public/videos/', $video_name);
            $video_path = 'storage/videos/' . $video_name;
            $lesson->video_path = $video_path;
            $lesson->video_from = 'local';
        }
        $lesson->lesson_title = $req->lesson_title;
        $lesson->course_id = $req->course_id;

        $lesson->save();

        // return redirect('instructor/addlesson/' . $req->course_id);
        return redirect()->back()->with('success', 'Lesson Added Successfully');
    }

    // Lessons For User 
    public function showInUserIndex()
    {
        return view('lessons');
    }
}
