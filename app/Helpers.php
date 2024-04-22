<?php

namespace App;

use App\Http\Requests\OrderRequest;
use App\Models\Contact;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Helpers
{
    public function addToCart($product_id, $product_name, $product_price)
    {
        if (auth()->check()) {
            Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
            session()->flash('status', 'Item added successfully to Cart');
        } else {
            return redirect()->route('login');
        }
    }

    public function addToWishList($product_id, $product_name, $product_price)
    {
        Cart::instance('wishlist')->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        session()->flash('status', 'Item added successfully to Wishlist');
    }

    public function deleteFromWishlist($product_id)
    {
        foreach (Cart::instance('wishlist')->content() as $item) {
            if ($item->id == $product_id) {
                Cart::instance('wishlist')->remove($item->rowId);
            }
        }

    }

    function uploadImage($image, $modelName): string
    {
        $path = "images/$modelName";
        $imageName = env('APP_NAME') . '_' . time() . '_' . $image->getClientOriginalName();
        $image->storeAs($path, $imageName, 'public');
        return $imageName;
    }

    function makeOrder(Request $request)
    {
        $product= new Product();
        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->city = $request->input('city');
        $order->country = $request->input('country');
        $order->postal_code = $request->input('postal_code');
        $order->tracking_no = 'ali' . rand(1111, 9999);
        $order->total_price = Cart::instance('cart')->total();
        $order->save();
        $Cart_Items =Cart::content();
        foreach ($Cart_Items as $item)
        {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id'=>$item->model->id,
                'product_quantity'=> $item->qty,
                'product_price'=> $item->model->regular_price
            ]);


        }



        Cart::destroy();
    }

    function contactMessage(Request $request)
    {
        $message = new Contact();
        $message->user_id = Auth::id();
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->phone = $request->input('phone');
        $message->subject = $request->input('subject');
        $message->message = $request->input('message');
        $message->save();

    }

}
