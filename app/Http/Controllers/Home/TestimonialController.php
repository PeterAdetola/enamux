<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class TestimonialController extends Controller
{    

    public function ViewTestimonials()
    {
       
        $testimonials = Testimonial::all()->sortBy('order');

        return view('admin.testimonial.view_testimonials', compact('testimonials'));
        // return view('admin.service.view_services');

    } //End Method

    /**
     * Save Service.
     */
    public function SaveTestimonial(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'content' => 'required',
            'role' => 'required',
        ],[
            'name.required' => 'Name of testifier is required',
            'content.required' => 'Testimony content is required',
            'role.required' => 'Role of testifier is required',
        ]);

        
        $max_no = Testimonial::max('order');
        $order = $max_no + 1;
        
        $image = $request->file('image');

        if($image) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(600, 600);
            // $sizedImg->toJpeg(80)->save('upload/hero_images/'.$name_gen);
            $img->save('uploads/testimonials/'.$name_gen);
            $save_url = 'uploads/testimonials/'.$name_gen;
        } else {
            $save_url = '';
        }

            Testimonial::insert([
                'order' => $order,
                'name' => $request->name,
                'role' => $request->role,
                'content' => $request->content,
                'image' => $save_url,
            ]);

        $notification = array(
            'message' => 'Testimony saved',
        );

        return redirect()->back()->with($notification);

    }  //End Method

    /**
     * Edit Testimonial.
     */
    public function EditTestimonial($id)
    {

        $testimonial = Testimonial::findOrFail($id);

        return view('admin.testimonial.edit_testimonial', compact('testimonial'));

    } // End Method

    /**
     * Update testimonial in storage.
     */
    public function UpdateTestimonial(Request $request)
    {

        $id = $request->id;
        $image = $request->file('image');

        if($image){
        $testimonial = Testimonial::findOrFail($id);        
        $delImg = $testimonial->image;

        try {
            if(file_exists($delImg)){
            unlink($delImg);
        }
        } catch (Exception $e) {
        Log::error("Error deleting old image: " . $e->getMessage());            
        }

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(600, 600);
            // $sizedImg->toJpeg(80)->save('upload/hero_images/'.$name_gen);
            $img->save('uploads/testimonials/'.$name_gen);
            $save_url = 'uploads/testimonials/'.$name_gen;


            Testimonial::findOrFail($id)->update([
                'name' => $request->name,
                'role' => $request->role,
                'content' => $request->content,
                'image' => $save_url,
            ]);

        $notification = array(
            'message' => 'Testimonial updated',
        );

        return redirect()->back()->with($notification);

        } else {

            Testimonial::findOrFail($id)->update([
                'name' => $request->name,
                'role' => $request->role,
                'content' => $request->content,
            ]);

        $notification = array(
            'message' => 'Testimonial updated',
            );

        return redirect()->back()->with($notification);
        }
    }  //End Method

    /**
     * Sort slide.
     */
     public function SortTestimonial(Request $request)
    {

        $order = $request->input('order');

        foreach ($order as $index => $testimonialId) {
        Testimonial::where('id', $testimonialId)->update(['order' => $index + 1]);
        }

        $notification = array(
            'message' => 'Testimonial sorted',
            );

        return redirect()->back()->with($notification);

    } // End Method

    /**
     * Delete Testimonial.
     */
    public function DeleteTestimonial($id)
    {
        
        $delete = Testimonial::findOrFail($id);        
        $delImg = $delete->image;

        try {
            if(file_exists($delImg)){
            unlink($delImg);
        }
        } catch (Exception $e) {
        Log::error("Error deleting old image: " . $e->getMessage());            
        }

        Testimonial::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Testimonial deleted',
        );

        // return redirect()->back()->with($notification);

        return redirect()->route('view.testimonials')->with($notification);

    } //End Method

    /**
     * Add Testimonial image.
     */
    public function AddTestimonialImg(Request $request)
    {

        $id = $request->id;
        $image = $request->file('image');

        if($image){
        $testimonial = Testimonial::findOrFail($id);        
        // $delImg = $testimonial->image;


            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(600, 600);
            // $sizedImg->toJpeg(80)->save('upload/hero_images/'.$name_gen);
            $img->save('uploads/testimonials/'.$name_gen);
            $save_url = 'uploads/testimonials/'.$name_gen;


            Testimonial::findOrFail($id)->update([
                'image' => $save_url,
            ]);

        $notification = array(
            'message' => 'Image Added',
        );

        return redirect()->back()->with($notification);

        }

    } //End Method

    /**
     * Delete Testimonial image.
     */
    public function DeleteTestimonialImg($id)
    {
        
        $image = Testimonial::findOrFail($id);        
        $delImg = $image->image;

        try {
            if(file_exists($delImg)) {
            unlink($delImg);
            }
        } catch (Exception $e) {
        Log::error("Error deleting old image: " . $e->getMessage());            
        }

        $image = '';

            Testimonial::findOrFail($id)->update([
                'image' => $image,
            ]);

        $notification = array(
            'message' => 'Image deleted',
        );

        return redirect()->back()->with($notification);

    } //End Method
}
