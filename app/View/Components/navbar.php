<?php

namespace App\View\Components;

use App\Models\Cart;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class navbar extends Component
{
    /**
     * Create a new component instance.
     */

    public $cart ;
    public $total=0 ;

    public function __construct()
    {
        if(Auth::guard('web')->check()){
            $user_id = Auth::guard('web')->user()->id ;
           $this->cart = Cart::where("user_id" , $user_id)->with('product.images')->get();

           $this->total = $this->cart->sum(function($item){
               return $item->product->price * $item->count ;
           });

        }


    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navbar');
    }
}
