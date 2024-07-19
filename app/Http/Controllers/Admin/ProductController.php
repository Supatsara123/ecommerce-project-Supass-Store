<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\Products;
use App\Models\Categories;

class ProductController extends Controller
{
    // public function index()
    // {
    //     $products = Products::all();
    //     $groupedProducts = $products->groupBy('category_id');
    //     $categories = Categories::all(); // Assuming you have a Category model with 'name' field

    //     return view('customer.home', compact('groupedProducts', 'categories'));
    // }

    public function list()
    {
        // list all
        $products = Products::paginate(10);
        $categories = Categories::all();
        return view('admin.product.product-list', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = Categories::all();
        return view('admin.product.create-product', compact('categories'));
    }

    public function insert(Request $request)
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

        // Handle the image upload
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            // Move the new file
            $path = 'uploads/product/';
            $file->move($path, $filename);
        } else {
            return back()->withErrors(['error' => 'File upload failed']);
        }

        // Prepare the data for insert
        $data = [
            'cate_id' => $request->cate_id,
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'image' => $path . $filename,
            'weight' => $request->weight,
            'original_price' => $request->original_price,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
            'tax' => $request->tax,
            'status' => $request->status == TRUE ? '1':'0',
            'trending' => $request->trending == TRUE ? '1':'0',
            'created_at' => now(),
        ];

        Products::insert($data);
        return redirect('/admin/product-list')->with('status', 'Product added successfully.');
        // return redirect('/admin/product-management')->with('status', 'Product added successfully.');
    }

    public function edit($id)
    {
        $product = Products::find($id); // Adjust as per your model
        $categories = Categories::all(); // Adjust as per your model
        return view('admin.product.edit-product', compact('product', 'categories'));
    }


    public function update(Request $request, $id)
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

        $product = Products::find($id);

        if (!$product) {
            return back()->withErrors(['error' => 'Product not found']);
        }

        // Handle the image upload
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('uploads/product/');

            // Move the new file
            $file->move($path, $filename);
            $filePath = 'uploads/product/' . $filename;

            // Delete the old image
            $image = public_path($product->image);
            if (File::exists($image)) {
                File::delete($image);
            }
        } else {
            // Keep the existing image path if no new image is uploaded
            $filePath = $product->image;
        }

        // Prepare the data for insert
        $product->update([
            'cate_id' => $request->cate_id,
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'image' => $filePath,
            'weight' => $request->weight,
            'original_price' => $request->original_price,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
            'tax' => $request->tax,
            'status' => $request->status ? '1':'0',
            'trending' => $request->trending ? '1':'0',
            'updated_at' => now(),
        ]);

        return redirect('/admin/product-list')->with('status', 'Product updated successfully.');
    }

    public function delete($id)
    {
        $product = Products::find($id);

        if (!$product) {
            return back()->withErrors(['error' => 'Product not found']);
        }

        // Check if the product image exists and delete it
        $image = public_path($product->image);
        if (File::exists($image)) {
            File::delete($image);
        }

        $product->delete();
        return redirect('/admin/product-list')->with('status', 'Deleted successfully.');
    }


    public function infoSell()
    {
        return view('customer.info-selling');
    }
}
