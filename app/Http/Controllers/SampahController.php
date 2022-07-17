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
     public function indexInput()
     {
         return view('sampahInput');
     }
 
     //buat view halaman/form adduser
     public function showHalamanSampahTps()
     {
        return view('sampahList');
     }
     public function showSampahTps()
     {

        if (auth()->user()->priviliges_id == 2) {
            //$tpsSampah = DB::table('sampahs')->join('users','sampahs.user_id','=','users.id')->select('sampahs.*','users.name');
            $tpsSampah = Sampah::select('sampahs.*','users.tps')->join('users','sampahs.user_id','=','users.id')->get();
            //$tpsSampah = Sampah::rightJoin('users','users.id','=','sampahs.user_id')->select('users.name');
            return response()->json($tpsSampah);
        }
        if (auth()->user()->priviliges_id == 3) {
            $tpsSampah = Sampah::select('sampahs.*','users.tps')->where('user_id', auth()->user()->id)->join('users','sampahs.user_id','=','users.id')->get();
            return response()->json($tpsSampah);
        }
         
        
       //   return view('sampahList',['sampahList' => $tpsSampah]);
      

     }


     public function testFilterView()
     {
        return view('testFilter');
     }

     public function sampahFilter(Request $request)
     {
        $data = $request->all();
        
        if (auth()->user()->priviliges_id == 2) {
            //$tpsSampah = DB::table('sampahs')->join('users','sampahs.user_id','=','users.id')->select('sampahs.*','users.name');
            $tpsSampah = Sampah::select('sampahs.*','users.name')->join('users','sampahs.user_id','=','users.id');
            //$dataTps = Sampah::where('tps.name',$data['desa'])->join('tps','sampahs.tps_id','=','tps.id');
            $allData = [];
            
                
            switch ($data['jenis']) {
                case 'kertas':
                    $kertas = $tpsSampah->where('berat_sampah_kertas','!=', 0)->get();
                    $allData = $kertas;
                    break;
                case 'kaca':
                    $kaca = $tpsSampah->where('berat_sampah_kaca','!=', 0)->get();
                    $allData = $kaca;
                    break;
                case 'karet':
                    $karet = $tpsSampah->where('berat_sampah_karet','!=', 0)->get();
                    $allData = $karet;
                    break;        
                case 'logam':
                    $logam = $tpsSampah->where('berat_sampah_logam','!=', 0)->get();
                    $allData = $logam;
                    break;        
                case 'plastik':
                    $plastik = $tpsSampah->where('berat_sampah_plastik','!=', 0)->get();
                    $allData = $plastik;
                    break;        
                case 'lainlain':
                    $lainlain = $tpsSampah->where('berat_sampah_lain_lain','!=', 0)->get();
                    $allData = $lainlain;
                    break;        
                case 'organik':
                    $organik = $tpsSampah->where('berat_sampah_organik','!=', 0)->get();
                    $allData = $organik;
                    break;                          
                default:
                $isNull = $tpsSampah->get();
                $allData = $isNull;
                    break;
            }

            switch ($data['rentang']) {
                case 'tigaPuluhHariTerakhir':
                    $last30Days = $tpsSampah->whereBetween('created_at', [Carbon::now()->subDays(30)->startOfDay(), Carbon::now()->subDays(0)->endOfDay()])->get();
                    $allData = $last30Days;
                    break;
                case 'tujuhHariTerakhir':
                    $last7Days = $tpsSampah->whereBetween('created_at', [Carbon::now()->subDays(7)->startOfDay(), Carbon::now()->subDays(0)->endOfDay()])->get();
                    $allData = $last7Days;
                    break;
                
                default:
                $isNull = $tpsSampah->get();
                $allData = $isNull;
                    break;
            }

            return response()->json($allData);

            // switch ($data['desa']) {
            //     case '30HariTerakhir':
            //         $last30Days = $tpsSampah->whereBetween('created_at', [Carbon::now()->subDays(30)->startOfDay(), Carbon::now()->subDays(0)->endOfDay()]);
            //         return response()->json($last30Days);
            //         break;
            //     case '7HariTerakhir':
            //         $last7Days = $tpsSampah->whereBetween('created_at', [Carbon::now()->subDays(7)->startOfDay(), Carbon::now()->subDays(0)->endOfDay()]);
            //         return response()->json($last7Days);
            //         break;
                
            //     default:
            //         $isNull = $tpsSampah->get();
            //         return response()->json($tpsSampah);
            //         break;
            // }
            //$tpsSampah = Sampah::rightJoin('users','users.id','=','sampahs.user_id')->select('users.name');
        }
        if (auth()->user()->priviliges_id == 3) {
            $tpsSampah = Sampah::select('sampah.*','users.tps')->where('user_id', auth()->user()->id)->join('users','sampahs.user_id','=','users.id');
            
            $allData = [];
            
                
            switch ($data['jenis']) {
                case 'kertas':
                    $kertas = $tpsSampah->where('berat_sampah_kertas','!=', 0)->get();
                    $allData = $kertas;
                    break;
                case 'kaca':
                    $kaca = $tpsSampah->where('berat_sampah_kaca','!=', 0)->get();
                    $allData = $kaca;
                    break;
                case 'karet':
                    $karet = $tpsSampah->where('berat_sampah_karet','!=', 0)->get();
                    $allData = $karet;
                    break;        
                case 'logam':
                    $logam = $tpsSampah->where('berat_sampah_logam','!=', 0)->get();
                    $allData = $logam;
                    break;        
                case 'plastik':
                    $plastik = $tpsSampah->where('berat_sampah_plastik','!=', 0)->get();
                    $allData = $plastik;
                    break;        
                case 'lainlain':
                    $lainlain = $tpsSampah->where('berat_sampah_lain_lain','!=', 0)->get();
                    $allData = $lainlain;
                    break;        
                case 'organik':
                    $organik = $tpsSampah->where('berat_sampah_organik','!=', 0)->get();
                    $allData = $organik;
                    break;                          
                default:
                $isNull = $tpsSampah->get();
                $allData = $isNull;
                    break;
            }

            switch ($data['rentang']) {
                case 'tigaPuluhHariTerakhir':
                    $last30Days = $tpsSampah->whereBetween('created_at', [Carbon::now()->subDays(30)->startOfDay(), Carbon::now()->subDays(0)->endOfDay()])->get();
                    $allData = $last30Days;
                    break;
                case 'tujuhHariTerakhir':
                    $last7Days = $tpsSampah->whereBetween('created_at', [Carbon::now()->subDays(7)->startOfDay(), Carbon::now()->subDays(0)->endOfDay()])->get();
                    $allData = $last7Days;
                    break;
                
                default:
                $isNull = $tpsSampah->get();
                $allData = $isNull;
                    break;
            }

            return response()->json($allData);

            // switch ($data['desa']) {
            //     case '30HariTerakhir':
            //         $last30Days = $tpsSampah->whereBetween('created_at', [Carbon::now()->subDays(30)->startOfDay(), Carbon::now()->subDays(0)->endOfDay()]);
            //         return response()->json($last30Days);
            //         break;
            //     case '7HariTerakhir':
            //         $last7Days = $tpsSampah->whereBetween('created_at', [Carbon::now()->subDays(7)->startOfDay(), Carbon::now()->subDays(0)->endOfDay()]);
            //         return response()->json($last7Days);
            //         break;
                
            //     default:
            //         $isNull = $tpsSampah->get();
            //         return response()->json($tpsSampah);
            //         break;
            // }
        }
         
        //return response()->json($tpsSampah);
         return view('testFilterPost',['sampahList' => $tpsSampah]);
      

     }

     public function storeSampah(Request $request)
     {
        $inputSampah = $request->validate([
            'kertas' => 'nullable|numeric',
            'kaca' => 'nullable|numeric',
            'karet' => 'nullable|numeric',
            'plastik' => 'nullable|numeric',
            'logam' => 'nullable|numeric',
            'lain_lain' => 'nullable|numeric',
            'sampah_organik' => 'nullable|numeric',
            'diteruskan_ke_tpa' => 'nullable|numeric',
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
        
        if ($inputSampah['diteruskan_ke_tpa'] == null) {
            $inputSampah['diteruskan_ke_tpa'] = 0;
        }


        $inputSampah['user_id'] = auth()->user()->id;

        $inputSampah['berat_sampah_anorganik'] = $inputSampah['kertas'] + $inputSampah['kaca'] + $inputSampah['karet'] + $inputSampah['plastik'] 
        + $inputSampah['logam'] + $inputSampah['lain_lain'];

        $inputSampah['berat_sampah_diolah'] = $inputSampah['kertas'] + $inputSampah['kaca'] + $inputSampah['karet'] + $inputSampah['plastik'] 
        + $inputSampah['logam'] + $inputSampah['lain_lain'] + $inputSampah['sampah_organik'];

        $inputSampah['berat_sampah_total'] = $inputSampah['berat_sampah_diolah'] + $inputSampah['diteruskan_ke_tpa'];

        $saveSampah = Sampah::create([
            'user_id' =>  $inputSampah['user_id'],
            'berat_sampah_kaca' =>  $inputSampah['kaca'],
            'berat_sampah_karet' =>  $inputSampah['karet'],
            'berat_sampah_plastik' =>  $inputSampah['plastik'],
            'berat_sampah_logam' =>  $inputSampah['logam'],
            'berat_sampah_kertas' =>  $inputSampah['kertas'],
            'berat_sampah_lain_lain' =>  $inputSampah['lain_lain'],
           // 'berat_sampah_anorganik' =>  $inputSampah['berat_sampah_anorganik'],
            'berat_sampah_organik' =>  $inputSampah['sampah_organik'],
            'berat_sampah_ke_tpa' =>  $inputSampah['diteruskan_ke_tpa'],
            'berat_sampah_diolah' =>  $inputSampah['berat_sampah_diolah'],
            'berat_sampah_total' =>  $inputSampah['berat_sampah_total'],
        ]);

        return redirect()
        ->back()
        ->with('success', 'Data sampah sudah berhasil dimasukkan ke database!');

     }

     public function updateSampah(Request $request, $id)
     {
        $inputUpdateSampah = $request->validate([
            'kertas' => 'nullable|numeric',
            'kaca' => 'nullable|numeric',
            'karet' => 'nullable|numeric',
            'plastik' => 'nullable|numeric',
            'logam' => 'nullable|numeric',
            'lain_lain' => 'nullable|numeric',
            'sampah_organik' => 'nullable|numeric',
            'diteruskan_ke_tpa' => 'nullable|numeric',
        ]);

        if ($inputUpdateSampah['kertas'] == null) {
            $inputUpdateSampah['kertas'] = 0;
        }

        if ($inputUpdateSampah['kaca'] == null) {
            $inputUpdateSampah['kaca'] = 0;
        }

        if ($inputUpdateSampah['karet'] == null) {
            $inputUpdateSampah['karet'] = 0;
        }

        if ($inputUpdateSampah['plastik'] == null) {
            $inputUpdateSampah['plastik'] = 0;
        }

        if ($inputUpdateSampah['logam'] == null) {
            $inputUpdateSampah['logam'] = 0;
        }

        if ($inputUpdateSampah['lain_lain'] == null) {
            $inputUpdateSampah['lain_lain'] = 0;
        }

        if ($inputUpdateSampah['sampah_organik'] == null) {
            $inputUpdateSampah['sampah_organik'] = 0;
        }
        
        if ($inputUpdateSampah['diteruskan_ke_tpa'] == null) {
            $inputUpdateSampah['diteruskan_ke_tpa'] = 0;
        }


        $inputUpdateSampah['user_id'] = auth()->user()->id;

        $inputUpdateSampah['berat_sampah_anorganik'] = $inputUpdateSampah['kertas'] + $inputUpdateSampah['kaca'] + $inputUpdateSampah['karet'] + $inputUpdateSampah['plastik'] 
        + $inputUpdateSampah['logam'] + $inputUpdateSampah['lain_lain'];

        $inputUpdateSampah['berat_sampah_diolah'] = $inputUpdateSampah['kertas'] + $inputUpdateSampah['kaca'] + $inputUpdateSampah['karet'] + $inputUpdateSampah['plastik'] 
        + $inputUpdateSampah['logam'] + $inputUpdateSampah['lain_lain'] + $inputUpdateSampah['sampah_organik'];

        $inputUpdateSampah['berat_sampah_total'] = $inputUpdateSampah['berat_sampah_diolah'] + $inputUpdateSampah['diteruskan_ke_tpa'];

        $updateSampah = Sampah::where('id',$id)->update([
            'user_id' =>  $inputUpdateSampah['user_id'],
            'berat_sampah_kaca' =>  $inputUpdateSampah['kaca'],
            'berat_sampah_karet' =>  $inputUpdateSampah['karet'],
            'berat_sampah_plastik' =>  $inputUpdateSampah['plastik'],
            'berat_sampah_logam' =>  $inputUpdateSampah['logam'],
            'berat_sampah_kertas' =>  $inputUpdateSampah['kertas'],
            'berat_sampah_lain_lain' =>  $inputUpdateSampah['lain_lain'],
           // 'berat_sampah_anorganik' =>  $inputUpdateSampah['berat_sampah_anorganik'],
            'berat_sampah_organik' =>  $inputUpdateSampah['sampah_organik'],
            'berat_sampah_ke_tpa' =>  $inputUpdateSampah['diteruskan_ke_tpa'],
            'berat_sampah_diolah' =>  $inputUpdateSampah['berat_sampah_diolah'],
            'berat_sampah_total' =>  $inputUpdateSampah['berat_sampah_total'],
        ]);

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
