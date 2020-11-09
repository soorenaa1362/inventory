@extends('system.layouts.app')

@section('header')
    <link rel="stylesheet" type="text/css" href="{{asset('css/persian-datepicker.css')}}">
@endsection

@section('content')

{{-- <div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title">پارت آماده برای تفکیک</h4>
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
                                        <th class="sorting"
                                            style="width: 100px; font-size: 14px;">
                                            تاریخ دریافت
                                        </th>
                                        <th class="sorting"
                                            style="width: 100px; font-size: 14px;">
                                            مقدار
                                        </th>
                                        <th class="sorting"
                                            style="width: 100px; font-size: 13px;">
                                            تعداد
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td style="text-align: center;">
                                            {{$contractorOutputPiece->getdateJalali()}}    
                                        </td>
                                        <td style="text-align: center;">
                                            {{$contractorOutputPiece->weight}}    
                                        </td>
                                        <td style="text-align: center;">
                                            {{$contractorOutputPiece->number}}    
                                        </td>
                                    </tr>                                    
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
</div> --}}
    
<div class="col-lg-12 col-md-12">
    <div id="accordionWrap1" class="accordion">
        <div class="card collapse-icon accordion-icon-rotate"
            style="background-color:white;border-radius: 8px">
            <div id="heading12" class="card-header"
                style="background-color:#1E9FF2;border-radius: 8px">
                <a data-toggle="collapse" href="" data-target="#accordion12"
                    aria-expanded="true" aria-controls="accordion12" class="card-title lead"
                    style="color:#FFFFFF;font-weight: 100">فرم جداسازی قطعات</a>
            </div>
            <div id="accordion12" data-parent="#accordionWrap1" 
                aria-labelledby="heading12" class="collapse show">
                <div class="card-body" style="padding: 15px">
                <div class="px-3">
                    <form class="form" method="POST"
                        action="">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="form-body">
                            <div class="row">                                 
                                <div class="col-xl-4">
                                    <fieldset class="form-group">
                                        <label>وزن کل قطعات</label>
                                        <input type="text" class="form-control" id="readonlyInput" 
                                        readonly="readonly" value="">
                                    </fieldset>
                                </div> 
                                <div class="col-xl-4">
                                    <fieldset class="form-group">
                                        <label>تعداد کل قطعات</label>
                                        <input type="text" class="form-control" id="readonlyInput" 
                                        readonly="readonly" value="">
                                    </fieldset>
                                </div> 
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>تاریخ</label>
                                        <input type="text" class="form-control round addpo"
                                            id="dateOfSeparation"
                                            name="dateOfSeparation" readonly
                                            required
                                            value=
                                                "">
                                        <input id="date_of_separation" name="date_of_separation" type="hidden"
                                            value=
                                                "">
                                    </div>
                                </div> 
                                                                                           
                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label>مقدار سالم</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                name="healthy_weight" value="">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">کیلوگرم</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label>تعداد سالم</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                name="healthy_number" value="">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">عدد</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label>مقدار ناسالم</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                name="unhealthy_weight" value="">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">کیلوگرم</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3">
                                    <div class="form-group">
                                        <label>تعداد ناسالم</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control"
                                                name="unhealthy_number" value="">
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
            <div id="heading11" class="card-header"
                style="background-color:#1E9FF2;border-radius: 8px">
                <a data-toggle="collapse" href="" data-target="#accordion11"
                    aria-expanded="true" aria-controls="accordion11" class="card-title lead"
                    style="color:#FFFFFF;font-weight: 100">لیست قطعات تفکیک شده</a>
            </div>
            <div id="accordion11" data-parent="#accordionWrap1"
                aria-labelledby="heading11" class="collapse show">
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
                                            <th class="sorting_asc" tabindex="0"
                                                aria-controls="DataTables_Table_10"
                                                rowspan="1" colspan="1"
                                                aria-sort="ascending"
                                                aria-label="تعداد ناسالم
                                                activate to sort column descending"
                                                style="width: 30px; font-size: 13px;">
                                                ردیف
                                            </th>
                                            <th class="sorting_asc" tabindex="0"
                                                aria-controls="DataTables_Table_10"
                                                rowspan="1" colspan="1"
                                                aria-sort="ascending"
                                                aria-label="تعداد ناسالم
                                                activate to sort column descending"
                                                style="width: 100px; font-size: 13px;">
                                                تاریخ
                                            </th>
                                            <th class="sorting_asc" tabindex="0"
                                                aria-controls="DataTables_Table_10"
                                                rowspan="1" colspan="1"
                                                aria-sort="ascending"
                                                aria-label="تعداد ناسالم
                                                activate to sort column descending"
                                                style="width: 100px; font-size: 13px;">
                                                مقدار سالم
                                            </th>
                                            <th class="sorting_asc" tabindex="0"
                                                aria-controls="DataTables_Table_10"
                                                rowspan="1" colspan="1"
                                                aria-sort="ascending"
                                                aria-label="تعداد ناسالم
                                                activate to sort column descending"
                                                style="width: 100px; font-size: 13px;">
                                                تعداد سالم
                                            </th>
                                            <th class="sorting_asc" tabindex="0"
                                                aria-controls="DataTables_Table_10"
                                                rowspan="1" colspan="1"
                                                aria-sort="ascending"
                                                aria-label="تعداد ناسالم
                                                activate to sort column descending"
                                                style="width: 100px; font-size: 13px;">
                                                مقدار ناسالم
                                            </th>
                                            <th class="sorting_asc" tabindex="0"
                                                aria-controls="DataTables_Table_10"
                                                rowspan="1" colspan="1"
                                                aria-sort="ascending"
                                                aria-label="تعداد ناسالم
                                                activate to sort column descending"
                                                style="width: 100px; font-size: 13px;">
                                                تعداد ناسالم
                                            </th>
                                            <th class="sorting_asc" tabindex="0"
                                                aria-controls="DataTables_Table_10"
                                                rowspan="1" colspan="1"
                                                aria-sort="ascending"
                                                aria-label="تعداد ناسالم
                                                activate to sort column descending"
                                                style="width: 100px; font-size: 13px;">
                                                عملیات
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($contractorSeparations as $key => $contractorSeparation)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"
                                                    style="text-align: center; font-size: 14px;">
                                                    {{$key+1}}
                                                </td>
                                                <td style="text-align: center; font-size: 14px;">
                                                    {{$contractorSeparation->getdateJalali()}}
                                                </td>
                                                <td style="text-align: center; font-size: 14px;">
                                                    {{$contractorSeparation->healthy_weight}}
                                                </td>
                                                <td style="text-align: center; font-size: 14px;">
                                                    {{$contractorSeparation->healthy_number}}
                                                </td>
                                                <td style="text-align: center; font-size: 14px;">
                                                    {{$contractorSeparation->unhealthy_weight}}
                                                </td>
                                                <td style="text-align: center; font-size: 14px;">
                                                    {{$contractorSeparation->unhealthy_number}}
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href=
                                                        ""
                                                        class="btn btn-sm
                                                        btn-outline-success round mb-0" >
                                                        ویرایش
                                                    </a>
                                                    <a href=
                                                        ""
                                                        class="btn btn-sm
                                                        btn-outline-danger round mb-0">
                                                        حذف
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr class="group">                                            
                                            <td colspan="3" style="font-size: 15px;">
                                                <br>
                                                کل موجودی
                                            </td>
                                            <td colspan="6">
                                                کیلوگرم
                                                <br> 
                                                <br>
                                                عدد
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-7"></div>
                            <div class="col-4">
                                
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

@section('footer')
    <script src="{{asset('js/persian-date.min.js')}}"></script>
    <script src="{{asset('js/persian-datepicker.js')}}"></script>
    <script>

        $(document).ready(function () {

// Start Contractor Input Raw Material

            $("#dateOfSeparation").pDatepicker({
                initialValueType: 'persian',
                initialValue: false,
                format: 'YYYY/MM/DD',
                autoClose: true,
                altField: '#date_of_separation',
                altFormat: 'X', //timestarmp
            });

// End Contractor Input Raw Material

        });

    </script>

@endsection