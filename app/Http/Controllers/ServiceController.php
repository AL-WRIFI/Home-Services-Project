<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = request();
        $search=$request->has('search') ? $request['search'] :'';
        $status = $request->has('status') ? $request['status'] : 'all';

        //$query_param = ['search' => $search, 'status' => $status];
        // $query = Category::query();
        // if($search = $request->query('search') ){
        //     $query->where('name', 'LIKE', "%($search)%");
        // }
        // if($status = $request->query('status')){
        //     $query->where( 'status', '=' , $status);
        // }
        // $services = $query->paginate(10);


        $services = Service::with('category')
        ->when( $request->has('search') , function ($query) use ($request){
            $keys = explode(' ', $request['search']);
            foreach($keys as $key){
                $query->orWhere('name', 'LIKE', '%' . $key . '%');
            }
        })
        ->when( $status !='all', function($query) use ($status){
           $query->ofStatus( $status == 'active' ? 1 : 0 );
        })->paginate(10);
        return view('admin.Service.list',compact('services','search','status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.Service.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'description'=>'required',
            'image'=>'required',
            'price'=>'required'
        ]);

        $data = $request->except('image');
        $data['image'] = $this->uploadImage($request);
    
        $service = Service::create($data);
        return redirect()->route('services.index')
            ->with('success','Service Create Successflly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $categories = Category::all();
        return view('admin.Service.edit', compact('service','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required'
        ]);

        $data = $request->except('image');

        $old_image = $service->image;
        $new_image = $this->uploadImage($request);

        if($new_image){
            $data['image'] = $new_image;
        }

        $service->update($data);

        if($old_image && $new_image){
            Storage::disk('public')->delete($old_image);
        }
        return redirect()->route('services.index')
            ->with('success','Service Update Successflly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {

        $service->delete();
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }
        return redirect()->route('services.index')->with('success', 'Service Delete Successflly');
    }

    protected function uploadImage(Request $request){
        if(!$request->hasFile('image')){
            return;
        }
        $file =$request->file('image');

        $path = $file->store('uploads', [
            'disk' => 'public'
        ]);
        return $path;

       
    } 
}
