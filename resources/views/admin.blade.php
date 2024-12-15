@extends('template.template')
{{-- @extends('template.nav') --}}



{{-- MENU ADMIN NO 3A --}}
@section('content')
<div class="container-fluid p-3">
    <div class="container-fluid border p-2">
        <h1 class="mb-5">Input User Baru</h1>
        <div class="container-fluid d-flex flex-row gap-2 p-0">
            <form method="POST"  action={{ route('admin.create') }}>
                @csrf
                {{-- Create Data --}}
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="username" class="form-label">Username</label>
                        <div class="input-group">
                            <input type="text" name="username" class="form-control" id="username" aria-describedby="basic-addon3 basic-addon4" required>
                        </div>
                    </div>
            
                    <div class="col-md-6">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" id="password" aria-describedby="basic-addon3 basic-addon4" required>
                        </div>
                    </div>
                </div>
            
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nama_admin" class="form-label">Nama Admin</label>
                        <div class="input-group">
                            <input type="text" name="nama_admin" class="form-control" id="nama_admin" aria-describedby="basic-addon3 basic-addon4" required>
                        </div>
                    </div>
            
                    <div class="col-md-6">
                        <label for="status_aktif" class="form-label">Status Aktif</label>
                        <select name="status_aktif" class="form-control" id="status_aktif">
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
            
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table mt-3">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Nama Admin</th>
                        <th scope="col">Status Aktif</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allUser as $user)
                    <tr>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->nama_admin }}</td>
                        <td>{{ $user->status_aktif == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                        <td>
                            <div class="d-flex flex-row gap-2">
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" 
                                    data-id="{{ $user->id }}" data-username="{{ $user->username }}" 
                                    data-nama_admin="{{ $user->nama_admin }}" data-status_aktif="{{ $user->status_aktif }}">
                                    Edit
                                </button>
                                <form method="POST"action={{ route('admin.delete') }}>
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $user->id }}">
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
</div>

{{-- modal for edit --}}
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action={{ route('admin.update') }}>
          @csrf
          {{-- @method('PUT') --}}
          <input type="hidden" name="id" id="edit-id">
          
          <div class="mb-3">
            <label for="edit-username" class="form-label">Username</label>
            <input type="text" class="form-control" id="edit-username" name="username" >
          </div>
          
          <div class="mb-3">
            <label for="edit-password" class="form-label">Password (leave empty if no changes)</label>
            <input type="password" class="form-control" id="edit-password" name="password" >
          </div>
          
          <div class="mb-3">
            <label for="edit-nama_admin" class="form-label">Nama Admin</label>
            <input type="text" class="form-control" id="edit-nama_admin" name="nama_admin" >
          </div>
          
          <div class="mb-3">
            <label for="edit-status_aktif" class="form-label">Status Aktif</label>
            <select name="status_aktif" class="form-control" id="edit-status_aktif" >
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
            </select>
          </div>
          
          <button type="submit" class="btn btn-dark">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script')
    <script>
        var editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var userId = button.getAttribute('data-id');
            var username = button.getAttribute('data-username');
            var namaAdmin = button.getAttribute('data-nama_admin');
            var statusAktif = button.getAttribute('data-status_aktif');

            // Set the values in the modal inputs
            document.getElementById('edit-id').value = userId;
            document.getElementById('edit-username').value = username;
            document.getElementById('edit-nama_admin').value = namaAdmin;
            document.getElementById('edit-status_aktif').value = statusAktif;
        });
    </script>
@endsection
