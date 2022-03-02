@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
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

               <form role="form" method="post" action="{{route('jadwal.create')}}">
                @csrf

              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Pilih hari</label>
                  <select class="form-control select2" name="hari">
                  <option selected="" disabled="" > Pilih hari</option>
                  @foreach($hari as $hr)
                    <option value="{{ $hr->hari_id }}">{{ $hr->nama_hari }}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Pilih Kelas</label>
                  <select class="form-control select2" name="kelas">
                  <option selected="" disabled="" > Pilih kelas</option>
                  @foreach($kelas as $kl)
                    <option value="{{ $kl->kelas_id }}">{{ $kl->nama_kelas }}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Pilih Mapel</label>
                  <select class="form-control select2" name="mapel">
                  <option selected="" disabled="" > Pilih mapel</option>
                  @foreach($mapel as $mp)
                    <option value="{{ $mp->mapel_id }}">{{ $mp->nama_mapel }}</option>
                  @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Jam Dari</label>
                  <input type="text" name="jam_dari" class="form-control">
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Jam Sampai</label>
                  <input type="text" name="jam_sampai" class="form-control">
                </div>

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
