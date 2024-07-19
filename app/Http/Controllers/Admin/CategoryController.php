<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

use App\Models\Categories;

class CategoryController extends Controller
{
    //
    public function list()
    {
        // list all
        $categories = Categories::paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create-category');
    }

    public function insert(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:100',
                'slug'  => 'required',
                'description'  => 'required',
                'status' => 'nullable',
                'popular' => 'nullable',
                'image' => 'required|image|mimes:jpg,gif,png|max:2048',
            ],
            [
                // Custom Error Messages
                'name.required' => 'The name field is required.',
                'name.max' => 'The name must not exceed 100 characters.',
                'slug.required' => 'The slug field is required.',
                'description.required' => 'The description field is required.',

                'image.required' => 'The category image is required.',
                'image.image' => 'The file must be an image.',
                'image.mimes' => 'The image must be a file of type: jpg, gif, png.',
                'image.max' => 'The image size must not exceed 2MB.',
            ]
        );

        // Handle the image upload
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;

            // Move the new file
            $path = 'uploads/category/';
            $file->move($path, $filename);
        } else {
            return back()->withErrors(['error' => 'File upload failed']);
        }

        // Prepare the data for insert
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'status' => $request->status == TRUE ? '1':'0',
            'popular' => $request->popular == TRUE ? '1':'0',
            'image'  => $path . $filename,
            'created_at' => now(),
        ];

        Categories::insert($data);
        return redirect('/admin/category-list')->with('status', 'Category added successfully.');
    }

    public function edit($id)
    {
        $category = Categories::find($id);                   //ดึงข้อมูลจากฐานข้อมูล ผ่านโมเดลDevice   เมื่อดึงมาแล้วจะเก็บไว้ในตัวแปร $category
        return view('admin.category.edit', compact('category'));     //จากนั้น นำข้อมูลดังกล่าวไปแสดงผลที่หน้า edit พร้อมแนบข้อมูล(compact) device ไปด้วย
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|max:100',
                'slug'  => 'required',
                'description'  => 'required',
                'status' => 'nullable',
                'popular' => 'nullable',
                'image' => 'nullable|image|mimes:jpg,gif,png|max:2048',

            ],
            [
                // Custom Error Messages
                'name.required' => 'The name field is required.',
                'name.max' => 'The name must not exceed 100 characters.',
                'slug.required' => 'The slug field is required.',
                'description.required' => 'The description field is required.',

                'image.image' => 'The file must be an image.',
                'image.mimes' => 'The image must be a file of type: jpg, gif, png.',
                'image.max' => 'The image size must not exceed 2MB.',
            ]
        );

        $category = Categories::find($id);

        if (!$category) {
            return back()->withErrors(['error' => 'Category not found']);
        }

        // Handle the image upload
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = public_path('uploads/category/');

            // Move the new file
            $file->move($path, $filename);
            $filePath = 'uploads/category/' . $filename;

            // Delete the old image
            $image = public_path($category->image);
            if (File::exists($image)) {
                File::delete($image);
            }
        } else {
            // Keep the existing image path if no new image is uploaded
            $filePath = $category->image;
        }

        // Update the category data
        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'status' => $request->status ? '1' : '0',
            'popular' => $request->popular ? '1' : '0',
            'image' => $filePath,
            'updated_at' => now()
        ]);

        return redirect('/admin/category-list')->with('status', 'Category updated successfully.');
    }

    public function delete($id)
    {
        $category = Categories::find($id);

        if (!$category) {
            return back()->withErrors(['error' => 'Category not found']);
        }

        // Check if the category image exists and delete it
        $image = public_path($category->image);
        if (File::exists($image)) {
            File::delete($image);
        }

        $category->delete();
        return redirect('/admin/category-list')->with('status', 'Deleted successfully.');
    }
}
