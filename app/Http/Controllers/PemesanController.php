<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class PemesanController extends Controller
{
    public function index(){
        return view('index');
    }

    public function PesanTiket(Request $request){        
        $request->session()->pull('idTiket');
        $request->validate([
            'namaLengkap'       => 'required',
            'email'             => 'required|email',
            'tanggal'             => 'required|date',
        ]);  
        $id = rand(1, 2147483647);
        $date = date('Y-m-d H:i:s', strtotime($request->tanggal));
        $data = DB::table('pesanan')->insert([
            [   'tiket_id'          => $id, 
                'nama_pemesan'      => $request->namaLengkap, 
                'email'             => $request->email, 
                'tanggal_pesanan'   => $date, 
                'status_pesanan'    => 'registrasi'
            ],
        ]);
        // return view('admin.admin', ['data' => $data]);
        if($data) {
            $request->session()->put('idTiket', $id);
            return redirect()->route('berhasil');
        }
        else {
            return back()->with('fail', 'Email Atau Password Salah');
        }
    }

    public function DisplayTiket(){
        return view('dashboard.registrasi-pesanan');
    }

}
