<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sampah;
use App\Models\Tps;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $beratPerhariArray = [];
        $sumTotalBeratPerhariArray = 0;
        $BeratHariAnorganik = [];
        $sumTotalBeratPerhariAnorganikArray = 0;
        $beratPerhariOrganikArray = [];
        $sumTotalBeratPerhariOrganikArray = 0;
        $days=[];
        $dates=[];
        
        if (auth()->user()->priviliges_id == 3) {

            for ($i = 6; $i > -1; $i--) {
                $beratPerhari = Sampah::where('tps_id', auth()->user()->tps_id)->whereBetween('created_at', [Carbon::now()->subDays($i)->startOfDay(), Carbon::now()->subDays($i)->endOfDay()])->sum('berat_sampah_total');
                $beratPerhariOrganik = Sampah::where('tps_id', auth()->user()->tps_id)->whereBetween('created_at', [Carbon::now()->subDays($i)->startOfDay(), Carbon::now()->subDays($i)->endOfDay()])->sum('berat_sampah_organik');
                $beratPerhariAnorganik = Sampah::where('tps_id',auth()->user()->tps_id)->whereBetween('created_at', [Carbon::now()->subDays($i)->startOfDay(),Carbon::now()->subDays($i)->endOfDay()])->sum('berat_sampah_anorganik');
                $beratPerhariArray[] = $beratPerhari;
                $beratPerhariAnorganikArray[] = $beratPerhariAnorganik;
                $beratPerhariOrganikArray[] = $beratPerhariOrganik;
            }

            for ($i = 6; $i > -1; $i--) {
                $nowDate = Carbon::now()->subDays($i)->format('d-m-Y');
                $day = Carbon::createFromFormat('d-m-Y', $nowDate)->translatedFormat('l');
                $days[] = $day;
                $dates[] = $nowDate;
            }

            foreach ($beratPerhariArray as $sumTotal) {
                $sumTotalBeratPerhariArray += $sumTotal;
            }

            foreach ($beratPerhariOrganikArray as $sumTotalOrganik) {
                $sumTotalBeratPerhariOrganikArray += $sumTotalOrganik;
            }

            foreach ($beratPerhariAnorganikArray as $sumTotalAnorganik) {
                $sumTotalBeratPerhariAnorganikArray += $sumTotalAnorganik;
            }
            $titleDashboard = Tps::select('name')->where('id', auth()->user()->tps_id)->first();
            $totalTakTerolah = Sampah::where('tps_id', auth()->user()->tps_id)->whereBetween('created_at', [Carbon::now()->subDays(6)->startOfDay(), Carbon::now()->subDays(0)->endOfDay()])->sum('berat_sampah_ke_tpa');
            $updateLogInput = Sampah::select('sampahs.*','tps.name as name')->join('tps','sampahs.tps_id','=','tps.id')->orderBy('created_at','desc')->take(3)->get();
            
            return view('dashboard', [
                'titleDashboard' => $titleDashboard,
                'BeratPerhari' => $beratPerhariArray,
                'beratPerhariAnorganik' => $beratPerhariAnorganikArray,
                'BeratPerhariOrganik' => $beratPerhariOrganikArray,
                'beratTotalPerminggu' => $sumTotalBeratPerhariArray,
                'beratTotalPermingguOrganik' => $sumTotalBeratPerhariOrganikArray,
                'beratTotalPermingguAnorganik' => $sumTotalBeratPerhariAnorganikArray,
                'beratTotalPermingguTakTerolah' => $totalTakTerolah,
                'updateLogInput' => $updateLogInput,
                'days' => $days,
                'dates' => $dates,

            ]);
        }


        for ($i = 6; $i > -1; $i--) {
            $beratPerhari = Sampah::whereBetween('created_at', [Carbon::now()->subDays($i)->startOfDay(), Carbon::now()->subDays($i)->endOfDay()])->sum('berat_sampah_total');
            $beratPerhariOrganik = Sampah::whereBetween('created_at', [Carbon::now()->subDays($i)->startOfDay(), Carbon::now()->subDays($i)->endOfDay()])->sum('berat_sampah_organik');
            $beratPerhariAnorganik = Sampah::whereBetween('created_at', [Carbon::now()->subDays($i)->startOfDay(),Carbon::now()->subDays($i)->endOfDay()])->sum('berat_sampah_anorganik');;
            $beratPerhariArray[] = $beratPerhari;
            $beratPerhariAnorganikArray[] = $beratPerhariAnorganik;
            $beratPerhariOrganikArray[] = $beratPerhariOrganik;
        }

   
        foreach ($beratPerhariArray as $sumTotal) {
            $sumTotalBeratPerhariArray += $sumTotal;
        }
        foreach ($beratPerhariOrganikArray as $sumTotalOrganik) {
            $sumTotalBeratPerhariOrganikArray += $sumTotalOrganik;
        }
        foreach ($beratPerhariAnorganikArray as $sumTotalAnorganik) {
            $sumTotalBeratPerhariAnorganikArray += $sumTotalAnorganik;
        }
        for ($i = 6; $i > -1; $i--) {
            $nowDate = Carbon::now()->subDays($i)->format('d-m-Y');
            $day = Carbon::createFromFormat('d-m-Y', $nowDate)->translatedFormat('l');
            $days[] = $day;
            $dates[] = $nowDate;
        }

        $totalTakTerolah = Sampah::whereBetween('created_at', [Carbon::now()->subDays(6)->startOfDay(), Carbon::now()->subDays(0)->endOfDay()])->sum('berat_sampah_ke_tpa');
        $updateLogInput = Sampah::select('sampahs.*','tps.name as name')->join('tps','sampahs.tps_id','=','tps.id')->orderBy('created_at','desc')->take(3)->get();

  
        return view('dashboard', [
            'BeratPerhari' => $beratPerhariArray,
            'beratPerhariAnorganik' => $beratPerhariAnorganikArray,
            'BeratPerhariOrganik' => $beratPerhariOrganikArray,
            'beratTotalPerminggu' => $sumTotalBeratPerhariArray,
            'beratTotalPermingguOrganik' => $sumTotalBeratPerhariOrganikArray,
            'beratTotalPermingguAnorganik' => $sumTotalBeratPerhariAnorganikArray,
            'beratTotalPermingguTakTerolah' => $totalTakTerolah,
            'updateLogInput' => $updateLogInput,
            'days' => $days,
            'dates' => $dates,

    
        ]);

    }

    public function admin()
    {
        return view('home');
    }
}