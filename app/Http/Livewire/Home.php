<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
class Home extends Component
{
    public function render()
    {
        return view('livewire.home' ,[
            'categories'=> Category::all(),
        ] );
    }
}
