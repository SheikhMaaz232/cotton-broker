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
                                            <li class="breadcrumb-item active">List Of Donors</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">List Of Donors</h4>
                                </div>
                            </div>
                        </div>

            <!-- end page title end breadcrumb -->

                        <div class="form-group button-items mb-0 text-right">
                            <a href="{{ route('donor.create') }}" class="btn btn-primary waves-effect waves-light">Create Donor</a>
                        </div>
                        <br>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <form action="{{ route('donor.list') }}" method="get">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <h6 class="light-dark w-100">Search Donor</h6>
                                                    <input type="text" id="name" name="name" class="form-control" placeholder="Search" value="{{ $name ? $name : '' }}">
                                                        <span class="input-group-prepend">
                                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                    {{--<div class="col-md-6">
                                        <div class="form-group">
                                            <h6 class="light-dark">Sort By</h6>
                                            <select name="order_by" id="order_by" class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;">
                                                <option value="">Select</option>
                                                <option value="name">Name</option>
                                                <option value="created_at">Created at</option>
                                            </select>
                                        </div>
                                    </div>--}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <table class="table table-hover subject-table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Focal Person</th>
                                    <th>Contact Number</th>
                                    <th>Email</th>
                                    <th>Website</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($donors as $donor)
                                    <tr id="row_{{$donor->id}}">
                                        <th scope="row">{{ $donor->name }}</th>
                                        <td>{{ $donor->focal_person }}</td>
                                        <td>{{ $donor->contact_number }}</td>
                                        <td>{{ $donor->email }}</td>
                                        <td>{{ $donor->website }}</td>
                                        <td>
                                            @if(!empty($permission->edit_access) && $permission->edit_access == 1 || Auth::user()->is_admin == 1)
                                                <a href="{{ route('donor.edit',['id'=>$donor->id]) }}" title="Edit"><i class="fa fa-edit"></i></a>
                                            @endif
                                                @if(!empty($permission->delete_access) && $permission->delete_access == 1 || Auth::user()->is_admin == 1)
                                                    <a href="#" title="Delete"><i class="fa fa-trash-o delete" data-id="{{ $donor->id }}"></i></a>
                                                @endif
                                            {{--<a href="#"><i class="fa fa-eye"></i></a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <hr>

                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-end">
                                    {!! $donors->appends(request()->query())->links() !!}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-7">
                    <div class="card m-b-30">

                    </div>
                </div>
            </div>



        </div><!-- container -->


    </div> <!-- Page content Wrapper -->

    </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.delete').click(function(){
                var el = this;
                var donorId = $(this).data('id');
                bootbox.confirm("Do you really want to delete record?", function(result) {
                    if(result){
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: '{{ url('donor/delete') }}'+'/'+donorId,
                            type: 'DELETE',
                            data: { id:donorId },
                            success: function(response){
                                console.log(response);
                                if(response.success){
                                    $("#row_"+donorId).remove();
                                    bootbox.alert(response.message);
                                }else if(response.error){
                                    bootbox.alert(response.error);
                                }
                            }
                        });
                    }
                });
            });
       });
    </script>

@endsection