<?php

namespace App\Http\Controllers;

use App\Models\JenisBantuan;
use App\Models\JenisPmks;
use App\Models\PenerimaBantuan;
use App\Models\Ppks;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\District;
use Yajra\DataTables\Facades\DataTables;

class MobileController extends Controller
{
    public function index()
    {

        return \view('mobile.dashboard');
    }

    public function mobile_ppks(Request $request)
    {
        if ($request->ajax()) {
            $data = Ppks::with('history')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('olah_data', function ($row) {
                    $btn = '';

                    $btn .= '<a href="' . route('ppks.edit', $row->id) . '" title="Edit Data PMKS" class="btn btn-m btn-full mb-3 rounded-0 text-uppercase font-900 shadow-s bg-yellow-light">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-file-edit"><path d="M4 13.5V4a2 2 0 0 1 2-2h8.5L20 7.5V20a2 2 0 0 1-2 2h-5.5"/><polyline points="14 2 14 8 20 8"/><path d="M10.42 12.61a2.1 2.1 0 1 1 2.97 2.97L7.95 21 4 22l.99-3.95 5.43-5.44Z"/></svg>
                  </a>';

                    $btn .= '<form action="' . route('ppks.delete', $row->id) . '" method="POST" style="display: inline;">
            ' . csrf_field() . '
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-m btn-full mb-3 rounded-0 text-uppercase font-900 shadow-s bg-red-light" onclick="return confirm(\'Apakah Anda yakin ingin menghapus data PMKS ini?\');" title="Hapus Data PMKS"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x-circle"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg></button>
        </form>';

                    if ($row->status != 0) {
                        $btn .= '<form action="' . route('ppks.meninggal.post', $row->id) . '" method="POST" style="display: inline;">
            ' . csrf_field() . '
            <button type="submit" class="btn btn-m btn-full mb-3 rounded-0 text-uppercase font-900 shadow-s bg-red-light" onclick="return confirm(\'Apakah data PMKS ini Meninggal Dunia?\');" title="Hapus Data PMKS">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-skull"><circle cx="9" cy="12" r="1"/><circle cx="15" cy="12" r="1"/><path d="M8 20v2h8v-2"/><path d="m12.5 17-.5-1-.5 1h1z"/><path d="M16 20a2 2 0 0 0 1.56-3.25 8 8 0 1 0-11.12 0A2 2 0 0 0 8 20"/></svg></button>
        </form>';
                    }

                    return $btn;
                })
                ->addColumn('aksi', function ($row) {
                    $btn = '';

                    $btn .= '<a href="javascript:void(0)" title="Lihat Jenis PMKS" class="btn btn-m btn-full mb-3 rounded-0 text-uppercase font-900 shadow-s bg-blue-dark" data-tw-toggle="modal" data-tw-target="#modal" onclick="showContentInModal(\'' . htmlentities($row->jenis_pmks) . '\', \'text\')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-zoom-in"><circle cx="11" cy="11" r="8"/><line x1="21" x2="16.65" y1="21" y2="16.65"/><line x1="11" x2="11" y1="8" y2="14"/><line x1="8" x2="14" y1="11" y2="11"/></svg>
                    </a>';

                    $btn .= '<a href="' . route('ppks.history', $row->id) . '" title="Histori PMKS" class="btn btn-m btn-full mb-3 rounded-0 text-uppercase font-900 shadow-s bg-magenta-dark">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-history"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M12 7v5l4 2"/></svg>
                    </a>';

                    $btn .= '<a href="' . route('bantuan.history', $row->id) . '" title="Histori Bantuan Sosial" class="btn btn-m btn-full mb-3 rounded-0 text-uppercase font-900 shadow-s bg-green-dark">
                   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-helping-hand"><path d="m3 15 5.12-5.12A3 3 0 0 1 10.24 9H13a2 2 0 1 1 0 4h-2.5m4-.68 4.17-4.89a1.88 1.88 0 0 1 2.92 2.36l-4.2 5.94A3 3 0 0 1 14.96 17H9.83a2 2 0 0 0-1.42.59L7 19"/><path d="m2 14 6 6"/></svg></a>';

                    return $btn;
                })
                ->rawColumns(['olah_data', 'aksi'])
                ->make(true);
        }
    }
}
