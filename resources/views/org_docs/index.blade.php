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
                                            <li class="breadcrumb-item active">List of Organizational Documents</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">List Of Organizational Documents</h4>
                                </div>
                            </div>
                        </div>

            <!-- end page title end breadcrumb -->

                        <div class="form-group button-items mb-0 text-right">
                            <a href="{{ route('org-document.create') }}" class="btn btn-primary waves-effect waves-light">Create Document</a>
                        </div>
                        <br>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <form action="{{ route('org-document.list') }}" method="get">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <h6 class="light-dark w-100">Search Document</h6>
                                                    <input type="text" id="descripton" name="descripton" class="form-control" placeholder="Search" value="{{ request()->input('descripton') }}">
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
                                    <th>Date</th>
                                    <th>Document</th>
                                    <th>Document Sub Type</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $count = 0; @endphp
                                @foreach($documents as $doc)
                                        <tr id="row_{{$doc->id}}">
                                            <th scope="row">{{  \Carbon\Carbon::parse($doc->date)->format('d-m-Y') }}</th>
                                            <td>{{ $doc['getDepartment']->name }}</td>
                                            <td>{{ $doc['getDepartmentSubType']->name }}</td>
                                            <td>{{ $doc->description }}</td>
                                            <td>
                                                @if(!empty($permission->edit_access) && $permission->edit_access == 1 || Auth::user()->is_admin == 1)
                                                    <a href="{{ route('org-document.edit',['id'=>$doc->id]) }}" title="Edit"><i class="fa fa-edit"></i></a>
                                                @endif
                                                    @if(!empty($permission->delete_access) && $permission->delete_access == 1 || Auth::user()->is_admin == 1)
                                                        <a href="#" title="Delete"><i class="fa fa-trash-o delete" data-id="{{ $doc->id }}"></i></a>
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
                                    {!! $documents->appends(request()->query())->links() !!}
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
                var documentId = $(this).data('id');
                bootbox.confirm("Do you really want to delete record?", function(result) {
                    if(result){
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: '{{ url('org-document/delete') }}'+'/'+documentId,
                            type: 'DELETE',
                            data: { id:documentId },
                            success: function(response){
                                console.log(response);
                                if(response.success){
                                    $("#row_"+documentId).remove();
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