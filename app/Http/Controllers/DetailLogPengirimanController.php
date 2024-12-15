<?php

namespace App\Http\Controllers;

use App\Models\DetailLogPengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DetailLogPengirimanController extends Controller
{
    public function getDetailLog(Request $request){
       
        if(!session('isLogin')){
            // route sesuai name di web.php
            return redirect()->route('viewLogin');
        }

        // column 'transaksi_resi_pengiriman_id' -> nama column di tabel database
        // $request->input('id_resi') -> ambil name dari inputan form
        $log = DetailLogPengiriman::where('transaksi_resi_pengiriman_id', $request->id_resi)->with('TransaksiResiRelation')->get();
        $id_resii = $request->id_resi;
      
        Log::info($request->all());
        Log::info($log);

        
        return view('entryLog', compact('log', 'id_resii'));
        // return view('entryLog');

    }

    
    //  CRUD
    public function createLog(Request $request)
    {
        // $request->(name di form)
        DetailLogPengiriman::create([
            'transaksi_resi_pengiriman_id' => $request->resi_id,
            // 'tanggal' => $request->tanggal,
            'kota' => $request->kota, 
            'keterangan' => $request->keterangan, 

        ]);
        return redirect()->back();
    }
   
    public function deleteLog(Request $request){
        $log = DetailLogPengiriman::findOrFail($request->id);
        $log->delete();
        return redirect()->back();
    }

    // public function searchLog(Request $request){
        
    //     return redirect()->back();
    // }




}
