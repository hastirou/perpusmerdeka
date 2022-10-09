@extends('frontend.layouts.index')
@section('content')

<style>
    input[type='number'] {
    -moz-appearance:textfield;
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
}
</style>
<form action="{{ route('pinjambuku.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="card" style="margin: 50px 100px; padding:20px;">
    <form>
          <div class="form-group">
            <label for="KodePinjaman" >Kode Pinjaman:
           </label>						
           <input readonly class="form-control @error('KodePinjaman') is-invalid @enderror" name="KodePinjaman" value={{$newID}}>
           @error('KodePinjaman')<div class="invalid-feedback">{{ $message }}</div>@enderror
       </div>

          @foreach ($databuku as $dat)
          <div class="form-group">
            <label for="KodeBuku" >Kode Buku:
           </label>						
           <input readonly class="form-control @error('KodeBuku') is-invalid @enderror" name="KodeBuku" value="{{ $dat->KodeBuku }}">
           @error('KodeBuku')<div class="invalid-feedback">{{ $message }}</div>@enderror
       </div>
          @endforeach

        <div class="form-group">
            <label for="NamaLengkap" >Nama Lengkap:
           </label>						
           <input class="form-control @error('NamaLengkap') is-invalid @enderror" name="NamaLengkap" value="{{ old('NamaLengkap') }}">
           @error('NamaLengkap')<div class="invalid-feedback">{{ $message }}</div>@enderror
       </div>

        <div class="form-group">
            <label for="NomerTelepon" >Nomer Telepon:
           </label>						
           <input type="number" onkeypress="validate(event)" class="form-control @error('NomerTelepon') is-invalid @enderror" name="NomerTelepon" value="{{ old('NomerTelepon') }}">
           @error('NomerTelepon')<div class="invalid-feedback">{{ $message }}</div>@enderror
       </div>

        <div class="form-group">
            <label for="AlamatLengkap" >AlamatLengkap:
           </label>						
           <input class="form-control @error('AlamatLengkap') is-invalid @enderror" name="AlamatLengkap" value="{{ old('AlamatLengkap') }}">
           @error('AlamatLengkap')<div class="invalid-feedback">{{ $message }}</div>@enderror
       </div>

         <div class="form-group">
            <label for="TanggalPinjam" >Tanggal Pinjam:
           </label>						
           <div class="input-group date" id="inputDate1">
            <input type="text" required class="form-control" name="TanggalPinjam" id="inputDate1">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
       </div>

         <div class="form-group">
            <label for="JamPinjam" >Jam Pinjam:
           </label>						
           <div class="input-group date" id="inputTime1">
            <input type="text" required class="form-control" name="JamPinjam" id="inputTime1">
            <span class="input-group-addon">
                <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
       </div>

         <div class="form-group">
            <label for="TanggalKembalikan" >Tanggal Kembalikan :
            </label>                        
             <div class="input-group date" id="inputDate2">
                 <input type="text" required class="form-control" name="TanggalKembalikan" id="inputDate2">
                 <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                 </span>
             </div>
         </div>

        <div class="form-group">
            <label for="JamKembalikan">Jam Kembalikan :
            </label>                        
             <div class="input-group date" id="inputTime2">
                 <input type="text" required class="form-control" name="JamKembalikan" id="inputTime2">
                 <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                 </span>
             </div>
         </div>
         <br/>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
</div>

@push('scripts')
<script>

$('#inputDate1').datetimepicker({
        defaultDate: new Date(),
        format: 'YYYY-MM-DD'
    });
    $('#inputTime1').datetimepicker({
        defaultDate: new Date(),
        format: 'HH:00:00'
    });
    $('#inputDate2').datetimepicker({
        defaultDate: new Date(),
        format: 'YYYY-MM-DD'
    });
    $('#inputTime2').datetimepicker({
        defaultDate: new Date(),
        format: 'HH:00:00'
    });

    function validate(evt) {
  var theEvent = evt || window.event;

      // Handle paste
      if (theEvent.type === 'paste') {
          key = event.clipboardData.getData('text/plain');
      } else {
      // Handle key press
          var key = theEvent.keyCode || theEvent.which;
          key = String.fromCharCode(key);
      }
      var regex = /[0-9]|\./;
      if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
      }
}
</script>
@endpush
@endsection