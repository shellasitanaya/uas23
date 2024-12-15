<?php

namespace App\Http\Controllers;

use App\Models\TransaksiResiPengiriman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransaksiResiPengirimanController extends Controller
{
    public function getResiPengiriman()
    {

        if (!session('isLogin')) {
            // route sesuai name di web.php
            return redirect()->route('viewLogin');
        }

        $allResi = TransaksiResiPengiriman::with('DetailLogRelation')->get();
        // Log::info($allResi);


        return view('resiPengiriman', compact('allResi'));
    }

    //  CRUD
    public function createResi(Request $request)
    {
        // $request->(name di form)
        TransaksiResiPengiriman::create([
            'tanggal' => $request->tanggal,
            'nomor_resi' => $request->nomor_resi,
        ]);
        return redirect()->back();
    }

    public function viewEntryLog()
    {
        return view('entryLog');
    }



    public function deleteResi(Request $request)
    {
        $resi = TransaksiResiPengiriman::findOrFail($request->id);
        $resi->delete();
        return redirect()->back();
    }

    public function searchResi(Request $request)
    {
        // $request->nomor_resi, nomor_resi itu key dari yg dikirim javascript
        $resi = TransaksiResiPengiriman::where('nomor_resi', $request->nomor_resi)->with('DetailLogRelation')->get()->first();
        if (!$resi){
            return response()->json(['success'=>false, 'message' => 'resi tidak ditemukan']);
        }
        
        return response()->json(['success' => true, 'data' => $resi]);
    }
}
