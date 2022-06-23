<?php

namespace App\Http\Controllers;

use App\Models\Sampah;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Log;
use Exception;

class SampahController extends Controller
{
     //buat view semua user database
     public function index()
     {
         $user = Sampah::latest()->get;
         return view('ini route', compact('sampahs'));
     }
 
     //buat view halaman/form adduser
     public function halamanAddSampah()
     {
         return view('ini route ke halaman form add user');
     }
 
     public function addSampah(Request $request, User $id)
     {
         try
         {
             $idUser = $request->get('idUser');
             $jenisSampah = $request->get('jenisSampah');
             $beratSampah = $request->get('beratSampah');
             $beratSampahKeTpa = $request->get('beratSampahKeTpa');
             $beratSampahDiolah = $request->get('beratSampahDiolah');
 
             Sampah::create([
                'user_id'   =>  $idUser,
                 'jenis_sampah'          =>  $jenisSampah,
                 'berat_sampah'          =>  $beratSampah,
                 'berat_sampah_ke_tpa'          =>  $beratSampahKeTpa,
                 'berat_sampah_diolah'          =>  $beratSampahDiolah,
             ]);
 
             return response()->json([
                'user_id'   =>  $idUser,
                 'jenis_sampah'          =>  $jenisSampah,
                 'berat_sampah'          =>  $beratSampah,
                 'berat_sampah_ke_tpa'          =>  $beratSampahKeTpa,
                 'berat_sampah_diolah'          =>  $beratSampahDiolah,
             ]);
         }
         catch(Exception $e)
         {
             Log::error($e);
         }
     }
 
     //masuk ke halaman form update
     public function halamanUpdate($id)
     {
         $user = User::findOrFail($id);
         return view('ini route ke halaman form add user', compact('user'));
     }
 
     //kirim value form update kesini
     public function update(Request $request, User $id)
     {
        try
        {
            $idSampah = $requet->get('idSampah');
            $idUser = $request->get('idUser');
             $jenisSampah = $request->get('jenisSampah');
             $beratSampah = $request->get('beratSampah');
             $beratSampahKeTpa = $request->get('beratSampahKeTpa');
             $beratSampahDiolah = $request->get('beratSampahDiolah');
 

            Sampah::where('id', $idSampah)->update([
                 'user_id'   =>  $idUser,
                 'jenis_sampah'          =>  $jenisSampah,
                 'berat_sampah'          =>  $beratSampah,
                 'berat_sampah_ke_tpa'          =>  $beratSampahKeTpa,
                 'berat_sampah_diolah'          =>  $beratSampahDiolah,
            ]);

            return response()->json([
                'user_id'   =>  $idUser,
                'jenis_sampah'          =>  $jenisSampah,
                'berat_sampah'          =>  $beratSampah,
                'berat_sampah_ke_tpa'          =>  $beratSampahKeTpa,
                'berat_sampah_diolah'          =>  $beratSampahDiolah,
            ]);
        
        }
        catch(Exception $e)
        {
            Log::error($e);
        }
     }
 
     //pas klik delete ini langsung di eksekusi
     public function destroy($id)
     {
        try
        {
            $sampah = Sampah::findOrFail($id);
            $sampah->delete();
        }
        catch(Exception $e)
        {
            Log::error($e);
        }
     }
}
