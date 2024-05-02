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
                                            <li class="breadcrumb-item active">List Of Banks</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">List Of Banks</h4>
                                </div>
                            </div>
                        </div>

            <!-- end page title end breadcrumb -->

                        <div class="form-group button-items mb-0 text-right">
                            <a href="{{ route('banks.create') }}" class="btn btn-primary waves-effect waves-light">Create Bank</a>
                        </div>
                        <br>



                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <form action="{{ route('bank.list') }}" method="get" id="form-search">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <h6 class="light-dark w-100">Bank Name</h6>
                                                            <input type="text" id="name" name="name"
                                                                   class="form-control" placeholder="Account Name"
                                                                   value="{{ request()->input('name') }}">
                                                            <span class="input-group-prepend">
                                                                {{--<button type="submit" class="btn btn-primary" disabled><i
                                                                            class="fa fa-search"></i></button>--}}
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <h6 class="light-dark w-100">Account Title
                                                            </h6>
                                                            <input type="text" id="account_title" name="account_title"
                                                                   class="form-control" placeholder="Account Title"
                                                                   value="{{ request()->input('account_title')  }}">
                                                            <span class="input-group-prepend">

                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <h6 class="light-dark w-100">Account Number
                                                            </h6>
                                                            <input type="text" id="account_number" name="account_number"
                                                                   class="form-control" placeholder="Account Number"
                                                                   value="{{ request()->input('account_number')  }}">
                                                            <span class="input-group-prepend">

                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <div class="form-group">
                                                            <span class="input-group-prepend" style="margin-top: 35px;">
                                                            <button type="submit" class="btn btn-primary" value="Search" id="search-button"><i
                                                                        class="fa fa-search"></i>&nbsp; Search</button>

                                                            </span>
                                                    </div>

                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                            <span class="input-group-prepend" style="margin-top: 35px">
                                                            <button type="submit" class="btn btn-primary" value="Search" id="clear-filter" style="margin-left: 10px">Clear Filter</button>

                                                            </span>
                                                    </div>

                                                </div>
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
                                    <th>Account No</th>
                                    <th>Name</th>
                                    <th>Account Title</th>
                                    <th>Branch Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($banks as $bank)
                                    <a href="{{ route('bank.edit',['id'=>$bank->id]) }}">
                                        <tr id="row_{{$bank->id}}">
                                            <th scope="row">{{ $bank->account_number }}</th>
                                            <th scope="row">{{ $bank->name }}</th>
                                            <td>{{ $bank->account_title }}</td>
                                            <td>{{ $bank->branch_name }}</td>
                                            <td>
                                                @if(!empty($permission->edit_access) && $permission->edit_access == 1 || Auth::user()->is_admin == 1)
                                                    <a href="{{ route('bank.edit',['id'=>$bank->id]) }}" title="Edit"><i class="fa fa-edit"></i></a>
                                                @endif
                                                    @if(!empty($permission->delete_access) && $permission->delete_access == 1 || Auth::user()->is_admin == 1)
                                                <a href="#" title="Delete"><i class="fa fa-trash-o delete" data-id="{{ $bank->id }}"></i></a>
                                                    @endif
                                            </td>
                                        </tr>
                                    </a>
                                @endforeach
                                </tbody>
                            </table>
                            <hr>

                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-end">
                                    {!! $banks->appends(request()->query())->links() !!}
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
                var bankId = $(this).data('id');
                bootbox.confirm("Do you really want to delete record?", function(result) {
                    if(result){
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: '{{ url('bank/delete') }}'+'/'+bankId,
                            type: 'DELETE',
                            data: { id:bankId },
                            success: function(response){
                                console.log(response);
                                if(response.success){
                                    $("#row_"+bankId).remove();
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

        $("#clear-filter").on('click', function () {
            $("#name").val('');
            $("#account_title").val('');
            $("#account_number").val('');
            $("#bank-search").submit();
        })
    </script>

@endsection
