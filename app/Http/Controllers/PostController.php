<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Warehouse;
use App\utils\helpers;
use Illuminate\Http\Request;
use App\Models\Post;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_auth = auth()->user();
        if($user_auth) {
            if ($request->ajax()) {
                $data = Post::where('deleted_at', '=', null)->orderBy('id', 'desc')->get();

                return Datatables::of($data)->addIndexColumn()

                    ->addColumn('action', function($row){

                        $btn = '<a href="/post/' .$row->id. '/edit"  class="edit cursor-pointer ul-link-action text-success"
                        data-toggle="tooltip" data-placement="top" title="Edit"><i class="i-Edit"></i></a>';
                        $btn .= '&nbsp;&nbsp;';

                        $btn .= '<a id="' .$row->id. '" class="delete cursor-pointer ul-link-action text-danger"
                        data-toggle="tooltip" data-placement="top" title="Remove"><i class="i-Close-Window"></i></a>';
                        $btn .= '&nbsp;&nbsp;';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('post.post_list');
        }
        return abort('403', __('You are not authorized'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_auth = auth()->user();
        if($user_auth) {
            return view('post.create_post');
        }
        return abort('403', __('You are not authorized'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_auth = auth()->user();
        if($user_auth) {
            \DB::transaction(function () use ($request) {
                $Post               = new Post;
                $Post->title        = $request['title'];
                $Post->slug         = Str::slug($request['title'], '-');
                $Post->description  = $request['description'];
                $Post->is_active    = $request['status'];
                $Post->category     = $request['category'];
                $Post->save();

                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $filename = time() . '.' . $image->extension();
                    $image->move(public_path('/images/post'), $filename);
                } else {
                    $filename = 'no_image.png';
                }

                $image = new Media(['url' => $filename]);
                $Post->images()->save($image);
            }, 10);
            return response()->json(['success' => true]);
        }
        return abort('403', __('You are not authorized'));
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
        $user_auth = auth()->user();
        if($user_auth) {
            $post = Post::findOrFail($id);
            $old_photo = asset('images/post/').'/'.$post->images()->latest()->value('url');
            return view('post.edit_post', compact('post','old_photo'));
        }
        return abort('403', __('You are not authorized'));
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
        $user_auth = auth()->user();
        if ($user_auth) {
            $Post               = Post::findOrFail($id);
            $Post->title        = $request->title;
            $Post->slug         = Str::slug($request['slug'], '-');
            $Post->description  = $request->description;
            $Post->is_active    = $request->is_active;
            $Post->category     = $request->category;
            $Post->save();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->extension();
                $image->move(public_path('/images/post'), $filename);
            } else {
                $filename = 'no_image.png';
            }

            $image = new Media(['url' => $filename]);
            $Post->images()->save($image);

            return response()->json(['success' => true]);
        }
        return abort('403', __('You are not authorized'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_auth = auth()->user();
        if ($user_auth){
            Post::whereId($id)->update([
                'deleted_at' => Carbon::now(),
            ]);
            return response()->json(['success' => true]);
        }
        return abort('403', __('You are not authorized'));
    }
}
