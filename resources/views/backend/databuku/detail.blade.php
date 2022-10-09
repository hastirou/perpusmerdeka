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
                         <input readonly type="text" class="form-control" name="JudulBuku" value="{{$dat->JudulBuku}}">
                     </div>

                     <div class="form-group">	
						<label for="TentangBuku" >Tentang Buku :
						</label>						
                         <input readonly type="text" class="form-control" name="TentangBuku" value="{{$dat->TentangBuku}}">
                     </div>

                     <div class="form-group">                
						<label for="Jumlah" >Jumlah Buku :
						</label>						
                         <input readonly type="text" class="form-control" name="Jumlah" value="{{$dat->Jumlah}}">
                    </div>

                    <div class="form-group">
						<label for="KodeKategori" >Kategori Buku :
						</label>						
                         <input readonly class="form-control" name="KodeKategori" value="{{ $dat->NamaKategori }}">                       	
                    </input>
                     </div>
                     

                     <div class="form-group" style="text-align:center;">
  				<label for="file">Foto : </label>

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
                <a href="/admin/databuku" type="cancel" class="btn btn-info">Kembali</a>
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
    
</script>
@endpush
@endsection