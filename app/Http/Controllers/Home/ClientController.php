<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ClientController extends Controller
{

    public function ViewClients()
    {
       
        $clients = Client::all()->sortBy('order');

        return view('admin.client.view_clients', compact('clients'));

    } //End Method

    /**
     * Save Service.
     */
    public function SaveClient(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:png',
        ],[
            'name.required' => 'Client\'s name is required',
            'image.required' => 'Logo/Icon in PNG is required',
        ]);

        $max_no = Client::max('order');
        $order = $max_no + 1;
        
        $image = $request->file('image');

        if($image) {
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            $img = $manager->read($image);
            $img = $img->resize(240, 200);
            // $sizedImg->toJpeg(80)->save('upload/hero_images/'.$name_gen);
            $img->save('uploads/clients/'.$name_gen);
            $save_url = 'uploads/clients/'.$name_gen;
        }

            Client::insert([
                'order' => $order,
                'name' => $request->name,
                'image' => $save_url,
            ]);

        $notification = array(
            'message' => 'Client saved',
        );

        return redirect()->back()->with($notification);

    }  //End Method

    /**
     * Edit Client.
     */
    public function EditClient($id)
    {

        $client = Client::findOrFail($id);

        return view('admin.client.edit_client', compact('client'));

    } // End Method

    /**
     * Update Client.
     */
    public function UpdateClient(Request $request)
    {

        $id = $request->id;
        $image = $request->file('image');

        if($image){
        $client = Client::findOrFail($id);        
        $delImg = $client->image;

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
            $img = $img->resize(240, 200);
            // $sizedImg->toJpeg(80)->save('upload/hero_images/'.$name_gen);
            $img->save('uploads/clients/'.$name_gen);
            $save_url = 'uploads/clients/'.$name_gen;


            Client::findOrFail($id)->update([
                'name' => $request->name,
                'image' => $save_url,
            ]);

        $notification = array(
            'message' => 'Client updated',
        );

        return redirect()->back()->with($notification);

        } else {

            Client::findOrFail($id)->update([
                'name' => $request->name,
                ]);

        $notification = array(
            'message' => 'Client updated',
            );

        return redirect()->back()->with($notification);
        }
    }  //End Method

    /**
     * Sort Client.
     */
     public function SortClient(Request $request)
    {

        $order = $request->input('order');

        foreach ($order as $index => $clientId) {
        Client::where('id', $clientId)->update(['order' => $index + 1]);
        }

        $notification = array(
            'message' => 'Client sorted',
            );

        return redirect()->back()->with($notification);

    } // End Method

    /**
     * Delete Client.
     */
    public function DeleteClient($id)
    {
        
        $delete = Client::findOrFail($id);        
        $delImg = $delete->image;

        try {
            if(file_exists($delImg)) {
            unlink($delImg);
            }
        } catch (Exception $e) {
        Log::error("Error deleting old image: " . $e->getMessage());            
        }

        Client::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Client deleted',
        );


        return redirect()->route('view.clients')->with($notification);

    } //End Method
}
