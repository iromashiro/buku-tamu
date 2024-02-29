@extends('../layout/' . $layout)

@section('subhead')
<title>Dinas Sosial - Register Admin SKPD</title>
@endsection

@section('subcontent')
<div class="intro-y col-span-12 lg:col-span-6">
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">Register Admin</h2>
        </div>
        <div id="horizontal-form" class="p-5">
            <div class="preview">
                <form action="{{ route('admin.submit_register') }}" method="post">
                    @csrf

                    <div class="form-inline mt-3">
                        <label for="horizontal-form-1" class="form-label sm:w-20">Username</label>
                        <input id="horizontal-form-1" type="text" class="form-control" name="username" id="username"
                            placeholder="Masukkan username">
                    </div>

                    <div class="form-inline mt-3">
                        <label for="horizontal-form-1" class="form-label sm:w-20">Password</label>
                        <input id="horizontal-form-1" type="password" class="form-control" name="password" id="password"
                            placeholder="Masukkan Password">
                    </div>

                    <div class="form-inline mt-3">
                        <label for="horizontal-form-1" class="form-label sm:w-20">Divisi</label>
                        <select class="form-select" aria-label="Default select example" name="id_opd">
                            @foreach ($opd_belum_pakai as $opd)
                            <option value="{{$opd->id_opd}}" @if($id_opd==$opd->id_opd) selected
                                @endif>{{ $opd->nama_opd }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="sm:ml-20 sm:pl-5 mt-5">
                        <button class="btn btn-primary" type="submit" id="btn-buat-tabel">Buat SKPD</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection