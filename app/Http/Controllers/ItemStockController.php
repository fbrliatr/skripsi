<?php

namespace App\Http\Controllers;

use App\Models\ItemCategory;
use App\Models\ItemStock;
use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemStockController extends Controller
{
    public function index(){
        $data = ItemStock::all();
        // $divisi = Divisi::all();
        $item = ItemCategory::all();
        return view('dashboard.itemStock.index' , ['data'=>$data , //'divisi' => $divisi
        'item' => $item]);
    }

    public function cetakStock($tglAwal, $tglAkhir){
        // dd(["Tanggal Awal :".$tglAwal, "Tanggal Akhir :".$tglAkhir]);
        $stock = ItemStock::with('item')->whereBetween('updated_at', [$tglAwal, $tglAkhir])->get();
        return view('cetak.stock', compact('stock'));
    }

    public function storeItemStock(Request $request){
        $data = new ItemStock();
        $divisi = Divisi::find($request->divisi_id);
        $data->user_id = Auth::user()->id;
        // $data->kecamatan_id = $kecamatan->id;
        // $data->kota_id = $kecamatan->kota->id;
        // $data->provinsi_id = $kecamatan->kota->provinsi_id;
        $data->place_code = 0;
        $data->item_id = $request->item_id;
        // $data->title = $request->title;
        $data->description = $request->description;
        $data->number = $request->number;
        // $data->status = $request->status;
        $data->save();

        return redirect()->back()->with('success' , 'berhasil menambahkan data');
    }

    public function updateItemStock($id , Request  $request){
        $data = ItemStock::find($id);
        $divisi = Divisi::find($request->divisi_id);
        $data->user_id = Auth::user()->id;
        // $data->kecamatan_id = $kecamatan->id;
        // $data->kota_id = $kecamatan->kota->id;
        // $data->provinsi_id = $kecamatan->kota->provinsi_id;
        $data->place_code = 0;
        $data->item_id = $request->item_id;
        // $data->title = $request->title;
        $data->description = $request->description;
        $data->number = $request->number;
        // $data->status = $request->status;
        $data->update();

        return redirect()->back()->with('success' , 'berhasil memperbaharui data');

    }

    public function deleteItemStock($id){
        $data =  ItemStock::find($id);
        $data->delete();
        return redirect()->back()->with('success' , 'sukses menghapus data');
    }
}
