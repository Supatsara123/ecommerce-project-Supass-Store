<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Auth;
use App\Models\Products;
use App\Models\Categories;
use App\Models\User;

class CustomerController extends Controller
{
    //
    public function category()
    {
        $category = Categories::where('status', '0')->get();
        return view('customer.category', compact('category'));
    }

    public function viewcategory($slug)
    {
        if (Categories::where('slug', $slug)->exists()) {
            $category = Categories::where('slug', $slug)->first();
            $products = Products::where('cate_id', $category->id)->where('status', '0')->get();
            return view('customer.products.index', compact('category', 'products'));
        } else {
            return redirect('/')->with('status', "Slug does not exist");
        }
    }

    public function productview($cate_slug, $prod_slug)
    {
        if (Categories::where('slug', $cate_slug)->exists()) {
            if (Products::where('slug', $prod_slug)->exists()) {
                $products = Products::where('slug', $prod_slug)->first();
                // dd($products);
                return view('customer.products.view', compact('products'));
            } else {
                return back()->withErrors(['error' => 'The link was broken']);
            }
        } else {
            return back()->withErrors(['error' => 'No such category found']);
            // return redirect('customer/home')->with('error', "No such category found");
        }
    }

    public function profile()
    {
        if (Auth::id()) {

            $user = User::where('id', Auth::id())->first();
            $user = auth()->user();

            return view('customer.personal.profile', compact('user'));
        } else {
            return redirect()->back()->with('error', 'Email and Password are wrong.');
        }
    }

    public function edit()
    {
        if (Auth::id()) {

            $user = User::where('id', Auth::id())->first();
            $user = auth()->user();

            return view('customer.personal.edit', compact('user'));
        } else {
            return redirect()->back()->with('error', 'Email and Password are wrong.');
        }
    }

    public function update(Request $request)
    {
        // Custom Error Messages
        $messages = [
            'fname.required' => 'First name is required.',
            'lname.required' => 'Last name is required.',
            'gender.required' => 'Gender is required.',
            'dateOfBirth.required' => 'Date of Birth is required.',

            'phone.required' => 'Phone number is required.',

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
            'gender' => 'required|string',
            'dateOfBirth' => 'required|date',
            'phone' => 'required|string|max:20',
            'house_number' => 'required|string|max:255',
            'moo' => 'required|string|max:255',
            'soi' => 'nullable|string|max:255',
            'road' => 'nullable|string|max:255',
            'province' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'sub_district' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
        ], $messages);

        $user = User::where('id', Auth::id())->first();
        $user = auth()->user();

        $user = User::where('id', Auth::id())->first();
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->gender = $request->input('gender');
        $user->dateOfBirth = $request->input('dateOfBirth');
        $user->phone = $request->input('phone');
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

        return redirect()->route('profile')
            ->with('status', 'Update Profile Successfully');
    }

    public function editImg(Request $request)
    {
        $request->validate(
            [
                'image' => 'required|image|mimes:jpg,gif,png|max:2048',
            ],
            [
                'image.required' => 'The product image is required.',
                'image.image' => 'The file must be an image.',
                'image.mimes' => 'The image must be a file of type: jpg, gif, png.',
                'image.max' => 'The image size must not exceed 2MB.',
            ]
        );

        $user = auth()->user();

        if (!$user) {
            return back()->withErrors(['error' => 'Your ID was not found.']);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('uploads/profile/');

            $file->move($path, $filename);
            $filePath = 'uploads/profile/' . $filename;

            $image = public_path($user->image);
            if (File::exists($image)) {
                File::delete($image);
            }
        } else {
            $filePath = $user->image;
        }

        $user = User::where('id', Auth::id())->first();
        $user->image = $filePath;
        $user->updated_at = now();
        $user->update();

        return response()->json([
            'success' => true,
            'message' => 'Image updated successfully',
        ]);
        // return redirect()->route('profile')->with('status', 'Image updated successfully');
    }

    public function editAddress(Request $request)
    {
        // Custom Error Messages
        $messages = [
            'house_number.required' => 'House/Unit number is required.',
            'moo.required' => 'Moo is required.',
            'province.required' => 'Province name is required.',
            'district.required' => 'District name is required.',
            'sub_district.required' => 'Sub-district name is required.',
            'postal_code.required' => 'Postal code is required.',
        ];

        $request->validate([
            'house_number' => 'required|string|max:255',
            'moo' => 'required|string|max:255',
            'soi' => 'nullable|string|max:255',
            'road' => 'nullable|string|max:255',
            'province' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'sub_district' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
        ], $messages);

        $user = User::where('id', Auth::id())->first();
        $user = auth()->user();

        $user = User::where('id', Auth::id())->first();
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

        return redirect()->route('profile')->with('status', 'Address updated Successfully');
    }

    public function editBasicInfo(Request $request)
    {
        // Custom Error Messages
        $messages = [
            'fname.required' => 'First name is required.',
            'lname.required' => 'Last name is required.',
            'gender.required' => 'Gender is required.',
            'dateOfBirth.required' => 'Date of Birth is required.',
        ];

        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'gender' => 'required|string',
            'dateOfBirth' => 'required|date',
        ], $messages);

        $user = User::where('id', Auth::id())->first();
        $user = auth()->user();

        $user = User::where('id', Auth::id())->first();
        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->gender = $request->input('gender');
        $user->dateOfBirth = $request->input('dateOfBirth');
        $user->updated_at->now();
        $user->update();

        return redirect()->route('profile')
            ->with('status', 'Update Profile Successfully');
    }
    public function editContact(Request $request)
    {
        // Custom Error Messages
        $messages = [
            'phone.required' => 'Phone number is required.',
        ];

        $request->validate([
            'phone' => 'required|string|max:20',
        ], $messages);

        $user = User::where('id', Auth::id())->first();
        $user = auth()->user();

        $user = User::where('id', Auth::id())->first();
        $user->phone = $request->input('phone');
        $user->updated_at->now();
        $user->update();

        return redirect()->route('profile')
            ->with('status', 'Update Profile Successfully');
    }

    public function addresses()
    {
        // $address = Address::all();
        $address = User::all();
        return view('customer.shipping-address', compact('addresses'));
    }
}
