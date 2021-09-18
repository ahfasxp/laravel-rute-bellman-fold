<?php

namespace App\Http\Controllers;

use App\Models\Coordinate;
use Illuminate\Http\Request;

class CoordinateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coordinates = Coordinate::orderBy('vertex', 'ASC')->get();
        return view('coordinates.index', compact('coordinates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coordinates.create');
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
            'name' => 'required|string|min:3',
            'lat' => 'required|string|min:3',
            'long' => 'required|string|min:3',
            'vertex' => 'required|string',
        ],);

        $coordinate = new Coordinate;

        $coordinate->name = $request->get('name');
        $coordinate->latitude = $request->get('lat');
        $coordinate->longitude = $request->get('long');
        $coordinate->vertex = $request->get('vertex');
        $coordinate->save();

        return redirect()->route('coordinates.index')->with('success', 'Coordinate Berhasil di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coordinate  $Coordinate
     * @return \Illuminate\Http\Response
     */
    public function show(Coordinate $Coordinate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coordinate  $Coordinate
     * @return \Illuminate\Http\Response
     */
    public function edit(Coordinate $coordinate)
    {
        $coordinate = Coordinate::findOrFail($coordinate->id);
        return view('coordinates.edit', compact('coordinate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coordinate  $Coordinate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coordinate $coordinate)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'lat' => 'required|string|min:3',
            'long' => 'required|string|min:3',
            'vertex' => 'required|string',
        ],);

        $coordinate = Coordinate::findOrFail($coordinate->id);

        $coordinate->name = $request->get('name');
        $coordinate->latitude = $request->get('lat');
        $coordinate->longitude = $request->get('long');
        $coordinate->vertex = $request->get('vertex');
        $coordinate->save();

        return redirect()->route('coordinates.index')->with('success', 'Coordinate Berhasil di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coordinate  $coordinate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coordinate $coordinate)
    {
        $coordinate = Coordinate::findOrFail($coordinate->id);
        $coordinate->delete();
        return redirect()->route('coordinates.index')->with('success','Coordinate Berhasil di Hapus!');
    }
}
