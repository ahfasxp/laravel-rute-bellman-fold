<?php

namespace App\Http\Controllers;

use App\Models\Coordinate;
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
        $graphs = Graph::all();
        return view('graphs.index', compact('graphs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coordinates = Coordinate::orderBy('vertex', 'ASC')->get();
        return view('graphs.create', compact('coordinates'));
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
            'source' => 'required|numeric',
            'destination' => 'required|numeric',
            'weight' => 'required|min:1',
        ],);

        $graph = new Graph;

        $graph->source = $request->get('source');
        $graph->destination = $request->get('destination');
        $graph->weight = $request->get('weight');
        $graph->save();

        return redirect()->route('graphs.index')->with('success', 'Graph Berhasil di Tambahkan!');
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
        $coordinates = Coordinate::orderBy('vertex', 'ASC')->get();
        return view('graphs.edit', compact('graph', 'coordinates'));
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
            'source' => 'required|numeric',
            'destination' => 'required|numeric',
            'weight' => 'required|min:1',
        ],);

        $graph = Graph::findOrFail($graph->id);

        $graph->source = $request->get('source');
        $graph->destination = $request->get('destination');
        $graph->weight = $request->get('weight');
        $graph->save();

        return redirect()->route('graphs.index')->with('success', 'Graph Berhasil di Edit!');
    }

    /**
     * Remove the specified resource source storage.
     *
     * @param  \App\Models\Graph  $graph
     * @return \Illuminate\Http\Response
     */
    public function destroy(Graph $graph)
    {
        $graph = Graph::findOrFail($graph->id);
        $graph->delete();
        return redirect()->route('graphs.index')->with('success','Graph Berhasil di Hapus!');
    }
}
