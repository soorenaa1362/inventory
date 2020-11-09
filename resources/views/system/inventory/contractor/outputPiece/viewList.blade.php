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
                        <h4 class="card-title">لیست خروجی (قطعات تولید شده)</h4>
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
                                                style="width: 108px; font-size: 14px;">
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
                                                    <button
                                                        class="btn btn-sm
                                                        btn-outline-success round mb-0" onclick="lineSeparationForm()">
                                                            جداسازی قطعات
                                                    </button>
                                                </td>
                                            </tr> 
                                        @endforeach
                                        <tr class="group">
                                            {{-- <td colspan="3"></td> --}}
                                            <td colspan="2">
                                                مجموع 
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
                                <button
                                    class="btn btn-sm
                                    form-control round btn btn-info mb-0" onclick="generalSeparationForm()">
                                        جداسازی قطعات
                                </button>
                            </div>
                            <div class="col-1"></div> 
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

<div class="col-xl-12" id="separation-form">

</div>    

@endsection

@section('footer')
    <script src="{{asset('js/persian-date.min.js')}}"></script>
    <script src="{{asset('js/persian-datepicker.js')}}"></script>

    
    <script>
        function lineSeparationForm() 
        {
            $(document).ready(function () {
                $("#dateOfSeparation").pDatepicker({
                    initialValueType: 'persian',
                    initialValue: false,
                    format: 'YYYY/MM/DD',
                    autoClose: true,
                    altField: '#date2',
                    altFormat: 'X', //timestarmp
                });
            });

            document.getElementById("separation-form").innerHTML=
            '<div class="col-lg-12 col-md-12">'
                +'<div id="accordionWrap1" class="accordion">'
                    +'<div class="card collapse-icon accordion-icon-rotate" style="background-color:white;border-radius: 8px">'
                        +'<div id="heading4" class="card-header" style="background-color:#1E9FF2;border-radius: 8px">'
                            +'<a data-toggle="collapse" href="" data-target="#accordion4" aria-expanded="true" aria-controls="accordion4" class="card-title lead" style="color:#FFFFFF;font-weight: 100">فرم تفکیک قطعات</a>'
                        +'</div>'
                        +'<div id="accordion4" data-parent="#accordionWrap1" aria-labelledby="heading4" class="collapse show">'
                            +'<div class="card-body" style="padding: 15px">'
                                +'<div class="px-3">'
                                    +'<form class="form" method="POST" action="">'
                                        +'@csrf'
                                        +'<input type="hidden" name="id" value="">'
                                        +'<div class="form-body">'
                                            +'<div class="row"> '                                                
                                                +'<div class="col-xl-4">'
                                                    +'<div class="form-group">'
                                                        +'<label> مقدار خروجی (کیلوگرم) </label>'
                                                        +'<div class="input-group">'
                                                            +'<input type="text" class="form-control"'
                                                                +'name="number" value=""'
                                                                +'readonly="">'
                                                        +'</div>'
                                                    +'</div>'
                                                +'</div>'
                                                +'<div class="col-xl-4">'
                                                    +'<div class="form-group">'
                                                        +'<label> تعداد خروجی (عدد) </label>'
                                                        +'<div class="input-group">'
                                                            +'<input type="text" class="form-control"'
                                                                +'name="number" value=""'
                                                                +'readonly="">'
                                                        +'</div>'
                                                    +'</div>'
                                                +'</div>'
                                                +'<div class="col-xl-4">'
                                                    +'<div class="form-group">'
                                                        +'<label>'
                                                        +'تاریخ جداسازی'
                                                        +'</label>'
                                                        +'<input type="text"'
                                                        +'class="form-control round addpo pwt-datepicker-input-element"'
                                                            +'id="dateOfSeparation" readonly="" required="" value="">'
                                                        +'<input id="date2" name="date_of_separation" type="hidden"'
                                                        +'value="">'
                                                    +'</div>'
                                                +'</div>'
                                                +'<div class="col-xl-3">'
                                                    +'<div class="form-group">'
                                                        +'<label> مقدار سالم </label>'
                                                        +'<div class="input-group">'
                                                            +'<input type="text" class="form-control"'
                                                                +'name="healthy_weight" value="">'
                                                            +'<div class="input-group-prepend">'
                                                                +'<span class="input-group-text">کیلوگرم</span>'
                                                            +'</div>'
                                                        +'</div>'
                                                    +'</div>'
                                                +'</div>'
                                                +'<div class="col-xl-3">'
                                                    +'<div class="form-group">'
                                                        +'<label> تعداد سالم </label>'
                                                        +'<div class="input-group">'
                                                            +'<input type="text" class="form-control"'
                                                                +'name="healthy_number" value="">'
                                                            +'<div class="input-group-prepend">'
                                                                +'<span class="input-group-text">عدد</span>'
                                                            +'</div>'
                                                        +'</div>'
                                                    +'</div>'
                                                +'</div>'                                                
                                                +'<div class="col-xl-3">'
                                                    +'<div class="form-group">'
                                                        +'<label> مقدار ناسالم </label>'
                                                        +'<div class="input-group">'
                                                            +'<input type="text" class="form-control"'
                                                                +'name="unhealthy_weight" value="">'
                                                            +'<div class="input-group-prepend">'
                                                                +'<span class="input-group-text">کیلوگرم</span>'
                                                            +'</div>'
                                                        +'</div>'
                                                    +'</div>'
                                                +'</div>'
                                                +'<div class="col-xl-3">'
                                                    +'<div class="form-group">'
                                                        +'<label> تعداد ناسالم </label>'
                                                        +'<div class="input-group">'
                                                            +'<input type="text" class="form-control"'
                                                                +'name="unhealthy_number" value="">'
                                                            +'<div class="input-group-prepend">'
                                                                +'<span class="input-group-text">عدد</span>'
                                                            +'</div>'
                                                        +'</div>'
                                                    +'</div>'
                                                +'</div>'                                                
                                                +'<div class="col-xl-3"></div>'
                                                    +'<div class="col-md-4">'
                                                        +'<input type="submit"'
                                                            +'class="form-control round btn btn-success"'
                                                            +'value="ثبت و ارسال به بایگانی"'
                                                            +'style="margin-top: 15px;'
                                                            +'margin-bottom: 10px; color: #FFFFFF">'
                                                    +'</div>'
                                                    +'<div class="col-md-2">'
                                                        +'<input type="submit"'
                                                            +'class="form-control round btn btn-danger"'
                                                            +'value="لغو"'
                                                            +'style="margin-top: 15px;'
                                                            +'margin-bottom: 10px; color: #FFFFFF">'
                                                    +'</div>'
                                                +'<div class="col-xl-3"></div>'
                                            +'</div>'
                                        +'</div>'
                                    +'</form>'
                                +'</div>'
                            +'</div>'
                        +'</div>'
                    +'</div>'
                +'</div>'
            +'</div>';
        }
    </script>


    <script>

        $(document).ready(function () {

            $("#dateOfSeparation").pDatepicker({
                initialValueType: 'persian',
                initialValue: false,
                format: 'YYYY/MM/DD',
                autoClose: true,
                altField: '#date2',
                altFormat: 'X', //timestarmp
            });

        });

    </script>

@endsection

