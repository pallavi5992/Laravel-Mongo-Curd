<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use Session;
class ItemController extends Controller
{
    public function index(){
        //$item = Item::all();
        $item = Item::orderBy('created_at','desc')->get();
        return view('item.item',['allitem'=>$item]);
    }

    function ItemSave(Request $request){
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'qty' => 'required'
        ]);

        $item = new Item();

      
        $item->name = $request->name;
        $item->type = $request->type;
        $item->qty = $request->qty;

        $item->save();

        return redirect('/item')->with('success','Item created successfully.');

    }

    function Edit($id){
        $item= Item::find($id);
        return view('item.edit',['singleItem'=>$item]);  
    }

    function Update(Request $request){
        $item = Item::find($request->id);
      
        $item->name = $request->name;
        $item->type = $request->type;
        $item->qty = $request->qty;

        $item->save();
        return redirect('/item')->with('success','Item updated successfully.');
    }

    function Delete($id){
        $item= Item::find($id);
        $item->delete();
        return redirect('/item')->with('success','Item deleted successfully.');
    }
}
