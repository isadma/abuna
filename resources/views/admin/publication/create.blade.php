@extends('layouts.app')

@section('title', 'Täze neşir')

@section('css-import')
    <link href="{{asset('assets/css/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('css')
    <link href="{{asset('assets/css/wizard-4.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title"> Täze neşir </h3>

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
                            Täze neşir
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="kt-wizard-v4" id="kt_user_add_user" data-ktwizard-state="step-first">
                <div class="kt-portlet">
                    <div class="kt-portlet__body kt-portlet__body--fit">
                        <div class="kt-grid">
                            <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">

                                <!--begin: Form Wizard Form-->
                                <form class="kt-form" id="kt_user_add_form" action="{{route('publication.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <!--begin: Form Wizard Step 1-->
                                    <div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                        <div class="kt-heading kt-heading--md">Neşiriň maglumatlary:</div>
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-wizard-v4__form">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="kt-section__body">
                                                            <div class="form-group row">
                                                                <label for="image" class="col-xl-3 col-lg-3 col-form-label">Suraty</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control @error('image') is-invalid @enderror" type="file" accept="image/*" name="image" id="image" required>
                                                                </div>
                                                                @error('image')
                                                                <div class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="index" class="col-xl-3 col-lg-3 col-form-label">Indeksi</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control @error('index') is-invalid @enderror" type="number" min="0" name="index" id="index" value="{{old('index')}}" placeholder="Neşiriň indeksi" required>
                                                                </div>
                                                                @error('index')
                                                                <div class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="name" class="col-xl-3 col-lg-3 col-form-label">Ady</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{old('name')}}" placeholder="Neşiriň ady" required>
                                                                </div>
                                                                @error('name')
                                                                    <div class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="owner" class="col-xl-3 col-lg-3 col-form-label">Esaslandyryjysy</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div class="typeahead">
                                                                        <input dir="ltr" class="form-control @error('owner') is-invalid @enderror" type="text" name="owner" id="owner" value="{{old('owner')}}" placeholder="Neşiriň esaslandyryjysy" required>
                                                                    </div>
                                                                </div>
                                                                @error('owner')
                                                                <div class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="type" class="col-xl-3 col-lg-3 col-form-label">Görnüşi</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <select class="form-control" id="type" name="type" required>
                                                                        @foreach($types as $type)
                                                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                @error('type')
                                                                <div class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--begin: Form Actions -->
                                    <div class="kt-form__actions">
                                        <button type="submit" class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
                                            Goş
                                        </button>
                                    </div>

                                    <!--end: Form Actions -->
                                </form>

                                <!--end: Form Wizard Form-->
                            </div>
                        </div>
                    </div>
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
        jQuery(document).ready(function () {
            var a, t, o, n, i, s;
            var e = [
                @foreach($owners as $item) '{{$item}}', @endforeach
            ];
            $("#owner").typeahead({
                hint: !0,
                highlight: !0,
                minLength: 1
            },
                {
                name: "owner", source: (a = e, function (e, t) {
                    var o;
                    o = [], substrRegex = new RegExp(e, "i"), $.each(a, function (e, a) {
                        substrRegex.test(a) && o.push(a)
                    }), t(o)
                })
            });
        });
    </script>
@endsection
