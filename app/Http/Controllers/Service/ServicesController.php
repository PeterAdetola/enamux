<?php

namespace App\Http\Controllers\Service;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\ServiceImgs;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ServicesController extends Controller
{


    public function ViewServices()
    {

        $services = Service::all()->sortBy('order');

        return view('admin.service.view_services', compact('services'));

    } //End Method

    /**
     * Create Services.
     */
    public function CreateService()
    {

        return view('admin.service.create_service');

    } //End Method

    /**
     * Save Service.
     */
    public function SaveService(Request $request)
    {

            $request->validate([
                'name' => 'required',
                'summary' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg',
            ],[
                'name.required' => 'Service name is required',
                'summary.required' => 'Service summary is required',
                'image.required' => 'icon in PNG is required',
            ]);



        $max_no = Service::max('order');
        $order = $max_no + 1;

            $details       = isset($request->details);
            $images = $request->file('images');
            $image = $request->file('image');

            if($images && $details) {

                if($image) {
                    $manager = new ImageManager(new Driver());
                    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                    $img = $manager->read($image);
                    $sizedImg = $img->resize(142, 140);
                    // $sizedImg->toJpeg(80)->save('upload/hero_images/'.$name_gen);
                    $sizedImg->save('uploads/services/icons/'.$name_gen);
                    $save_url = 'uploads/services/icons/'.$name_gen;
                }

                $service = Service::create([
                    'order' => $order,
                    'name' => $request->name,
                    'summary' => $request->summary,
                    'details' => $request->details,
                    'image' => $save_url,
                ]);


                    foreach( $images as $image) {

                        if($image) {
                            $manager = new ImageManager(new Driver());
                            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                            $img = $manager->read($image);
                            $img->save('uploads/services/details/'.$name_gen);
                            $save_urls = 'uploads/services/details/'.$name_gen;
                        }

                        ServiceImgs::insert([
                            'service_id' => $service->id,
                            'order' => $order,
                            'image' => $save_urls,
                        ]);

                    }// End of the foreach

                    $notification = array(
                        'message' => 'Service saved',
                    );

                return redirect()->route('view.services')->with($notification);

            } elseif($images && !$details) {

                    if($image) {
                        $manager = new ImageManager(new Driver());
                        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                        $img = $manager->read($image);
                        $img = $img->resize(1600, 1128);
                        $img->save('uploads/services/icons/'.$name_gen);
                        $save_url = 'uploads/services/icons/'.$name_gen;
                    }

                    $service = Service::create([
                        'order' => $order,
                        'name' => $request->name,
                        'summary' => $request->summary,
                        'image' => $save_url,
                    ]);


                    foreach( $images as $image) {

                        if($image) {
                            $manager = new ImageManager(new Driver());
                            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                            $img = $manager->read($image);
                            $img->save('uploads/services/details/'.$name_gen);
                            $save_urls = 'uploads/services/details/'.$name_gen;
                        }

                         ServiceImgs::insert([
                            'service_id' => $service->id,
                            'order' => $order,
                            'image' => $save_urls,
                        ]);

                    }// End of the foreach

                    $notification = array(
                        'message' => 'Service saved',
                        // 'message' => 'Service saved, no details',
                        );

                    return redirect()->route('view.services')->with($notification);

            } elseif(!$images && $details) {

                    if($image) {
                    $manager = new ImageManager(new Driver());
                    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                    $img = $manager->read($image);
                    $img = $img->resize(1600, 1128);
                    $img->save('uploads/services/icons/'.$name_gen);
                    $save_url = 'uploads/services/icons/'.$name_gen;
                    }

                    $service = Service::create([
                        'order' => $order,
                        'image' => $save_url,
                        'name' => $request->name,
                        'summary' => $request->summary,
                        'details' => $request->details,
                    ]);

                $notification = array(
                    'message' => 'Service saved',
                    // 'message' => 'Service details saved, no image',
                    );

                return redirect()->route('view.services')->with($notification);

            } else {

                    if($image) {
                    $manager = new ImageManager(new Driver());
                    $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                    $img = $manager->read($image);
                    $img = $img->resize(1600, 1128);
                    $img->save('uploads/services/icons/'.$name_gen);
                    $save_url = 'uploads/services/icons/'.$name_gen;
                    }

                    $service = Service::create([
                        'order' => $order,
                        'image' => $save_url,
                        'name' => $request->name,
                        'summary' => $request->summary,
                    ]);

                    $notification = array(
                        'message' => 'Service saved',
                        // 'message' => 'No image, no details',
                        );

                    return redirect()->route('view.services')->with($notification);
            }

    }  //End Method

