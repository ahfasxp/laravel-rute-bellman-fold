@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <style>
        #mapid {
            height: 500px;
        }

    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div id="mapid"></div>
    </div>
@endsection

@section('script')
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>

    <script>
        var mymap = L.map('mapid').setView([-6.8623928, 108.7405994], 13);

        L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(mymap);

        // var marker = L.marker([-6.8408296, 108.7493048]).addTo(mymap);
    </script>

    @foreach ($desa as $item)
        <script>
            var marker = L.marker([{!! $item->latitude !!}, {!! $item->longitude !!}]).addTo(mymap);
            marker.bindTooltip('{!! $item->name !!}', {permanent: true,});
        </script>
    @endforeach

    <script>
        // Javascript program for Bellman-Ford's single source
        // shortest path algorithm.

        // The main function that finds shortest
        // distances from src to all other vertices
        // using Bellman-Ford algorithm. The function
        // also detects negative weight cycle
        // The row graph[i] represents i-th edge with
        // three values u, v and w.
        function BellmanFord(graph, V, E, src) {
            // Initialize distance of all vertices as infinite.
            var dis = Array(V).fill(1000000000);

            // initialize distance of source as 0
            dis[src] = 0;

            // Relax all edges |V| - 1 times. A simple
            // shortest path from src to any other
            // vertex can have at-most |V| - 1 edges
            for (var i = 0; i < V - 1; i++) {
                for (var j = 0; j < E; j++) {
                    if ((dis[graph[j][0]] + graph[j][2]) < dis[graph[j][1]])
                        dis[graph[j][1]] = dis[graph[j][0]] + graph[j][2];
                }
            }

            // check for negative-weight cycles.
            // The above step guarantees shortest
            // distances if graph doesn't contain
            // negative weight cycle. If we get a
            // shorter path, then there is a cycle.
            for (var i = 0; i < E; i++) {
                var x = graph[i][0];
                var y = graph[i][1];
                var weight = graph[i][2];
                if ((dis[x] != 1000000000) &&
                    (dis[x] + weight < dis[y]))
                    document.write("Graph contains negative" +
                        " weight cycle<br>");
            }

            document.write("Source Vertex:&ensp;" + src + "<br>");
            document.write("Vertex:&emsp;&emsp;");
            for (var i = 0; i < V; i++)
                document.write(i + "&emsp;");

            document.write("<br>Distance:&ensp;");
            for (var i = 0; i < V; i++)
                document.write(dis[i] + "&emsp;");
        }

        // Driver code
        var V = 5; // Number of vertices in graph
        var E = 8; // Number of edges in graph

        // Every edge has three values (u, v, w) where
        // the edge is from vertex u to v. And weight
        // of the edge is w.
        var graph = [
            [0, 1, -1],
            [0, 2, 4],
            [1, 2, 3],
            [1, 3, 2],
            [1, 4, 2],
            [3, 2, 5],
            [3, 1, 1],
            [4, 3, -3]
        ];
        BellmanFord(graph, V, E, 0);

        // This code is contributed by importantly.
    </script>
@endsection
