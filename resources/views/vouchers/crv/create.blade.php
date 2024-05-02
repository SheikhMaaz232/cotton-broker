@extends('layouts.app')
@section('content')
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Start right Content here -->
        <div class="content-page">
            <!-- Start content -->
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
                                        <li class="breadcrumb-item active">Cash Receipt Voucher</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Cash Receipt Voucher</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-b-30">
                                <div class="card-body bpv-form">
                                    <form action="{{ route('crv.save')}}" method="post"  enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" id="id"
                                               value="{{ isset($crv->id) ? $crv->id : '' }}"/>
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark">Select Project<span style="color: red">*</span></h6>
                                                <select class="select2 form-control mb-3 custom-select"
                                                        name="project_id" id="project_id"
                                                        style="width: 100%; height:36px;">
                                                    <option value="">Select</option>
                                                    @foreach( $dropDownData['projects'] as $key=>$value)
                                                        <option value="{{ $key }}" {{ (old("project_id") == $key ? "selected":"") || (!empty($crv->project_id) ? collect($crv->project_id)->contains($key) : '') ? 'selected':'' }}>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                                @error('project_id')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">CRV#<span style="color: red">*</span></h6>
                                                <input type="text" class="form-control" name="crv_no" id="crv_no"
                                                       value="{{  old('crv_no', !empty($crv->crv_no) ? $crv->crv_no : '') }}"
                                                       placeholder="Enter CRV Number" maxlength="30">
                                                @error('crv_no')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Budget Code<span style="color: red">*</span></h6>
                                                <input type="text" class="form-control" name="account"
                                                       id="account"
                                                       value="{{ old('account', !empty($crv->account) ? $crv->account : '') }}"
                                                       placeholder="Enter Account" maxlength="30" >
                                                @error('account')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Amount<span style="color: red">*</span></h6>
                                                <input type="text" class="form-control" name="amount" id="amount"
                                                       value="{{ old('amount', !empty($crv->amount) ? $crv->amount : '') }}"
                                                       placeholder="Enter Ammount" maxlength="15">
                                                @error('amount')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Received From<span style="color: red">*</span></h6>
                                                <input type="text" class="form-control" name="received_from" id="received_from"
                                                       value="{{ old('received_from', !empty($crv->received_from) ? $crv->received_from : '') }}"
                                                       placeholder="Enter Received From" maxlength="70">
                                                @error('received_from')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Date<span style="color: red">*</span></h6>
                                                <div class="input-daterange input-group" id="date-range">
                                                    <input type="text" class="form-control"  name="date"
                                                           value="{{ old('date', !empty($crv->date) ? \Carbon\Carbon::parse($crv->date )->format('d-m-Y') : '')  }}"
                                                           placeholder="Select Date" readonly/>
                                                </div>
                                                @error('date')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Enter WHT</h6>
                                                <input type="text" class="form-control" name="wht" id="wht"
                                                       value="{{ old('wht', !empty($crv->wht) ? $crv->wht : '')  }}"
                                                       placeholder="Enter With Holding Tax" maxlength="70">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h6 class="light-dark w-100">Description</h6>
                                            <textarea id="textarea" class="form-control" name="description"
                                                      id="description" maxlength="225" rows="3"
                                                      placeholder="Enter Description">{{ old('description', !empty($crv->description) ? $crv->description : '') }}</textarea>
                                        </div>

                                            @include('common._attachments')
                                            @include('common._view_attachments')

                                        <div class="form-group button-items mb-0 text-right">
                                            <a href="{{ route('crv.list') }}" class="btn btn-outline-danger waves-effect waves-light">Cancel</a>
                                            @if(!empty($permission) && $permission->insert_access == 1 || Auth::user()->is_admin == 1)

                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                @if(!isset($crv)) Save @else Update @endif
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