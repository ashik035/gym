<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use Illuminate\Http\Request;
use Validator;
use DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $courses = Course::where('deleted_at', '=', Null)->orderBy('id', 'DESC')->latest()->paginate(5);

        return view('admin.course.index',compact('courses'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.course.create');
    }

    public function store(Request $request)
    {
        $data = [];
        $request->validate([
            'menu_name' => 'required|max:255',
            'name' => 'required|max:255',
            'included' => 'required',
            'price' => 'required',
            'duration' => 'required',
        ]);

        $data['menu_name'] = $request['menu_name'];
        $data['name'] = $request['name'];
        $data['included'] = $request['included'];
        $data['price'] = $request['price'];
        $data['duration'] = $request['duration'];
        Course::create($data);

        return redirect()->route('course.index')
                        ->with('success','Course created successfully.');
    }

    public function show($id)
    {
        $course = Course::where('id' , $id)->get()->first();
        return view('admin.course.show',compact('course'));
    }


    public function edit($id)
    {
        $course = Course::find($id);
        return view('admin.course.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [];

        $data = [];
        $request->validate([
            'menu_name' => 'required|max:255',
            'name' => 'required|max:255',
            'included' => 'required',
            'price' => 'required',
            'duration' => 'required',
        ]);

        $data['menu_name'] = $request['menu_name'];
        $data['name'] = $request['name'];
        $data['included'] = $request['included'];
        $data['price'] = $request['price'];
        $data['duration'] = $request['duration'];

        Course::where('id' , $id)
                ->update($data);

        return redirect()->route('course.index')
                        ->with('success','course updated successfully.');
    }

    public function destroy($id)
    {
        Course::find($id)->delete();

        return redirect()->route('course.index')
                        ->with('success','course deleted successfully');
    }
}