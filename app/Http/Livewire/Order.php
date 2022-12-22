<?php

namespace App\Http\Livewire;

use App\Models\Service;
use Livewire\Component;

class Order extends Component
{
    public $successMessage = '';
    public $catchError = '';
    public $Steps = 1;
    public $category_id;
    public function mount($category_id){
        $this->category_id = $category_id;
    }
    public function render()
    { 
        $services = Service::with('category:name')->where('category_id',$this->category_id)->get();
        return view('livewire.order', ['services' => $services])
            ->layout('layouts.guest');
    }
    public function fristStepSubmit(){
        $this->Steps = 2;
    }
}
