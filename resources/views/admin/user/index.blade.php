@extends('layouts.app')

@section('title', 'Ulanyjylar')

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
                    <h3 class="kt-subheader__title"> Ulanyjylar </h3>

                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="{{route('index')}}" class="kt-subheader__breadcrumbs-home"><i class="la la-home"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="{{route('user.index')}}" class="kt-subheader__breadcrumbs-link">
                            Ulanyjylar sanawy
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
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Ulanyjylar
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
{{--                        <div class="kt-portlet__head-wrapper">--}}
{{--                            <div class="kt-portlet__head-actions">--}}
{{--                                <a href="javascript:void(0)" data-toggle="modal" data-target="#create" class="btn btn-brand btn-elevate btn-icon-sm">--}}
{{--                                    <i class="la la-plus"></i>--}}
{{--                                    Täze ulanyjy--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">--}}
{{--                            <div class="modal-dialog modal-sm" role="document">--}}
{{--                                <div class="modal-content">--}}
{{--                                    <div class="modal-header">--}}
{{--                                        <h5 class="modal-title" id="createLabel">New User</h5>--}}
{{--                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                    <form action="{{route('admin.user.store')}}" method="POST" enctype="multipart/form-data">--}}
{{--                                        @csrf--}}
{{--                                        <input type="hidden" name="status" value="1">--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="name" class="form-control-label">Name:</label>--}}
{{--                                                <input type="text" class="form-control" id="name" name="name" required placeholder="Full name">--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="phone" class="form-control-label">Phone number:</label>--}}
{{--                                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone number">--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="email" class="form-control-label">Email:</label>--}}
{{--                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="password" class="form-control-label">Password:</label>--}}
{{--                                                <input type="password" class="form-control" id="password" name="password" required minlength="8" placeholder="Password">--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label for="password_confirmation" class="form-control-label">Confirm password:</label>--}}
{{--                                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required minlength="8" placeholder="Password">--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                                            <button type="submit" class="btn btn-primary">Add</button>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
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
                            <th class="text-center" >Goşulan wagty</th>
                            <th class="text-center" >Aktiw</th>
                            <th class="text-center" >Goşmaça</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $item)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{ucwords($item->name)}}</td>
                                <td>{{ucwords($item->surname ? $item->surname : '-')}}</td>
                                <td>+993 {{$item->phone}}</td>
                                <td class="text-center">
                                    @if($item->status)
                                        <span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Hawwa</span>
                                    @else
                                        <span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">Ýok</span>
                                    @endif
                                </td>
                                <td class="text-center">{{date('d-M-Y H:i', strtotime($item->created_at))}}</td>
                                <td nowrap class="text-center">
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#update-{{$item->id}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Üýtget">
                                        <i class="la la-edit"></i>
                                    </a>
                                    <form action="{{ route('user.destroy', $item->id) }}" method="POST"
                                          class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0)" onclick="if (confirm('{{$item->name}} {{$item->surname}} ulanyjyny pozmak isleýärsiňizmi?')) {this.parentElement.submit();}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Poz">
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
                                        <form action="{{route('user.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <div class="kt-radio-inline">
                                                        <label class="kt-radio">
                                                            <input type="radio" name="status" value="1" {{$item->status ? 'checked' : ''}}> Aktiw
                                                            <span></span>
                                                        </label>
                                                        <label class="kt-radio">
                                                            <input type="radio" name="status" value="0" {{!$item->status ? 'checked' : ''}}> Aktiw däl
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group form-control-update">
                                                    <label for="name-{{$item->id}}" class="form-control-label">Ady:</label>
                                                    <input type="text" class="form-control" id="name-{{$item->id}}" name="name" required value="{{ucwords($item->name)}}" placeholder="Ady">
                                                </div>
                                                <div class="form-group form-control-update">
                                                    <label for="surname-{{$item->id}}" class="form-control-label">Familiýasy:</label>
                                                    <input type="text" class="form-control" id="surname-{{$item->id}}" name="surname" value="{{ucwords($item->surname)}}" placeholder="Familiýasy">
                                                </div>
                                                <div class="form-group form-control-update">
                                                    <label for="phone-{{$item->id}}" class="form-control-label">Telefon belgisi:</label>
                                                    <input type="text" class="form-control" id="phone-{{$item->id}}" name="phone" value="{{$item->phone}}" placeholder="Telefon belgisi">
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
