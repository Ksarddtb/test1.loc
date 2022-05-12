<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Notifications\ProductNotif;
use Illuminate\Notifications\Notification;

class Products extends Component
{
    public $ModalUp=false,$product,$ProductEdit=false;
    protected $rules=[
        'product.article'=>'required|string|unique:products:article',
        'product.name'=>'required|string|max:255',
        'product.status'=>'required|string|max:12',
        'product.data.color'=>'required|string',
        'product.data.make'=>'required|string',
        'product.data.size'=>'required|numeric',
    ];

    public function render()
    {
        return view('livewire.products',[
            'products'=>\App\Models\Product::get(),
        ]);
    }
    public function showModal($id=null)
    {
        if($id){
            $this->product=\App\Models\Product::whereid($id)->first();
        }else{
            $this->product=new \App\Models\Product();
            $this->ProductEdit=true;
        }

        // dd($this->product);
        $this->ModalUp=true;
    }
    public function closeModal()
    {
        $this->ModalUp=false;
        $this->ProductEdit=false;
    }
    public function EditProduct()
    {
        $this->ProductEdit=true;
    }
    public function store()
    {
        // dd($this->product);
        $this->product->save();
        $this->ModalUp=false;
        $this->ProductEdit=false;
        $NotifDate=[
            'email'=>config('product.email'),
            'body'=>'test message',
            'notifText'=>'Test text',
            'url'=>url('/'),
            'thankyou'=>'спасибо',
        ];
        $send=new ProductNotif($NotifDate);
        // Notification::notify(new ProductNotif($NotifDate));
    }
    public function delete()
    {
        $this->product->delete();
        $this->ModalUp=false;
        $this->ProductEdit=false;
    }

}
