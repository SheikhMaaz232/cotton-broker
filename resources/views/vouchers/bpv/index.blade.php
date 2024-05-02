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
                                            <li class="breadcrumb-item active">List Of Bank Payment Vouchers</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">List Of Bank Payment Vouchers</h4>
                                </div>
                            </div>
                        </div>
                        <div class="form-group button-items mb-0 text-right">
                            <a href="{{ route('bpv.create') }}" class="btn btn-primary waves-effect waves-light">Create
                                Bank Payment Voucher</a>
                        </div>
                        <br>
                        <!-- end page title end breadcrumb -->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <form action="{{ route('bpv.list') }}" method="get" id="form-search">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <div class="input-group">
                                                            <h6 class="light-dark w-100">Voucher No</h6>
                                                            <input type="text" id="voucher_no" name="voucher_no"
                                                                   class="form-control" placeholder="Voucher No"
                                                                   value="{{ request()->input('voucher_no') }}">
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
                                                            <h6 class="light-dark w-100">Paid To
                                                                </h6>
                                                            <input type="text" id="paid_to" name="paid_to"
                                                                   class="form-control" placeholder="Paid To"
                                                                   value="{{ request()->input('paid_to')  }}">
                                                            <span class="input-group-prepend">

                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <h6 class="light-dark">Sort By</h6>
                                                        <select name="order_by" id="order_by"
                                                                class="select2 form-control mb-3 custom-select"
                                                                style="width: 100%; height:36px;">
                                                            <option value="">Select</option>
                                                            <option value="bpv_no" <?php if(isset($_GET["order_by"]) && $_GET["order_by"]=="bpv_no") { echo " selected"; } ?> >Voucher No</option>
                                                            <option value="created_at" <?php if(isset($_GET["order_by"]) && $_GET["order_by"]=="created_at") { echo " selected"; } ?>>Voucher Date</option>
                                                        </select>

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
                                                    <th>VR#</th>
                                                    <th>Project Name</th>
                                                    <th>Date</th>
                                                    <th>Bank Name</th>
                                                    <th>Paid To</th>
                                                    <th>Amount</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                @foreach($bpvData as $bpv)
                                                    <tr id="row_{{$bpv->id}}">
                                                        <td>{{ $bpv->bpv_no }}</td>
                                                        <td width="300">{{ $bpv->project->name }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($bpv->date)->format('d-m-Y') }}</td>
                                                        <td>{{ $bpv->bank->name }}</td>
                                                        <td>{{ $bpv->paid_to }}</td>
                                                        <td>{{ number_format($bpv->amount,2) }}</td>
                                                        <td>
                                                            @if(!empty($permission->edit_access) && $permission->edit_access == 1 || Auth::user()->is_admin == 1)
                                                                <a href="{{ route('bpv.edit',['id'=>$bpv->id]) }}" title="Edit"><i
                                                                            class="fa fa-edit"></i></a>
                                                            @endif
                                                            @if(!empty($permission->delete_access) && $permission->delete_access == 1 || Auth::user()->is_admin == 1)
                                                                <a href="#" title="Delete"><i class="fa fa-trash-o delete"
                                                                               data-id="{{ $bpv->id }}"></i></a>
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
                                                {!! !empty($bpvData) ? $bpvData->appends(request()->query())->render() : '' !!}
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
        $(document).ready(function () {
            $('.delete').click(function () {
                var bpvId = $(this).data('id');
                bootbox.confirm("Do you really want to delete record?", function (result) {
                    if (result) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: '{{ url('bpv/delete') }}' + '/' + bpvId,
                            type: 'DELETE',
                            data: {id: bpvId},
                            success: function (response) {
                                console.log(response);
                                if (response.success) {
                                    $("#row_" + bpvId).remove();
                                    bootbox.alert(response.message);
                                } else if (response.error) {
                                    bootbox.alert(response.error);
                                }
                            }
                        });
                    }
                });
            });
        });

        $("#clear-filter").on('click', function () {
            $("#voucher_no").val('');
            $("#paid_to").val('');
            $("#order_by").val('');
            $("#form-search").submit();
        })
    </script>

@endsection