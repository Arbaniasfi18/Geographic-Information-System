<?php

namespace App\Http\Controllers;

use App\Models\Keluhan;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('page/contact_us');
    }

    public function store(Request $req)
    {
        $data = [
            'nama' => $req->contact_name,
            'emaiL' => $req->contact_email,
            'telepon' => $req->contact_phone,
            'permasalahan' => $req->permasalahan,
            'pesan' => $req->contact_message,
        ];
        
        if (Keluhan::create($data)) {
            return redirect()->back()->with('success', 'Keluhan berhasil dikirim');
        }else {
            return redirect()->back()->with('error', 'Keluhan gagal dikirim');
        }
    }
}
