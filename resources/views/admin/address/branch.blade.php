@extends('layouts.app')

@section('title', 'Şahamçalar')

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
                    <h3 class="kt-subheader__title"> Şahamçalar </h3>

                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="{{route('index')}}" class="kt-subheader__breadcrumbs-home"><i class="la la-home"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <span class="kt-subheader__breadcrumbs-link">
                            Adres
                        </span>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="{{route('branch.index')}}" class="kt-subheader__breadcrumbs-link">
                            Şahamçalar
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
                                    <path d="M13.5,21 L13.5,18 C13.5,17.4477153 13.0522847,17 12.5,17 L11.5,17 C10.9477153,17 10.5,17.4477153 10.5,18 L10.5,21 L5,21 L5,4 C5,2.8954305 5.8954305,2 7,2 L17,2 C18.1045695,2 19,2.8954305 19,4 L19,21 L13.5,21 Z M9,4 C8.44771525,4 8,4.44771525 8,5 L8,6 C8,6.55228475 8.44771525,7 9,7 L10,7 C10.5522847,7 11,6.55228475 11,6 L11,5 C11,4.44771525 10.5522847,4 10,4 L9,4 Z M14,4 C13.4477153,4 13,4.44771525 13,5 L13,6 C13,6.55228475 13.4477153,7 14,7 L15,7 C15.5522847,7 16,6.55228475 16,6 L16,5 C16,4.44771525 15.5522847,4 15,4 L14,4 Z M9,8 C8.44771525,8 8,8.44771525 8,9 L8,10 C8,10.5522847 8.44771525,11 9,11 L10,11 C10.5522847,11 11,10.5522847 11,10 L11,9 C11,8.44771525 10.5522847,8 10,8 L9,8 Z M9,12 C8.44771525,12 8,12.4477153 8,13 L8,14 C8,14.5522847 8.44771525,15 9,15 L10,15 C10.5522847,15 11,14.5522847 11,14 L11,13 C11,12.4477153 10.5522847,12 10,12 L9,12 Z M14,12 C13.4477153,12 13,12.4477153 13,13 L13,14 C13,14.5522847 13.4477153,15 14,15 L15,15 C15.5522847,15 16,14.5522847 16,14 L16,13 C16,12.4477153 15.5522847,12 15,12 L14,12 Z" fill="#000000"/>
                                    <rect fill="#FFFFFF" x="13" y="8" width="3" height="3" rx="1"/>
                                    <path d="M4,21 L20,21 C20.5522847,21 21,21.4477153 21,22 L21,22.4 C21,22.7313708 20.7313708,23 20.4,23 L3.6,23 C3.26862915,23 3,22.7313708 3,22.4 L3,22 C3,21.4477153 3.44771525,21 4,21 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Şahamçalar
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    <form id="formUpdate" action="{{route('branch.store')}}" method="post">
                        @csrf
                        <div class="kt-form kt-form--label-right kt-margin-b-20">
                            <div class="row align-items-center">
                                <div class="col-md-12 order-2 order-xl-1">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                            <div class="form-group">
                                                <label for="city">Şäheri</label>
                                                <select id="city" name="city" class="form-control" required>
                                                    <option value="" disabled selected> - </option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                            <div class="form-group">
                                                <label for="name">Ady</label>
                                                <input type="text" id="name" name="name" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 kt-margin-b-20-tablet-and-mobile">
                                            <div class="form-group">
                                                <label for="index">Indeksi</label>
                                                <input type="number" id="index" name="index" min="0" class="form-control" required>
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
                            <th>Şäher</th>
                            <th>Şahamça ady</th>
                            <th>Indeksi</th>
                            <th>Goşulan senesi</th>
                            <th>Goşmaça</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($branches as $item)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{$item->city->name}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->index}}</td>
                                <td style="width: 120px;">{{date('d-m-y H:i', strtotime($item->created_at))}}</td>
                                <td nowrap class="text-center">
                                    <a href="#" data-toggle="modal" data-target="#update-{{$item->id}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Üýtget">
                                        <i class="la la-edit"></i>
                                    </a>
                                    <form action="{{ route('branch.destroy', $item->id) }}" method="POST"
                                          class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0)" onclick="if (confirm('Siz hakykatdanam {{ $item->name}} şahamçany pozmak isleýäňizmi?')) {this.parentElement.submit();}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Poz">
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
                                        <form action="{{route('branch.update', $item)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="city-{{$item->id}}" class="form-control-label select">Şäher:</label>
                                                        <select class="form-control" id="city-{{$item->id}}" name="city" required>
                                                            @foreach($cities as $city)
                                                                <option value="{{$city->id}}" {{$item->city_id == $city->id ? 'selected' : ''}}>{{$city->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="name-{{$item->id}}" class="form-control-label">Şahamçanyň ady:</label>
                                                        <input type="text" class="form-control" id="name-{{$item->id}}" name="name" placeholder="Şäheriň" required value="{{$item->name}}">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="index-{{$item->id}}" class="form-control-label">Indeksi:</label>
                                                        <input type="number" class="form-control" min="0" id="index-{{$item->id}}" name="index" placeholder="Indeksi" required value="{{$item->index}}">
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
    <script>
        $(document).ready(function (){
            $('#city').select2();
        });
    </script>
@endsection
