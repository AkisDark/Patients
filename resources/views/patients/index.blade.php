@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($patients as $patient)
                <tr>
                    <td>
                        <a href="{{ route('pat', $patient->id) }}">{{ $patient->id }}</a>
                    </td>
                    <td>{{ $patient->firstname }}</td>
                    <td>{{ $patient->lastname }}</td>
                    <td>{{ $patient->phone }}</td>
                    <td>{{ $patient->email }}</td>
                </tr>
            @empty
                <p>No data</p>
            @endforelse
        </tbody>
    </table>
@endsection
