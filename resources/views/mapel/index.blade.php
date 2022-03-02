@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                        <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                        
                        <a href="{{route('mapel.add')}}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-plus"></i> Tambah Mapel </a>
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
                                            <th> Nama Mata Pelajaran </th>
                                            <th> Create At </th>
                                        </tr>
                                    </thead> 
                                    <tbody>
                                        @foreach ($mapel as $e=>$mp)
                                        <tr>
                                            <td>
                                                    <p>
                                                        <a href="{{route('mapel.edit',$mp->mapel_id)}}" class="btn btn-flat btn-xs btn-warning"><i class="far fa-edit" aria-hidden="true"></i></a>

                                                        <a href="{{route('kelas.delete', $mp->mapel_id)}}" class="btn btn-flat btn-xs btn-danger btn-hapus"><i class="fa fa-trash"></i></a>
                                                        
                                                    </p>
                                                </td>
                                           <td>{{ $e+1 }} </td>
                                            <td>{{ $mp->nama_mapel }} </td>
                                            <td> {{date ('d M Y',strtotime($mp->created_at))}} </td>
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