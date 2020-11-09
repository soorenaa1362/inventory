@extends('system.layouts.app')

@section('content')

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="card-title">لیست ورودی (مواد خام)</h4>
                    </div>
                </div>
            </div>
            <div class="card-body collapse show">
                <div class="card-block card-dashboard">
                    <p class="card-text"></p>
                    <div id="DataTables_10_wrapper"
                        class="dataTables_wrapper container-fluid dt-bootstrap4">
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
                                                مجموع 
                                            </td>
                                            <td colspan="2">
                                                {{$sum_weight_inputRawMaterial}} کیلوگرم
                                            </td>
                                        </tr>                                          
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Row -->
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

{{-- @include('system.inventory.contractor.partials.contractorOutputPiece' , ['']) --}}

<div class="col-lg-12 col-md-12">
    <div id="accordionWrap1" class="accordion">
        <div class="card collapse-icon accordion-icon-rotate"
            style="background-color:white;border-radius: 8px">
            <div id="heading6" class="card-header"
                style="background-color:#1E9FF2;border-radius: 8px">
                <a data-toggle="collapse" href="" data-target="#accordion6"
                    aria-expanded="true" aria-controls="accordion6" class="card-title lead"
                    style="color:#FFFFFF;font-weight: 100">فرم ثبت خروجی (قطعات تولید شده)</a>
            </div>
            <div id="accordion6" data-parent="#accordionWrap1" 
                aria-labelledby="heading6" class="collapse show">
                <div class="card-body" style="padding: 15px">
                <div class="px-3">
                    <form class="form" method="POST"
                        action="{{route('InventoryContractorContractOutputPiece' , [$contractorContract->id])}}">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="form-body">
                            <div class="row">                              
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>تاریخ</label>
                                        <input type="text" class="form-control round addpo"
                                            id="dateOfOutputPiece"
                                            name="dateOfOutputPiece" readonly
                                            required
                                            value=
                                                "">
                                        <input id="date_output_piece" name="date_output_piece" type="hidden"
                                            value=
                                                "">
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>مقدار خروجی</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                name="weight" value="">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">کیلوگرم</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>تعداد خروجی</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                name="number" value="">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">عدد</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3"></div>
                                <div class="col-md-4">
                                    <input type="submit"
                                        class="form-control round btn btn-success"
                                        value="ثبت و ارسال به بایگانی"
                                        style="margin-top: 15px;
                                        margin-bottom: 10px; color: #FFFFFF">
                                </div>
                                <div class="col-md-2">
                                    <input type="submit"
                                        class="form-control round btn btn-danger"
                                        value="لغو"
                                        style="margin-top: 15px;
                                        margin-bottom: 10px; color: #FFFFFF">
                                </div>
                                <div class="col-xl-3"></div>
                            </div>
                            <!-- End Row -->
                        </div>
                        <!-- End Form Body -->
                    </form>
                </div>
                </div>
                <!-- End Card Body -->
            </div>
            <!-- End Accordion10 -->
        </div>
        <!-- End Card -->
    </div>
    <!-- End accordionWrap1 -->
</div>
<!-- End Col lg 12 -->


<div class="col-lg-12">
    <div id="accordionWrap1" class="accordion">
        <div class="card collapse-icon accordion-icon-rotate"
            style="background-color:white;border-radius: 8px">
            <div id="heading7" class="card-header"
                style="background-color:#1E9FF2;border-radius: 8px">
                <a data-toggle="collapse" href="" data-target="#accordion7"
                    aria-expanded="true" aria-controls="accordion7" class="card-title lead"
                    style="color:#FFFFFF;font-weight: 100">لیست خروجی (قطعات تولید شده)</a>
            </div>
            <div id="accordion7" data-parent="#accordionWrap1"
                aria-labelledby="heading7" class="collapse show">
                <div class="card-body" style="padding: 15px">
                    <form>
                        <div class="row" style="padding-top: 10px">
                            <div class="col-md-12" style="text-align: center;">
                                <table class="table table-striped
                                    table-bordered comma-decimal-place dataTable"
                                    id="DataTables_Table_10" role="grid"
                                    aria-describedby="DataTables_Table_10_info">
                                    <thead style="text-align: center;">
                                        <tr role="row">
                                            <th class="sorting_asc"
                                                style="width: 30px; font-size: 13px;">
                                                ردیف
                                            </th>
                                            <th class="sorting"
                                                style="width: 50px; font-size: 13px;">
                                                تاریخ
                                            </th>
                                            <th class="sorting"
                                                style="width: 80px; font-size: 13px;">
                                                مقدار خروجی
                                            </th>
                                            <th class="sorting"
                                                style="width: 80px; font-size: 13px;">
                                                تعداد خروجی 
                                            </th>
                                            <th class="sorting"
                                                style="width: 200px; font-size: 13px;">
                                                عملیات
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($myContractorOutputPiece as $key => $contractorOutputPiece)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"
                                                    style="text-align: center;">
                                                    {{$key+1}}
                                                </td>
                                                <td style="text-align: center;">
                                                    {{$contractorOutputPiece->getdateJalali()}}
                                                </td>
                                                <td style="text-align: center;">
                                                    {{$contractorOutputPiece->weight}} کیلوگرم
                                                </td>
                                                <td style="text-align: center;">
                                                    {{$contractorOutputPiece->number}} عدد
                                                </td>
                                                <td style="text-align: center;">                                                
                                                    <a href=
                                                        ""
                                                        class="btn btn-sm
                                                        btn-outline-success round mb-0">ویرایش
                                                    </a>
                                                    <a href=
                                                        ""
                                                        class="btn btn-sm
                                                        btn-outline-danger round mb-0">حذف
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr class="group">
                                            {{-- <td colspan="3"></td> --}}
                                            <td colspan="2">
                                                مجموع خروجی ها
                                            </td>
                                            <td colspan="1">
                                                {{$sum_weight_output}} کیلوگرم
                                            </td>
                                            <td colspan="1">
                                                {{$sum_number_output}} عدد
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-8"></div>
                            <div class="col-3">
                                <a class="form-control round btn btn-info"
                                href="">
                                    مشاهده و چاپ
                                </a>
                            </div>
                            <div class="col-1"></div>                           
                        </div>
                        <!-- Row -->
                    </form>
                </div>
                <!-- End Card Body -->
            </div>
            <!-- End Accordion11 -->
        </div>
        <!-- End Card -->
    </div>
</div>
<!-- End Col 12 -->







@endsection

