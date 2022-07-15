<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sampah;
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
        if (auth()->user()->priviliges_id == 3) {
            //$tpsSampah = Sampah::where('user_id','=',auth()->user()->id);
            // $totalBerat=$tpsSampah->where('created_at','>', Carbon::now()->subDays(7))->sum('berat_sampah_total');
            $totalBeratMingguIni = Sampah::where('user_id',auth()->user()->id)->whereBetween('created_at', [Carbon::now()->subWeek(0)->startOfWeek(),Carbon::now()->subWeek(0)->endOfWeek()])->sum('berat_sampah_total');
            $totalSatuMingguLalu = Sampah::where('user_id',auth()->user()->id)->whereBetween('created_at', [Carbon::now()->subWeek(1)->startOfWeek(),Carbon::now()->subWeek(1)->endOfWeek()])->sum('berat_sampah_total');
            $totalDuaMingguLalu = Sampah::where('user_id',auth()->user()->id)->whereBetween('created_at', [Carbon::now()->subWeek(2)->startOfWeek(),Carbon::now()->subWeek(2)->endOfWeek()])->sum('berat_sampah_total');
            $totalTigaMingguLalu = Sampah::where('user_id',auth()->user()->id)->whereBetween('created_at', [Carbon::now()->subWeek(3)->startOfWeek(),Carbon::now()->subWeek(3)->endOfWeek()])->sum('berat_sampah_total');
            $totalEmpatMingguLalu = Sampah::where('user_id',auth()->user()->id)->whereBetween('created_at', [Carbon::now()->subWeek(4)->startOfWeek(),Carbon::now()->subWeek(4)->endOfWeek()])->sum('berat_sampah_total');
            
            //$totalBeratBulanIni = Sampah::where('user_id','=',auth()->user()->id)->whereBetween('created_at', [Carbon::now()->subMonth(0)->startOfMonth(),Carbon::now()->subMonth(0)->endOfMonth()])->sum('berat_sampah_total');
            $totalBeratJanuari = Sampah::where('user_id',auth()->user()->id)->whereMonth('created_at', '01')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
            $totalBeratFebruari = Sampah::where('user_id',auth()->user()->id)->whereMonth('created_at', '02')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
            $totalBeratMaret = Sampah::where('user_id',auth()->user()->id)->whereMonth('created_at', '03')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
            $totalBeratApril = Sampah::where('user_id',auth()->user()->id)->whereMonth('created_at', '04')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
            $totalBeratMei = Sampah::where('user_id',auth()->user()->id)->whereMonth('created_at', '05')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
            $totalBeratJuni = Sampah::where('user_id',auth()->user()->id)->whereMonth('created_at', '06')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
            $totalBeratJuli = Sampah::where('user_id',auth()->user()->id)->whereMonth('created_at', '07')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
            $totalBeratAgustus = Sampah::where('user_id',auth()->user()->id)->whereMonth('created_at', '08')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
            $totalBeratSeptember = Sampah::where('user_id',auth()->user()->id)->whereMonth('created_at', '09')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
            $totalBeratOktober = Sampah::where('user_id',auth()->user()->id)->whereMonth('created_at', '10')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
            $totalBeratNovember = Sampah::where('user_id',auth()->user()->id)->whereMonth('created_at', '11')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
            $totalBeratDesember = Sampah::where('user_id',auth()->user()->id)->whereMonth('created_at', '12')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
    
            //$totalBerat=Sampah::where('user_id','=',auth()->user()->id)->whereBetween('created_at', [Carbon::now()->subDays(7)->startOfDay(),Carbon::now()->subDays(0)->endOfDay()])->sum('berat_sampah_total');
            $totalOrganik=Sampah::where('user_id',auth()->user()->id)->whereBetween('created_at', [Carbon::now()->subDays(7)->startOfDay(),Carbon::now()->subDays(0)->endOfDay()])->sum('berat_sampah_organik');
            $totalTakTerolah=Sampah::where('user_id',auth()->user()->id)->whereBetween('created_at', [Carbon::now()->subDays(7)->startOfDay(),Carbon::now()->subDays(0)->endOfDay()])->sum('berat_sampah_ke_tpa');
    
            return view('dashboard',[
                'sampahBulanDesember' => $totalBeratDesember,
                'sampahBulanNovember' => $totalBeratNovember,
                'sampahBulanOktober' => $totalBeratOktober,
                'sampahBulanSeptember' => $totalBeratSeptember,
                'sampahBulanAgustus' => $totalBeratAgustus,
                'sampahBulanJuli' => $totalBeratJuli,
                'sampahBulanJuni' => $totalBeratJuni,
                'sampahBulanMei' => $totalBeratMei,
                'sampahBulanApril' => $totalBeratApril,
                'sampahBulanMaret' => $totalBeratMaret,
                'sampahBulanFebruari' => $totalBeratFebruari,
                'sampahBulanJanuari' => $totalBeratJanuari,
                'sampahEmpatMingguLaluTotal' => $totalEmpatMingguLalu,
                'sampahTigaMingguLaluTotal' => $totalTigaMingguLalu,
                'sampahDuaMingguLaluTotal' => $totalDuaMingguLalu,
                'sampahSatuMingguLaluTotal' => $totalSatuMingguLalu,
                'sampahMingguIniTotal' => $totalBeratMingguIni, 
                'sampahOneWeekOrganikTotal' => $totalOrganik,
                'sampahOneWeekTakTerolahTotal' => $totalTakTerolah,
            ]);
        }

        $totalBeratMingguIni = Sampah::whereBetween('created_at', [Carbon::now()->subWeek(0)->startOfWeek(),Carbon::now()->subWeek(0)->endOfWeek()])->sum('berat_sampah_total');
        $totalSatuMingguLalu = Sampah::whereBetween('created_at', [Carbon::now()->subWeek(1)->startOfWeek(),Carbon::now()->subWeek(1)->endOfWeek()])->sum('berat_sampah_total');
        $totalDuaMingguLalu = Sampah::whereBetween('created_at', [Carbon::now()->subWeek(2)->startOfWeek(),Carbon::now()->subWeek(2)->endOfWeek()])->sum('berat_sampah_total');
        $totalTigaMingguLalu = Sampah::whereBetween('created_at', [Carbon::now()->subWeek(3)->startOfWeek(),Carbon::now()->subWeek(3)->endOfWeek()])->sum('berat_sampah_total');
        $totalEmpatMingguLalu = Sampah::whereBetween('created_at', [Carbon::now()->subWeek(4)->startOfWeek(),Carbon::now()->subWeek(4)->endOfWeek()])->sum('berat_sampah_total');

        $totalBeratJanuari = Sampah::whereMonth('created_at', '01')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
        $totalBeratFebruari = Sampah::whereMonth('created_at', '02')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
        $totalBeratMaret = Sampah::whereMonth('created_at', '03')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
        $totalBeratApril = Sampah::whereMonth('created_at', '04')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
        $totalBeratMei = Sampah::whereMonth('created_at', '05')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
        $totalBeratJuni = Sampah::whereMonth('created_at', '06')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
        $totalBeratJuli = Sampah::whereMonth('created_at', '07')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
        $totalBeratAgustus = Sampah::whereMonth('created_at', '08')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
        $totalBeratSeptember = Sampah::whereMonth('created_at', '09')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
        $totalBeratOktober = Sampah::whereMonth('created_at', '10')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
        $totalBeratNovember = Sampah::whereMonth('created_at', '11')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');
        $totalBeratDesember = Sampah::whereMonth('created_at', '12')->whereYear('created_at',Carbon::now()->subYear(0))->sum('berat_sampah_total');

        //$totalBerat=Sampah::whereBetween('created_at', [Carbon::now()->subDays(7)->startOfDay(),Carbon::now()->subDays(0)->endOfDay()])->sum('berat_sampah_total');
        $totalOrganik=Sampah::whereBetween('created_at', [Carbon::now()->subWeek(0)->startOfWeek(),Carbon::now()->subWeek(0)->endOfWeek()])->sum('berat_sampah_organik');
        $totalTakTerolah=Sampah::whereBetween('created_at', [Carbon::now()->subWeek(0)->startOfWeek(),Carbon::now()->subWeek(0)->endOfWeek()])->sum('berat_sampah_ke_tpa');
        return view('dashboard',[
            'sampahBulanDesember' => $totalBeratDesember,
            'sampahBulanNovember' => $totalBeratNovember,
            'sampahBulanOktober' => $totalBeratOktober,
            'sampahBulanSeptember' => $totalBeratSeptember,
            'sampahBulanAgustus' => $totalBeratAgustus,
            'sampahBulanJuli' => $totalBeratJuli,
            'sampahBulanJuni' => $totalBeratJuni,
            'sampahBulanMei' => $totalBeratMei,
            'sampahBulanApril' => $totalBeratApril,
            'sampahBulanMaret' => $totalBeratMaret,
            'sampahBulanFebruari' => $totalBeratFebruari,
            'sampahBulanJanuari' => $totalBeratJanuari,
            'sampahEmpatMingguLaluTotal' => $totalEmpatMingguLalu,
            'sampahTigaMingguLaluTotal' => $totalTigaMingguLalu,
            'sampahDuaMingguLaluTotal' => $totalDuaMingguLalu,
            'sampahSatuMingguLaluTotal' => $totalSatuMingguLalu,
            'sampahMingguIniTotal' => $totalBeratMingguIni, 
            'sampahOneWeekOrganikTotal' => $totalOrganik,
            'sampahOneWeekTakTerolahTotal' => $totalTakTerolah,
        ]);

    //     $myQuantity = 5;
    // return view('dashboard', ['sampahOneWeek' => $myQuantity]);

    }

    public function admin()
    {
        return view('home');
    }
}
