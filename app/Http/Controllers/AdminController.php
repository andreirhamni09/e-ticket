<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function ListPesanan(){
        $query2 = 'select * from pesanan';
        $data2['dataPesanan']= DB::select($query2);
        return view('admin.admin', $data2);
    }

    public function FormLogin(){
        return redirect()->route('login')->with('fail', 'Belum Login');
    }
    
    public function Login(Request $request){
        $request->validate([
            'email'         => 'required|email',
            'password'      => 'required'
        ]);  
        $query = 'select * from admin where email="'.$request->email.'" and password="'.$request->password.'"';
        $data = DB::select($query);
        if(count($data) > 0) {
            $id = '';
            foreach ($data as $admin) {
                $id = $admin->email;
            }
            $request->session()->put('loginId', $id);
            
            return redirect()->route('admin.pesanan');
        }
        else {
            return back()->with('fail', 'Email Atau Password Salah');
        }

    }
    public function Logout(Request $request){
        if($request->session()->has('loginId')) {
            $request->session()->pull('loginId');
        }
        return redirect()->route('login');
    }

    public function Validasi(Request $request){
        $statusValidasi = $request->validasi;
        $idTiket        = $request->tiket_id;
        $query          = 'update pesanan set status_pesanan = "'.$statusValidasi.'" where tiket_id = '.$idTiket.'';
        $affected = DB::update($query);
        if($affected) {
            $request->session()->put('update','Berhasil Ubah Status');
            return redirect()->route('admin.pesanan');
        } else {
            $request->session()->put('fail','Gagal Ubah Status');
            return redirect()->route('admin.pesanan');
        }
    }


    public function UpdateData(Request $request) {     
        
        $request->session()->pull('update');   
        $request->validate([
            'tiketId'               => 'required',
            'namaLengkap'           => 'required',    
            'email'                 => 'required',
            'tanggal'               => 'required',
            'validasi'              => 'required',
        ]);  
        $idTiket        = $request->idUpdate;
        $date           = date('Y-m-d H:i:s', strtotime($request->tanggal));

        $query          = 'update pesanan set   tiket_id='.$request->tiketId.',
                                                nama_pemesan="'.$request->namaLengkap.'",
                                                email="'.$request->email.'",
                                                tanggal_pesanan="'.$date.'", 
                                                status_pesanan = "'.$request->validasi.'" where tiket_id = '.$idTiket.'';
        $affected = DB::update($query);
        if($affected) {
            $request->session()->put('update','Berhasil Ubah Status');
            return redirect()->route('admin.pesanan');
        } else {
            $request->session()->put('fail','Gagal Ubah Data');
            return redirect()->route('admin.pesanan');
        }
    }

    public function DeleteData(Request $request) {     
        
        $request->session()->pull('delete');   
        $idTiket        = $request->deleteId;
        $deleted = DB::table('pesanan')->where('tiket_id', $idTiket)->delete();
        if($deleted) {
            return redirect()->route('admin.pesanan')->with('delete', 'Berhasil Hapus Data');
        } else {
            return redirect()->route('admin.pesanan')->with('fail', 'Gagal Hapus Data');
        }
    }
}


