@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{ route('kelas.index')}}" class="btn btn-sm btn-flat btn-primary btn-primary"><i class="fa fa-backward"></i>  Kembali</a>
                </p>
            </div>
            <div class="box-body">
               <table class="table">
               <tbody>
                   <tr>
                       <th> Nama Kelas </th>
                       <th> : </th>
                       <th>{{ $kl->nama_kelas }}</th>

                       <th> Create At </th>
                       <th> : </th>
                       <th>{{date ('d M Y',strtotime($kl->created_at))}}</th>

                       <th> Total Kelas </th>
                       <th> : </th>
                       <th>{{ $total_siswa }} </th>
                   </tr>
               </tbody>
               </table>
               <div>
                   <div class="row">
                    <div class="col-md-6">
                        
                        <form action="{{route('kelas.detailkelas', $kl->kelas_id)}}" method="post">
                            @csrf
                            <div>
                                <table class="table">
                                <tbody>
                                    <tr>
                                        <th>
                                             <select class="form-control select2" name="siswa">
                                                    <option selected="" disabled=""> Pilih siswa </option>
                                                        @foreach($siswa as $sw)
                                                    <option value=" {{ $sw->id }}"> {{$sw->nama }}</option>
                                                        @endforeach
                                                    
                                                </select>
                                        </th>
                                        <th>
                                            <button type="submit" class="btn btn-primary">Tambah Siswa</button>
                                        </th>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            
                        </form>
                    </div>
                    <div class="col-md-6">
                        <table class="table">
                            <thead>
                            <tr>
                                <th> # </th>
                                <th> NIS </th>
                                <th> Nama </th>
                                <th> delete </th>

                            </tr>
                            </thead>
                        <tbody>
                            @foreach($kl->siswas_r as $e=>$sw)
                            <tr>
                                <td> {{ $e+1 }} </td>
                                <td> {{ $sw->siswas_r->nis }}</td>
                                <td> {{ $sw->siswas_r->nama }}</td>
                                <td>
                                    <button href="{{url('detail_kelas_delete_siswa/'.$sw->kelas.'/' .$sw->siswa) }}" class="btn btn-flat btn-xs btn-danger btn-hapus"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                        
                    </div>
                       
                   </div>
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