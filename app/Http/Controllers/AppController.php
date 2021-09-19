<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Coordinate;
use App\Models\Graph;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        $desa = Coordinate::all();
        return view('index', compact('desa'));
    }

    public function distances()
    {
        // Driver Code
        $V = 5; // Jumlah vertex dalam graph
        $E = 8; // Jumlah edge dalam graph
        $S = 0;

        // Every edge has three values (u, v, w) where
        // the edge is from vertex u to v. And weight
        // of the edge is w.
        // $graph = array(
        //     array(0, 1, -1), array(0, 2, 4),
        //     array(1, 2, 3), array(1, 3, 2),
        //     array(1, 4, 2), array(3, 2, 5),
        //     array(3, 1, 1), array(4, 3, -3)
        // );

        $graphs = Graph::select('source', 'destination', 'weight')->get()->toArray();
        $results = $this->BellmanFord($graphs, $V, $E, $S);

        // This code is contributed by AnkitRai01
        $source = Coordinate::where('vertex', $S)->first();
        $vertex = Coordinate::whereIn('vertex', [$graphs])->get();

        return view('distance', compact('graphs','results', 'V', 'S', 'source', 'vertex'));
    }

    // A PHP program for Bellman-Ford's single
    // source shortest path algorithm.

    // The main function that finds shortest
    // distances from src to all other vertices
    // using Bellman-Ford algorithm. The function
    // also detects negative weight cycle
    // The row graph[i] represents i-th edge with
    // three values u, v and w.
    function BellmanFord($graph, $V, $E, $src)
    {
        // Inisialisasi jarak semua simpul sebagai tak terbatas.
        $dis = array();
        for ($i = 0; $i < $V; $i++)
            $dis[$i] = PHP_INT_MAX;

        // inisialisasi jarak sumber sebagai 0
        $dis[$src] = 0;

        // Relax all edges |V| - 1 times. A simple
        // jalur terpendek dari src ke yang lain
        // simpul dapat memiliki paling banyak |V| - 1 edge
        for ($i = 0; $i < $V - 1; $i++) {
            for ($j = 0; $j < $E; $j++) {
                if (
                    $dis[$graph[$j]['source']] != PHP_INT_MAX && $dis[$graph[$j]['source']] + $graph[$j]['weight'] <
                    $dis[$graph[$j]['destination']]
                )
                    $dis[$graph[$j]['destination']] = $dis[$graph[$j]['source']] +
                        $graph[$j]['weight'];
            }
        }

        // periksa siklus berbobot negatif.
        // Langkah di atas menjamin terpendek
        // jarak jika grafik tidak mengandung
        // siklus berat negatif. Jika kita mendapatkan
        // jalur yang lebih pendek, maka ada siklus.
        for ($i = 0; $i < $E; $i++) {
            $x = $graph[$i]['source'];
            $y = $graph[$i]['destination'];
            $weight = $graph[$i]['weight'];
            if (
                $dis[$x] != PHP_INT_MAX &&
                $dis[$x] + $weight < $dis[$y]
            )
                echo "Grafik mengandung siklus bobot negatif \n";
        }

        // echo "Vertex Distance from Source \n";
        // for ($i = 0; $i < $V; $i++)
        //     echo $i, "\t\t", $dis[$i], "\n";
        return $dis;
    }
}
