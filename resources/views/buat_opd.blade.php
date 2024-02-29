@extends('../layout/' . $layout)

@section('subhead')
<title>Dinas Sosial - PPKS</title>
@endsection

@section('subcontent')
<div class="intro-y col-span-12 lg:col-span-6">
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">Buat SKPD</h2>
        </div>
        <div id="horizontal-form" class="p-5">
            <div class="preview">
                <form action="{{ route('admin.submit_buatopd') }}" method="post">
                    @csrf
                    <div class="form-inline">
                        <label for="horizontal-form-1" class="form-label sm:w-20">Nama SKPD</label>
                        <input id="horizontal-form-1" type="text" class="form-control" name="nama_opd" id="nama_opd"
                            placeholder="Masukkan Nama SKPD">
                    </div>
                    <div class="sm:ml-20 sm:pl-5 mt-5">
                        <button class="btn btn-primary" type="submit" id="btn-buat-tabel">Buat Divisi</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection