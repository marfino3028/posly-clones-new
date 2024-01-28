<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Post;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_auth = auth()->user();
        if ($user_auth) {
            return view('media.list_media');
        }
        return abort('403', __('You are not authorized'));
    }

    public function get_media_datatables(Request $request)
    {
        if ($request->ajax()) {
            $data = Media::where('type', '!=', null)
                ->where('deleted_at', '=', null)
                ->orderBy('id', 'desc')
                ->get();

            return Datatables::of($data)->addIndexColumn()
                ->addColumn('title', function ($row) {
                    return $row->title;
                })
                ->addColumn('images', function ($row) {
                    return '<img src="'.url('images/'.$row->type).'/'.$row->url.'" class="img-thumbnail w-25">';
                })
                ->addColumn('status', function ($row) {
                    return $row->is_active;
                })
                ->addColumn('action', function ($row) {

                    $btn = '<a href="media/' . $row->id . '/edit"  class="edit cursor-pointer ul-link-action text-success"
                    data-toggle="tooltip" data-placement="top" title="Edit"><i class="i-Edit"></i></a>';
                    $btn .= '&nbsp;&nbsp;';

                    $btn .= '<a id="' . $row->id . '" class="delete cursor-pointer ul-link-action text-danger"
                    data-toggle="tooltip" data-placement="top" title="Remove"><i class="i-Close-Window"></i></a>';
                    $btn .= '&nbsp;&nbsp;';

                    return $btn;
                })
                ->rawColumns(['action','images'])
                ->make(true);
        }
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
            return view('media.create_media');
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
                //-- Create New Product
                $Media = new Media;

                //-- Field Required
                $Media->title           = $request['title'];
                $Media->type            = $request['category'];
                $Media->is_active       = $request['status'];

                if ($request->hasFile('image')) {

                    $image = $request->file('image');
                    $filename = time() . '.' . $image->extension();
                    $image->move(public_path('/images/'.$request['category']), $filename);
                } else {
                    $filename = 'no_image.png';
                }

                $Media->url = $filename;
                $Media->save();
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
            $media = Media::findOrFail($id);
            $old_photo = asset('images/'.$media->type.'/').'/'.$media->url;
            return view('media.edit_media', compact('media','old_photo'));
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
            $Media               = Media::findOrFail($id);
            $Media->title           = $request->title;
            $Media->type            = $request->type;
            $Media->is_active       = $request->is_active;
            $Media->save();

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $filename = time() . '.' . $image->extension();
                $image->move(public_path('/images/'.$request->type), $filename);
                $Media->url = $filename;
                $Media->save();
            } else {
                $filename = 'no_image.png';
            }

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
            Media::whereId($id)->update([
                'deleted_at' => Carbon::now(),
            ]);
            return response()->json(['success' => true]);
        }
        return abort('403', __('You are not authorized'));
    }
}
