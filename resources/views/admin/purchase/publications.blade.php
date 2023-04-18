@extends('layouts.app')

@section('title', 'Abuna #'.str_pad( $order->id, 6, "0", STR_PAD_LEFT ))

@section('css-import')
    <link href="{{asset('assets/css/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('css')
@endsection

@section('content')

    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title"> Abuna #{{str_pad( $order->id, 6, "0", STR_PAD_LEFT )}} </h3>

                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="{{route('index')}}" class="kt-subheader__breadcrumbs-home"><i class="la la-home"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="{{route('purchases')}}" class="kt-subheader__breadcrumbs-link">
                            Abunalar sanawy
                        </a>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            Abuna #{{str_pad( $order->id, 6, "0", STR_PAD_LEFT )}}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000"/>
                                    <path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Abuna #{{str_pad( $order->id, 6, "0", STR_PAD_LEFT )}} - Neşirleriň sanawy
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                    </div>
                </div>
                <div class="kt-portlet__body">

                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                        <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Neşiriň ady</th>
                            <th>Aýlary</th>
                            <th>Mukdary</th>
                            <th>Şäher</th>
                            <th>Şahamça</th>
                            <th>Adres</th>
                            <th class="text-center" >Senesi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->publications as $item)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{$item->publication->name}}</td>
                                <td>
                                    @foreach($item->periodItems as $period)
                                        <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">{{$period->period->monthName($period->period->month)}} - {{number_format($item->price, 2)}} TMT</span>
                                    @endforeach
                                </td>
                                <td>{{$item->quantity}}</td>
                                <td>{{$item->address->branch->city->name}}</td>
                                <td>{{$item->address->branch->name}}</td>
                                <td>{{$item->address->street ? $item->address->street.",":""}} {{$item->address->house ? $item->address->house.",": ''}} {{$item->block ? $item->block.",":""}} {{$item->address->home ? $item->address->home.",": ''}} {{$item->house ? $item->house:""}}</td>
                                <td class="text-center">{{date('d-M-Y H:i', strtotime($item->created_at))}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <!--end: Datatable -->
                </div>
            </div>
        </div>

        <!-- end:: Content -->
    </div>

@endsection

@section('js')
    <script src="{{asset('assets/js/datatables.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/datatables-script.js')}}" type="text/javascript"></script>
@endsection
