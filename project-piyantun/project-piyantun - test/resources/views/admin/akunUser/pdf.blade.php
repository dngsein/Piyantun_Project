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
            @forelse ($users as $users)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->email }}</td>
                    <td>{{ $users->tempat_lahir }}</td>
                    <td>{{ $users->tanggal_lahir }}</td>
                    <td>{{ $users->alamat }}</td>
                    <td>{{ $users->created_at }}</td>
                    <td>{{ $users->role }}</td>          

                </tr>
            @empty
            <tr>
                <td colspan="5">No Record Found</td>
            </tr>
            @endforelse
        </tbody>
</table>