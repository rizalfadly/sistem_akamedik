@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                        <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                        
                        <a href="{{route('kelas.add')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah kelas </a>
                 </p>
                    </div>
                        <div class="box-body">
                    
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                    
                                    <table class="table table-hover myTable">
                                    <thead>
                                        <tr>
                                            <th> Action </th>
                                            <th> No </th>
                                            <th> Nama kelas </th>
                                            <th> Create At </th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        @foreach ($kelas as $e=>$kl)
                                        <tr>
                                            <td>
                                                    <p>
                                                        <a href="{{route('kelas.edit',$kl->kelas_id)}}" class="btn btn-flat btn-xs btn-warning"><i class="far fa-edit" aria-hidden="true"></i></a>

                                                        <a href="{{route('kelas.delete', $kl->kelas_id)}}" class="btn btn-flat btn-xs btn-danger btn-hapus"><i class="fa fa-trash"></i></a>

                                                        <a href="{{route('kelas.detail',$kl->kelas_id)}}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                                                    </p>
                                                </td>
                                           <td>{{ $e+1 }} </td>
                                            <td>{{ $kl->nama_kelas }} </td>
                                            <td> {{date ('d M Y',strtotime($kl->created_at))}} </td>
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