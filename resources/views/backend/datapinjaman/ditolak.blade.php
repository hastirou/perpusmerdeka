@extends('backend.index')
@section('content')

<br/><br/>
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" style="background-color: #3f5369; height:60px;">
				<h3 style="color:white;">Data Peminjaman Ditolak</h3></div>

		</div>
	</div>
</div>

<div class="col-md-12">
	<div class="card">
		<div class="card-header" style="background-color: #3f5369; padding: 0.1% 0.1% 0.1% 0.1%;">
			<h5 align="center" style="color:white;">Tabel Data Pinjaman (Ditolak)</h5>
		</div>
		<div class="card-title" style="background-color:white;">
		</div>
		<div class="card-body">
			<table class="table table-bordered table-hover" id="table1" name="table1" style="text-align:center;">
				<thead style="background-color: #262626; color:white;">
					<tr>
						<th>Kode Pinjaman</th>
						<th>Kode Buku</th>
                        <th>Kode User</th>
                        <th>Nama Lengkap</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>	
					@foreach ($datapinjaman as $dp)
					<tr>
						<td>{{ $dp->KodePinjaman}}</td>
						<td>{{ $dp->KodeBuku}}</td>
                        <td>{{ $dp->KodeUser }}</td>
                        <td>{{ $dp->NamaLengkap }}</td>
						<td>
							<a href="{{ url('/admin/datapinjaman/detail/'.$dp->KodePinjaman)}}" class="btn btn-info">Detail</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<br/><br/>
@push('scripts')
<script>
        $(document).ready(function() {

    $('#table1').DataTable({
        "order": [],
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bInfo": true,
            "bAutoWidth": true 
});


});
</script>
@endpush
@endsection