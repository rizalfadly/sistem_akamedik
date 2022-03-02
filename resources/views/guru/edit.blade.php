@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{ route('guru.index')}}" class="btn btn-sm btn-flat btn-primary btn-primary"><i class="fa fa-backward"></i>  Kembali</a>
                </p>
            </div>
            <div class="box-body">
                    <center>
                        <img src="{{ asset($gr->photo) }}" style="width:200px;">
                    </center>
                <form action="{{route('guru.update', $gr->guru_id)}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
               <div class="row">
                <div class="col-md-6">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Nama Guru</label>
                          <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama Guru"value="{{ $gr->nama }}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Tempat Lahir</label>
                          <input type="text" name="tempat_lahir" class="form-control" id="exampleInputPassword1" placeholder="Tempat Lahir" value="{{ $gr->tempat_lahir }}">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Tanggal Lahir</label>
                          <input type="text" name="tanggal_lahir" class="form-control datepicker" autocomplete="off" id="exampleInputPassword1" placeholder="Tanggal Lahir" value="{{ date('Y-m-d', strtotime($gr->tanggal_lahir)) }}" >
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Nomer Handphone</label>
                          <input type="text" name="no_hp" class="form-control" id="exampleInputPassword1" placeholder="Tempat Lahir" value="{{ $gr->no_hp }}" >
                        </div>
                      </div>
 <!--                    </form> -->
                </div>
                   <div class="col-md-6">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Email</label>
                              <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ $gr->email }}">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputPassword1">Tanggal masuk kerja</label>
                              <input type="text" name="awal_kerja" class="form-control datepicker" autocomplete="off" id="exampleInputPassword1" placeholder="Tanggal masuk kerja" value="{{ date('Y-m-d', strtotime($gr->awal_kerja)) }}">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail1">NIP Guru</label>
                              <input type="text" name="nip" class="form-control" id="exampleInputEmail1" placeholder="NIP Guru" value="{{ $gr->nip }}">
                            </div>
                              <div class="form-group">
                              <label for="exampleInputEmail1">Status</label>
                                <select class="form-control select2" name="status">
                                    <option selected ="" disabled="">pilih status</option>
                                    @foreach($status as $st)
                                        <option value="{{$st->status_id}}" {{ ($gr->status == $st->status_id) ? 'selected' : '' }}> {{$st->status}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputFile">Photo Guru</label>
                              <input type="file" name="photo" id="exampleInputFile">
                            </div>
                          </div>
                                <!-- </form> -->
                            </div>
                       </div>
                       <div class="row">
                            <div class="col-md-12">
                        <button type="submit" class="btn btn-flat btn-lg btn-block btn-primary">Update</button>
                    </div>
                </form>
               </div>
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