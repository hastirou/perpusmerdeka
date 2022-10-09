@extends('backend.index')
@section('content')

<br/><br/><br/>

<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card-header" style="background-color: #3f5369; padding: 0.1% 0.1% 0.1%0.1%">
			<h5 align="center" style="color:white;">Tambah User</h5>
		</div>
		<form action="{{ route('manajemenuser.store') }}" method="POST">
            @csrf

            <div class="card-body" style="background-color:white;">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
			<br/>
            <div class="form-group">
                <label for="name" >Nama :
                </label>						
                 <input class="form-control" name="name" required>                           
             </div>
             <div class="form-group">
                <label for="email" >E-Mail :
                </label>						
                 <input class="form-control" name="email" required>                           
             </div>
             <div class="form-group">
                <label for="password" >Password :
                </label>						
                 <input class="form-control" name="password" type="password" required>
            </div>            
            <div class="form-group">
                <label for="password_confirmation" >Konfirmasi Password :
                </label>						
                 <input class="form-control" name="password_confirmation" type="password" id="password-confirm" required autocomplete="new-password">
            </div>
                     <br/>
                     <div style="text-align:center;">
                <button type="submit" class="btn btn-success">Simpan</button>&nbsp;&nbsp;
                <a href="/admin/master/kategori" type="cancel" class="btn btn-danger">Batal</a>
            </div>
		</div>
		</form>
	</div>
</div>

@endsection


