@extends('layouts.app')
@section('content')
    <!-- Begin page -->
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
                                            <li class="breadcrumb-item active">Donor Registration</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Donor Registration</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title end breadcrumb -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body bpv-form project-management donor-reg">
                                        <form action="{{ route('donor.save') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" id="id" value="{{ isset($donor->id) ? $donor->id : ''  }}" autocomplete="off" >

                                            <div class="form-inline">
                                                <div class="form-group">
                                                    <h6 class="light-dark">Donor Name<span style="color: red">*</span></h6>
                                                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name', !empty($donor->name) ? $donor->name : '') }}" placeholder="Enter Donor Name">
                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <h6 class="light-dark">Donor Email<span style="color: red">*</span></h6>
                                                    <input type="text" class="form-control" name="email" id="email" value="{{ old('email', !empty($donor->email) ? $donor->email : '') }}" placeholder="Enter Donor Email">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-inline">
                                                <div class="form-group">
                                                    <h6 class="light-dark w-100">Donor Phone<span style="color: red">*</span></h6>
                                                    <input type="text" class="form-control" name="contact_number" id="contact_number" value="{{ old('contact_number', !empty($donor->contact_number) ? $donor->contact_number : '')  }}" placeholder="Enter Donor Phone">
                                                    @error('contact_number')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <h6 class="light-dark w-100">Focal Person<span style="color: red">*</span></h6>
                                                    <input type="text" class="form-control" name="focal_person" id="focal_person" value="{{ old('focal_person', !empty($donor->focal_person) ? $donor->focal_person : '')  }}" placeholder="Enter Focal Person Name">
                                                    @error('focal_person')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-inline">
                                                <div class="form-group">
                                                    <h6 class="light-dark w-100">Postal Address<span style="color: red">*</span></h6>
                                                    <input type="text" class="form-control" name="postal_address" id="postal_address" value="{{ old('postal_address', !empty($donor->postal_address) ? $donor->postal_address : '')  }}" placeholder="Enter Postal Address">

                                                </div>

                                                    <div class="form-group">
                                                        <h6 class="light-dark w-100">Website<span style="color: red">*</span></h6>
                                                        <input type="text" class="form-control" name="website" id="website" value="{{ old('website', !empty($donor->website) ? $donor->website : '')  }}" placeholder="Enter Website">
                                                        @error('website')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            <div class="form-group button-items mb-0 text-right">
                                                <a href="{{ route('donor.list') }}" class="btn btn-outline-danger waves-effect waves-light">Cancel</a>
                                                @if(!empty($permission) && $permission->insert_access == 1 || Auth::user()->is_admin == 1)
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">@if(!isset($donor)) Save @else Update @endif</button>
                                                    @endif
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>



                    </div><!-- container -->


                </div> <!-- Page content Wrapper -->

            </div> <!-- content -->
    </div>
    </div>
    <!-- END wrapper -->

    @endsection