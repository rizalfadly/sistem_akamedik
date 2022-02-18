@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{ url('/siswa')}}" class="btn btn-sm btn-flat btn-primary btn-primary"><i class="fa fa-backward"></i>  Kembali</a>
                </p>
            </div>
            <div class="box-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                </div>
            @endif

            <form role="form" method="post" action="{{ url('/siswa/add')}}" enctype="multipart/form-data">
                @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">NIS</label>
                  <input type="text" name="nis" class="form-control" id="exampleInputEmail1" placeholder="Masukan NIS" value="{{ old('nis') }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">NAMA</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukan nama" value="{{ old('nama') }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nomer HP</label>
                  <input type="text" name="no_hp" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomer Hp"value="{{ old('no_hp') }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Masukan email.."value="{{ old('email') }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">alamat</label>
                  <textarea class="form-control" name="alamat" rows="5">{{ old('alamat') }}</textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Photo siswa</label>
                  <input type="file" name="photo" id="exampleInputFile">
                  <!-- <p class="help-block">Example block-level help text here.</p> -->
                </div>
                <!-- <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div> -->
              </div>
              <!-- /.box-body -->
 
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            </div>
        </div>
    </div>
</div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection