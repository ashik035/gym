<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use Illuminate\Http\Request;
use Validator;
use DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::where('deleted_at', '=', Null)->orderBy('id', 'DESC')->latest()->paginate(5);

        return view('admin.post.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        // return view('admin.banner.index');
    }

    public function show($id)
    {
        $post = Post::where('id' , $id)->get()->first();
        return view('admin.post.show',compact('post'));
    }


    public function edit($id)
    {
        $post = Post::find($id);
        return view('admin.post.edit',compact('post'));
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
        $data = [];
        if ($request->hasFile('image') || $request->hasFile('video') || (isset($request['media']) && $request['media'] != Null) ) {
            if ($request->type == 'image') {
                $request->validate([
                    'title' => 'required|max:255',
                    'details' => 'required|max:255',
                    'type' => 'required',
                    'category' =>'required',
                    'image' => 'mimes:jpeg,jpg,png,gif,svg|required|max:10000',
                ]);
                if ($request->hasFile('image')) {
                    $image      = $request->file('image');
                    $fileName   = time() . '.' . $image->getClientOriginalExtension();
                    $ext = $request->file('image')->getClientOriginalExtension();

                    $img = Image::make($image->getRealPath())->encode($ext);
                    $filePath = 'images/post'.'/';

                    $post = Post::find($id);

                    if ($post->type == 'image') {
                        $im = $post->media;
                        $exists = Storage::disk('public')->exists("images/post/{$im}");
                        if($exists){
                            Storage::disk('public')->delete("images/post/{$im}");
                        }
                    } else if ($post->type == 'video') {
                        $im = $post->media;
                        $exists = Storage::disk('public')->exists("videos/post/{$im}");
                        if($exists){
                            Storage::disk('public')->delete("videos/post/{$im}");
                        }
                    }

                    Storage::disk('public')->put($filePath . $fileName, (string) $img);
                    $data['media'] = $fileName;
                }
            } else if ($request->type == 'video') {
                $request->validate([
                    'title' => 'required|max:255',
                    'details' => 'required|max:255',
                    'type' => 'required',
                    'category' =>'required',
                    'video' => 'required|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi|max:200000'
                ]);
                if ($request->hasFile('video')) {
                    $video      = $request->file('video');
                    $fileName   = time() . '.' . $video->getClientOriginalExtension();
                    $filePath = 'videos/post/' . $fileName;
                    $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->file('video')));

                    // File URL to access the video in frontend
                    $url = Storage::disk('public')->url($filePath);

                    $post = Post::find($id);

                    if ($post->type == 'image') {
                        $im = $post->media;
                        $exists = Storage::disk('public')->exists("images/post/{$im}");
                        if($exists){
                            Storage::disk('public')->delete("images/post/{$im}");
                        }
                    } else if ($post->type == 'video') {
                        $im = $post->media;
                        $exists = Storage::disk('public')->exists("videos/post/{$im}");
                        if($exists){
                            Storage::disk('public')->delete("videos/post/{$im}");
                        }
                    }

                    // Storage::disk('public')->put($filePath . $fileName, (string) $img);
                    $data['media'] = $fileName;
                }
            } else {
                $request->validate([
                    'title' => 'required|max:255',
                    'details' => 'required|max:255',
                    'type' => 'required',
                    'category' =>'required',
                    'media' => ['required',
                                'max:255',
                                'regex:/^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/i'
                                ],
                ]);

                $url = $request['media'];
                $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
                $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

                if (preg_match($longUrlRegex, $url, $matches)) {
                    $youtube_id = $matches[count($matches) - 1];
                }

                if (preg_match($shortUrlRegex, $url, $matches)) {
                    $youtube_id = $matches[count($matches) - 1];
                }
                $output = 'https://www.youtube.com/embed/' . $youtube_id ;
                $data['media'] = $output;
                $post = Post::find($id);

                if ($post->type == 'image') {
                    $im = $post->media;
                    $exists = Storage::disk('public')->exists("images/post/{$im}");
                    if($exists){
                        Storage::disk('public')->delete("images/post/{$im}");
                    }
                } else if ($post->type == 'video') {
                    $im = $post->media;
                    $exists = Storage::disk('public')->exists("videos/post/{$im}");
                    if($exists){
                        Storage::disk('public')->delete("videos/post/{$im}");
                    }
                }
            }
        } else {
            $request->validate([
                'title' => 'required|max:255',
                'details' => 'required|max:255',
                'category' =>'required',
                'type' => 'required',
            ]);
            $data['media'] = $request['current_media'];
        }
        $data['id'] =  $id;
        $data['title'] = $request['title'];
        $data['details'] = $request['details'];
        $data['type'] = $request['type'];
        $data['category'] = $request['category'];
        Post::where('id' , $data['id'])
                ->update($data);

        return redirect()->route('post.index')
                        ->with('success','Post updated successfully.');
    }

    public function destroy($id)
    {
        Post::find($id)->delete();

        return redirect()->route('post.index')
                        ->with('success','Post deleted successfully');
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store(Request $request)
    {
        $fileName = '';
        $data = [];
        if ($request->type == 'image') {
            $request->validate([
                'title' => 'required|max:255',
                'details' => 'required|max:255',
                'type' => 'required',
                'category' => 'required',
                'image' => 'mimes:jpeg,jpg,png,gif,svg|required|max:10000',
            ]);
            if ($request->hasFile('image')) {
                $image      = $request->file('image');
                $fileName   = time() . '.' . $image->getClientOriginalExtension();
                $ext = $request->file('image')->getClientOriginalExtension();

                $img = Image::make($image->getRealPath())->encode($ext);
                $filePath = 'images/post'.'/';

                Storage::disk('public')->put($filePath . $fileName, (string) $img);
                $data['media'] = $fileName;
            }
        } else if ($request->type == 'video') {
            $request->validate([
                'title' => 'required|max:255',
                'details' => 'required|max:255',
                'type' => 'required',
                'category' => 'required',
                'video' => 'required|mimetypes:video/x-ms-asf,video/x-flv,video/mp4,application/x-mpegURL,video/MP2T,video/3gpp,video/quicktime,video/x-msvideo,video/x-ms-wmv,video/avi|max:200000'
            ]);
            if ($request->hasFile('video')) {
                $video      = $request->file('video');
                $fileName   = time() . '.' . $video->getClientOriginalExtension();
                $filePath = 'videos/post/' . $fileName;
                $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->file('video')));

                // File URL to access the video in frontend
                $url = Storage::disk('public')->url($filePath);

                // Storage::disk('public')->put($filePath . $fileName, (string) $img);
                $data['media'] = $fileName;
            }
        } else {
            $request->validate([
                'title' => 'required|max:255',
                'details' => 'required|max:255',
                'type' => 'required',
                'category' => 'required',
                'media' => ['required',
                            'max:255',
                            'regex:/^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/i'
                            ],
            ]);

            $url = $request['media'];
            $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
            $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

            if (preg_match($longUrlRegex, $url, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }

            if (preg_match($shortUrlRegex, $url, $matches)) {
                $youtube_id = $matches[count($matches) - 1];
            }
            $output = 'https://www.youtube.com/embed/' . $youtube_id ;
            $data['media'] = $output;
        }
        $data['title'] = $request['title'];
        $data['details'] = $request['details'];
        $data['type'] = $request['type'];
        $data['category'] = $request['category'];
        Post::create($data);

        return redirect()->route('post.index')
                        ->with('success','Post created successfully.');
    }

    function getYoutubeEmbedUrl($url)
    {
        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }

        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' . $youtube_id ;
    }
}