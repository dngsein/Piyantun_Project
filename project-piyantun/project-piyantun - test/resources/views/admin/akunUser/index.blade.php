@extends('admin.layout')

@section('content')


<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="container">
                <div class="card">
                    <div class="card-header text-dark bg-white">
                        <h3>Tabel Akun Pengguna</h3>
                    </div>
                    <div class="card-body">
                    @include('admin.partials.flash')
                    <a href="{{url('profile-pengguna/pdf')}}" class="btn btn-warning btn-md" >Export PDF</a>
                    <div class="table-responsive">
                    <table class="table">
                    <thead class="table-primary">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Dibuat</th>
                            <th>Role</th>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            @forelse ($users as $user)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->tempat_lahir }}</td>
                                    <td>{{ $user->tanggal_lahir }}</td>
                                    <td>{{ $user->alamat }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->role }}</td>          
                    
                                </tr>
                            @empty
                            <tr>
                                <td colspan="5">No Record Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$users->links()}}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection


<!-- Tombol Remove -->
<!-- {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
{!! Form::close() !!} -->