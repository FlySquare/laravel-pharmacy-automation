<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Orders extends Controller
{
    public function index()
    {
        $data['orders'] = \App\Models\orders::all();
        return view('orders')->with('data', $data);
    }

    public function editOrder($id)
    {
        $data['order'] = \App\Models\orders::find($id);
        $data['drags'] = \App\Models\drags::all();
        return view('edit-add-order')->with('data', $data);
    }

    public function deleteOrder($id)
    {
        $order = \App\Models\orders::find($id);
        $order->delete();
        return redirect()->route('tum-siparisler')->with(['success' => 'Sipariş başarıyla silindi.']);
    }
    public function editOrderPost(Request $request, $id)
    {
        $drug = \App\Models\drags::find($request->drag_id);
        $order = \App\Models\orders::find($id);
        $order->customer_name = $request->customer_name;
        $order->customer_phone = $request->customer_phone;
        $order->customer_address = $request->customer_address;
        $order->customer_note = $request->customer_note;
        $order->customer_email = $request->customer_email;
        $order->drag_id = $request->drag_id;
        $order->quantity = $request->quantity;
        $order->total = $drug->price * $request->quantity;
        $order->save();
        return redirect()->route('tum-siparisler')->with(['success' => 'Sipariş başarıyla düzenlendi.']);
    }

    public function addOrder()
    {
        $data['drags'] = \App\Models\drags::all();
        return view('edit-add-order')->with('data', $data);
    }
    public function addOrderPost(Request $request)
    {
        $drug = \App\Models\drags::find($request->drag_id);
        $order = new \App\Models\orders();
        $order->customer_name = $request->customer_name;
        $order->customer_phone = $request->customer_phone;
        $order->customer_address = $request->customer_address;
        $order->customer_email = $request->customer_email;
        $order->customer_note = $request->customer_note;
        $order->drag_id = $request->drag_id;
        $order->quantity = $request->quantity;
        $order->total = $request->quantity * $drug->price;
        $order->save();

        return redirect()->route('tum-siparisler')->with(['success' => 'Sipariş başarıyla eklendi.']);
    }
}
