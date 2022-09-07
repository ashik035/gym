<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use Illuminate\Http\Request;
use Validator;
use DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $blogs = Blog::where('deleted_at', '=', Null)->orderBy('id', 'DESC')->latest()->paginate(5);

        return view('admin.blog.index',compact('blogs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        // return view('admin.banner.index');
    }

    public function show($id)
    {
        $blog = Blog::where('id' , $id)->get()->first();
        return view('admin.blog.show',compact('blog'));
    }


    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blog.edit',compact('blog'));
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
        $fileName = '';

        if ($request->hasFile('image')) {
            $request->validate([
                'title' => 'required|max:255|min:5',
                'details' => 'required|max:200|min:20',
                'image' => 'mimes:jpeg,jpg,png,gif,svg|required|max:10000'
            ]);

            $image      = $request->file('image');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $ext = $request->file('image')->getClientOriginalExtension();

            $img = Image::make($image->getRealPath())->resize(1200, 600, function ($aspect) {
                $aspect->aspectRatio();
            })->encode($ext);
            $filePath = 'images/blog'.'/';

            Storage::disk('public')->put($filePath . $fileName, (string) $img);
        } else {
            $request->validate([
                'title' => 'required|max:255|min:5',
                'details' => 'required|max:200|min:20'
            ]);
            $fileName = $request['current_image'];
        }

        $data = [];
        $data['id'] = $id;
        $data['title'] = $request['title'];
        $data['details'] = $request['details'];
        $data['image'] = $fileName;

        // dd($data);
        Blog::where('id' , $data['id'])
                ->update($data);

        return redirect()->route('blog.index')
                        ->with('success','Blog updated successfully');
    }

    public function destroy($id)
    {
        Blog::find($id)->delete();

        return redirect()->route('blog.index')
                        ->with('success','Blog deleted successfully');
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title' => 'required|max:255|min:5',
            'details' => 'required|max:2000|min:20',
            'image' => 'mimes:jpeg,jpg,png,gif,svg|required|max:10000',
        ]);

        $fileName = '';

        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $fileName   = time() . '.' . $image->getClientOriginalExtension();
            $ext = $request->file('image')->getClientOriginalExtension();

            $img = Image::make($image->getRealPath())->resize(1200, 600, function ($aspect) {
                $aspect->aspectRatio();
            })->encode($ext);
            $filePath = 'images/blog'.'/';

            Storage::disk('public')->put($filePath . $fileName, (string) $img);
        }

        $data = [];
        $data['title'] = $request['title'];
        $data['details'] = $request['details'];
        $data['image'] = $fileName;

        Blog::create($data);

        return redirect()->route('blog.index')
                        ->with('success','Blog created successfully.');
    }
}