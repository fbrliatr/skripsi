<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\ItemRequest;
use App\Models\Divisi;
use App\Models\Image;
use App\Models\ItemStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemRequestController extends Controller
{
    //
    public function index(){
        $data = ItemRequest::where('status','Requested')->get();
        $accepted = ItemRequest::where('status' , 'Accepted')->get();
        $waiting = ItemRequest::where('status' , 'Waiting')->get();
        $onprog = ItemRequest::where('status' , 'On progress')->get();
        $done = ItemRequest::where('status' , 'Done')->get();
        $rejected = ItemRequest::where('status' , 'Rejected')->get();
        $divisi = Divisi::all();

        return view('dashboard.itemReq.index' , ['data' => $data , 'accepted' => $accepted , 'waiting' => $waiting, 'onprog' => $onprog , 'done'=>$done, 'rejected'=>$rejected,'divisi' =>  $divisi]);
    }

    // public function cetakData(){
    //     $dataCetak = ItemRequest::with('divisi')->get();
    //     return view('cetak.request', compact('dataCetak'));
    // }

    public function cetakTanggal($tglAwal, $tglAkhir){
        $dataCetak = ItemRequest::with('divisi')->whereBetween('updated_at', [$tglAwal, $tglAkhir])->get();
        return view('cetak.requestDate', compact('dataCetak'));
    }

    public function acceptRequest($id){
        $data = ItemRequest::find($id);
        $data->status = 'Accepted';
        $data->update();

        return redirect()->back()->with('success' , 'request telah disetujui');
    }

    public function rejectedRequest($id){
        $data = ItemRequest::find($id);
        $data->status = 'Rejected';
        $data->update();

        return redirect()->back()->with('success' , 'request telah ditolak');
    }

    public function waiting($id){
        $data = ItemRequest::find($id);
        $data->status = 'Waiting';
        $data->update();
        return redirect()->back()->with('success' , 'request sedang menunggu progress');
    }

    public function runProgress($id){
        $itemRequest = ItemRequest::findOrFail($id);
        $itemRequest->status = 'On Progress';
        $itemRequest->update();
        
        return redirect()->back()->with('success', 'Request sedang dalam progress');
    }

    public function doneRequest($id){
        $data = ItemRequest::findOrFail($id);
        $data->status = 'Done';
        $data->update();

        $itemStock = ItemStock::where('item_id', $data->item_id)->firstOrFail();
        $itemStock->update(['number' => $itemStock->number - $data->number]);

        return redirect()->back()->with('success' , 'request telah selesai dilakukan');
    }


//    user section

    public function storeItemRequest(Request $request){

        $itemId = $request->item_id;
        
        $cekStok = ItemStock::where('item_id',$itemId)->first();
        
        if($cekStok->number >= $request->number ){
            $data = new ItemRequest();
            $divisi = Divisi::find($request->divisi_id);
            $data->user_id = Auth::user()->id;
            $data->divisi_id = $request->divisi_id;
            $data->place_code = 0;
            $data->item_id = $request->item_id;
            $data->tujuan = $request->tujuan;
            $data->description = $request->description;
            $data->number = $request->number;
            $data->status = 'Requested';
            // $file = $request->file('file');
            // $filename = $file->getClientOriginalName();
            // $path = $file->storeAs('uploads' , $filename);
            // $image = Image::find($request->supported_document = $filename);
            // $data->request_category = 'item';
            $data->save();

            return redirect()->back()->with('success' , 'Berhasil melakukan permintaan. Silakan cek status request secara berkala.');
        }
        else{
            return redirect()->back()->with('failed' , 'Gagal melakukan permintaan. Stok melebihi batas');
        }
    }

    public function formBukti (Request $request){
        $requestId = $request->input('request_id');
        $buktiId = ItemRequest::findOrFail($requestId);

        // Validasi data unggahan
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png|max:2048',
        ]);

        // Simpan bukti terima di direktori yang tidak dapat diakses melalui URL publik
        $uploadedFile = $request->file('image');
        $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
        $filePath = storage_path('app/public/uploads/' . $fileName);

        $uploadedFile->storeAs('public/uploads', $fileName); // Simpan di direktori 'uploads'

        // Lakukan update atribut 'images' di dalam model ItemRequest
        $buktiId->update([
            'images' => $fileName,
            'status' => 'Done', // Misalnya, mengganti status menjadi 'Done'
        ]);

        
        return redirect()->back()->with('success' , 'Berhasil melakukan upload bukti. Silakan cek status request anda.');
    }
    
    public function getImage(){
        $data = ItemRequest::where('images','Requested')->get();
    }

    public function downloadFileItem($id){
        $data = ItemRequest::find($id);
        return response()->download(storage_path( 'app/public/uploads/' . $data->images));
    }

    public function cetakRequestItem(Request $request)
    {
        
        $tglAwal = $request->input('start_date');
        $tglAkhir = $request->input('end_date');
        $divisi = $request->input('divisi'); // Menangkap nilai divisi dari input field

        // Mengambil data berdasarkan rentang tanggal dan divisi
        $query = ItemRequest::whereBetween('created_at', [$tglAwal, $tglAkhir]);

        if (!empty($divisi)) {
            $query->where('divisi_id', $divisi); // Menambahkan kondisi pencarian berdasarkan divisi
        }

        $data = $query->get();

        // Generate the PDF using the retrieved data
        $pdf = PDF::loadView('cetak.itemRequest', compact('data'));

        // Set the filename for the downloaded PDF
        $cetakData = 'cetak_data_' . date('YmdHis') . '.pdf';
    
        // Download the PDF
        return $pdf->stream($cetakData);

    }
    
//     public function formBukti(Request $request)
// {
//     // Validasi input
//     $request->validate([
//         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Atur validasi sesuai kebutuhan
//     ]);

//     // Simpan gambar ke direktori tertentu
//     $imagePath = $request->file('image')->store('uploads', $image);

//     // Lakukan hal lain yang diperlukan, misalnya menyimpan data gambar ke database
//     $image = new Image([
//         'supported_document' => $request->file('image')->getClientOriginalName(),
//         'path' => $imagePath,
//     ]);
//     $image->save();

//     return back()->with('success', 'Image uploaded successfully.');
// }

//     public function downloadFile($id){
//         $data = ItemRequest::find($id);
//         $data->status = 'Done';
            
//         return response()->download(storage_path( 'app/uploads/' . $data->supported_document));
//     }
}
