<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Orders;
use App\Models\Products;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $old_cartItems = Cart::where('user_id', Auth::id())->get();
        foreach($old_cartItems as $item)
        {
            if(!Products::where('id', $item->prod_id)->where('quantity', '>=', $item->prod_qty)->exists())
            {
                $removeItem = Cart::where('user_id',Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }

        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('customer.shopping.payment', compact('cartItems'));
    }

    public function placeorder(Request $request)
    // {

    //     $order = new Orders();
    //     $order->fname = $request->input('fname');
    // }
    {
        // dd($request->all());
        $request->validate(
            [
                'cate_id' => 'required',
                'name' => 'required|max:100',
                'slug' => 'required|max:100',
                'image' => 'required|image|mimes:jpg,gif,png|max:2048',
                'weight' => 'required|numeric|max:100',
                'original_price' => 'required|numeric|min:1',
                'selling_price' => 'required|numeric|min:1',
                'quantity' => 'required|numeric',
                'tax' => 'nullable|numeric|max:100',
                'status' => 'nullable',
                'trending'=> 'nullable',
            ],
            [
                // Custom Error Messages
                'cate_id.required' => 'The category field is required.',
                'name.required' => 'The name field is required.',
                'name.max' => 'The name must not exceed 100 characters.',

                'slug.required' => 'The slug field is required.',
                'slug.max' => 'The slug must not exceed 100 characters.',

                'image.required' => 'The product image is required.',
                'image.image' => 'The file must be an image.',
                'image.mimes' => 'The image must be a file of type: jpg, gif, png.',
                'image.max' => 'The image size must not exceed 2MB.',

                'weight.required' => 'The weight field is required.',
                'weight.numeric' => 'The weight field should contain only numeric values.',
                'weight.max' => 'The weight must not exceed 100 kg.',

                'original_price.required' => 'The Original price field is required.',
                'original_price.numeric' => 'The Original price field should contain only numeric values.',
                'original_price.min' => 'Minimum value is 1 Bath.',

                'selling_price.required' => 'The selling price field is required.',
                'selling_price.numeric' => 'The selling price field should contain only numeric values.',
                'selling_price.min' => 'Minimum value is 1 Bath.',

                'quantity.required' => 'The quantity field is required.',
                'quantity.numeric' => 'The quantity field should contain only numeric values.',

                'tax.required' => 'The tax field is required.',
                'tax.numeric' => 'The tax field should contain only numeric values.',
                'tax.max' => 'The tax must not exceed 100 %.',
            ]
        );

        // Prepare the data for insert
        $data = [
            'cate_id' => $request->cate_id,
            'name' => $request->name,
            'status' => $request->status == TRUE ? '1':'0',
            'created_at' => now(),
        ];

        Products::insert($data);
        return redirect('/admin/product-list')->with('status', 'Product added successfully.');
    }
}