    /**
     * Sort Service.
     */
     public function SortService(Request $request)
    {

        $serviceOrder = $request->input('order');

        foreach ($serviceOrder as $index => $serviceId) {
        Service::where('id', $serviceId)->update(['order' => $index + 1]);
        }

        $notification = array(
            'message' => 'Service sorted',
            );

        return redirect()->back()->with($notification);

    } // End Method

    /**
     * Sort Service Images.
     */
     public function SortServiceImgs(Request $request)
    {

        $order = $request->input('order');

        foreach ($order as $index => $serviceId) {
        ServiceImgs::where('id', $serviceId)->update(['order' => $index + 1]);
        }

        $notification = array(
            'message' => 'Service images sorted',
            );

        return redirect()->back()->with($notification);

    } // End Method

    /**
     * Edit Service.
     */
    public function EditService($id)
    {

        $service = Service::findOrFail($id);

        $serviceImages = $service->images->sortBy('order');

        return view('admin.service.edit_service', compact('service'), compact('serviceImages'));

    } // End Method |-------------------

    /**
     * Update Service.
     */
    public function UpdateService(Request $request)
    {

        $id = $request->id;
        $image = $request->file('image');
        $images = $request->file('images');
        $order = 0;

        if($image && $images) {

        $toDelete = Service::findOrFail($id);
        $delImg = $toDelete->image;

        try {
            if(file_exists($delImg)) {
            unlink($delImg);
            }
        } catch (Exception $e) {
        Log::error("Error deleting old image: " . $e->getMessage());
        }

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $sizedImg = $img->resize(142, 140);
            // $sizedImg->toJpeg(80)->save('upload/hero_images/'.$name_gen);
            $sizedImg->save('uploads/services/icons/'.$name_gen);
            $save_url = 'uploads/services/icons/'.$name_gen;


                foreach( $images as $image) {
                    if($image) {
                        $manager = new ImageManager(new Driver());
                        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                        $img = $manager->read($image);
                        $img->save('uploads/services/details/'.$name_gen);
                        $save_urls = 'uploads/services/details/'.$name_gen;
                    }

                    ServiceImgs::insert([
                        'service_id' => $id,
                        'order' => $order,
                        'image' => $save_urls,
                    ]);

                }// End of the foreach

            Service::findOrFail($id)->update([
                'name' => $request->name,
                'summary' => $request->summary,
                'image' => $save_url,
                'details' => $request->details,
            ]);

        $notification = array(
            'message' => 'Service updated',
        );

        return redirect()->back()->with($notification);

        } elseif($image && !$images) {

        $toDelete = Service::findOrFail($id);
        $delImg = $toDelete->image;

        try {
            if(file_exists($delImg)) {
            unlink($delImg);
            }
        } catch (Exception $e) {
        Log::error("Error deleting old image: " . $e->getMessage());
        }

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $sizedImg = $img->resize(142, 140);
            // $sizedImg->toJpeg(80)->save('upload/hero_images/'.$name_gen);
            $sizedImg->save('uploads/services/icons/'.$name_gen);
            $save_url = 'uploads/services/icons/'.$name_gen;

            Service::findOrFail($id)->update([
                'name' => $request->name,
                'summary' => $request->summary,
                'details' => $request->details,
                'image' => $save_url,
                ]);

        $notification = array(
            'message' => 'Service updated',
            );

        return redirect()->back()->with($notification);

        } elseif(!$image && $images) {

            Service::findOrFail($id)->update([
                'name' => $request->name,
                'summary' => $request->summary,
                'details' => $request->details,
                ]);


                foreach( $images as $image) {

                    if($image) {
                        $manager = new ImageManager(new Driver());
                        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                        $img = $manager->read($image);
                        $img->save('uploads/services/details/'.$name_gen);
                        $save_urls = 'uploads/services/details/'.$name_gen;
                    }
// echo $id;

                    ServiceImgs::insert([
                        'service_id' => $id,
                        'order' => $order,
                        'image' => $save_urls,
                    ]);

                }// End of the foreach
// exit;

        $notification = array(
            'message' => 'Service updated',
            );

        return redirect()->back()->with($notification);

        } else {

            Service::findOrFail($id)->update([
                'name' => $request->name,
                'summary' => $request->summary,
                'details' => $request->details,
                ]);

            $notification = array(
                'message' => 'Service updated',
                );

            return redirect()->back()->with($notification);
        }


    }  //End Method

