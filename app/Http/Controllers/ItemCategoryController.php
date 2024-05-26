<?php

namespace App\Http\Controllers;

use App\Models\ItemCategory;
use Illuminate\Http\Request;

class ItemCategoryController extends Controller
{

    public function index(){
        $data = ItemCategory::all();
        return view('dashboard.item.index' , ['data'=>$data]);
    }
    public function storeItem(Request $request){
        $data = new ItemCategory();
        $data->item_name = $request->item_name;
        $data->unit = $request->unit;
        $data->save();

        return redirect()->back()->with('success' , 'berhasil menambahkan item request');
    }

    public function updateItem($id,Request $request){
        $data = ItemCategory::find($id);
        $data->item_name = $request->item_name;
        $data->unit = $request->unit;
        $data->update();
        return redirect()->back()->with('success' , 'berhasil mengubah item request');
    }

    public function deleteItem($id){
        $data = ItemCategory::find($id);
        $data->delete() ;

        return redirect()->back()->with('success' , 'Berhasil Menghapus Data');
    }
}
