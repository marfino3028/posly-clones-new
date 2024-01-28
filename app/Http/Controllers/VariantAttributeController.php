<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VariantAttribute;
use Illuminate\Routing\Controller;
use Carbon\Carbon;
use DataTables;

class VariantAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_auth = auth()->user();
        if ($request->ajax()) {
            $data = VariantAttribute::where('deleted_at', '=', null)->orderBy('id', 'desc')->get();

            return Datatables::of($data)->addIndexColumn()
                ->addColumn('attribute_code', function ($row) {
                    return $row->variant_code;
                })
                ->addColumn('attribute_name', function ($row) {
                    return $row->variant_name;
                })
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . url('/products') . '/variant/values/' . $row->id . '" class="add cursor-pointer ul-link-action text-primary"
                    data-toggle="tooltip" data-placement="top" title="Add Attribute Value"><i class="i-Add"></i></a>';
                    $btn .= '&nbsp;&nbsp;';

                    $btn .= '<a id="' . $row->id . '"  class="edit cursor-pointer ul-link-action text-success"
                    data-toggle="tooltip" data-placement="top" title="Edit"><i class="i-Edit"></i></a>';
                    $btn .= '&nbsp;&nbsp;';

                    $btn .= '<a id="' . $row->id . '" class="delete cursor-pointer ul-link-action text-danger"
                    data-toggle="tooltip" data-placement="top" title="Remove"><i class="i-Close-Window"></i></a>';
                    $btn .= '&nbsp;&nbsp;';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('products.attributes');
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
        request()->validate([
            'variant_name' => 'required',
            'variant_code' => 'required',
        ]);

        VariantAttribute::create([
            'variant_name' => ucwords($request['variant_name']),
            'variant_code' => strtoupper($request['variant_code'])
        ]);

        return response()->json(['success' => true]);
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
    public function edit(Request $request, $id)
    {
        $attribute = VariantAttribute::where('deleted_at', '=', null)->findOrFail($id);

        return response()->json([
            'attribute' => $attribute,
        ]);
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
        request()->validate([
            'variant_name' => 'required',
            'variant_code' => 'required',
        ]);

        VariantAttribute::whereId($id)->update([
            'variant_name' => $request['variant_name'],
            'variant_code' => $request['variant_code'],
        ]);

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $attributes = VariantAttribute::where('deleted_at', '=', null)->findOrFail($id);
        if ($attributes) {
            VariantAttribute::whereId($id)->update([
                'deleted_at' => Carbon::now(),
            ]);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
