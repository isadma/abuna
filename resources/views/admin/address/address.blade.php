@extends('layouts.app')

@section('title', 'Adresler')

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
                    <h3 class="kt-subheader__title"> Adresler </h3>

                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="{{route('index')}}" class="kt-subheader__breadcrumbs-home"><i class="la la-home"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <span class="kt-subheader__breadcrumbs-link">
                            Adres
                        </span>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="{{route('address.index')}}" class="kt-subheader__breadcrumbs-link">
                            Adresler
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
                                    <path d="M5,10.5 C5,6 8,3 12.5,3 C17,3 20,6.75 20,10.5 C20,12.8325623 17.8236613,16.03566 13.470984,20.1092932 C12.9154018,20.6292577 12.0585054,20.6508331 11.4774555,20.1594925 C7.15915182,16.5078313 5,13.2880005 5,10.5 Z M12.5,12 C13.8807119,12 15,10.8807119 15,9.5 C15,8.11928813 13.8807119,7 12.5,7 C11.1192881,7 10,8.11928813 10,9.5 C10,10.8807119 11.1192881,12 12.5,12 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                            </svg>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            Adresler
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    <form id="formUpdate" action="{{route('address.store')}}" method="post">
                        @csrf
                        <div class="kt-form kt-form--label-right kt-margin-b-20">
                            <div class="row align-items-center">
                                <div class="col-md-12 order-2 order-xl-1">
                                    <div class="row align-items-center">
                                        <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                            <div class="form-group">
                                                <label for="branch">Şahamçalar</label>
                                                <select id="branch" name="branch" class="form-control" required>
                                                    <option value="" disabled selected> - </option>
                                                    @foreach($branches as $branch)
                                                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 kt-margin-b-20-tablet-and-mobile">
                                            <div class="form-group">
                                                <label for="street">Köçe</label>
                                                <input type="text" id="street" name="street" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-md-2 kt-margin-b-20-tablet-and-mobile">
                                            <div class="form-group">
                                                <label for="home">Öý</label>
                                                <input type="text" id="home" name="home" class="form-control">
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
                    <form id="formProduct">
                        <div class="kt-form kt-form--label-right kt-margin-b-20">
                            <div class="row align-items-center">
                                <div class="col-md-12 order-2 order-xl-1">
                                    <div class="row align-items-center">
                                        <div class="col-md-5 kt-margin-b-20-tablet-and-mobile">
                                            <div class="form-group">
                                                <label for="branchSearch">Şahamçalar</label>
                                                <select id="branchSearch" name="branch" class="form-control" required>
                                                    <option value="" disabled selected> - </option>
                                                    @foreach($branches as $branch)
                                                        <option value="{{$branch->id}}" {{ request()->get('branch') == $branch->id ? "selected":""}}>{{$branch->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-5 kt-margin-b-20-tablet-and-mobile">
                                            <div class="form-group">
                                                <label for="streetSearch">Köçe</label>
                                                <input type="text" minlength="2" id="streetSearch" name="street" class="form-control" required value="{{request()->get('street')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-2 kt-margin-b-20-tablet-and-mobile">
                                            <button type="submit" class="btn btn-block btn-outline-brand"> Gözle</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Şahamça</th>
                            <th>Köçe</th>
                            <th>Öý</th>
                            <th>Goşulan senesi</th>
                            <th>Goşmaça</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($addresses as $item)
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td>{{$item->branch->name}}</td>
                                <td>{{$item->street}}</td>
                                <td>{{$item->home}}</td>
                                <td style="width: 120px;">{{date('d-m-y H:i', strtotime($item->created_at))}}</td>
                                <td nowrap class="text-center">
                                    <a href="#" data-toggle="modal" data-target="#update-{{$item->id}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Üýtget">
                                        <i class="la la-edit"></i>
                                    </a>
                                    <form action="{{ route('address.destroy', $item->id) }}" method="POST"
                                          class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <a href="javascript:void(0)" onclick="if (confirm('Siz hakykatdanam {{ $item->street}}, {{ $item->home}} adresi pozmak isleýäňizmi?')) {this.parentElement.submit();}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Poz">
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
                                        <form action="{{route('address.update', $item)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label for="branch-{{$item->id}}" class="form-control-label select">Şahamça:</label>
                                                        <select class="form-control" id="branch-{{$item->id}}" name="branch" required>
                                                            @foreach($branches as $branch)
                                                                <option value="{{$branch->id}}" {{$item->branch_id == $branch->id ? 'selected' : ''}}>{{$branch->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="street-{{$item->id}}" class="form-control-label">Köçe:</label>
                                                        <input type="text" class="form-control" id="street-{{$item->id}}" name="street" placeholder="Köçe" required value="{{$item->street}}">
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="home-{{$item->id}}" class="form-control-label">Öý:</label>
                                                        <input type="text" class="form-control" id="home-{{$item->id}}" name="home" placeholder="Öý" value="{{$item->home}}">
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
            $('#branch').select2();
            $('#branchSearch').select2();
        });
    </script>
@endsection
