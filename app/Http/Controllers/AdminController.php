<?php

namespace App\Http\Controllers;

use App\Models\Pelayanan;
use App\Models\Profil;
use App\Models\Promosi;
use App\Models\Prosedur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil = Profil::where('status', 'Aktif')->get();
        $jmlProsedur = Prosedur::count('id_prosedur');
        $jmlLayanan = Pelayanan::count('id_layanan');
        $jmlPromosi = Promosi::count('id_promosi');
        return view('admin.dashboard', compact('jmlProsedur', 'jmlLayanan', 'jmlPromosi', 'profil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::where('id', $id)->get();
        return view('admin.setting', compact('user'));
    }

    public function edit($id)
    {
        $profil = Profil::where('id_profil', $id)->get();
        return view('admin.edtProfil', compact('profil'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => ['required'],
            'tentang_kami' => ['required'],
            'visi' => ['required'],
            'misi' => ['required'],
            'alamat' => ['required'],
            'no_hp' => ['required'],
            'email' => ['required'],
            'logo' => ['mimes:jpg,jpeg,png']
        ]);

        // dd($request->all());

        $gp = $request->logo;
        $namaFile = $gp->getClientOriginalName();

        $gp->move(public_path() . '/Image', $namaFile);

        DB::table('profil')->where('id_profil', $request->id_profil)->update([
            'nama' => $request->nama_perusahaan,
            'tentang_kami' => $request->tentang_kami,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
            'gambar' => $namaFile
        ]);

        alert()->success('Berhasil','Data Promosi Berhasil Diedit.');
        return back();
    }

}
