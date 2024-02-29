@extends('../layout/' . $layout)

@section('subhead')
<title>Dinas Sosial - List Administrator SKPD</title>
@endsection

@section('subcontent')
<div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Index Administrator</h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
        <div class="dropdown ml-auto sm:ml-0">
            <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                <span class="w-5 h-5 flex items-center justify-center">
                    <i class="w-4 h-4" data-lucide="plus">Tambah</i>
                </span>
            </button>
            <div class="dropdown-menu w-40">
                <ul class="dropdown-content">
                    <li>
                        <a href="{{ route('admin.view_buatopd') }}" class="dropdown-item">
                            <i data-lucide="file-plus" class="w-4 h-4 mr-2"></i> Tambah Data SKPD
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.register') }}" class="dropdown-item">
                            <i data-lucide="users" class="w-4 h-4 mr-2"></i> Tambah Data Admin SKPD
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- BEGIN: HTML Table Data -->
<div class="intro-y box p-5 mt-5">
    <div class="overflow-x-auto scrollbar-hidden">
        <table id="table" class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama SKPD</th>
                    <th style="text-align: center">Jumlah Akun</th>
                </tr>
            </thead>
            <tbody>
                @php
                $previousNamaOpd = null;
                @endphp
                @foreach ($listAllOpd as $opd)
                @if ($opd->nama_opd !== $previousNamaOpd)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $opd->nama_opd }}</td>
                    <td style="text-align: center">{{ $opd->jumlah_admin }}</td>
                </tr>
                @php
                $previousNamaOpd = $opd->nama_opd;
                @endphp
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- END: HTML Table Data -->
@endsection