@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    
                    <a href="{{route('guru.add')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Guru </a>

                    <a href="{{route('guru.index')}}" class="btn btn-sm btn-flat btn-info"><i class="fa fa-book"></i> Data Semua Guru</a>

                    <a href="{{route('guru.aktif')}}" class="btn btn-sm btn-flat btn-success"><i class="fas fa-book-reader"></i> Guru Aktif</a>

                    <a href="{{route('guru.nonaktif')}}" class="btn btn-sm btn-flat btn-danger"><i class="fa fa-times"></i> Guru Non Aktif</a>
                </p>
            </div>
            <div class="box-body">
               <div class="table-responsive">
                <table class="table table-hover myTable">
                    <thead>
                        <tr>
                            <th>Action</th>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>tanggal Lahir</th>
                            <th>Nomer Hp</th>
                            <th>Email</th>
                            <th>Awal Kerja</th>
                            <th>NIP</th>
                            <th>Status</th>
                            <th>Create At</th>    
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($guru as $e=>$gr)
                        <tr>
                            <td>
                                <p>
                                    <a href="{{route('guru.edit', $gr->guru_id)}}" class="btn btn-flat btn-xs btn-warning"><i class="far fa-edit" aria-hidden="true"></i></a>
                                    <a href="{{route('guru.delete', $gr->guru_id)}}" class="btn btn-flat btn-xs btn-danger btn-hapus"><i class="fa fa-trash"></i></a>
                                </p>
                            </td>
                            <td> {{ $e+1 }}</td>
                            <td> {{ $gr->nama }}</td>
                            <td> {{ $gr->tempat_lahir }}</td>
                            <td> {{ date('d M Y', strtotime($gr->tanggal_lahir)) }}</td>
                            <td> {{ $gr->no_hp }} </td>
                            <td> {{ $gr->email }} </td>
                            <td> {{ date('d M Y', strtotime($gr->awal_kerja)) }} </td>
                            <td> {{ $gr->nip }} </td>
                            @if($gr->status ==1)
                                        <td>
                                            <a href=" {{route('guru.status',$gr->guru_id ) }}" class="btn btn-flat btn-xs btn-success">{{ $gr->s_status->status }}</a>
                                        </td>
                                    @else
                                        <td>
                                        <a href=" {{route('guru.status',$gr->guru_id ) }}" class="btn btn-flat btn-xs btn-warning">{{ $gr->s_status->status }}</a>
                                        </td>
                                    @endif
                            <td> {{ date('d M Y'.strtotime($gr->create_at)) }} </td> 
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