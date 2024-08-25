<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;

class CheckoutController extends Controller
{
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

        $user = Auth::user(); // Get the authenticated user
        $cartItems = Cart::where('user_id', $user->id)->get(); // Retrieve cart items for the user

        return view('customer.shopping.payment', compact('user', 'cartItems'));
    }

    public function placeorder(Request $request, $id)
    {
        // Custom Error Messages
        $messages = [
            'fname.required' => 'First name is required.',
            'lname.required' => 'Last name is required.',

            'phone.required' => 'Phone number is required.',
            'email.required' => 'Email is required.',

            'house_number.required' => 'House/Unit number is required.',
            'moo.required' => 'Moo is required.',
            'province.required' => 'Province name is required.',
            'district.required' => 'District name is required.',
            'sub_district.required' => 'Sub-district name is required.',
            'postal_code.required' => 'Postal code is required.',
        ];

        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',

            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:users,email',

            'house_number' => 'required|string|max:255',
            'moo' => 'required|string|max:255',
            'soi' => 'nullable|string|max:255',
            'road' => 'nullable|string|max:255',
            'province' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'sub_district' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',

            // 'status',
            // 'message',
            // 'tracking_no',
        ], $messages);

        $order = new Orders();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->house_number = $request->input('house_number');
        $order->moo = $request->input('moo');
        $order->soi = $request->input('soi');
        $order->road = $request->input('road');
        $order->province = $request->input('province');
        $order->district = $request->input('district');
        $order->sub_district = $request->input('sub_district');
        $order->postal_code = $request->input('postal_code');
        $order->tracking_no = 'sharma'.rand(1111,9999);
        $order->created_at>now();
        $order->create();

        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach($cartItems as $item)
        {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id' => $item->prod_id,
                'quantity' => $item->quantity,
                'price' => $item->products->selling_price,
            ]);
        }

        if(Auth::user()->house_number == NULL)
        {
            $user = User::where('id', Auth::id())->first();
            $user->fname = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->email = $request->input('email');
            $user->house_number = $request->input('house_number');
            $user->moo = $request->input('moo');
            $user->soi = $request->input('soi');
            $user->road = $request->input('road');
            $user->province = $request->input('province');
            $user->district = $request->input('district');
            $user->sub_district = $request->input('sub_district');
            $user->postal_code = $request->input('postal_code');
            $user->updated_at->now();
            $user->update();
        }


        // $user = User::where('id', Auth::id())->first();
        // $user = auth()->user();

        // $user = User::where('id', Auth::id())->first();
        // $user->fname = $request->input('fname');
        // $user->lname = $request->input('lname');
        // $user->gender = $request->input('gender');
        // $user->dateOfBirth = $request->input('dateOfBirth');
        // $user->phone = $request->input('phone');
        // $user->house_number = $request->input('house_number');
        // $user->moo = $request->input('moo');
        // $user->soi = $request->input('soi');
        // $user->road = $request->input('road');
        // $user->province = $request->input('province');
        // $user->district = $request->input('district');
        // $user->sub_district = $request->input('sub_district');
        // $user->postal_code = $request->input('postal_code');
        // $user->updated_at->now();
        // $user->update();

        return redirect()->route('profile')->with('status', 'Update Profile Successfully');
    }
}
