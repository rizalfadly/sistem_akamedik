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
                <center>
                    <img src="{{asset($dt->photo)}}" style="width:100px;">
                </center>

            <form role="form" method="post" action="{{ url('/siswa/'.$dt->id)}}" enctype="multipart/form-data">
                @csrf
                {{method_field('PUT') }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">NIS</label>
                  <input type="text" name="nis" class="form-control" id="exampleInputEmail1" placeholder="Masukan NIS" value="{{ $dt->nis }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">NAMA</label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Masukan nama" value="{{ $dt->nama }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nomer HP</label>
                  <input type="text" name="no_hp" class="form-control" id="exampleInputEmail1" placeholder="Masukan Nomer Hp"value="{{ $dt->no_hp }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="text" name="email" class="form-control" id="exampleInputEmail1" placeholder="Masukan email.."value="{{ $dt->email }}">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">alamat</label>
                  <textarea class="form-control" name="alamat" rows="5">{{ $dt->alamat }}</textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Status</label>
                    <select class="form-control select2" name="status">
                        <option selected ="" disabled="">pilih status</option>
                        @foreach($status as $st)
                            <option value="{{$st->status_id}}" {{ ($dt->status == $st->status_id) ? 'selected' : '' }}> {{$st->status}}</option>
                        @endforeach
                    </select>
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
                <button type="submit" class="btn btn-primary">update</button>
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