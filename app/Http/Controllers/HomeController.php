<?php

namespace App\Http\Controllers;

use App\Models\Pelayanan;
use App\Models\Profil;
use App\Models\Promosi;
use App\Models\Prosedur;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promosi = Promosi::where('status', 'Aktif')->take('2')->get();
        $layanan = Pelayanan::where('status', 'Aktif')->take('2')->get();
        return view('home', compact('promosi', 'layanan'));
    }

    public function profil()
    {
        $profil = Profil::where('status', 'Aktif')->get();
        return view('profil', compact('profil'));
    }

    public function layanan()
    {
        $layanan = Pelayanan::where('status', 'Aktif')->get();
        return view('layanan', compact('layanan'));
    }

    public function prosedur()
    {
        $prosedur = Prosedur::where('status', 'Aktif')->get();
        return view('prosedur', compact('prosedur'));
    }

    public function kontak()
    {
        $profil = Profil::where('status', 'Aktif')->get();
        return view('kontak', compact('profil'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
