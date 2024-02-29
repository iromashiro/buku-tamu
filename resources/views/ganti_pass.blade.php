@extends('../layout/' . $layout)

@section('subhead')
<title>Dinas Sosial - PPKS</title>
@endsection

@section('subcontent')
<div class="intro-y col-span-12 lg:col-span-6">
    <div class="intro-y box mt-5">
        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
            <h2 class="font-medium text-base mr-auto">Ubah Password</h2>
        </div>
        <div id="horizontal-form" class="p-5">
            <div class="preview">
                <form action="{{ route('opd.submit_ganti_password') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->id_user }}">
                    <div class="form-inline mt-3">
                        <label id="username" class="form-label sm:w-20">Username</label>
                        <input class="form-control" readonly id="username" value="{{ $user->username }}">
                    </div>

                    <div class="form-inline mt-3">
                        <label id="pass_baru" class="form-label sm:w-20"> Password baru </label>
                        <input class="form-control" required type="password" required name="pass_baru" id="pass_baru">
                    </div>

                    <div class="form-inline mt-3">
                        <label id="conf_pass_baru" class="form-label sm:w-20">Konfirmasi Password baru </label>
                        <input class="form-control" required type="password" required name="conf_pass_baru"
                            id="conf_pass_baru">
                    </div>


                    <div class="sm:ml-20 sm:pl-5 mt-5">
                        <button class="btn btn-primary" type="submit" id="btn-buat-tabel">Ubah Password</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection