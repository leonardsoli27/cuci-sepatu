<?php

namespace App\Http\Controllers;

use App\Models\Prosedur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dftPesanan');
    }

    public function psdPesanan()
    {   $prosedur = Prosedur::all();
        return view('admin.psdPesanan', compact('prosedur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tbhProsedur');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_prosedur' => ['required', 'min:5'],
            'deskripsi' => ['required', 'min:10'],
        ]);

        $prosedur = new Prosedur;
        $prosedur->nama = $request->nama_prosedur;
        $prosedur->deskripsi = $request->deskripsi;
        $prosedur->status = 'Aktif';
        $prosedur->save();

        alert()->success('Berhasil','Prosedur Baru Berhasil Ditambahkan.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prosedur = Prosedur::where('id_prosedur', $id)->get();
        return view('admin.edtProsedur', compact('prosedur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama_prosedur' => ['required', 'min:5'],
            'deskripsi' => ['required', 'min:10'],
        ]);

        DB::table('prosedur')->where('id_prosedur', $request->id_prosedur)->update([
            'nama' => $request->nama_prosedur,
            'deskripsi' => $request->deskripsi,
            'status' => 'Aktif',
        ]);

        alert()->success('Berhasil','Data Prosedur Berhasil Diedit.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('prosedur')->where('id_prosedur', $id)->delete();
        alert()->success('Berhasil','Data Prosedur Berhasil Dihapus.');
        return back();
    }
}
