<?php

namespace App\Http\Controllers;

use App\Models\ItemRequest;
use App\Models\Kecamatan;
use App\Models\NonItemRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NonItemRequestController extends Controller
{
    public function index(){
        $data = NonItemRequest::where('status','requested')->get();
        $accepeted = NonItemRequest::where('status' , 'accepted')->get();
        $onprog = NonItemRequest::where('status' , 'on progress')->get();
        $done = NonItemRequest::where('status' , 'done')->get();
        return view('dashboard.NonItemRequest.index' , ['data' => $data , 'accepted' => $accepeted , 'onprog' => $onprog , 'done'=>$done]);
    }

    public function acceptRequest($id){
        $data = NonItemRequest::find($id);
        $data->status = 'accepted';
        $data->update();

        return redirect()->back()->with('success' , 'berhasil di accept');
    }

    public function rejectedRequest($id){
        $data = NonItemRequest::find($id);
        $data->status = 'rejected';
        $data->update();

        return redirect()->back()->with('success' , 'berhasil di tolak');
    }

    public function runProgress($id){
        $data = NonItemRequest::find($id);
        $data->status = 'on progress';
        $data->update();

        return redirect()->back()->with('success' , 'status berhasil update');
    }

    public function doneRequest($id){
        $data = NonItemRequest::find($id);
        $data->status = 'done';
        $data->update();

        return redirect()->back()->with('success' , 'status berhasil di selesaikan');
    }

    //user

    public function storeRequest(Request  $request){

        $data = new NonItemRequest();
        $kecamatan = Kecamatan::find($request->kecamatan_id);
        $data->user_id = Auth::user()->id;
        $data->kecamatan_id = $kecamatan->id;
        $data->kota_id = $kecamatan->kota->id;
        $data->provinsi_id = $kecamatan->kota->provinsi_id;
        $data->place_code = 0;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->number = $request->number;
        $data->status = 'requested';
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $path = $file->storeAs('uploads' , $filename);
        $data->supported_document = $filename;
        $data->request_category = 'Non Item';
        $data->save();

        return redirect()->back()->with('success' , 'berhasil merequest kebutuhan pangan');

    }

//     public function downloadFIle($id){
//         $data = NonItemRequest::find($id);
//         return response()->download(storage_path( 'app/uploads/' . $data->supported_document));
//     }

//     public function downloadFIleItem($id){
//         $data = ItemRequest::find($id);
//         return response()->download(storage_path( 'app/uploads/' . $data->supported_document));
//     }
}
