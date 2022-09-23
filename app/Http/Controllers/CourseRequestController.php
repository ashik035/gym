<?php

namespace App\Http\Controllers;

use App\Models\CourseRequest;
use App\Models\Course;
use App\Http\Requests\StoreCourseRequestRequest;
use App\Http\Requests\UpdateCourseRequestRequest;

class CourseRequestController extends Controller
{
    public function index()
    {
        $courses = CourseRequest::where('deleted_at', '=', Null)->orderBy('id', 'DESC')->latest()->paginate(5);

        return view('admin.course.course_request_list',compact('courses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function show($id)
    {
        $order = CourseRequest::where('id' , $id)->get()->first();
        $course = Course::where('id' , $order->course_id)->get()->first();
        $p = (int)$course->price;
        $cost = $p + (($p/1000)*20);
        return view('admin.course.course_request_show',compact('order', 'course', 'cost'));
    }

    public function destroy($id)
    {
        CourseRequest::find($id)->delete();

        return redirect()->route('course.request.list')
                        ->with('success','Course Request deleted successfully');
    }
}
