@extends('../layout/' . $layout)

@section('subhead')
<title>Dinas Sosial - PPKS</title>
@endsection

@section('subcontent')
<div class="relative">
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 z-10">
            <div class="mt-6 intro-y">
                <div class="alert alert-dismissible show box bg-primary text-white flex items-center mb-3" role="alert">
                    <span>
                        Selamat Datang di Aplikasi Simon Balik Dalu Yan Kesal
                    </span>
                    <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close"> <i
                            data-lucide="x" class="w-4 h-4"></i> </button>
                </div>
            </div>

            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-lucide="shopping-cart" class="report-box__icon text-primary"></i>
                                <div class="ml-auto">
                                    <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                        title="33% Higher than last month"> </div>
                                </div>
                            </div>
                            <div class="text-3xl font-medium leading-8 mt-6">{{ $totalPmks }}</div>
                            <div class="text-base text-slate-500 mt-1">Total Data PPKS</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-lucide="credit-card" class="report-box__icon text-pending"></i>
                                <div class="ml-auto">
                                    <div class="report-box__indicator bg-danger tooltip cursor-pointer"
                                        title="2% Lower than last month"></div>
                                </div>
                            </div>
                            <div class="text-3xl font-medium leading-8 mt-6">{{ $totalPmks_1 }}</div>
                            <div class="text-base text-slate-500 mt-1">Data Aktif</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-lucide="monitor" class="report-box__icon text-warning"></i>
                                <div class="ml-auto">
                                    <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                        title="12% Higher than last month"> </div>
                                </div>
                            </div>
                            <div class="text-3xl font-medium leading-8 mt-6">{{ $totalPmks_0 }}</div>
                            <div class="text-base text-slate-500 mt-1">Data Non Aktif</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-lucide="user" class="report-box__icon text-success"></i>
                                <div class="ml-auto">
                                    <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                        title="22% Higher than last month"></div>
                                </div>
                            </div>
                            <div class="text-3xl font-medium leading-8 mt-6">{{$totalPmks_meninggal_dunia}}</div>
                            <div class="text-base text-slate-500 mt-1">PPKS Meninggal</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5 mb-3 grid grid-cols-12 sm:gap-10 intro-y">
                <div
                    class="row-start-2 md:row-start-auto col-span-12 md:col-span-6 py-6 border-black border-opacity-10 border-t md:border-t-0 md:border-l md:border-r border-dashed px-10 sm:px-28 md:px-5 -mx-5">

                    <div class="dropdown md:ml-auto mt-5 md:mt-0">
                        <button class="dropdown-toggle btn btn-outline-secondary font-normal" aria-expanded="false"
                            data-tw-toggle="dropdown"> Filter berdasarkan PPKS <svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down"
                                data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg> </button>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content overflow-y-auto h-32">
                                @foreach ($jenisPmksList as $jenisPmks)
                                <li><a href="#" class="dropdown-item"
                                        onclick="filterPmks({{ $jenisPmks->id }})">{{ $jenisPmks->nama_pmks }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="mt-6">
                        <div class="h-[290px]">
                            <div id="chartContainer"></div>
                        </div>
                    </div>
                </div>

                <div
                    class="row-start-2 md:row-start-auto col-span-12 md:col-span-6 py-6 border-black border-opacity-10 border-t md:border-t-0 md:border-l md:border-r border-dashed px-10 sm:px-28 md:px-5 -mx-5">

                    <div class="dropdown md:ml-auto mt-5 md:mt-0">
                        <button class="dropdown-toggle btn btn-outline-secondary font-normal" aria-expanded="false"
                            data-tw-toggle="dropdown"> Filter by Kecamatan <svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down"
                                data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg> </button>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content overflow-y-auto h-32">
                                @foreach ($kecamatans as $kecamatan)
                                <li>
                                    <a href="#" class="dropdown-item"
                                        onclick="updateChart({{ $kecamatan->id }})">{{ $kecamatan->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="mt-6">
                        <div class="h-[290px]">
                            <div id="chartContainer2"></div>
                        </div>
                    </div>
                </div><br>

                <div
                    class="row-start-2 md:row-start-auto col-span-12 md:col-span-12 py-6 border-black border-opacity-10 border-t md:border-t-0 md:border-l md:border-r border-dashed px-10 sm:px-28 md:px-5 -mx-5">

                    <div class="dropdown md:ml-auto mt-5 md:mt-0">
                        <button class="dropdown-toggle btn btn-outline-secondary font-normal" aria-expanded="false"
                            data-tw-toggle="dropdown"> Filter by Kecamatan <svg xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down"
                                data-lucide="chevron-down" class="lucide lucide-chevron-down w-4 h-4 ml-2">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg> </button>
                        <div class="dropdown-menu w-40">
                            <ul class="dropdown-content overflow-y-auto h-32">
                                @foreach ($kecamatans as $kecamatan)
                                <li>
                                    <a href="#" class="dropdown-item"
                                        onclick="updateBantuan({{ $kecamatan->id }})">{{ $kecamatan->name }}</a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="mt-6">
                        <div class="h-[290px]">
                            <div id="chartContainer3"></div>
                        </div>
                    </div>
                    <br><br><br>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')
<script>
    var chart, chart2, chart3;
    window.onload = function () {
console.log({!! json_encode($dataPoints2, JSON_NUMERIC_CHECK) !!});
console.log({!! json_encode($dataPoints, JSON_NUMERIC_CHECK) !!});
    chart = new CanvasJS.Chart("chartContainer", {
    	animationEnabled: true,

    	title:{
    		text:"Data PPKS Perkecamatan (NIK)"
    	},
    	axisX:{
    		interval: 1
    	},
    	axisY2:{
    		interlacedColor: "rgba(1,77,101,.2)",
    		gridColor: "rgba(1,77,101,.1)",
    		title: "Total Data PPKS"
    	},
    	data: [{
        type: "bar",
        name: "companies",
        axisYType: "secondary",
        color: "#014D65",
        dataPoints: {!! json_encode($dataPoints, JSON_NUMERIC_CHECK) !!}
        }]

    });

    chart2 = new CanvasJS.Chart("chartContainer2", {
    animationEnabled: true,
    title: {
        text: "Jenis PPKS Berdasarkan Kecamatan"
    },
    data: [{
        type: "pie",
        startAngle: 240,
        yValueFormatString: "##0' Org'",
        indexLabel: "{label} {y}",
        dataPoints: {!! json_encode($dataPoints2, JSON_NUMERIC_CHECK) !!} // Kosongkan array ini untuk diisi nanti
    }]
    });

    chart3 = new CanvasJS.Chart("chartContainer3", {
    animationEnabled: true,
    title: {
    text: "Sebaran Bantuan Perkecamatan"
    },
    axisY: {
    title: "Jumlah",
    titleFontColor: "#4F81BC",
    },
    data: [{
    indexLabelFontColor: "darkSlateGray",
    name: "views",
    type: "area",
    yValueFormatString: "# Orang",
    dataPoints: {!! json_encode($dataPoints3, JSON_NUMERIC_CHECK) !!}
    }]
    });

    chart.render();
    chart2.render();
    chart3.render()
    }


    function updateChart(kecamatanId) {
    fetch(`/filter-chart-data2/${kecamatanId}`)
        .then(response => response.json())
        .then(dataPoints => {
            chart2.options.data[0].dataPoints = dataPoints;
            chart2.render();
            console.log(chart2.options.data[0].dataPoints)
        })
        .catch(error => console.error('Error:', error));
    }


function filterPmks(id_pmks) {
    fetch(`/filter-pmks-data/${id_pmks}`)
        .then(response => response.json())
        .then(dataPoints => {
            chart.options.data[0].dataPoints = dataPoints;
            chart.render();
        })
        .catch(error => console.error('Error:', error));
}

function updateBantuan(kecamatanId) {
    fetch(`/filter-chart-data3/${kecamatanId}`)
        .then(response => response.json())
        .then(dataPoints => {
            chart3.options.data[0].dataPoints = dataPoints;
            chart3.render();
            console.log(chart3.options.data[0].dataPoints)
        })
        .catch(error => console.error('Error:', error));
    }

</script>
@endsection