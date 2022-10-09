@extends('backend.index')
@section('content')

<br/><br/><br/><br/><br/><br/><br/>

<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card-header" style="background-color: #3f5369; padding: 0.1% 0.1% 0.1%0.1%">
			<h5 align="center" style="color:white;">Tambah Data Kategori</h5>
		</div>
		<form action="{{ route('masterkategori.store')}}" method="POST">
			@csrf
		<div class="card-body" style="background-color:white;">
			<br/>
				<div class="form-group">
						<label for="KodeKategori" >Kode Kategori :
						</label>						
                         <input readonly value="{{$newID}}" class="form-control" name="KodeKategori">
                     </div>
						<div class="form-group">
						<label for="NamaKategori" >Nama Kategori :
						</label>						
                         <input class="form-control @error('NamaKategori') is-invalid @enderror" name="NamaKategori" value="{{ old('NamaKategori') }}">
                         @error('NamaKategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
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