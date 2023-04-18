@extends('layouts.app')

@section('title', 'Abunalar')

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
                    <h3 class="kt-subheader__title"> Abunalar </h3>

                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="{{route('index')}}" class="kt-subheader__breadcrumbs-home"><i class="la la-home"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="{{route('purchases')}}" class="kt-subheader__breadcrumbs-link">
                            Abunalar sanawy
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
                                    <path d="M18.1446364,11.84388 L17.4471627,16.0287218 C17.4463569,16.0335568 17.4455155,16.0383857 17.4446387,16.0432083 C17.345843,16.5865846 16.8252597,16.9469884 16.2818833,16.8481927 L4.91303792,14.7811299 C4.53842737,14.7130189 4.23500006,14.4380834 4.13039941,14.0719812 L2.30560137,7.68518803 C2.28007524,7.59584656 2.26712532,7.50338343 2.26712532,7.4104669 C2.26712532,6.85818215 2.71484057,6.4104669 3.26712532,6.4104669 L16.9929851,6.4104669 L17.606173,3.78251876 C17.7307772,3.24850086 18.2068633,2.87071314 18.7552257,2.87071314 L20.8200821,2.87071314 C21.4717328,2.87071314 22,3.39898039 22,4.05063106 C22,4.70228173 21.4717328,5.23054898 20.8200821,5.23054898 L19.6915238,5.23054898 L18.1446364,11.84388 Z" fill="#000000" opacity="0.3"/>
                                    <path d="M6.5,21 C5.67157288,21 5,20.3284271 5,19.5 C5,18.6715729 5.67157288,18 6.5,18 C7.32842712,18 8,18.6715729 8,19.5 C8,20.3284271 7.32842712,21 6.5,21 Z M15.5,21 C14.6715729,21 14,20.3284271 14,19.5 C14,18.6715729 14.6715729,18 15.5,18 C16.3284271,18 17,18.6715729 17,19.5 C17,20.3284271 16.3284271,21 15.5,21 Z" fill="#000000"/>
                                </g>
                            </svg>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Abunalar
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
                            <th>Ady</th>
                            <th>Familiýasy</th>
                            <th>Telefon belgisi</th>
                            <th class="text-center" >Jemi töleg</th>
                            <th class="text-center" >Töleg senesi</th>
                            <th class="text-center" >Töleg</th>
                            <th class="text-center" >Goşmaça</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($purchases as $item)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{ucwords($item->user->name)}}</td>
                                <td>{{ucwords($item->user->surname ? $item->user->surname : '-')}}</td>
                                <td>+993 {{$item->user->phone}}</td>
                                <td> {{$item->amount ? number_format($item->amount, 2) : ''}}</td>
                                <td class="text-center">{{$item->time ? date('d-M-Y H:i', $item->time) : '-'}}</td>
                                <td class="text-center">
                                    <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Töleg edilen</span>
                                </td>
                                <td nowrap class="text-center">
                                    <a href="{{route('purchase.publications', $item->id)}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Neşirler">
                                        <i class="la la-eye"></i>
                                    </a>
                                </td>
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
