<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Drags extends Controller
{
    public function index()
    {
        $data['drags'] = \App\Models\drags::all();
        return view('drags')->with('data', $data);
    }

    public function addDrag()
    {
        return view('edit-add-drag');
    }

    public function addDragPost(Request $request)
    {
        $drag = new \App\Models\drags;
        $drag->name = $request->name;
        $drag->price = $request->price;
        $drag->stock = $request->stock;
        $drag->save();
        return redirect()->route('tum-ilaclar')->with(['success' => 'İlaç başarıyla eklendi.']);
    }

    public function deleteDrag($id)
    {
        $drag = \App\Models\drags::find($id);
        $drag->delete();
        // delete all orders of this drag
        $orders = \App\Models\orders::where('drag_id', $id)->get();
        foreach ($orders as $order) {
            $order->delete();
        }
        return redirect()->route('tum-ilaclar')->with(['success' => 'İlaç başarıyla silindi.']);
    }

    public function editDrag($id)
    {
        $data['drag'] = \App\Models\drags::find($id);
        return view('edit-add-drag')->with('data', $data);
    }

    public function editDragPost(Request $request, $id)
    {
        $drag = \App\Models\drags::find($id);
        $drag->name = $request->name;
        $drag->price = $request->price;
        $drag->stock = $request->stock;
        $drag->save();
        return redirect()->route('tum-ilaclar')->with(['success' => 'İlaç başarıyla düzenlendi.']);
    }
}
