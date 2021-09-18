<?php

namespace App\Http\Controllers;

use App\Models\Graph;
use Illuminate\Http\Request;

class GraphController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $graph = Graph::all();
        return view('graph.index', compact('graph'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('graph.create');
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
            'lat' => 'required|string|min:3',
            'long' => 'required|string|min:3',
            'vertex' => 'required|string',
        ],);

        $graph = new Graph;

        $graph->nama = $request->get('nama');
        $graph->latitude = $request->get('lat');
        $graph->longitude = $request->get('long');
        $graph->vertex = $request->get('vertex');
        $graph->save();

        return redirect()->route('graph.index')->with('success', 'Graph Berhasil di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Graph  $Graph
     * @return \Illuminate\Http\Response
     */
    public function show(Graph $Graph)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Graph  $Graph
     * @return \Illuminate\Http\Response
     */
    public function edit(Graph $graph)
    {
        $graph = Graph::findOrFail($graph->id);
        return view('graph.edit', compact('graph'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Graph  $Graph
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Graph $graph)
    {
        $request->validate([
            'nama' => 'required|string|min:3',
            'lat' => 'required|string|min:3',
            'long' => 'required|string|min:3',
            'vertex' => 'required|string',
        ],);

        $graph = Graph::findOrFail($graph->id);

        $graph->nama = $request->get('nama');
        $graph->latitude = $request->get('lat');
        $graph->longitude = $request->get('long');
        $graph->vertex = $request->get('vertex');
        $graph->save();

        return redirect()->route('graph.index')->with('success', 'Graph Berhasil di Edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Graph  $graph
     * @return \Illuminate\Http\Response
     */
    public function destroy(Graph $graph)
    {
        $graph = Graph::findOrFail($graph->id);
        $graph->delete();
        return redirect()->route('graph.index')->with('success','Graph Berhasil di Hapus!');
    }
}
