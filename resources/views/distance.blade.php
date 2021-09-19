@extends('layouts.app')
@section('style')
@endsection

@section('content')
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Source</th>
                    <td>{{ $S }}</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Vertex</th>
                    @for ($i = 0; $i < $V; $i++)
                        <td>{{ $i }}</td>
                    @endfor
                </tr>
                <tr>
                    <th>Distance from Source</th>
                    @foreach ($results as $item)
                        <td>{{ $item }}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
        <br>
        <br>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Source</th>
                    <td>{{ $source->name }}</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Vertex</th>
                    @foreach ($vertex as $item)
                        <td>{{ $item->name }}</td>
                    @endforeach
                </tr>
                <tr>
                    <th>Distance from Source</th>
                    @foreach ($results as $item)
                        <td>{{ $item }}</td>
                    @endforeach
                </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('script')
@endsection
