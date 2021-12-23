<?php

namespace App\Http\Controllers;

use App\Models\Pelayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelayanan = Pelayanan::all();
        return view('admin.pelayanan', compact('pelayanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tbhPelayanan');
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
            'nama_pelayanan' => ['required', 'min:5'],
            'harga' => ['required', 'numeric'],
            'gambar_pelayanan' => ['required', 'image','mimes:jpg,jpeg,png']
        ]);

        $gp = $request->gambar_pelayanan;
        $namaFile = $gp->getClientOriginalName();

        $pelayanan = new Pelayanan();
        $pelayanan->nama = $request->nama_pelayanan;
        $pelayanan->harga = $request->harga;
        $pelayanan->status = 'Aktif';
        $pelayanan->gambar = $namaFile;

        $gp->move(public_path() . '/Image', $namaFile);
        $pelayanan->save();

        alert()->success('Berhasil','Pelayanan Baru Berhasil Ditambahkan.');
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
        $pelayanan = Pelayanan::where('id_layanan', $id)->get();
        return view('admin.edtPelayanan', compact('pelayanan'));
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
        $request->validate([
            'nama_pelayanan' => ['required', 'min:5'],
            'harga' => ['required', 'numeric'],
            'gambar_pelayanan' => ['required', 'image','mimes:jpg,jpeg,png']
        ]);

        if ($request->file('gambar_pelayanan')) {
            $gp = $request->gambar_pelayanan;
            $namaFile = $gp->getClientOriginalName();

            $gp->move(public_path() . '/Image', $namaFile);
        }


        DB::table('layanan')->where('id_layanan', $request->id_pelayanan)->update([
            'nama' => $request->nama_pelayanan,
            'harga' => $request->harga,
            'status' => 'Aktif',
            'gambar' => $namaFile,
        ]);

        alert()->success('Berhasil','Data Pelayanan Berhasil Diedit.');
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
        DB::table('layanan')->where('id_layanan', $id)->delete();
        alert()->success('Berhasil','Data Pelayanan Berhasil Dihapus.');
        return back();
    }
}
