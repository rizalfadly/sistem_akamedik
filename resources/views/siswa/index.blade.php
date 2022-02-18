@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{ url('/siswa/add')}}" class="btn btn-sm btn-flat btn-primary btn-primary"><i class="fa fa-plus"></i> Tambah Data siswa</a>
                </p>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-hover myTable">
                        <thead>
                            <th> Action </th>
                            <th>#</th>
                            <th>Picture</th>
                            <th>Nis</th>
                            <th>Nama</th>
                            <th>Nomer handphone</th>
                            <th>Email</th>
                            
                            <th>Alamat</th>
                            <th>Status</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $e=>$dt)
                                <tr>
                                    <td>
                                            <a href="{{url('siswa/'.$dt->id)}}" class="btn btn-flat btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                                            <button href="{{url('/siswa/'.$dt->id)}}" class="btn btn-flat btn-xs btn-danger btn-hapus"><i class="fa fa-trash"></i></button>
                                    </td>
                                    <td>{{ $e+1 }}</td>
                                    <td>
                                        <img src="{{asset($dt->photo)}}" style="width:100px;">
                                    </td>
                                    <td>{{$dt->nis}}</td>
                                    <td>{{$dt->nama}}</td>
                                    <td>{{$dt->no_hp}}</td>
                                    <td>{{$dt->email}}</td>
                                    <td>{{$dt->alamat}}</td>
                                    @if($dt->status ==1)
                                        <td>
                                            <a href=" {{url('/siswa/status-update/'.$dt->id) }}" class="btn btn-flat btn-xs btn-success">{{ $dt->s_status->status }}</a>
                                        </td>
                                    @else
                                        <td>
                                        <a href=" {{url('/siswa/status-update/'.$dt->id) }}" class="btn btn-flat btn-xs btn-warning">{{ $dt->s_status->status }}</a>
                                        </td>
                                    @endif
                                </tr> 
                            @endforeach    
                        </tbody>
                    </table>
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