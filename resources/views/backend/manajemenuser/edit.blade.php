@extends('backend.index')
@section('content')

<br/><br/><br/>
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card-header" style="background-color: #3f5369; padding: 0.1% 0.1% 0.1%0.1%">
			@foreach($user as $usr)
			<h5 align="center" style="color:white;">Edit Data User {{$usr->id}}</h5>
			@endforeach
		</div>
		<form action="{{ route('manajemenuser.update')}}" method="POST">
		@csrf
		<div class="card-body" style="background-color:white;">
			<br/>
			@foreach($user as $usr)
		<div class="form-group">
			<label for="id">User Id :
			</label>
			<input readonly type="text" class="form-control" name="id" value="{{$usr->id}}">
		</div>
		<div class="form-group">
			<label for="name">Nama :
			</label>
			<input type="text" class="form-control" name="name" value="{{$usr->name}}">
		</div>
		<div class="form-group">
			<label for="email">E-Mail :
			</label>
			<input type="text" class="form-control" name="email" value="{{$usr->email}}">
		</div>
		<div class="form-group">
			<label for="roleId">Role Id :
			</label>
			<input type="text" class="form-control" name="roleId" value="{{$usr->roleId}}">
		</div>
			@endforeach

			<div style="text-align:center;">
                <button type="submit" class="btn btn-success">Simpan</button>&nbsp;&nbsp;
                <a href="/admin/manajemenuser" type="cancel" class="btn btn-danger">Batal</a>
            </div>

		</div>
		</form>
		</div>
	</div>

<br/><br/><br/>
@endsection