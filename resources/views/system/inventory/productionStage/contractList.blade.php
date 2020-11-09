@extends('system.layouts.app')

@section('content')
<!-- Contract List : Start -->
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title">لیست قراردادها </h4>
                    </div>
                </div>
            </div>
            <div class="card-body collapse show">
                <div class="card-block card-dashboard">
                    <p class="card-text"></p>
                    <div id="DataTables_10_wrapper"
                        class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <table class="table table-striped
                                table-bordered comma-decimal-place dataTable"
                                id="DataTables_Table_10"
                                role="grid"
                                aria-describedby="DataTables_Table_10_info">
                                <thead style="text-align: center;">
                                    <tr role="row">
                                        <th class="sorting_asc"
                                            style="width: 50px; font-size: 13px;">
                                            ردیف
                                        </th>
                                        <th class="sorting"
                                            style="width: 100px; font-size: 13px;">
                                            شماره قرارداد
                                        </th>
                                        <th class="sorting"
                                            style="width: 100px; font-size: 13px;">
                                            طرف قرارداد
                                        </th>
                                        <th class="sorting"
                                            style="width: 150px; font-size: 13px;">
                                            تاریخ عقد قرارداد
                                        </th>
                                        <th class="sorting"
                                            style="width: 100px; font-size: 13px;">
                                            نوع قطعه
                                        </th>
                                        <th class="sorting"
                                            style="width: 100px; font-size: 13px;">
                                            تعداد کل
                                        </th>
                                        <th class="sorting"
                                            style="width: 100px; font-size: 13px;">
                                            عملیات
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contracts as $key => $contract)
                                        <tr role="row" class="odd">
                                            <td style="text-align: center; font-size:14px;">
                                                {{$key+1}}
                                            </td>
                                            <td style="text-align: center; font-size:14px;">
                                                {{$contract->contract_number}}
                                            </td>
                                            <td style="text-align: center; font-size:14px;">
                                                {{$contract->Customer->name}}
                                            </td>
                                            <td style="text-align: center; font-size:14px;">
                                                {{$contract->getdateJalali()}}
                                            </td>
                                            <td style="text-align: center; font-size:14px;">
                                                {{$contract->Piece->name}}
                                            </td>
                                            <td style="text-align: center; font-size:14px;">
                                                {{$contract->circulation}}
                                            </td>
                                            <td style="text-align: center;">
                                                <a href = "{{route('AllocateRepositories' , [$contract->id])}}"
                                                    class="btn btn-sm btn-outline-success round mb-0">
                                                    تعیین پروسه و ‌اختصاص انبار
                                                </a>                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- End Row -->
                        <div class="row">
                            <div class="col-sm-3"></div>
                        </div>
                        <!-- End Row -->
                    </div>
                    <!-- End Data Tables -->
                </div>
                <!-- End Card Block -->
            </div>
            <!-- End Card Body -->
        </div>
        <!-- End Card Header -->
    </div>
    <!-- End Card -->
</div>
<!-- End Col 12 -->
<!-- Contract List : End -->


@endsection