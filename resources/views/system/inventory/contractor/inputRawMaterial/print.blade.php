@extends('system.layouts.app')

@section('header')
    <link rel="stylesheet" type="text/css" href="{{asset('css/persian-datepicker.css')}}">
@endsection

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="card-title">لیست ورودی های مواد اولیه</h4>
                    </div>
                </div>
            </div>
            <div class="card-body collapse show">
                <div class="card-block card-dashboard">
                    <p class="card-text"></p>
                    <div id="DataTables_10_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row" style="padding-top: 10px">
                            <div class="col-md-12" style="text-align: center;">
                                <table class="table table-striped
                                    table-bordered comma-decimal-place dataTable"
                                    id="DataTables_Table_10" role="grid"
                                    aria-describedby="DataTables_Table_10_info">
                                    <thead style="text-align: center;">
                                        <tr role="row">
                                            <th class="sorting_asc"
                                                style="width: 20px; font-size: 14px;">
                                                ردیف
                                            </th>
                                            <th class="sorting"
                                                style="width: 100px; font-size: 14px;">
                                                تاریخ
                                            </th>
                                            <th class="sorting"
                                                style="width: 100px; font-size: 14px;">
                                                مقدار ورودی
                                            </th> 
                                            <th class="sorting"
                                                style="width: 100px; font-size: 14px;">
                                                نوع مواد خام
                                            </th> 
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($myContractorInputRawMaterial as $key => $contractorInputRawMaterial)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"
                                                    style="text-align: center;">
                                                    {{$key+1}}
                                                </td>                                            
                                                <td style="text-align: center;">
                                                    {{$contractorInputRawMaterial->getdateJalali()}}
                                                </td>
                                                <td style="text-align: center;">
                                                    {{$contractorInputRawMaterial->weight}} کیلوگرم
                                                </td> 
                                                <td style="text-align: center;">
                                                    {{$contractorInputRawMaterial->RawMaterial->name}}
                                                </td>
                                            </tr>
                                        @endforeach 
                                        <tr class="group">
                                            {{-- <td colspan="3"></td> --}}
                                            <td colspan="2">
                                                مجموع ورودی ها
                                            </td>
                                            <td colspan="2">
                                                {{$sum_weight_inputRawMaterial}} کیلوگرم
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                            <div class="col-8"></div>
                            <div class="col-3">
                                <a href=
                                ""
                                class="form-control round btn btn-info">
                                    چاپ 
                                </a>
                            </div>
                            <div class="col-1"></div> 
                        </div>
                        <!-- Row -->
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

@endsection





