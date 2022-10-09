@extends('backend.index')
@section('content')

<br/><br/><br/>
<div class="row justify-content-center">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" style="background-color: #3f5369; height:60px;">
				<h3 style="color:white;">Manajemen User</h3></div>

			<div class="card-title" style="background-color:white;">
				<div style="padding-top:1%; padding-left:1%; padding-bottom:1%; padding-right:1%;">
					@if(session()->get('created'))
                    <div class="alert alert-success alert-dismissible fade-show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session()->get('created') }}
                    </div>

                    @elseif(session()->get('edited'))
                    <div class="alert alert-info alert-dismissible fade-show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session()->get('edited') }}
                    </div>

                    @elseif(session()->get('deleted'))
                    <div class="alert alert-danger alert-dismissible fade-show">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session()->get('deleted') }}
                    </div>
                    @endif 
					<a href="{{ url('/admin/manajemenuser/create')}}" class="btn btn-success">
						<i class="fa fa-plus" aria-hidden="true"></i>
						Tambah Data
					</a>
				</div>
			</div>
		</div>
	</div>

			<div class="col-md-12" >
			<div class="card">
			<div class="card-body">
			<table class="table table-bordered table-hover" id="table1" name="table1" style="text-align:center;">
				<thead style="background-color: #262626; color:white;">
					<tr>
						<th>User Id</th>
						<th>Nama</th>
						<th>E-mail</th>
						<th>Role Id</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>	

						@foreach($user as $usr)
						<tr>
							<td>{{$usr->id}}</td>
							<td>{{$usr->name}}</td>
							<td>{{$usr->email}}</td>
							<td>{{$usr->roleId}}</td>
						<td>
						<a href="{{ url('/admin/manajemenuser/edit/'.$usr->id)}}" class="btn btn-info">Edit</a>
						&nbsp;
						<a href="{{ url('/admin/manajemenuser/hapus/'.$usr->id)}}" class="btn btn-danger">Hapus</a>
						</td>
					</tr>
						@endforeach

				</tbody>
			</table>
					</div>
				</div>
			</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br/><br/><br/>

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