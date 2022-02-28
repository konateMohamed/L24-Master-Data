<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\NotAvailable;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = NotAvailable::all();

        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'partnumber' => 'required|unique:not_availables',
            'comment' => 'required',
        ]);
        $item = new NotAvailable;
        $item->partnumber = $request->partnumber;
        $item->comment = $request->comment;
        $item->save();
        return redirect()->route('items.index')
            ->with('success','item has been created successfully.');
    }

    public function edit(NotAvailable $item)
    {
        return view('items.edit',compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'partnumber' => 'required',
            'comment' => 'required',
        ]);
        $item = NotAvailable::find($id);
        $item->comment = $request->comment;
        $item->partnumber = $request->partnumber;
        $item->save();
        return redirect()->route('items.index')
            ->with('success','item Has Been updated successfully');
    }

    public function destroy(NotAvailable $item)
    {
        $item->delete();
        return redirect()->route('items.index')
            ->with('success','item has been deleted successfully');
    }

    public function search(Request $request){
        $search = $request->input('search');
        $items = NotAvailable::query()
            ->where('partnumber', 'LIKE', "%{$search}%")
            ->orWhere('comment', 'LIKE', "%{$search}%")
            ->get();
        return view('items.index', ['items'=>$items] );
    }

}
