@extends('template.template')

@section('content')
<div class="container-fluid p-3">
    <div class="container-fluid border p-2">
        <h1 class="mb-5">Entry Log </h1>
        <form action={{ route('resi') }} class="mb-5"> 
            <button type="submit" class="btn btn-primary">Back</button>
        </form>
        <div class="container-fluid d-flex flex-row gap-2 p-0">
            <form method="POST" action={{ route('resi.createLog') }}>
                @csrf
                <div class="mb-3">
                    <input type="hidden" name="resi_id" value="{{ $id_resii }}">
              
              
                    {{-- <label for="basic-url" class="form-label">Tanggal Resi</label>
                    <div class="input-group">
                        <input type="date" name="tanggal" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4">
                    </div> --}}
                    <label for="basic-url" class="form-label">Kota</label>
                    <div class="input-group">
                        <input type="text" name="kota" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4">
                    </div>
                    <label for="basic-url" class="form-label">Keterangan</label>
                    <div class="input-group">
                        <input type="text" name="keterangan" class="form-control" id="basic-url" aria-describedby="basic-addon3 basic-addon4">
                    </div>
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
        <table class="table mt-3">
            <thead class="table-dark">
                <tr>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Kota</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($log as $logg)
                <tr>
                    <td>{{ $logg->TransaksiResiRelation->tanggal}}</td>
                    <td>{{ $logg->kota}}</td>
                    <td>{{ $logg->keterangan}}</td>
                    <td>
                        <div class="d-flex flex-row gap-2">
                            <form method="POST" action={{ route('resi.deleteLog') }}> 
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{ $logg->id }}">
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