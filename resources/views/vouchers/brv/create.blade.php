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
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="btn-group float-right">
                                    <ol class="breadcrumb hide-phone p-0 m-0">
                                        <li class="breadcrumb-item"><a href="#">Doaba Foundation</a></li>
                                        <li class="breadcrumb-item active">Create Bank Receipt Voucher</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Bank Receipt Voucher</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card m-b-30">
                                <div class="card-body bpv-form">
                                    <form action="{{ route('brv.save')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id" id="id"
                                               value="{{ isset($brv->id) ? $brv->id : '' }}"/>
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark">Select Project<span style="color: red">*</span></h6>
                                                <select class="select2 form-control mb-3 custom-select"
                                                        name="project_id" id="project_id"
                                                        style="width: 100%; height:36px;">
                                                    <option value="">Select</option>
                                                    @foreach( $dropDownData['projects'] as $key=>$value)
                                                        <option value="{{ $key }}" {{ (old("project_id") == $key ? "selected":"") || (!empty($brv->project_id) ? collect($brv->project_id)->contains($key) : '') ? 'selected':'' }}>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                                @error('project_id')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark">Select Bank<span style="color: red">*</span></h6>
                                                <select class="select2 form-control mb-3 custom-select" name="bank_id"
                                                        id="bank_id"
                                                        style="width: 100%; height:36px;">
                                                    <option value="">Select</option>
                                                    @foreach( $dropDownData['banks'] as $key=>$value)
                                                        <option value="{{ $key }}" {{ (old("bank_id") == $key ? "selected":"") || (!empty($brv->bank_id) ? collect($brv->bank_id)->contains($key) : '') ? 'selected':'' }}>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                                @error('bank_id')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">BRV#<span style="color: red">*</span></h6>
                                                <input type="text" class="form-control" name="brv_no" id="brv_no"
                                                       value="{{  old('brv_no', !empty($brv->brv_no) ? $brv->brv_no : '') }}"
                                                       placeholder="Enter BRV" maxlength="30">
                                                @error('brv_no')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-inline">
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Cheque No<span style="color: red">*</span></h6>
                                                <input type="text" class="form-control" name="cheque_no" id="cheque_no"
                                                       value="{{ old('cheque_no', !empty($brv->cheque_no) ? $brv->cheque_no : '') }}"
                                                       placeholder="Enter Cheque Number" maxlength="30">
                                                @error('cheque_no')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Account<span style="color: red">*</span></h6>
                                                <input type="text" class="form-control" name="account_no"
                                                       id="account_no"
                                                       value="{{ old('account_no', !empty($brv->account_no) ? $brv->account_no : '') }}"
                                                       placeholder="Enter Account" maxlength="30" >
                                                @error('account_no')
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
                                                       value="{{ old('amount', !empty($brv->amount) ? $brv->amount : '') }}"
                                                       placeholder="Enter Ammount" maxlength="15">
                                                @error('amount')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Received From</h6>
                                                <input type="text" class="form-control" name="paid_to" id="paid_to"
                                                       value="{{ old('paid_to', !empty($brv->paid_to) ? $brv->paid_to : '') }}"
                                                       placeholder="Enter Paid to" maxlength="70">
                                                @error('paid_to')
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
                                                    <input type="text" name="date" class="form-control"
                                                           value="{{ old('date', !empty($brv->date) ? \Carbon\Carbon::parse($brv->date )->format('d-m-Y') : '') }}"
                                                           placeholder="Select Date" readonly/>
                                                    @error('date')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Enter WHT</h6>
                                                <input type="text" class="form-control" name="wht" id="wht"
                                                       value="{{ old('wht', !empty($brv->wht) ? $brv->wht : '')  }}"
                                                       placeholder="Enter With Holding Tax" maxlength="70">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h6 class="light-dark w-100">Description</h6>
                                            <textarea id="textarea" class="form-control" name="description"
                                                      id="description" maxlength="225" rows="3"
                                                      placeholder="Enter Description">{{ old('description', !empty($brv->description) ? $brv->description : '') }}</textarea>
                                        </div>

                                            @include('common._attachments')
                                            @include('common._view_attachments')

                                        <div class="form-group button-items mb-0 text-right">
                                            <a href="{{ route('brv.list') }}" class="btn btn-outline-danger waves-effect waves-light">Cancel</a>
                                            @if(!empty($permission) && $permission->insert_access == 1 || Auth::user()->is_admin == 1)
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                @if(!isset($brv)) Save @else Update @endif
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
@endsection