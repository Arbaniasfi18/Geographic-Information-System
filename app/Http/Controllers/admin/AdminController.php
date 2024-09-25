<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DianaGisController;
use App\Models\Keluhan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $title = 'Dashboard';

        $dianaController = DianaGisController::dianaGis('2023');
        $dianaController2022 = DianaGisController::dianaGis('2022');
        $dianaController2021 = DianaGisController::dianaGis('2021');
        $dianaController2020 = DianaGisController::dianaGis('2020');

        $positif = 0;
        $positif2022 = 0;
        $sembuh = 0;
        $sembuh2022 = 0;
        $mati = 0;
        $mati2022 = 0;

        for($i = 0; $i < count($dianaController['dataPoints']); $i++) {
            $positif += $dianaController['dataPoints'][$i][0];
            $positif2022 += $dianaController2022['dataPoints'][$i][0];
            $sembuh += $dianaController['dataPoints'][$i][1];
            $sembuh2022 += $dianaController2022['dataPoints'][$i][1];
            $mati += $dianaController['dataPoints'][$i][2];
            $mati2022 += $dianaController2022['dataPoints'][$i][2];
        }

        $updatepositif = ($positif - $positif2022) / 100;
        $updatesembuh = ($sembuh - $sembuh2022) / 100;
        $updatemati = ($mati - $mati2022) / 100;

        return view('page/admin/home', [
            'title' => $title,
            'positif' => $positif,
            'update_positif' => $updatepositif,
            'sembuh' => $sembuh,
            'update_sembuh' => $updatesembuh,
            'mati' => $mati,
            'update_mati' => $updatemati,
            'cluster2023' => $dianaController,
            'cluster2022' => $dianaController2022,
            'cluster2021' => $dianaController2021,
            'cluster2020' => $dianaController2020,
        ]);
    }

    public function penyebaran()
    {
        $title = 'Data Penyebaran';

        $clstr2020 = DianaGisController::dianaGis('2020');
        $clstr2021 = DianaGisController::dianaGis('2021');
        $clstr2022 = DianaGisController::dianaGis('2022');
        $clstr2023 = DianaGisController::dianaGis('2023');
        
        return view('page/admin/penyebaran', [
            'title' => $title,
            'clstr2020' => $clstr2020,
            'clstr2021' => $clstr2021,
            'clstr2022' => $clstr2022,
            'clstr2023' => $clstr2023,
        ]);
    }

    public function kasus()
    {
        $title = 'Data kasus';

        $clstr2020 = DianaGisController::dianaGis('2020');
        $clstr2021 = DianaGisController::dianaGis('2021');
        $clstr2022 = DianaGisController::dianaGis('2022');
        $clstr2023 = DianaGisController::dianaGis('2023');
        
        return view('page/admin/kasus', [
            'title' => $title,
            'clstr2020' => $clstr2020,
            'clstr2021' => $clstr2021,
            'clstr2022' => $clstr2022,
            'clstr2023' => $clstr2023,
        ]);
    }
    
    public function keluhan()
    {
        $title = 'Keluhan';

        $keluhan = Keluhan::get();

        return view('page/admin/keluhan', [
            'title' => $title,
            'keluhan' => $keluhan,
        ]);
    }

}
