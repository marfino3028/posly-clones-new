<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $categoryProducts = [
            [
                'id' => 1,
                'name' => 'All',
            ],
            [
                'id' => 2,
                'name' => 'T-Shirt',
            ],
            [
                'id' => 3,
                'name' => 'Shirt',
            ],
            [
                'id' => 4,
                'name' => 'Pants',
            ],
            [
                'id' => 5,
                'name' => 'Shoes',
            ],
            [
                'id' => 6,
                'name' => 'Accessories',
            ]
        ];

        $products = [
            [
                'id' => 1,
                'name' => 'T-Shirt 1',
                'price' => 100000,
                'image' => 'https://via.placeholder.com/150',
            ],
        ];

        $data = [
            'categoryProducts' => $categoryProducts,
            'products' => $products,
        ];

        return view('frontend.content.home');
    }

    public function product()
    {

        $product_details = [
            'id' => 1,
            'name' => 'T-Shirt 1',
            'price' => 100000,
            'image' => 'https://via.placeholder.com/150',
            'description' => 'Lorem ipsum dolor sit amet c
            onsectetur adipisicing elit. Quos blanditiis tenetur
            unde suscipit, quam beatae rerum inventore consectetur,
            neque doloribus, cupiditate numquam dignissimos laborum
            fugiat deleniti? Eum quasi quidem quibusdam.',
            'variant' => [
                [
                    'id' => 1,
                    'name' => 'S',
                ],
                [
                    'id' => 2,
                    'name' => 'M',
                ],
                [
                    'id' => 3,
                    'name' => 'L',
                ],
                [
                    'id' => 4,
                    'name' => 'XL',
                ],
                [
                    'id' => 5,
                    'name' => 'XXL',
                ]
            ],
            'color' => [
                [
                    'id' => 1,
                    'name' => 'Red',
                    'code' => '#ff0000',
                ],
                [
                    'id' => 2,
                    'name' => 'Green',
                    'code' => '#00ff00',
                ],
                [
                    'id' => 3,
                    'name' => 'Blue',
                    'code' => '#0000ff',
                ],
                [
                    'id' => 4,
                    'name' => 'Yellow',
                    'code' => '#ffff00',
                ],
                [
                    'id' => 5,
                    'name' => 'Black',
                    'code' => '#000000',
                ],
                [
                    'id' => 6,
                    'name' => 'White',
                    'code' => '#ffffff',
                ],
            ],
        ];

        return view('frontend.content.product');
    }

    public function grid()
    {
        return view('frontend.content.grid');
    }

    public function list()
    {
        return view('frontend.content.list');
    }

    public function cart()
    {

        $cart = [
            [
                'id' => 1,
                'name' => 'T-Shirt 1',
                'price' => 100000,
                'image' => 'https://via.placeholder.com/150',
                'quantity' => 1,
                'variant' => [
                    'id' => 1,
                    'name' => 'S',
                ],
                'color' => [
                    'id' => 1,
                    'name' => 'Red',
                    'code' => '#ff0000',
                ],
            ],
        ];

        $order_detail = [
            'total_harga' => 100000,
            'potongan_discount ' => -1000,
            'total_bayar' => 99000,
        ];

        return view('frontend.content.cart');
    }

    public function shipping()
    {
        return view('frontend.content.shipping');
    }

    public function payment()
    {

        $payment_methods = [
            [
                'id' => 1,
                'name' => 'BCA',
                'no_rek' => '1234567890',
            ],
        ];

        $order_detail = [
            'total_harga' => 100000,
            'potongan_discount ' => -1000,
            'total_bayar' => 99000,
        ];

        return view('frontend.content.payment');
    }

    public function paymentSuccess()
    {

        $order_detail = [
            'total_harga' => 100000,
            'potongan_discount ' => -1000,
            'total_bayar' => 99000,
            'products' => [
                [
                    'id' => 1,
                    'name' => 'T-Shirt 1',
                    'price' => 100000,
                    'image' => 'https://via.placeholder.com/150',
                    'quantity' => 1,
                    'variant' => [
                        'id' => 1,
                        'name' => 'S',
                    ],
                    'color' => [
                        'id' => 1,
                        'name' => 'Red',
                        'code' => '#ff0000',
                    ],
                ],
                []
            ],
        ];


        return view('frontend.content.paymen-success');
    }

    public function login()
    {
        return view('frontend.content.login');
    }

    public function register()
    {
        return view('frontend.content.register');
    }
}
