<?php

namespace App\Http\Controllers\admin;

use App\Exports\KasusTemplateExport;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DianaGisController;
use App\Imports\KasusImport;
use App\Models\Keluhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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

        $count = max(count($dianaController['dataPoints']), count($dianaController2022['dataPoints']), count($dianaController2021['dataPoints']), count($dianaController2020['dataPoints']));

        for($i = 0; $i < $count; $i++) {
            if (isset($dianaController['dataPoints'][$i][1])) 
                $positif += $dianaController['dataPoints'][$i][1];
            if (isset($dianaController2022['dataPoints'][$i][1])) 
                $positif2022 += $dianaController2022['dataPoints'][$i][1];
            if (isset($dianaController['dataPoints'][$i][2])) 
                $sembuh += $dianaController['dataPoints'][$i][2];
            if (isset($dianaController2022['dataPoints'][$i][2])) 
                $sembuh2022 += $dianaController2022['dataPoints'][$i][2];
            if (isset($dianaController['dataPoints'][$i][3])) 
                $mati += $dianaController['dataPoints'][$i][3];
            if (isset($dianaController2022['dataPoints'][$i][3])) 
                $mati2022 += $dianaController2022['dataPoints'][$i][3];
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

    public function tambah_kasus($tahun) 
    {
        $title = "Tambah Kasus " . $tahun;
        return view('page/admin/kasus-tambah', [
            'title' => $title,
            'tahun' => $tahun,
        ]);
    }
    
    public function tambah_kasus_post($tahun, Request $request) 
    {
        $data = [
            'nama' => $request->kota,
            'konfirmasi' => $request->penderita,
            'sembuh' => $request->sembuh,
            'meninggal' => $request->meninggal,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'tahun' => $tahun,
        ];
        if ($tahun == '2023') {
            $get_tahun = DB::table('tbc_tahun_2023')->orderBy('id', 'desc')->first();
            $data['id'] = (int)$get_tahun->id += 1;
            if (DB::table('tbc_tahun_2023')->insert($data)) {
                return redirect('/admin/data-kasus')->with('success', 'Berhasil menambah data pada tahun ' . $tahun);
            } else {
                return redirect('/admin/data-kasus')->with('error', 'Gagal menambah data pada tahun ' . $tahun);
            }
        } else if ($tahun == '2022') {
            $get_tahun = DB::table('tbc_tahun_2022')->orderBy('id', 'desc')->first();
            $data['id'] = (int)$get_tahun->id += 1;
            unset($data['tahun']);
            if (DB::table('tbc_tahun_2022')->insert($data)) {
                return redirect('/admin/data-kasus')->with('success', 'Berhasil menambah data pada tahun ' . $tahun);
            } else {
                return redirect('/admin/data-kasus')->with('error', 'Gagal menambah data pada tahun ' . $tahun);
            }
        } else if ($tahun == '2021') {
            $get_tahun = DB::table('tbc_tahun_2021')->orderBy('id', 'desc')->first();
            $data['id'] = (int)$get_tahun->id += 1;
            unset($data['tahun']);
            if (DB::table('tbc_tahun_2021')->insert($data)) {
                return redirect('/admin/data-kasus')->with('success', 'Berhasil menambah data pada tahun ' . $tahun);
            } else {
                return redirect('/admin/data-kasus')->with('error', 'Gagal menambah data pada tahun ' . $tahun);
            }
        } else if ($tahun == '2020') {
            $get_tahun = DB::table('tbc_tahun_2020')->orderBy('id', 'desc')->first();
            $data['id'] = (int)$get_tahun->id += 1;
            unset($data['tahun']);
            if (DB::table('tbc_tahun_2020')->insert($data)) {
                return redirect('/admin/data-kasus')->with('success', 'Berhasil menambah data pada tahun ' . $tahun);
            } else {
                return redirect('/admin/data-kasus')->with('error', 'Gagal menambah data pada tahun ' . $tahun);
            }
        }
    }

    public function update_kasus($tahun, $id)
    {
        $title = "Tambah Kasus " . $tahun;

        if ($tahun == '2023') {
            $data = DB::table('tbc_tahun_2023')->where('id', $id)->first();
        } else if ($tahun == '2022') {
            $data = DB::table('tbc_tahun_2022')->where('id', $id)->first();
        } else if ($tahun == '2021') {
            $data = DB::table('tbc_tahun_2021')->where('id', $id)->first();
        } else if ($tahun == '2020') {
            $data = DB::table('tbc_tahun_2020')->where('id', $id)->first();
        }

        return view('page/admin/kasus-edit', [
            'title' => $title,
            'data' => $data,
            'tahun' => $tahun,
        ]);
    }

    public function update_kasus_post($tahun, $id, Request $request)
    {
        $data = [
            'konfirmasi' => $request->penderita,
            'sembuh' => $request->sembuh,
            'meninggal' => $request->meninggal,
        ];
        if ($tahun == '2023') {
            $data_kota = DB::table('tbc_tahun_2023')->where('id', $id)->first();
            if (DB::table('tbc_tahun_2023')->where('id', $id)->update($data)) {
                return redirect('/admin/data-kasus')->with('success', 'Berhasil mengubah data ' . $data_kota->nama . ' pada tahun ' . $tahun);
            } else {
                return redirect('/admin/data-kasus')->with('error', 'Gagal mengubah data pada tahun ' . $tahun);
            }
        } else if ($tahun == '2022') {
            $data_kota = DB::table('tbc_tahun_2022')->where('id', $id)->first();
            if (DB::table('tbc_tahun_2022')->where('id', $id)->update($data)) {
                return redirect('/admin/data-kasus')->with('success', 'Berhasil mengubah data ' . $data_kota->nama . ' pada tahun ' . $tahun);
            } else {
                return redirect('/admin/data-kasus')->with('error', 'Gagal mengubah data pada tahun ' . $tahun);
            }
        } else if ($tahun == '2021') {
            $data_kota = DB::table('tbc_tahun_2021')->where('id', $id)->first();
            if (DB::table('tbc_tahun_2021')->where('id', $id)->update($data)) {
                return redirect('/admin/data-kasus')->with('success', 'Berhasil mengubah data ' . $data_kota->nama . ' pada tahun ' . $tahun);
            } else {
                return redirect('/admin/data-kasus')->with('error', 'Gagal mengubah data pada tahun ' . $tahun);
            }
        } else if ($tahun == '2020') {
            $data_kota = DB::table('tbc_tahun_2020')->where('id', $id)->first();
            if (DB::table('tbc_tahun_2020')->where('id', $id)->update($data)) {
                return redirect('/admin/data-kasus')->with('success', 'Berhasil mengubah data ' . $data_kota->nama . ' pada tahun ' . $tahun);
            } else {
                return redirect('/admin/data-kasus')->with('error', 'Gagal mengubah data pada tahun ' . $tahun);
            }
        }
    }

    public function delete_kasus($tahun, $id)
    {
        if ($tahun == '2023') {
            if (DB::table('tbc_tahun_2023')->where('id', $id)->delete()) {
                return redirect('/admin/data-kasus')->with('success', 'Berhasil menghapus data pada tahun ' . $tahun);
            } else {
                return redirect('/admin/data-kasus')->with('error', 'Gagal menghapus data pada tahun ' . $tahun);
            }
        } else if ($tahun == '2022') {
            if (DB::table('tbc_tahun_2022')->where('id', $id)->delete()) {
                return redirect('/admin/data-kasus')->with('success', 'Berhasil menghapus data pada tahun ' . $tahun);
            } else {
                return redirect('/admin/data-kasus')->with('error', 'Gagal menghapus data pada tahun ' . $tahun);
            }
        } else if ($tahun == '2021') {
            if (DB::table('tbc_tahun_2021')->where('id', $id)->delete()) {
                return redirect('/admin/data-kasus')->with('success', 'Berhasil menghapus data pada tahun ' . $tahun);
            } else {
                return redirect('/admin/data-kasus')->with('error', 'Gagal menghapus data pada tahun ' . $tahun);
            }
        } else if ($tahun == '2020') {
            if (DB::table('tbc_tahun_2020')->where('id', $id)->delete()) {
                return redirect('/admin/data-kasus')->with('success', 'Berhasil menghapus data pada tahun ' . $tahun);
            } else {
                return redirect('/admin/data-kasus')->with('error', 'Gagal menghapus data pada tahun ' . $tahun);
            }
        }
    }

    public function template()
    {
        return Excel::download(new KasusTemplateExport, 'template-kasus.xlsx');
    }

    public function import_excel(Request $request) 
    {
        $file = $request->file('import');
        
        Excel::import(new KasusImport, $file);
        
        return redirect('/admin/data-kasus')->with('success', 'Berhasil import data');
    }

}
