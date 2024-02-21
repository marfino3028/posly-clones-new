<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Brand;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Backend\HomeCtr;
use App\Http\Controllers\Backend\PaymentCtr;
use App\Http\Controllers\Backend\PurchaseCartCtr;
use App\Http\Controllers\Backend\PurchaseCtr;
use App\Http\Controllers\Backend\SalesCtr;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::get('/confirm-email/{token}', [AuthController::class, 'confirmEmail'])->name('confirm.email');
Route::get('province', 'IndonesianRegionController@getProvince')->name('province');
Route::get('cities/{provinceId}', 'IndonesianRegionController@getCity')->name('cities');
Route::get('districts/{cityId}', 'IndonesianRegionController@getDistrict')->name('district');
Route::get('subdistricts/{districtId}', 'IndonesianRegionController@getSubDistrict')->name('subdistrict');
Route::get('payment-method', 'AuthController@paymentMethod')->name('paymentmethod');
Route::get('payment-method/{id}', 'AuthController@paymentMethod');
Route::post('alamat-all', 'AuthController@alamatAllIn')->name('alamatall');
Route::post('alamat-all/{id}', 'AuthController@alamatAllIn');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::middleware(['auth:api'])->group(function () {
  Route::post('/sales', [SalesCtr::class, 'create']);
  Route::get('/sales-detail', [SalesCtr::class, 'salesDetail']);
  Route::post('/erase-sales-detail/{id}', [SalesCtr::class, 'eraseSalesDetail']);

  Route::get('/payment', [PaymentCtr::class, 'index']);
  Route::post('/payment-upload', [PaymentCtr::class, 'upload']);
  Route::post('/payment-now', [PaymentCtr::class, 'payNow']);
  Route::get('/order-summary', [PaymentCtr::class, 'orderSummary']);
  Route::get('/all-order-summary', [PaymentCtr::class, 'allOrderSummary']);
});

Route::get('/products', [HomeCtr::class, 'index']);
Route::get('/category-products', [HomeCtr::class, 'indexCategory']);
Route::get('/product/{id}', [HomeCtr::class, 'detail']);



// Route::post('/cart', [PurchaseCartCtr::class, 'create']);
// Route::get('/cart', [PurchaseCartCtr::class, 'cartbyid']);
// Route::post('/purchase', [PurchaseCtr::class, 'create']);
// 
//get categories
Route::get('categories', function (Request $request) {
  $perPage = $request->perPage ?: 7;
  $categories = Category::where('deleted_at', '=', null)
    ->paginate($perPage, ['id', 'name']);
  return response()->json([
    'data' => $categories->items(),
    'current_page' => $categories->currentPage(),
    'last_page' => $categories->lastPage()
  ]);
});

//get brands
Route::get('brands', function (Request $request) {
  $perPage = $request->perPage ?: 7;
  $brands = Brand::where('deleted_at', '=', null)
    ->paginate($perPage, ['id', 'name']);
  return response()->json([
    'data' => $brands->items(),
    'current_page' => $brands->currentPage(),
    'last_page' => $brands->lastPage()
  ]);
});
