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
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                @foreach($hari as $hr)
                                <th>{{ $hr->nama_hari }} </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($hari as $hr)
                                <td>
                                @foreach($hr->jadwals as $jd)
                                <p>
                                  {{date('H:i',strtotime($jd->jam_dari)) }} - {{date('H:i',strtotime($jd->jam_sampai)) }} {{$jd->kelas_r->nama_kelas}} - {{ $jd->mapel_r->nama_mapel}}
                                </p>
                                @endforeach
                                </td>
                                @endforeach
                            </tr>
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
