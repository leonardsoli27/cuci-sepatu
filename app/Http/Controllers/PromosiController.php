<?php

namespace App\Http\Controllers;

use App\Models\Promosi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class PromosiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promosi = Promosi::all();
        return view('admin.promosi', compact('promosi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tbhPromosi');
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
            'nama_promosi' => ['required', 'min:5'],
            'deskripsi' => ['required', 'min:10'],
            'gambar_promosi' => ['required', 'mimes:jpg,jpeg,png']
        ]);

        $gp = $request->gambar_promosi;
        $namaFile = $gp->getClientOriginalName();

        $promosi = new Promosi;
        $promosi->nama = $request->nama_promosi;
        $promosi->deskripsi = $request->deskripsi;
        $promosi->status = 'Aktif';
        $promosi->gambar = $namaFile;

        $gp->move(public_path() . '/Image', $namaFile);
        $promosi->save();

        alert()->success('Berhasil','Promosi Baru Berhasil Ditambahkan.');
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
        $promosi = Promosi::where('id_promosi', $id)->get();
        return view('admin.edtPromosi', compact('promosi'));
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
            'nama_promosi' => ['required', 'min:5'],
            'deskripsi' => ['required', 'min:10'],
            'gambar_promosi' => ['required', 'mimes:jpg,jpeg,png']
        ]);

        $gp = $request->gambar_promosi;
        $namaFile = $gp->getClientOriginalName();

        $gp->move(public_path() . '/Image', $namaFile);

        DB::table('promosi')->where('id_promosi', $request->id_promosi)->update([
            'nama' => $request->nama_promosi,
            'deskripsi' => $request->deskripsi,
            'status' => 'Aktif',
            'gambar' => $namaFile,
        ]);

        alert()->success('Berhasil','Data Promosi Berhasil Diedit.');
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
        DB::table('promosi')->where('id_promosi', $id)->delete();
        alert()->success('Berhasil','Data Promosi Berhasil Dihapus.');
        return back();
    }
}
