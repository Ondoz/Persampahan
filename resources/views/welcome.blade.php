@extends('layouts.app')
@section('content');
    <div class="container app-content">
        <!-- ROW-1 OPEN -->
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-danger img-card box-primary-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <p class="text-white mb-0">TOTAL POSITIF</p>
                                <h2 class="mb-0 number-font">{{$response[0]['positif']}}</h2>
                                <p class="text-white mb-0">ORANG</p>
                            </div>
                            <div class="ml-auto">  </div>
                        </div>
                    </div>
                </div>
            </div><!-- COL END -->
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card bg-success img-card box-secondary-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <p class="text-white mb-0">TOTAL SEMBUH</p>
                                <h2 class="mb-0 number-font">{{$response[0]['sembuh']}}</h2>
                                <p class="text-white mb-0">ORANG</p>
                            </div>
                            <div class="ml-auto">  </div>
                        </div>
                    </div>
                </div>
            </div><!-- COL END -->
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card  bg-secondary img-card box-success-shadow">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <p class="text-white mb-0">TOTAL MENINGGAL</p>
                                <h2 class="mb-0 number-font">{{$response[0]['meninggal']}}</h2>
                                <p class="text-white mb-0">ORANG</p>
                            </div>
                            <div class="ml-auto">  </div>
                        </div>
                    </div>
                </div>
            </div><!-- COL END -->
            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                <div class="card img-card box-success-shadow" style="background-color:rgb(74, 91, 203)">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="text-white">
                                <p class="text-white mb-0">TOTAL DIRAWAT</p>
                                <h2 class="mb-0 number-font"> {{$response[0]['dirawat']}}</h2>
                                <p class="text-white mb-0">ORANG</p>
                            </div>

                            <div class="ml-auto">  </div>
                        </div>
                    </div>
                </div>
            </div><!-- COL END -->
        </div>
        <!-- ROW-1 CLOSED -->

        <!-- ROW-3 OPEN -->
        <div class="row row-cards mt-5">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-14">
                <div class="card">
                    <div class="card-header ">
                        <h3 class="card-title">Data Kasus Coronavirus di Indonesia Berdasarkan Provinsi</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive service">
                            <table class="table table-bordered table-hover mb-0 text-nowrap css-serial">
                                <thead>
                                    <tr>
                                        <th class="atasbro">No.</th>
                                        <th class="atasbro">Provinsi</th>
                                        <th class="atasbro">Positif</th>
                                        <th class="atasbro">Sembuh</th>
                                        <th class="atasbro">Meninggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                     $i = 1;
                                    @endphp
                                    @foreach ($provinsi as $key => $item)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$provinsi[$key]['attributes']['Provinsi']}}</td>
                                            <td>{{$provinsi[$key]['attributes']['Kasus_Posi']}}</td>
                                            <td>{{$provinsi[$key]['attributes']['Kasus_Semb']}}</td>
                                            <td>{{$provinsi[$key]['attributes']['Kasus_Meni']}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- COL END -->
        </div>
        <!-- ROW-3 CLOSED -->

        <!-- ROW-2 OPEN -->
        <div class="row">
            <div class="col-md-12 col-xl-6 mt-5">
                <a href="https://www.unicef.org/indonesia/id/coronavirus">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <span class="card-title">Novel coronavirus (COVID-19): Hal-hal yang perlu Anda ketahui</span>
                        <p class="card-text">Unicef Indonesia</p>
                    </div>
                </div>
            </a></div><!-- COL END -->
            <div class="col-md-12 col-xl-6 mt-5">
                <a href="https://www.kompas.com/tren/read/2020/03/03/183500265/infografik-daftar-100-rumah-sakit-rujukan-penanganan-virus-corona">
                <div class="card text-white bg-secondary">
                    <div class="card-body">
                        <span class="card-title">Daftar 100 Rumah Sakit Rujukan Penanganan Virus Corona</span>
                        <p class="card-text">Kompas</p>
                    </div>
                </div>
            </a></div><!-- COL END -->
            <div class="col-md-12 col-xl-6 mt-1">
                <a href="https://infeksiemerging.kemkes.go.id/">
                <div class="card text-white bg-success">
                    <div class="card-body">
                        <span class="card-title">Media Informasi Resmi Penyakit Infeksi Emerging</span>
                        <p class="card-text">Kementrian Kesehatan </p>
                    </div>
                </div>
            </a></div><!-- COL END -->
            <div class="col-md-12 col-xl-6 mt-1">
                <a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public">
                <div class="card text-white bg-danger">
                    <div class="card-body">
                        <span class="card-title">Coronavirus Disease (COVID-19) Advice for The Public</span>
                        <p class="card-text">WHO</p>
                    </div>
                </div>
            </a></div><!-- COL END -->
        </div>
@endsection
