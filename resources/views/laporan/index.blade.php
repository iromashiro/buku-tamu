@extends('../layout/' . $layout)

@section('subhead')
<title>Dinas Sosial Kab. Muara Enim - Data PMKS</title>
@endsection

@section('subcontent')

<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Data PMKS <br> Tanggal {{ \Carbon\Carbon::now() }}
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <a href="{{ route('ppks.create') }}" class="btn btn-primary shadow-md mr-2">Tambah Data PMKS</a>
        <div class="dropdown ml-auto sm:ml-0">
        </div>
    </div>
</div>
<div class="intro-y box p-5 mt-5">
    <div class="overflow-x-auto scrollbar-hidden">
        <table id="myTable" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Kecamatan</th>
                    @for ($i = 1; $i <= 25; $i++) <th>{{ $i }}</th>
                        @endfor
                        <th>Total PMKS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($results as $index => $result)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $result['Nama Kecamatan'] }}</td>
                    <?php $total = 0; ?>
                    @for ($i = 1; $i <= 25; $i++) <?php $total += $result["Jenis PMKS $i"]; ?> <td>
                        {{ $result["Jenis PMKS $i"] }}</td>
                        @endfor
                        <td>{{ $total }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-4">
        <!-- BEGIN: Table Head Options -->
        <div class="intro-y box">
            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60">
                <h2 class="font-medium text-base mr-auto">
                    Jenis PMKS
                </h2>
            </div>
            <div class="p-5" id="head-options-table">
                <div class="preview">
                    <table id="table" class="table">
                        <thead class="table-dark">
                            <tr>
                                <th class="whitespace-nowrap">#</th>
                                <th class="whitespace-nowrap">Jenis PMKS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jenis_pmks as $jp)
                            <tr>
                                <td>{{$loop->index +1}}</td>
                                <td>{{$jp->nama_pmks}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Striped Rows -->
</div>

<!-- END: HTML Table Data -->
@endsection

@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            scrollX: true
        });
    });

    $(document).ready( function () {
        $('#table').DataTable({
        scrollX: true
        });
        });
</script>
@endsection