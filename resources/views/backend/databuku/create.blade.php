@extends('backend.index')
@section('content')

<br/><br/><br/>

<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card-header" style="background-color: #3f5369; padding: 0.1% 0.1% 0.1%0.1%">
			<h5 align="center" style="color:white;">Tambah Data Buku</h5>
		</div>
		<form action="{{ route('databuku.store')}}" method="POST" enctype="multipart/form-data">
			@csrf
		<div class="card-body" style="background-color:white;">
			<br/>

				<div class="form-group">
						<label for="KodeBuku" >Kode Buku :
						</label>						
                         <input readonly value="{{$newID}}" class="form-control" name="KodeBuku">
                     </div>

                     
                     <div class="form-group">
                         <label for="JudulBuku" >Judul Buku:
                        </label>						
                        <input class="form-control @error('JudulBuku') is-invalid @enderror" name="JudulBuku" value="{{ old('JudulBuku') }}">
                        @error('JudulBuku')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    
                    <div class="form-group">
                       <label for="KodeKategori" >Kategori :
                       </label>						
                        <select name="KodeKategori" class="form-control @error('KodeKategori') is-invalid @enderror">
                        <option value="">Pilih Kategori</option>
                            @foreach($kategori as $kat)
                        <option value="{{$kat->KodeKategori}}">{{$kat->NamaKategori}}</option>
                            @endforeach
                        </select>
                        @error('KodeKategori')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    
                     <div class="form-group">
						<label for="TentangBuku" >Tentang Buku :
						</label>						
                         <input class="form-control @error('TentangBuku') is-invalid @enderror" name="TentangBuku" value="{{ old('TentangBuku') }}">
                         @error('TentangBuku')<div class="invalid-feedback">{{ $message }}</div>@enderror
                     </div>

                     <div class="form-group">
						<label for="Jumlah" >Jumlah :
						</label>						
                         <input class="form-control @error('Jumlah') is-invalid @enderror" name="Jumlah" value="{{ old('Jumlah') }}">
                         @error('Jumlah')<div class="invalid-feedback">{{ $message }}</div>@enderror
                     </div>

                     <div class="form-group" style="text-align:center;">
  						<label for="file">Upload Foto : </label>
 						<input class="form-group" type="file" accept="image/*" onchange="preview_image(event)" name="file" value="{{ old('file') }}">
                        
 						<div class="row mb-4">
                <div class="col-md-4 mx-auto text-center">
                    <br/>
                    <label class="align-item-center" style="font-weight:normal;" for="file">
                        <div style="border:1px solid grey;border-style:dashed" class=" rounded-lg text-center p-3">
                            <img style="object-fit:contain;"
                            id="output_image" class="img-fluid" id="preview" />
                     </div>
                     
                     <br/><br/>
                     <div style="text-align:center;">
                <button type="submit" class="btn btn-success">Simpan</button>&nbsp;&nbsp;
                <a href="/admin/dataproperti" type="cancel" class="btn btn-danger">Batal</a>
            </div></label></div></div></div></div></form></div></div>
            <br/><br/>
@push('scripts')
<script type='text/javascript'>
    function preview_image(event) 
    {
     var reader = new FileReader();
     reader.onload = function()
     {
      var output = document.getElementById('output_image');
      output.src = reader.result;
     }
     reader.readAsDataURL(event.target.files[0]);
    }
    
    function onlyNumberKey(evt) {
          
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }

    $(document).ready(function(){
        $('#JumlahGrs').hide();
        $('select[name="Garasi"]').on('change', function(){

        var valgar = $('#Garasi').val();

        if(valgar == 'Ya') {
            $('#JumlahGrs').show();
            $('#JumlahGarasi').val('0');
        } else {
            $('#JumlahGrs').hide();
            $('#JumlahGarasi').val('0');
        }
        });
    });
    
</script>
@endpush
@endsection