@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{ route('mapel.index')}}" class="btn btn-sm btn-flat btn-primary btn-primary"><i class="fa fa-backward"></i>  Kembali </a>
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
            
               <form role="form" method="post" action="{{route('mapel.update', $mp->mapel_id)}}">
                {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Mapel</label>
                  <input type="text" name="nama_mapel" class="form-control" id="exampleInputEmail1" placeholder="Nama Mapel" value="{{ $mp->nama_mapel }}">
                </div>
                </div>
              </div>
              <!-- /.box-body -->
 
              <div class="box-footer">
                <button type="submit" class="btn btn-outline-primary">Update</button>
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