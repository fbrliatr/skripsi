<?php

namespace App\Http\Controllers;

use App\Models\ItemCategory;
use App\Models\ItemRequest;
use App\Models\Divisi;
use App\Models\Kota;
use App\Models\NonItemRequest;
use App\Models\Provinsi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $item = ItemCategory::all();
        $divisi = Divisi::all();

        $divisiDone = ItemRequest::where('status' , 'done')->get();
        $divisiNonItemDone = NonItemRequest::where('status' , 'done')->get();

        $divisiOnProg = ItemRequest::where('status' , 'on progress')->get();
        $divisiNonItemOnProg = NonItemRequest::where('status' , 'on progress')->get();

        $divisiRequested = ItemRequest::where('status' , 'requested')->get();
        $divisiNonItemRequested = NonItemRequest::where('status' , 'reqeuested')->get();

        $onprog = count($divisiOnProg) + count($divisiNonItemOnProg);

        $done = count($divisiDone) + count($divisiNonItemDone);

        $request = count($divisiRequested) + count($divisiNonItemRequested);


        if (Auth::user()){
            $itemreq = ItemRequest::where('user_id' , Auth::user()->id)->get();
            $nonitemreq = NonItemRequest::where('user_id' , Auth::user()->id)->get();
            $user_id = Auth::user()->divisi;
            $user = Divisi::select('name')->where('id', $user_id)->first();
            return view('landing-page.index' , ['item'=>$item , 'divisi'=>$divisi , 'itemreq' => $itemreq , 'user_id' => $user_id, 'user' => $user, 'itemnonreq'=>$nonitemreq , 'done' => $done , 'onprog' => $onprog , 'requested' => $request]);
        }

        return view('landing-page.index' , ['item'=>$item , 'divisi'=>$divisi , 'done' => $done , 'onprog' => $onprog , 'requested' => $request]);

    }

    public function updateProfile(Request $request){
        $tes = User::find(Auth::user()->id);
        $tes->name = $request->name;
        $tes->divisi = $request->divisi;
        $tes->email = $request->email;
        $tes->update();

        return redirect()->back();
    }


    public function banding(){
        $divisi = Divisi::inRandomOrder()->first();
        $divisi2 = Divisi::inRandomOrder()->first();

        $divisiAll = Divisi::all();
        $provinsi = Provinsi::all();
        $kota = Kota::all();

        //1
        $pasar = count($divisi->pasar);
        $pabrik = count($divisi->pabrik);
        $agri = count($divisi->agri);
        $itemRequest = count($divisi->itemRequest);
        $nonItemRequest = count($divisi->nonItemRequest);

        //2
        $pasar2 = count($divisi2->pasar);
        $pabrik2 = count($divisi2->pabrik);
        $agri2 = count($divisi2->agri);
        $itemRequest2 = count($divisi2->itemRequest);
        $nonItemRequest2 = count($divisi2->nonItemRequest);


        return view('banding' , ['divisi' =>$divisi , 'pasar' => $pasar , 'pabrik'=>$pabrik , 'agri'=>$agri ,
            'itemRequest' => $itemRequest , 'nonItemRequest'=>$nonItemRequest , 'divisiAll' => $divisiAll , 'provinsi' => $provinsi ,
            'kota' => $kota , 'divisi2' =>$divisi2 ,
            'pasar2'=>$pasar2 , 'pabrik2' => $pabrik2 , 'agri2' => $agri2 , 'itemRequest2' => $itemRequest2 , 'nonItemRequest2' => $nonItemRequest2]);
    }

    public function bandingKota(Request  $request){
        $divisi = Kota::find($request->divisi_id);
        $divisi2 = Kota::find($request->divisi_id2);

        $divisiAll = Divisi::all();
        $provinsi = Provinsi::all();
        $kota = Kota::all();

        //1
        $pasar = count($divisi->pasar);
        $pabrik = count($divisi->pabrik);
        $agri = count($divisi->agri);
        $itemRequest = count($divisi->itemRequest);
        $nonItemRequest = count($divisi->nonItemRequest);

        //2
        $pasar2 = count($divisi2->pasar);
        $pabrik2 = count($divisi2->pabrik);
        $agri2 = count($divisi2->agri);
        $itemRequest2 = count($divisi2->itemRequest);
        $nonItemRequest2 = count($divisi2->nonItemRequest);


        return view('.banding' , ['divisi' =>$divisi , 'pasar' => $pasar , 'pabrik'=>$pabrik , 'agri'=>$agri ,
            'itemRequest' => $itemRequest , 'nonItemRequest'=>$nonItemRequest , 'divisiAll' => $divisiAll , 'provinsi' => $provinsi ,
            'kota' => $kota , 'divisi2' =>$divisi2 ,
            'pasar2'=>$pasar2 , 'pabrik2' => $pabrik2 , 'agri2' => $agri2 , 'itemRequest2' => $itemRequest2 , 'nonItemRequest2' => $nonItemRequest2]);

    }


    public function bandingDivisi(Request  $request){
        $divisi = Divisi::find($request->divisi_id);
        $divisi2 = Divisi::find($request->divisi_id2);

        $divisiAll = Divisi::all();
        $provinsi = Provinsi::all();
        $kota = Kota::all();

        //1
        $pasar = count($divisi->pasar);
        $pabrik = count($divisi->pabrik);
        $agri = count($divisi->agri);
        $itemRequest = count($divisi->itemRequest);
        $nonItemRequest = count($divisi->nonItemRequest);

        //2
        $pasar2 = count($divisi2->pasar);
        $pabrik2 = count($divisi2->pabrik);
        $agri2 = count($divisi2->agri);
        $itemRequest2 = count($divisi2->itemRequest);
        $nonItemRequest2 = count($divisi2->nonItemRequest);


        return view('banding' , ['divisi' =>$divisi , 'pasar' => $pasar , 'pabrik'=>$pabrik , 'agri'=>$agri ,
            'itemRequest' => $itemRequest , 'nonItemRequest'=>$nonItemRequest , 'divisiAll' => $divisiAll , 'provinsi' => $provinsi ,
            'kota' => $kota , 'divisi2' =>$divisi2 ,
            'pasar2'=>$pasar2 , 'pabrik2' => $pabrik2 , 'agri2' => $agri2 , 'itemRequest2' => $itemRequest2 , 'nonItemRequest2' => $nonItemRequest2]);

    }

    public function bandingProvinsi(Request $request){
        $divisi = Provinsi::find($request->divisi_id);
        $divisi2 = Provinsi::find($request->divisi_id2);

        $divisiAll = Divisi::all();
        $provinsi = Provinsi::all();
        $kota = Kota::all();

        //1
        $pasar = count($divisi->pasar);
        $pabrik = count($divisi->pabrik);
        $agri = count($divisi->agri);
        $itemRequest = count($divisi->itemRequest);
        $nonItemRequest = count(NonItemRequest::where('provinsi_id' , $request->divisi_id)->get());


        //2
        $pasar2 = count($divisi2->pasar);
        $pabrik2 = count($divisi2->pabrik);
        $agri2 = count($divisi2->agri);
        $itemRequest2 = count($divisi2->itemRequest);
        $nonItemRequest2 = count(NonItemRequest::where('provinsi_id' , $request->divisi_id2)->get());


        return view('banding' , ['divisi' =>$divisi , 'pasar' => $pasar , 'pabrik'=>$pabrik , 'agri'=>$agri ,
            'itemRequest' => $itemRequest , 'nonItemRequest'=>$nonItemRequest , 'divisiAll' => $divisiAll , 'provinsi' => $provinsi ,
            'kota' => $kota , 'divisi2' =>$divisi2 ,
            'pasar2'=>$pasar2 , 'pabrik2' => $pabrik2 , 'agri2' => $agri2 , 'itemRequest2' => $itemRequest2 , 'nonItemRequest2' => $nonItemRequest2]);

    }
}
