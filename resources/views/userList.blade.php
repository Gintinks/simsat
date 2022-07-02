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
        @foreach ($userList as $user)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td >{{$user->name}}</td>
            <td >{{$user->email}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
    
@endsection