    /**
     * Delete Service.
     */
    public function DeleteService($id)
    {
        $images = ServiceImgs::where('service_id', $id)->get();

        foreach($images as $image) {
            unlink(public_path($image->image));
          }

        ServiceImgs::where('service_id', $id)->delete();

        $service = Service::findOrFail($id);
        $delImg = $service->image;

        try {
            if(file_exists($delImg)){
            unlink($delImg);
        }
        } catch (Exception $e) {
        Log::error("Error deleting old image: " . $e->getMessage());
        }

        Service::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Service deleted',
        );

        // return redirect()->back()->with($notification);

        return redirect()->route('view.services')->with($notification);

    } //End Method

    /**
     * Service page(Non-admin page).
     */
   public function ServicePage()
    {

        return view('frontend.service.services');

    } //End Method |-------------------

    /**
     * Edit Service Images.
     */
    public function EditServiceImages($id)
    {

        $service = Service::findOrFail($id);

        $serviceImages = $service->images->sortBy('order');

        return view('admin.service.edit_service_imgs', compact('service'), compact('serviceImages'));

    } // End Method |-------------------

    /**
     * Update resource in storage.
     */
    public function UpdateServiceImages(Request $request)
    {

        $id = $request->id;
        $image = $request->file('image');

        if($image) {
        $service_imgs = ServiceImgs::findOrFail($id);
        $delImg = $service_imgs->image;

        try {
            if(file_exists($delImg)) {
            unlink($delImg);
            }
        } catch (Exception $e) {
        Log::error("Error deleting old image: " . $e->getMessage());
        }

            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            // $sizedImg = $img->resize(142, 140);
            // $sizedImg->toJpeg(80)->save('upload/hero_images/'.$name_gen);
            $img->save('uploads/services/details/'.$name_gen);
            $save_url = 'uploads/services/details/'.$name_gen;


            ServiceImgs::findOrFail($id)->update([
                'image' => $save_url,
            ]);

        $notification = array(
            'message' => 'Service image updated',
        );

        return redirect()->back()->with($notification);

        } else {

        $notification = array(
            'message' => 'No image submitted',
        );

        return redirect()->back()->with($notification);

        }
    }  //End Method

    /**
     * Delete Service image.
     */
    public function DeleteServiceImg($id)
    {

        $image = ServiceImgs::findOrFail($id);
        $delImg = $image->image;

        try {
            if(file_exists($delImg)){
            unlink($delImg);
            }
        } catch (Exception $e) {
        Log::error("Error deleting old image: " . $e->getMessage());
        }

        ServiceImgs::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Image deleted',
        );

        return redirect()->back()->with($notification);

    } //End Method

    /**
     * Save Service Image.
     */
    public function SaveServiceImg(Request $request)
    {

        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg',
        ],[
            'image.required' => 'icon in PNG/JPG is required',
        ]);

        $order = 0;
        $id = $request->service_id;

        $image = $request->file('image');

        if($image) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            // $sizedImg = $img->resize(142, 140);
            // $sizedImg->toJpeg(80)->save('upload/hero_images/'.$name_gen);
            $img->save('uploads/services/details/'.$name_gen);
            $save_url = 'uploads/services/details/'.$name_gen;
        }

            ServiceImgs::insert([
                'order' => $order,
                'service_id' => $id,
                'image' => $save_url,
            ]);

        $notification = array(
            'message' => 'Image saved',
        );

        return redirect()->back()->with($notification);

    }  //End Method

    /**
     * Service Details page(Non-admin page).
     */
   public function ServiceDetailedPage($id)
    {

        $services = Service::all()->sortBy('order');

        $service = Service::findOrFail($id);

        $serviceImages = $service->images->sortBy('order');



        return view('frontend.service.service_detailed', compact('service', 'services', 'serviceImages'));

    } //End Method |-------------------
}
