<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Products extends Component
{
    public $ModalUp=false;

    public function render()
    {
        return view('livewire.products',[
            'products'=>\App\Models\Product::get(),
        ]);
    }
    public function showModal()
    {
        dd('asfasfdsfsdfsdfds');
        $this->ModalUp=true;
    }
    public function closeModal()
    {
        $this->ModalUp=false;
    }
}
