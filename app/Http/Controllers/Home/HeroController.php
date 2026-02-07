<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroSection;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class HeroController extends Controller
{

    /**
     * View slides.
     */

    public function ViewSlides()
    {

        $slides = HeroSection::all()->sortBy('order');

        return view('admin.hero.view_slides', compact('slides'));
        // return view('admin.hero.view_slides');

    } //End Method

    /**
     * Save slide.
     */
    public function SaveSlide(Request $request)
    {
        $request->validate([
            'heading' => 'required',
            'sub_heading' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ],[
            'heading.required' => 'Slide heading is required',
            'sub_heading.required' => 'Slide sub_heading is required',
            'image.required' => 'Hero image in JPG/PNG is required',
        ]);

        $max_no = HeroSection::max('order');
        $order = $max_no + 1;
        $image = $request->file('image');

        if($image) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            // Ensure directories exist
            $mainDir = public_path('uploads/hero_images');
            $thumbnailDir = public_path('uploads/hero_images/thumbnails');

            if (!file_exists($mainDir)) {
                mkdir($mainDir, 0775, true);
            }
            if (!file_exists($thumbnailDir)) {
                mkdir($thumbnailDir, 0775, true);
            }

            // Read from uploaded file content
            $img = $manager->read($image->get());

            // Save main image
            $fullPath = public_path('uploads/hero_images/' . $name_gen);
            $img->resize(1920, 1128)->save($fullPath);

            // Save the relative path from public directory (to match your imports)
            $save_url = 'uploads/hero_images/' . $name_gen;

            // Create and save thumbnail
            $thumbnailPath = public_path('uploads/hero_images/thumbnails/thumbnail_' . $name_gen);
            $manager->read($image->get())->cover(200, 200)->save($thumbnailPath);

            // Save the relative path for thumbnail too
            $thumbnail = 'uploads/hero_images/thumbnails/thumbnail_' . $name_gen;
        }

        HeroSection::insert([
            'order' => $order,
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading,
            'image' => $save_url,
            'thumbnail' => $thumbnail,
        ]);

        $notification = array(
            'message' => 'Hero image saved',
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Edit slide.
     */
    public function EditSlide($id)
    {

        $editslide = HeroSection::findOrFail($id);

        return view('admin.home_slide.edit_slide', compact('editslide'));

    } // End Method

    /**
     * Update resource in storage.
     */
    public function UpdateSlide(Request $request)
    {
        $id = $request->id;
        $image = $request->file('image');

        if($image){
            $slide = HeroSection::findOrFail($id);
            $delImg = $slide->image;
            $delThumb = $slide->thumbnail;

            try {
                if(file_exists(public_path($delImg))){
                    unlink(public_path($delImg));
                }
                if(file_exists(public_path($delThumb))) {
                    unlink(public_path($delThumb));
                }
            } catch (Exception $e) {
                Log::error("Error deleting old image/thumbnail: " . $e->getMessage());
            }

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();

            // Ensure directories exist
            $mainDir = public_path('uploads/hero_images');
            $thumbnailDir = public_path('uploads/hero_images/thumbnails');

            if (!file_exists($mainDir)) {
                mkdir($mainDir, 0775, true);
            }
            if (!file_exists($thumbnailDir)) {
                mkdir($thumbnailDir, 0775, true);
            }

            // Read from uploaded file
            $img = $manager->read($image->get());

            // Save main image
            $fullPath = public_path('uploads/hero_images/' . $name_gen);
            $img->resize(1920, 1128)->save($fullPath);
            $save_url = 'uploads/hero_images/' . $name_gen;

            // Create thumbnail
            $thumbnailPath = public_path('uploads/hero_images/thumbnails/thumbnail_' . $name_gen);
            $manager->read($image->get())->cover(200, 200)->save($thumbnailPath);
            $thumbnail = 'uploads/hero_images/thumbnails/thumbnail_' . $name_gen;

            HeroSection::findOrFail($id)->update([
                'heading' => $request->heading,
                'sub_heading' => $request->sub_heading,
                'image' => $save_url,
                'thumbnail' => $thumbnail,
            ]);

            $notification = array(
                'message' => 'Hero image updated',
            );

            return redirect()->back()->with($notification);

        } else {
            HeroSection::findOrFail($id)->update([
                'heading' => $request->heading,
                'sub_heading' => $request->sub_heading,
            ]);

            $notification = array(
                'message' => 'Hero details updated',
            );

            return redirect()->back()->with($notification);
        }
    }

    /**
     * Sort slide.
     */
    public function SortSlide(Request $request)
    {

        $slideOrder = $request->input('order');

        foreach ($slideOrder as $index => $slideId) {
            HeroSection::where('id', $slideId)->update(['order' => $index + 1]);
        }

        $notification = array(
            'message' => 'Slide sorted',
        );

        return redirect()->back()->with($notification);

    } // End Method

    /**
     * Delete slide.
     */
    public function DeleteSlide($id)
    {
        $slide = HeroSection::findOrFail($id);
        $delImg = $slide->image;
        $delThumb = $slide->thumbnail;

        try {
            if(file_exists(public_path($delImg))){
                unlink(public_path($delImg));
            }
            if(file_exists(public_path($delThumb))) {
                unlink(public_path($delThumb));
            }
        } catch (Exception $e) {
            Log::error("Error deleting old image/thumbnail: " . $e->getMessage());
        }

        HeroSection::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Slide deleted',
        );

        return redirect()->back()->with($notification);
    } //End Method


}
