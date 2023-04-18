@extends('layouts.app')

@section('title', 'Şäherler')

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
                    <h3 class="kt-subheader__title"> Şäherler </h3>

                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="{{route('index')}}" class="kt-subheader__breadcrumbs-home"><i class="la la-home"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <span class="kt-subheader__breadcrumbs-link">
                            Adres
                        </span>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="{{route('city.index')}}" class="kt-subheader__breadcrumbs-link">
                            Şäherler
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
                                    <path d="M4.88230018,17.2353996 L13.2844582,0.431083506 C13.4820496,0.0359007077 13.9625881,-0.12427877 14.3577709,0.0733126292 C14.5125928,0.15072359 14.6381308,0.276261584 14.7155418,0.431083506 L23.1176998,17.2353996 C23.3152912,17.6305824 23.1551117,18.1111209 22.7599289,18.3087123 C22.5664522,18.4054506 22.3420471,18.4197165 22.1378777,18.3482572 L14,15.5 L5.86212227,18.3482572 C5.44509941,18.4942152 4.98871325,18.2744737 4.84275525,17.8574509 C4.77129597,17.6532815 4.78556182,17.4288764 4.88230018,17.2353996 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.000087, 9.191034) rotate(-315.000000) translate(-14.000087, -9.191034) "/>
                                </g>
                            </svg>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Şäherler
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    <form id="formUpdate" action="{{route('city.store')}}" method="post">
                        @csrf
                        <div class="kt-form kt-form--label-right kt-margin-b-20">
                            <div class="row align-items-center">
                                <div class="col-md-12 order-2 order-xl-1">
                                    <div class="row align-items-center">
                                        <div class="col-md-5 kt-margin-b-20-tablet-and-mobile">
                                            <div class="form-group">
                                                <label for="state">Welaýat</label>
                                                <select id="state" name="state" class="form-control" required>
                                                    <option value="" disabled selected> - </option>
                                                    @foreach($states as $state)
                                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5 kt-margin-b-20-tablet-and-mobile">
                                            <div class="form-group">
                                                <label for="name">Ady</label>
                                                <input type="text" id="name" name="name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 kt-margin-b-20-tablet-and-mobile">
                                            <button type="submit" class="btn btn-block btn-outline-brand"> Goş</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__body">
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Welaýat</th>
                            <th>Şäher ady</th>
                            <th>Goşulan senesi</th>
                            <th>Goşmaça</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($cities as $item)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$item->state->name}}</td>
                                    <td>{{$item->name}}</td>
                                    <td style="width: 120px;">{{date('d-m-y H:i', strtotime($item->created_at))}}</td>
                                    <td nowrap class="text-center">
                                        <a href="#" data-toggle="modal" data-target="#update-{{$item->id}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Üýtget">
                                            <i class="la la-edit"></i>
                                        </a>
                                        <form action="{{ route('city.destroy', $item->id) }}" method="POST"
                                              class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <a href="javascript:void(0)" onclick="if (confirm('Siz hakykatdanam {{ $item->name}} şäheri pozmak isleýäňizmi?')) {this.parentElement.submit();}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Poz">
                                                <i class="la la-trash"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="update-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="updateLabel-{{$item->id}}" aria-hidden="true">
                                    <div class="modal-dialog modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateLabel-{{$item->id}}">Üýtget</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <form action="{{route('city.update', $item)}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="id" value="{{$item->id}}">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="form-group col-md-12">
                                                            <label for="state-{{$item->id}}" class="form-control-label">Welaýat:</label>
                                                            <select class="form-control" id="state-{{$item->id}}" name="state" required>
                                                                @foreach($states as $state)
                                                                    <option value="{{$state->id}}" {{$item->state_id == $state->id ? 'selected' : ''}}>{{$state->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-12">
                                                            <label for="name-{{$item->id}}" class="form-control-label">Şäheriň ady:</label>
                                                            <input type="text" class="form-control" id="name-{{$item->id}}" name="name" placeholder="Şäheriň" required value="{{$item->name}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer form-control-update">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Yza</button>
                                                    <button type="submit" class="btn btn-primary">Üýtget</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
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
