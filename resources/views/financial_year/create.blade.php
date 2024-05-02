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
                                            <li class="breadcrumb-item"><a href="index.html">Doaba Foundation</a></li>
                                            <li class="breadcrumb-item active">Financial Year</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Financial Year</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title end breadcrumb -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body bpv-form finance-from">
                                        <form action="{{ route('financial.year.save') }}" method="post">
                                            @csrf
                                            <div class="form-inline">
                                                <div class="form-group">
                                                    <h6 class="light-dark w-100">Financial Year<span style="color: red">*</span></h6>
                                                    <input type="text" class="form-control" name="name" id="name" value="{{ !empty($fYear->name) ? $fYear->name : '' || old('name') }}"
                                                           placeholder="Enter Financial Year Name">

                                                    <input type="hidden" name="id" id="id" value="{{ isset($fYear->id) ? $fYear->id : '' }}" autocomplete="off" >

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h6 class="light-dark w-100">Select Date<span style="color: red">*</span></h6>
                                                <div class="input-daterange input-group" id="date-range">
                                                    <input type="text" class="form-control" name="start_date"
                                                           id="start_date" value="{{ isset($fYear->start_date) ? Carbon\Carbon::parse($fYear->start_date)->format('m/d/Y') : '' || old('start_date') }}"
                                                           placeholder="Starting Date" autocomplete="off"/>

                                                    <input type="text" class="form-control" name="end_date"
                                                           id="end_date" value="{{ !empty($fYear->end_date) ? Carbon\Carbon::parse($fYear->end_date)->format('m/d/Y') : '' || old('end_date') }}"
                                                           placeholder="Ending Date" autocomplete="off"/>
                                                </div>
                                                @error('start_date')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                                @error('end_date')
                                                <span class="invalid-feedback" role="alert" style="margin-left: 460px">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group button-items mb-0 text-right">
                                                <a href="{{ route('financial.year.list') }}" class="btn btn-outline-danger waves-effect waves-light">Cancel</a>
                                                @if(!empty($permission) && $permission->insert_access == 1 || Auth::user()->is_admin == 1)
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                            @if(!isset($fYear)) Save @else Update @endif
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
            </div><!-- container -->
        </div>
    </div> <!-- Page content Wrapper -->
@endsection