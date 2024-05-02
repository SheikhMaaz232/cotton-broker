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
                                            <li class="breadcrumb-item active">Organizational Documents</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Organizational Documents</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title end breadcrumb -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body bpv-form project-management donor-reg">
                                        <form action="{{ route('org-document.save') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" id="id" value="{{ isset($doc->id) ? $doc->id : ''  }}" autocomplete="off" >

                                            <div class="form-inline">
                                                <div class="form-group">
                                                    <h6 class="light-dark w-100">Date<span style="color: red">*</span></h6>
                                                    <div class="input-daterange input-group" id="date-range" name="date">
                                                        <input type="text" class="form-control" name="date"
                                                               value="{{ old('date', !empty($doc->date) ? \Carbon\Carbon::parse($doc->date )->format('d-m-Y') : '')  }}"
                                                               placeholder="Select Date" readonly/>
                                                        @error('date')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="form-inline">


                                                <div class="form-group">
                                                    <h6 class="light-dark">Select Department<span style="color: red">*</span></h6>
                                                    <select class="select2 form-control mb-3 custom-select"
                                                            name="department" id="department"
                                                            style="width: 100%; height:36px;">
                                                        <option value="">Select</option>
                                                        @foreach( $dropDownData['documentTypes'] as $key=>$value)
                                                            <option value="{{ $key }}" {{ (old("department") == $key ? "selected":"") || (!empty($doc->department) ? collect($doc->department)->contains($key) : '') ? 'selected':'' }}>{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('project_id')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <h6 class="light-dark">Select Sub Department<span style="color: red">*</span></h6>
                                                    <select class="select2 form-control mb-3 custom-select"
                                                            name="type" id="type"
                                                            style="width: 100%; height:36px;">
                                                        <option value="">Select</option>
                                                        @foreach( $dropDownData['documentSubTypes'] as $key=>$value)
                                                            <option value="{{ $key }}" {{ (old("type") == $key ? "selected":"") || (!empty($doc->type) ? collect($doc->type)->contains($key) : '') ? 'selected':'' }}>{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('project_id')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                                <div class="form-group">
                                                    <h6 class="light-dark w-100">Description</h6>
                                                    <textarea id="textarea" class="form-control" name="description" maxlength="225" rows="3" placeholder="Enter Description">{{@$doc->description}}</textarea>
                                                </div>
                                            @include('common._view_attachments')
                                            @include('common._attachments')
                                            <div class="form-group button-items mb-0 text-right">
                                                <a href="{{ route('govt-document.list') }}" class="btn btn-outline-danger waves-effect waves-light">Cancel</a>
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
    <script>
         $(document).ready(function(){
        var url = 
        $('#department').on('select2:select', function (e) {
            var departmentId = $(this).val();
            $.ajax({
                type: "GET",
                url: '{{ url('govt-document/type') }}' + '/' + departmentId,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function () {
                    $('#loading').css('display', 'block');
                },
                success: function (response) {
                    $("#type").empty();
                    var len = 0;
                    if (response.data != null) {
                        len = response.data.length;
                    }
                    if (len>0) {
                        for (var i = 0; i<len; i++) {
                             var id = response.data[i].id;
                             var name = response.data[i].name;

                             var option = "<option value='"+id+"'>"+name+"</option>"; 

                             $("#type").append(option);
                        }
                    }
                },
                complete: function () {
                    $('#loading').css('display', 'none');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    if (jqXHR.status == 500) {
                        alert('Internal error: ' + jqXHR.responseText);
                    } else {
                        alert('Unexpected error.');
                    }
                }
            });
        });
     });
    </script>
    @endsection