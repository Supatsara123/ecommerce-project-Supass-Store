<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\Promotions;

class PromotionController extends Controller
{
    //
    public function index()
    {
        // list all
        $promotions = Promotions::all();
        return view('admin.promotion.index', compact('promotions'));
    }

    public function create()
    {
        $promotions = Promotions::all();
        return view('admin.promotion.create-promotion', compact('promotions'));
    }

    public function insert(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:100',
                'slug' => 'required|max:100',
                'description' => 'required',
                'image' => 'required|image|mimes:jpg,gif,png|max:2048',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
            ],
            [
                // Custom Error Messages
                'name.required' => 'The name field is required.',
                'name.max' => 'The name must not exceed 100 characters.',

                'slug.required' => 'The slug field is required.',
                'slug.max' => 'The slug must not exceed 100 characters.',

                'description.required' => 'The description field is required.',

                'image.required' => 'The product image is required.',
                'image.image' => 'The file must be an image.',
                'image.mimes' => 'The image must be a file of type: jpg, gif, png.',
                'image.max' => 'The image size must not exceed 2MB.',

                'start_date.required' => 'The start date is required.',
                'start_date.date' => 'The start date must be a valid date.',

                'end_date.required' => 'The end date is required.',
                'end_date.date' => 'The end date must be a valid date.',
                'end_date.after' => 'The end date must be a date after the start date.',
            ]
        );

        // Handle the image upload
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            // Move the new file
            $path = 'uploads/promotion/';
            $file->move($path, $filename);
        } else {
            return back()->withErrors(['error' => 'File upload failed']);
        }

        // Prepare the data for insert
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'image' => $path . $filename,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'created_at' => now(),
        ];

        Promotions::insert($data);
        return redirect('/admin/promotion-list')->with('status', 'Product added successfully.');
    }

    public function edit($id)
    {
        $promotion = Promotions::find($id);
        return view('admin.promotion.edit-promotion', compact('promotion'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|max:100',
                'slug' => 'required|max:100',
                'description' => 'required',
                'image' => 'image|mimes:jpg,gif,png|max:2048', // Image is not required for update
                'start_date' => 'required|date',
                'end_date' => 'required|date|after:start_date',
            ],
            [
                // Custom Error Messages
                'name.required' => 'The name field is required.',
                'name.max' => 'The name must not exceed 100 characters.',
                'slug.required' => 'The slug field is required.',
                'slug.max' => 'The slug must not exceed 100 characters.',
                'description.required' => 'The description field is required.',
                'image.image' => 'The file must be an image.',
                'image.mimes' => 'The image must be a file of type: jpg, gif, png.',
                'image.max' => 'The image size must not exceed 2MB.',
                'start_date.required' => 'The start date is required.',
                'start_date.date' => 'The start date must be a valid date.',
                'end_date.required' => 'The end date is required.',
                'end_date.date' => 'The end date must be a valid date.',
                'end_date.after' => 'The end date must be a date after the start date.',
            ]
        );

        $promotion = Promotions::find($id);

        if (!$promotion) {
            return back()->withErrors(['error' => 'Promotion not found']);
        }

        // Handle the image upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('uploads/promotion/');

            // Move the new file
            $file->move($path, $filename);
            $filePath = 'uploads/promotion/' . $filename;

            // Delete the old image
            $image = public_path($promotion->image);
            if (File::exists($image)) {
                File::delete($image);
            }
        } else {
            // Keep the existing image path if no new image is uploaded
            $filePath = $promotion->image;
        }

        // Update the promotion data
        $promotion->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'image' => $filePath,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'updated_at' => now()
        ]);

        return redirect('admin/promotion-list')->with('status', 'Promotion updated successfully.');
    }

    public function delete($id)
    {
        $promotion = Promotions::find($id);

        if (!$promotion) {
            return back()->withErrors(['error' => 'Promotion not found']);
        }

        // Check if the promotion image exists and delete it
        $image = public_path($promotion->image);
        if (File::exists($image)) {
            File::delete($image);
        }

        $promotion->delete();
        return redirect('/admin/promotion-list')->with('status', 'Deleted successfully.');
    }
}
