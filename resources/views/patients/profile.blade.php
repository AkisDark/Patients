@extends('layouts.app')

@section('content')

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add
    </button>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Firstname</th>
                <th scope="col">Lastname</th>
                <th scope="col">Phone</th>
                <th scope="col">Email</th>
                <th scope="col">Traitements</th>
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
                    <td>
                        @forelse ($patient->traitments as $traitment)
                            <p>
                                <a target="_blanck" href="{{ asset('uploads/paitents/' . $traitment->file) }}">PDF</a>
                            </p>
                        @empty
                            <p>No date</p>
                        @endforelse
                    </td>
                </tr>
            @empty
                <p>No data</p>
            @endforelse
        </tbody>
    </table>



    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('pat.store') }}" method="POST" enctype='multipart/form-data'>
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Paitents:</label>
                            <select name="paitent_id" id="" class="form-control">
                                <option value=""></option>
                                @forelse ($patientsForSelect as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->firstname }} {{ $patient->lastname }}
                                    </option>
                                @empty
                                @endforelse
                            </select>
                            @error('paitent_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">file:</label>
                            <input type="file" name="file" class="form-control">
                            @error('file')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
