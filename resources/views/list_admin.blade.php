@extends('../layout/' . $layout)

@section('subhead')
<title>Dinas Sosial - List TKSK</title>
@endsection

@section('subcontent')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">List TKSK</h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href="{{ route('admin.register') }}" class="btn btn-primary shadow-md mr-2">New Admin</a>
    </div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box p-5 mt-5">
    <div class="overflow-x-auto scrollbar-hidden">
        <table class="table table-striped table-bordered json" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Admin</th>
                    <th>SKPD</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($get_user as $jt)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $jt->username }}</td>
                    <td>{{$jt->getopd->nama_opd}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- END: HTML Table Data -->
@endsection