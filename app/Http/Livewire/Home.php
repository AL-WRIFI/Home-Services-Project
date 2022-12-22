<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
class Home extends Component
{
    public function render()
    {
        return view('livewire.home', [
                    'categories' => Category::all(),
                ])->layout('layouts.base');
    }

    public function show_services($id){

        $category = Category::whereId($id)->first();
        if($category){
            return redirect()->to('category/' . $id . '/show_services');
        }
        return redirect()->to('home');

    }
}
