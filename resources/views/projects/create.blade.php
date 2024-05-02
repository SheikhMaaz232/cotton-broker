@extends('layouts.app')
@section('content')
    <div id="wrapper">
        <div class="content-page">
            <div class="content">
                <div class="page-content-wrapper ">
                    @if(session()->has('message'))
                        <div class="alert" style="background-color: #a9e8a8">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <div class="btn-group float-right">
                                        <ol class="breadcrumb hide-phone p-0 m-0">
                                            <li class="breadcrumb-item"><a href="#">Doaba Foundation</a></li>
                                            <li class="breadcrumb-item active">Project Registration</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Project Registration</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body bpv-form project-management">
                                        <form action="{{ route('project.save') }}" method="post" enctype='multipart/form-data'>
                                            @csrf
                                            <input type="hidden" name="id" id="id"
                                                   value="{{ isset($project->id) ? $project->id : '' }}"/>
                                            <div class="form-inline">
                                                {{--<div class="form-group">
                                                    <h6 class="light-dark">Select Financial Year*</h6>
                                                    <div class="input-daterange input-group" id="date-range">
                                                        <input type="text" class="form-control" name="start"
                                                               placeholder="Select Date"/>
                                                        <input type="text" class="form-control" name="end"
                                                               placeholder="End Date">
                                                    </div>
                                                </div>--}}
                                                <div class="form-group">
                                                    <h6 class="light-dark">Select Organization Name<span style="color: red">*</span></h6>
                                                    <select class="select2 form-control mb-3 custom-select"
                                                            name="company_id"
                                                            id="company_id"
                                                            style="width: 100%; height:36px;">
                                                        <option value="">Select</option>
                                                        @foreach( $dropDownData['companies'] as $key=>$value)
                                                            <option value="{{ $key }}" {{ (old("company_id") == $key ? "selected":"") || (!empty($project->company_id) ? collect($project->company_id)->contains($key) : '') ? 'selected':'' }}>{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('company_id')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-inline">
                                                <div class="form-group">
                                                    <h6 class="light-dark w-100">Project Name<span style="color: red">*</span></h6>
                                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', !empty($project->name) ? $project->name : '')  }}"
                                                           placeholder="Enter Project Name">

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <h6 class="light-dark w-100">Project Abbreviation<span style="color: red">*</span></h6>
                                                    <input type="text" class="form-control" name="abbreviation"
                                                           id="abbreviation" value="{{ old('abbreviation', !empty($project->abbreviation) ? $project->abbreviation : '')  }}" placeholder="Enter Project Abbreviation">
                                                    @error('abbreviation')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <h6 class="light-dark w-100">Project Code<span style="color: red">*</span></h6>
                                                    <input type="text" class="form-control" name="code" id="code" value="{{ old('code', !empty($project->code) ? $project->code : '')  }}"
                                                           placeholder="Enter Project Code">
                                                    @error('code')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-inline">
                                                <div class="form-group">
                                                    <h6 class="light-dark w-100">Donor Name<span style="color: red">*</span></h6>
                                                    <select class="select2 form-control mb-3 custom-select"
                                                            name="donor_id"
                                                            id="donor_id"
                                                            style="width: 100%; height:36px;">
                                                        <option value="">Select</option>
                                                        @foreach( $dropDownData['donors'] as $key=>$value)
                                                            <option value="{{ $key }}" {{ (old("donor_id") == $key ? "selected":"") || (!empty($project->donor_id) ? collect($project->donor_id)->contains($key) : '') ? 'selected':'' }}>{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('donor_id')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <h6 class="light-dark w-100">Estimated Cost</h6>
                                                    <input type="text" class="form-control" name="estimated_cost"
                                                           id="estimated_cost"  value="{{ old('estimated_cost', !empty($project->estimated_cost) ? $project->estimated_cost : '')  }}" placeholder="Enter Estimated Cost">
                                                </div>
                                            </div>

                                            <div class="form-inline">
                                                <div class="form-group">
                                                    <h6 class="light-dark w-100">Select Tentative Dates<span style="color: red">*</span></h6>
                                                    <div class="input-daterange input-group" id="date-range-2">
                                                        <input type="text" class="form-control"
                                                               name="tentative_start_date" id="tentative_start_date" value="{{ old('tentative_start_date', !empty($project->tentative_start_date) ? \Carbon\Carbon::parse($project->tentative_start_date)->format('d-m-Y') : '')  }}"
                                                               placeholder="Select Date"/>
                                                        <input type="text" class="form-control"
                                                               name="tentative_end_date" id="tentative_end_date" value="{{ old('tentative_end_date', !empty($project->tentative_end_date) ? \Carbon\Carbon::parse($project->tentative_end_date )->format('d-m-Y') : '')  }}"
                                                               placeholder="End Date">
                                                    </div>
                                                    @error('tentative_end_date')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <h6 class="light-dark w-100">Select Actual Dates<span style="color: red">*</span></h6>
                                                    <div class="input-daterange input-group" id="date-range-3">
                                                        <input type="text" class="form-control" name="actual_start_date"
                                                               id="actual_start_date"  value="{{ old('actual_start_date', !empty($project->actual_start_date) ? \Carbon\Carbon::parse($project->actual_start_date)->format('d-m-Y') : '')  }}" placeholder="Select Date"/>
                                                        <input type="text" class="form-control" name="actual_end_date"
                                                               id="actual_end_date" value="{{ old('actual_end_date', !empty($project->actual_end_date) ? \Carbon\Carbon::parse($project->actual_end_date)->format('d-m-Y') : '')  }}" placeholder="End Date">
                                                    </div>
                                                    @error('actual_end_date')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-inline">

                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Thamatic Area 1</h6>
                                                <select class="select2 form-control mb-3 custom-select"
                                                        name="thamatic_area_id_1"
                                                        id="thamatic_area_id1"
                                                        style="width: 100%; height:36px;">
                                                    <option value="">Select</option>
                                                    @foreach( $dropDownData['thamaticAreas'] as $key=>$value)
                                                        <option value="{{ $key }}" {{ (old("thamatic_area_id_1") == $key ? "selected":"") || (!empty($project->thamatic_area_id_1) ? collect($project->thamatic_area_id_1)->contains($key) : '') ? 'selected':'' }}>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                                <div class="form-group">
                                                    <h6 class="light-dark w-100">Thamatic Area 2</h6>
                                                    <select class="select2 form-control mb-3 custom-select"
                                                            name="thamatic_area_id_2"
                                                            id="thamatic_area_id2"
                                                            style="width: 100%; height:36px;">
                                                        <option value="">Select</option>
                                                        @foreach( $dropDownData['thamaticAreas'] as $key=>$value)
                                                            <option value="{{ $key }}" {{ (old("thamatic_area_id_2") == $key ? "selected":"") || (!empty($project->thamatic_area_id_2) ? collect($project->thamatic_area_id_2)->contains($key) : '') ? 'selected':'' }}>{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                    </div>
                                            <div class="form-inline">

                                                <div class="form-group">
                                                    <h6 class="light-dark w-100">Thamatic Area 3</h6>
                                                    <select class="select2 form-control mb-3 custom-select"
                                                            name="thamatic_area_id_3"
                                                            id="thamatic_area_id3"
                                                            style="width: 100%; height:36px;">
                                                        <option value="">Select</option>
                                                        @foreach( $dropDownData['thamaticAreas'] as $key=>$value)
                                                            <option value="{{ $key }}" {{ (old("thamatic_area_id_3") == $key ? "selected":"") || (!empty($project->thamatic_area_id_3) ? collect($project->thamatic_area_id_3)->contains($key) : '') ? 'selected':'' }}>{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <h6 class="light-dark w-100">Thamatic Area 4</h6>
                                                    <select class="select2 form-control mb-3 custom-select"
                                                            name="thamatic_area_id_4"
                                                            id="thamatic_area_id4"
                                                            style="width: 100%; height:36px;">
                                                        <option value="">Select</option>
                                                        @foreach( $dropDownData['thamaticAreas'] as $key=>$value)
                                                            <option value="{{ $key }}" {{ (old("thamatic_area_id_4") == $key ? "selected":"") || (!empty($project->thamatic_area_id_4) ? collect($project->thamatic_area_id_4)->contains($key) : '') ? 'selected':'' }}>{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-inline">

                                                <div class="form-group">
                                                    <h6 class="light-dark w-100">Thamatic Area 5</h6>
                                                    <select class="select2 form-control mb-3 custom-select"
                                                            name="thamatic_area_id_5"
                                                            id="thamatic_area_id5"
                                                            style="width: 100%; height:36px;">
                                                        <option value="">Select</option>
                                                        @foreach( $dropDownData['thamaticAreas'] as $key=>$value)
                                                            <option value="{{ $key }}" {{ (old("thamatic_area_id_5") == $key ? "selected":"") || (!empty($project->thamatic_area_id_5) ? collect($project->thamatic_area_id_5)->contains($key) : '') ? 'selected':'' }}>{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <h6 class="light-dark w-100">Thamatic Area 6</h6>
                                                    <select class="select2 form-control mb-3 custom-select"
                                                            name="thamatic_area_id_6"
                                                            id="thamatic_area_id6"
                                                            style="width: 100%; height:36px;">
                                                        <option value="">Select</option>
                                                        @foreach( $dropDownData['thamaticAreas'] as $key=>$value)
                                                            <option value="{{ $key }}" {{ (old("thamatic_area_id_6") == $key ? "selected":"") || (!empty($project->thamatic_area_id_6) ? collect($project->thamatic_area_id_6)->contains($key) : '') ? 'selected':'' }}>{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Remarks</h6>
                                                <textarea class="form-control" name="remarks"
                                                          id="remarks" maxlength="225" rows="3"
                                                          placeholder="Enter Description">{{ old('remarks', !empty($crv->remarks) ? $crv->remarks : '') }}</textarea>
                                            </div>

                                            @include('common._attachments')
                                            @include('common._view_attachments')

                                            <div class="form-group button-items mb-0 text-right">
                                                <a href="{{ route('project.list') }}" class="btn btn-outline-danger waves-effect waves-light">Cancel</a>
                                                @if(!empty($permission) && $permission->insert_access == 1 || Auth::user()->is_admin == 1)
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    @if(!isset($project)) Save @else Update @endif
                                                </button>
                                                    @endif
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection