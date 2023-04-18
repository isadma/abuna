@extends('layouts.app')

@section('title', $publication->index.' - '.$publication->name)

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
                    <h3 class="kt-subheader__title"> {{$publication->index}} - {{$publication->name}} </h3>

                    <span class="kt-subheader__separator kt-hidden"></span>
                    <div class="kt-subheader__breadcrumbs">
                        <a href="{{route('index')}}" class="kt-subheader__breadcrumbs-home"><i class="la la-home"></i></a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <span class="kt-subheader__breadcrumbs-link">
                            Neşirler
                        </span>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="{{route('publication.index')}}" class="kt-subheader__breadcrumbs-link">
                            Neşirleriň sanawy
                        </a>
                        <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            {{$publication->index}} - {{$publication->name}}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <!--Begin::Section-->
            <div class="row">
                <div class="col-xl-12">
                    <!--begin:: Widgets/Applications/User/Profile3-->
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-portlet__body">
                            <div class="kt-widget kt-widget--user-profile-3">
                                <div class="kt-widget__top">
                                    @if($publication->image)
                                        <div class="kt-widget__media kt-hidden-">
                                            <img src="{{asset($publication->image)}}" alt="image">
                                        </div>
                                    @else
                                        <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light">
                                            {{$publication->name ? ucfirst($publication->name[0]) : ""}}
                                        </div>
                                    @endif
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__head">
                                            <a href="#" class="kt-widget__username">
                                                {{$publication->name}}
                                                <i class="flaticon2-correct"></i>
                                            </a>
                                            <div class="kt-widget__action">
                                                <a href="{{route('publication.edit', $publication->id)}}" class="btn btn-brand btn-sm btn-upper">Üýtget</a>
                                            </div>
                                        </div>

                                        <div class="kt-widget__subhead">
                                            Indeksi:<a href="#"> {{$publication->index ? $publication->index : 'Indeks ýok'}} </a>
                                        </div>

                                        <div class="kt-widget__subhead">
                                            Esaslandyryjysy:  <a href="#">{{$publication->owner ? $publication->owner : 'Esaslandyryjy ýok'}} </a>
                                        </div>

                                        <div class="kt-widget__subhead">
                                            Görnüşi: <a href="#">{{$publication->type_id ? $publication->type->name : 'Görnüşi ýok'}} </a>
                                        </div>

                                        <div class="kt-widget__subhead">
                                            Goşulan senesi: <a href="#">{{date('d-m-y H:i', strtotime($publication->created_at))}} </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end:: Widgets/Applications/User/Profile3-->
                </div>
            </div>
            <!--End::Section-->

            <!--Begin::Section-->
            <div class="row">
                <div class="col-md-12">
                    <!--begin:: Widgets/User Progress -->
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Bahalary
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                                    <li class="nav-item">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#create" class="btn btn-brand btn-elevate btn-icon-sm">
                                            <i class="la la-plus"></i>
                                            Täze baha goş
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="createLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="createLabel">Täze baha</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <form action="{{route('period.store')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="publication" value="{{$publication->id}}">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label for="month" class="form-control-label">Aý:</label>
                                                        <select class="form-control" id="month" name="month" required>
                                                           @for($i=1; $i<=12; $i++)
                                                               <option value="{{$i}}">{{\App\Period::monthName($i)}}</option>
                                                           @endfor
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="year" class="form-control-label">Ýyl:</label>
                                                        <select class="form-control" id="year" name="year" required>
                                                            @for($i=date('Y')-2; $i<=date('Y')+2; $i++)
                                                                <option value="{{$i}}" {{date('Y') == $i ? 'selected' : ''}}>{{$i}}</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="sale_from" class="form-control-label">Başlanýan senesi:</label>
                                                        <input type="date" class="form-control" id="sale_from" name="sale_from" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="sale_to" class="form-control-label">Gutarýan senesi:</label>
                                                        <input type="date" class="form-control" id="sale_to" name="sale_to" required>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label for="price" class="form-control-label">Bahasy:</label>
                                                        <input type="number" min="0" step="0.001" class="form-control" id="price" name="price" placeholder="Bahasy" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Yza</button>
                                                <button type="submit" class="btn btn-primary">Goş</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                                <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Ady</th>
                                    <th>Aý</th>
                                    <th>Ýyl</th>
                                    <th>Başlanýan senesi</th>
                                    <th>Gutarýan senesi</th>
                                    <th>Bahasy</th>
                                    <th>Goşulan wagty</th>
                                    <th>Goşmaça</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($publication->periods->where('status', 1)->sortByDesc('id') as $period)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td>{{$publication->name}}</td>
                                        <td>{{$period->monthName($period->month)}}</td>
                                        <td>{{$period->year}}</td>
                                        <td>{{date('d-m-y', $period->sale_from)}}</td>
                                        <td>{{date('d-m-y', $period->sale_to)}}</td>
                                        <td>{{number_format($period->price, 3)}}</td>
                                        <td>{{date('d-m-y H:i', strtotime($period->created_at))}}</td>
                                        <td nowrap class="text-center">
                                            <a href="#" data-toggle="modal" data-target="#update-{{$period->id}}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Üýtget">
                                                <i class="la la-edit"></i>
                                            </a>
                                            <form action="{{ route('period.destroy', $period->id) }}" method="POST"
                                                  class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <a href="javascript:void(0)" onclick="if (confirm('Siz hakykatdanam {{$loop->iteration}} belgili bahany pozmak isleýäňizmi?')) {this.parentElement.submit();}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Poz">
                                                    <i class="la la-trash"></i>
                                                </a>
                                            </form>
                                        </td>
                                        <div class="modal fade" id="update-{{$period->id}}" tabindex="-1" role="dialog" aria-labelledby="updateLabel-{{$period->id}}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="updateLabel-{{$period->id}}">Üýtget</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <form action="{{route('period.update', $period)}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="id" value="{{$period->id}}">
                                                        <input type="hidden" name="publication" value="{{$publication->id}}">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="month-{{$period->id}}" class="form-control-label">Aý:</label>
                                                                    <select class="form-control" id="month-{{$period->id}}" name="month" required>
                                                                        @for($i=1; $i<=12; $i++)
                                                                            <option value="{{$i}}" {{$period->month == $i ? 'selected' : ''}}>{{\App\Period::monthName($i)}}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="year" class="form-control-label">Ýyl:</label>
                                                                    <select class="form-control" id="year" name="year" required>
                                                                        @for($i=date('Y')-2; $i<=date('Y')+2; $i++)
                                                                            <option value="{{$i}}" {{$period->year == $i ? 'selected' : ''}}>{{$i}}</option>
                                                                        @endfor
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="sale_from-{{$period->id}}" class="form-control-label">Başlanýan wagty:</label>
                                                                    <input type="date" class="form-control" id="sale_from-{{$period->id}}" name="sale_from" required value="{{date('Y-m-d', $period->sale_from)}}">
                                                                </div>
                                                                <div class="form-group col-md-6">
                                                                    <label for="sale_to-{{$period->id}}" class="form-control-label">Gutarýan wagty:</label>
                                                                    <input type="date" class="form-control" id="sale_to-{{$period->id}}" name="sale_to" required value="{{date('Y-m-d', $period->sale_to)}}">
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="price-{{$period->id}}" class="form-control-label">Bahasy:</label>
                                                                    <input type="number" min="0" step="0.001" class="form-control" id="price-{{$period->id}}" name="price" placeholder="Bahasy" required value="{{$period->price}}">
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
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end:: Widgets/User Progress -->
                </div>
            </div>
            <!--End::Section-->
        </div>
        <!-- end:: Content -->
    </div>

@endsection

@section('js')
    <script src="{{asset('assets/js/datatables.bundle.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/datatables-script.js')}}" type="text/javascript"></script>
@endsection
