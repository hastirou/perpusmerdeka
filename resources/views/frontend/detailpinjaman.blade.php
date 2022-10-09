@extends('frontend.layouts.index')
@section('content')

<br/><br/>
<section style="margin:100;">
<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card-header" style="background-color: #3f5369; padding: 0.1% 0.1% 0.1%0.1%">
			<h5 align="center" style="color:white;">Detail Data Pinjaman</h5>
		</div>
		<div class="card-body" style="background-color:white;">
			<br/>
		<div class="form-group">
			@foreach($datapinjaman as $dp)
			<label for="KodePinjaman">Kode Pinjaman :
			</label>
			<input readonly type="text" class="form-control" name="KodePinjaman" value="{{ $dp->KodePinjaman }}">
			@endforeach
		</div>
		<div class="form-group">
			@foreach($datapinjaman as $dp)
			<label for="KodeBuku">Kode Buku :
			</label>
			<input readonly type="text" class="form-control" name="KodePinjaman" value="{{ $dp->KodeBuku }}">
			@endforeach
            <div class="form-group">
                @foreach($datapinjaman as $dp)
                <label for="KodeUser">Kode User :
                </label>
                <input readonly type="text" class="form-control" name="KodeUser" value="{{ $dp->KodeUser }}">
                @endforeach
            </div>
		</div>
        <div class="form-group">
			@foreach($datapinjaman as $dp)
			<label for="NamaLengkap">Nama Lengkap :
			</label>
			<input readonly type="text" class="form-control" name="NamaLengkap" value="{{ $dp->NamaLengkap }}">
			@endforeach
		</div>
        <div class="form-group">
			@foreach($datapinjaman as $dp)
			<label for="NomerTelepon">Nomer Telepon :
			</label>
			<input readonly type="text" class="form-control" name="NomerTelepon" value="{{ $dp->NomerTelepon }}">
			@endforeach
		</div>
        <div class="form-group">
			@foreach($datapinjaman as $dp)
			<label for="AlamatLengkap">Alamat Lengkap :
			</label>
			<input readonly type="text" class="form-control" name="AlamatLengkap" value="{{ $dp->AlamatLengkap }}">
			@endforeach
		</div>
        <div class="form-group">
			@foreach($datapinjaman as $dp)
			<label for="Waktu Pinjam">Waktu Pinjam :
			</label>
			<input readonly type="text" class="form-control" name="WaktuPinjam" value="{{ $dp->WaktuPinjam }}">
			@endforeach
		</div>
        <div class="form-group">
			@foreach($datapinjaman as $dp)
			<label for="WaktuKembalikan">Waktu Kembalikan :
			</label>
			<input readonly type="text" class="form-control" name="WaktuKembalikan" value="{{ $dp->WaktuKembalikan }}">
			@endforeach
		</div>

			<div style="text-align:center;">
                <a href="/datapinjamanuser" type="cancel" class="btn btn-info">Kembali</a>
            </div>

		</div>
		</form>
		</div>
	</div>
</section>
    <br/><br/><br/><br/>

@endsection