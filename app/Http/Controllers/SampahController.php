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
         //
     }
 
     //buat view halaman/form adduser
     public function showSampahTps()
     {
         $tpsSampah = Sampah::where('user_id', auth()->user()->id)->get();
         return response()->json($tpsSampah);
     }

     public function storeSampah(Request $request)
     {
        $inputSampah = $request->validate([
            'kertas' => 'numeric',
            'kaca' => 'numeric',
            'karet' => 'numeric',
            'plastik' => 'numeric',
            'logam' => 'numeric',
            'lain_lain' => 'numeric',
            'sampah_organik' => 'numeric',
            'diteruskan_ke_tpa' => 'numeric',
        ]);

        if ($inputSampah['kertas'] == null) {
            $inputSampah['kertas'] = 0;
        }

        if ($inputSampah['kaca'] == null) {
            $inputSampah['kaca'] = 0;
        }

        if ($inputSampah['karet'] == null) {
            $inputSampah['karet'] = 0;
        }

        if ($inputSampah['plastik'] == null) {
            $inputSampah['plastik'] = 0;
        }

        if ($inputSampah['logam'] == null) {
            $inputSampah['logam'] = 0;
        }

        if ($inputSampah['lain_lain'] == null) {
            $inputSampah['lain_lain'] = 0;
        }

        if ($inputSampah['sampah_organik'] == null) {
            $inputSampah['sampah_organik'] = 0;
        }


        $inputSampah['user_id'] = auth()->user()->id;

        $inputSampah['berat_sampah_diolah'] = $inputSampah['kertas'] + $inputSampah['kaca'] + $inputSampah['karet'] + $inputSampah['plastik'] 
        + $inputSampah['logam'] + $inputSampah['lain_lain'] + $inputSampah['sampah_organik'];

        $inputSampah['berat_sampah_total'] = $inputSampah['berat_sampah_diolah'] + $inputSampah['diteruskan_ke_tpa'];

        $saveSampah = User::create([
            'user_id' =>  $inputSampah['user_id'],
            'berat_sampah_kaca' =>  $inputSampah['kaca'],
            'berat_sampah_karet' =>  $inputSampah['karet'],
            'berat_sampah_plastik' =>  $inputSampah['plastik'],
            'berat_sampah_logam' =>  $inputSampah['logam'],
            'berat_sampah_kertas' =>  $inputSampah['kertas'],
            'berat_sampah_lain_lain' =>  $inputSampah['lain_lain'],
            'berat_sampah_organik' =>  $inputSampah['organik'],
            'berat_sampah_ke_tpa' =>  $inputSampah['diteruskan_ke_tpa'],
            'berat_sampah_diolah' =>  $inputSampah['berat_sampah_diolah'],
            'berat_sampah_total' =>  $inputSampah['berat_sampah_total'],
        ]);

        //return response()->json($saveSampah);

     }

     public function updateSampah(Request $request, $id)
     {
        
     }

     public function destroy(Request $request)
     {
        Sampah::destroy($request->id);
     }
 
    //  public function addSampah(Request $request, User $id)
    //  {
    //      try
    //      {
    //          $idUser = $request->get('idUser');
    //          $jenisSampah = $request->get('jenisSampah');
    //          $beratSampah = $request->get('beratSampah');
    //          $beratSampahKeTpa = $request->get('beratSampahKeTpa');
    //          $beratSampahDiolah = $request->get('beratSampahDiolah');
 
    //          Sampah::create([
    //             'user_id'   =>  $idUser,
    //              'jenis_sampah'          =>  $jenisSampah,
    //              'berat_sampah'          =>  $beratSampah,
    //              'berat_sampah_ke_tpa'          =>  $beratSampahKeTpa,
    //              'berat_sampah_diolah'          =>  $beratSampahDiolah,
    //          ]);
 
    //          return response()->json([
    //             'user_id'   =>  $idUser,
    //              'jenis_sampah'          =>  $jenisSampah,
    //              'berat_sampah'          =>  $beratSampah,
    //              'berat_sampah_ke_tpa'          =>  $beratSampahKeTpa,
    //              'berat_sampah_diolah'          =>  $beratSampahDiolah,
    //          ]);
    //      }
    //      catch(Exception $e)
    //      {
    //          Log::error($e);
    //      }
    //  }
 
    //  //masuk ke halaman form update
    //  public function halamanUpdate($id)
    //  {
    //      $user = User::findOrFail($id);
    //      return view('ini route ke halaman form add user', compact('user'));
    //  }
 
    //  //kirim value form update kesini
    //  public function update(Request $request, User $id)
    //  {
    //     try
    //     {
    //         $idSampah = $requet->get('idSampah');
    //         $idUser = $request->get('idUser');
    //          $jenisSampah = $request->get('jenisSampah');
    //          $beratSampah = $request->get('beratSampah');
    //          $beratSampahKeTpa = $request->get('beratSampahKeTpa');
    //          $beratSampahDiolah = $request->get('beratSampahDiolah');
 

    //         Sampah::where('id', $idSampah)->update([
    //              'user_id'   =>  $idUser,
    //              'jenis_sampah'          =>  $jenisSampah,
    //              'berat_sampah'          =>  $beratSampah,
    //              'berat_sampah_ke_tpa'          =>  $beratSampahKeTpa,
    //              'berat_sampah_diolah'          =>  $beratSampahDiolah,
    //         ]);

    //         return response()->json([
    //             'user_id'   =>  $idUser,
    //             'jenis_sampah'          =>  $jenisSampah,
    //             'berat_sampah'          =>  $beratSampah,
    //             'berat_sampah_ke_tpa'          =>  $beratSampahKeTpa,
    //             'berat_sampah_diolah'          =>  $beratSampahDiolah,
    //         ]);
        
    //     }
    //     catch(Exception $e)
    //     {
    //         Log::error($e);
    //     }
    //  }
 
     //pas klik delete ini langsung di eksekusi
     
}
