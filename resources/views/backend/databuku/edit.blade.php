@extends('backend.index')
@section('content')

<br/><br/><br/>

<div class="row justify-content-center">
	<div class="col-md-8">
		<div class="card-header" style="background-color: #3f5369; padding: 0.1% 0.1% 0.1%0.1%">

		@foreach($databuku as $dat)
                     <h3 style="color:white;" align="center" class="unselect">Edit Data Buku {{$dat->KodeBuku}}</h3>
              @endforeach

		</div>

		<form action="{{ route('databuku.update')}}" method="POST" enctype="multipart/form-data">
			@csrf

		<div class="card-body" style="background-color:white;">
			<br/>
				<div class="form-group">
						@foreach($databuku as $dat)				
						<label for="KodeBuku" >Kode Buku :
						</label>
                         <input readonly type="text" class="form-control" name="KodeBuku" value="{{ $dat->KodeBuku }}">
                         @endforeach
                     </div>

					<div class="form-group">	
						<label for="JudulBuku" >Judul Buku :
						</label>						
                         <input type="text" class="form-control" name="JudulBuku" value="{{$dat->JudulBuku}}">
                     </div>

                     <div class="form-group">	
						<label for="TentangBuku" >Tentang Buku :
						</label>						
                         <input type="text" class="form-control" name="TentangBuku" value="{{$dat->TentangBuku}}">
                     </div>

                     <div class="form-group">                
						<label for="Jumlah" >Jumlah Buku :
						</label>						
                         <input type="text" class="form-control" name="Jumlah" value="{{$dat->Jumlah}}">
                    </div>

                    <div class="form-group">
						<label for="KodeKategori" >Kategori Buku :
						</label>						
                         <select class="form-control" name="KodeKategori">
                         	@foreach($databuku as $dat)
                         	<option value="{{$dat->KodeKategori}}">{{ $dat->NamaKategori }}
                            </option>
                         	@endforeach
                         	<option value="">Pilih Kategori</option>
                            @foreach($kategori as $kat)
                            <option value="{{$kat->KodeKategori}}">{{ $kat->NamaKategori }}
                            </option>
                            @endforeach
                         </select>
                     </div>
                     

                     <div class="form-group" style="text-align:center;">
  				<label for="file">Upload Foto : </label>
 				<input type="file" accept="image/*" onchange="preview_image(event)" name="file">

 				<div class="row mb-4">
                <div class="col-md-4 mx-auto text-center">
                    <br/>
                    <label class="align-item-center" style="font-weight:normal;" for="file">
                        <div style="border:1px solid grey;border-style:dashed" class=" rounded-lg text-center p-3">
                            <img style="object-fit:contain;"
                            src="{{ asset('/data_buku/'.$dat->File)}}" id="output_image" class="img-fluid" id="preview"  />
                     </div>
                     </label>
                     
                     <br/><br/>
                     <div style="text-align:center;">
                <button type="submit" class="btn btn-success">Simpan</button>&nbsp;&nbsp;
                <a href="/admin/databuku" type="cancel" class="btn btn-danger">Batal</a>
            </div>
		</div>
		</form>
		<br/><br/><br/>
	</div>
</div>
</div></form></div></div></br>
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