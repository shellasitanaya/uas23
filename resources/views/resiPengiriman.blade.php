{{-- NO 4 --}}
@extends('template.template')


@section('content')
<div class="container-fluid p-3">
    <div class="container-fluid border p-2">
        <h1 class="mb-5">Entry Nomor Resi</h1>
        <div class="container-fluid d-flex flex-row gap-2 p-0">
            <form method="POST" action={{ route('resi.create') }}>
                @csrf
                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal Resi</label>
                    <div class="input-group">
                        <input type="date" name="tanggal" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4" required>
                    </div>
                    <label for="nomor" class="form-label">Nomor Resi</label>
                    <div class="input-group">
                        <input type="text" name="nomor_resi" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4" required>
                    </div>
                </div>
                <button type="submit" class="btn w-100 btn-dark">Entry</button>
            </form>
        </div>
        <table class="table mt-3">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Tanggal Resi</th>
                    <th scope="col">Nomor Resi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allResi as $resi)
                <tr>
                    <td>{{ $resi->tanggal}}</td>
                    <td>{{ $resi->nomor_resi}}</td>
                    <td>
                        <div class="d-flex flex-row gap-2">
                            <form method="GET" action={{ route('resi.entryLog') }} > 
                                @csrf
                                <input type="hidden" name="id_resi" value="{{ $resi->id }}"> 
                                {{-- <input type="hidden" name="resi" value="{{ $resi->id }}"> --}}
                                <button type="submit" class="btn btn-primary">Entry Log</button>
                            </form>
                            <form method="POST" action={{ route('resi.delete') }}> 
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $resi->id }}">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
        
            </tbody>
        </table>
    </div>
</div>
@endsection


