<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\VariantAttribute;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\VariantAttributeValue;
use Carbon\Carbon;
use DataTables;

class VariantAttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $data = VariantAttribute::find($id);
        return view('products.attributesValue', ['id' => $id, 'attribute' => $data->variant_name]);
    }

    public function dataTables(Request $request, $id)
    {
        if ($request->ajax() || $id) {
            if (empty($id)) {
                return abort('404');
            }

            $data = VariantAttributeValue::with('variantAttribute')
                ->where('variant_attribute_id', $id)
                ->where('deleted_at', '=', null)
                ->orderBy('id', 'desc')
                ->get();

            return Datatables::of($data)->addIndexColumn()
                ->addColumn('attribute_name', function ($row) {
                    return $row->variantAttribute->variant_name;
                })
                ->addColumn('attribute_value_code', function ($row) {
                    return $row->variant_attribute_value_code;
                })
                ->addColumn('attribute_value_name', function ($row) {
                    return $row->variant_attribute_value_name;
                })
                ->addColumn('action', function ($row) {

                    $btn = '<a id="' . $row->id . '"  class="edit cursor-pointer ul-link-action text-success"
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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        if (empty($id)) {
            return response()->json(['success' => false]);
        }

        VariantAttributeValue::create([
            'variant_attribute_id' => $id,
            'variant_attribute_value_code' => ucwords($request['code']),
            'variant_attribute_value_name' => ucwords($request['name'])
        ]);

        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($attributeId)
    {
        $attributeValues = VariantAttributeValue::where('deleted_at', '=', null)
            ->where('variant_attribute_id', '=', $attributeId)
            ->get();

        return response()->json($attributeValues);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($attributeId, $id)
    {
        $attributeValues = VariantAttributeValue::where('deleted_at', '=', null)->findOrFail($id);

        return response()->json([
            'attributeValues' => $attributeValues,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $attributeId, $id)
    {
        request()->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        VariantAttributeValue::whereId($id)->update([
            'variant_attribute_value_code' => ucwords($request['code']),
            'variant_attribute_value_name' => ucwords($request['name'])
        ]);

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($attributeId, $id)
    {
        $attributeValues = VariantAttributeValue::where('deleted_at', '=', null)->findOrFail($id);
        if ($attributeValues) {
            VariantAttributeValue::whereId($id)->update([
                'deleted_at' => Carbon::now(),
            ]);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function getProductVariant($productId, $variantId)
    {
        $Product = Product::where('deleted_at', '=', null)->findOrFail($productId);

        $item['is_variant'] = true;
        $productsVariants = ProductVariant::where('product_id', $productId)
            ->where('deleted_at', null)
            ->get();

        $var_id = 1;
        foreach ($productsVariants as $variant) {
            echo '<select class="form-control attribute_value"
            name="variant_values[]" required id="attribute_value_'.$var_id.'" style="width: 100%">';
            echo '<option value="'.$variant->attribute_value_id.'">'.$variant->name.'</option>';
            echo '</select>';
        }
        $var_id++;
    }
}
