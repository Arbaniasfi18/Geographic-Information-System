<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SebaranController extends Controller
{
    public function index($tahun)
    {
        $dianaController = DianaGisController::dianaGis($tahun);

        $data['tahun'] = $tahun;

        $data['tbc'] = $dianaController;

        return view('page/sebaran', $data);
    }
}
