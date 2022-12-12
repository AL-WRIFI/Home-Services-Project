<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Provider;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provider = new Provider;
        $providers=$provider->all();
        $top_cards = [];
        $top_cards['total_providers'] = $provider->where(['accepted' => 1])->count();
        $top_cards['total_notaccepted_providers'] =$provider->where(['accepted' => 0])->count();
        $top_cards['total_active_providers'] = $provider->where(['status' => 1])->count();
        $top_cards['total_inactive_providers'] = $provider->where(['status' => 0])->count();
        return view('admin.Provider.index', compact('providers','top_cards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.Provider.create', compact('categories'));
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
         'phone'=>'required',
         'email'=>'required',
         'password'=>'required|min:6',
         'confirm_password' => 'required|same:password',
         'address'=>'required',
         'category_id'=>'required',
         'description'=>'required'
        ]);
        $provider = Provider::create($request->all());
        return redirect()->route('providers.index')
            ->with('success', 'Create Provider Successflly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        $categories = Category::all();
        return view('admin.Provider.edit', compact('provider','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'password'=>'required|min:6',
            'confirm_password' => 'required|same:password',
            'address'=>'required',
            'category_id'=>'required',
            'description'=>'required'
           ]);
           $provider->update($request->all());
           return redirect()->route('providers.index')
               ->with('success', 'Update Provider Successflly');
    }
    public function status_update($id): JsonResponse
    {
        $provider = new Provider;
        $provider->where('id', $id)->first();
        dd($provider);
        $provider->where('id', $id)->update(['status' => !$provider->status]);
        return response()->json(DEFAULT_STATUS_UPDATE_200, 200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $provider->delete();
        return redirect()->route('providers.index')
            ->with('success', 'Delete Provider Successflly');
    }
}
