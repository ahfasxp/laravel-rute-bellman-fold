<?php

namespace App\Http\Controllers;

use App\Models\Coordinate;
use App\Models\Desa;
use Illuminate\Http\Request;

class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $desa = Desa::all();
        return view('desa.index', compact('desa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coordinates = Coordinate::all();
        return view('desa.create', compact('coordinates'));
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
            'nama' => 'required|string|min:3',
            'coordinate_id' => 'required|unique:desa',
        ],);

        $desa = new Desa;

        $desa->nama = $request->get('nama');
        $desa->kecamatan = $request->get('kecamatan');
        $desa->kabupaten = $request->get('kabupaten');
        $desa->provinsi = $request->get('provinsi');
        $desa->kode_wilayah = $request->get('kode_wilayah');
        $desa->kode_pos = $request->get('kode_pos');
        $desa->ketinggian = $request->get('ketinggian');
        $desa->luas_wilayah = $request->get('luas_wilayah');
        $desa->jumlah_penduduk = $request->get('jml_penduduk');
        $desa->jml_laki_laki = $request->get('jml_lk');
        $desa->jml_perempuan = $request->get('jml_pr');
        $desa->coordinate_id = $request->get('coordinate_id');
        $desa->save();

        return redirect()->route('desa.index')->with('success', 'Desa Berhasil di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function show(Desa $desa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function edit(Desa $desa)
    {
        $desa = Desa::findOrFail($desa->id);
        $coordinates = Coordinate::all();
        return view('desa.edit', compact('desa', 'coordinates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Desa $desa)
    {
        $request->validate([
            'nama' => 'required|string|min:3',
            'coordinate_id' => 'required|unique:desa,coordinate_id,'.$desa->id,
        ],);

        $desa = Desa::findOrFail($desa->id);

        $desa->nama = $request->get('nama');
        $desa->kecamatan = $request->get('kecamatan');
        $desa->kabupaten = $request->get('kabupaten');
        $desa->provinsi = $request->get('provinsi');
        $desa->kode_wilayah = $request->get('kode_wilayah');
        $desa->kode_pos = $request->get('kode_pos');
        $desa->ketinggian = $request->get('ketinggian');
        $desa->luas_wilayah = $request->get('luas_wilayah');
        $desa->jumlah_penduduk = $request->get('jml_penduduk');
        $desa->jml_laki_laki = $request->get('jml_lk');
        $desa->jml_perempuan = $request->get('jml_pr');
        $desa->coordinate_id = $request->get('coordinate_id');
        $desa->save();
        return redirect()->route('desa.index')->with('success', 'Desa Berhasil di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Desa $desa)
    {
        $desa = Desa::findOrFail($desa->id);
        $desa->delete();
        return redirect()->route('desa.index')->with('success', 'Desa Berhasil di Hapus!');
    }

    public function detail($id)
    {
        $desa = Desa::findOrFail($id);
        return $desa;
    }
}
