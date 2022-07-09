@extends('layouts.nav')
    
@section('body')

<table>
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">nama</th>
        <th scope="col">email</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($sampahList as $sampah)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td >{{$sampah->berat_sampah_kaca}}</td>
            <td >{{$sampah->berat_sampah_karet}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
    
@endsection