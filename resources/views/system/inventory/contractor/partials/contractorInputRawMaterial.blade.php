@extends('system.layouts.app')

@section('header')
    <link rel="stylesheet" type="text/css" href="{{asset('css/persian-datepicker.css')}}">
@endsection

@section('content')

<div class="container">
    @include('system.layouts.messages')
</div>

<div class="col-lg-12 col-md-12">
    <div id="accordionWrap1" class="accordion">
        <div class="card collapse-icon accordion-icon-rotate"
            style="background-color:white;border-radius: 8px">
            <div id="heading2" class="card-header"
                style="background-color:#1E9FF2;border-radius: 8px">
                <a data-toggle="collapse" href="" data-target="#accordion2"
                    aria-expanded="true" aria-controls="accordion2" class="card-title lead"
                    style="color:#FFFFFF;font-weight: 100">فرم ثبت ورودی (مواد خام)</a>
            </div>
            <div id="accordion2" data-parent="#accordionWrap1" 
                aria-labelledby="heading2" class="collapse show">
                <div class="card-body" style="padding: 15px">
                <div class="px-3">
                    <form class="form" method="POST" 
                        action="{{route('inputRawMaterialStore' , [$contractorContract->id])}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$inputRawMaterial->id ?? ''}}">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>تاریخ</label>
                                        <input type="text" 
                                            class="form-control @error('date_input_raw_material') is-invalid @enderror" round addpo"
                                            id="dateOfInputRawMaterial"
                                            name="dateOfInputRawMaterial" readonly
                                            required
                                            value = "{{(isset($inputRawMaterial)) ? $inputRawMaterial->getdateJalali() : ''}}">
                                        <input id="date_input_raw_material" name="date_input_raw_material" type="hidden"
                                            value = "{{(isset($inputRawMaterial)) ? $inputRawMaterial->getdateTimestamp() : ''}}">
                                    </div>
                                </div>  
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>مقدار ورودی</label>
                                        <div class="input-group">
                                            <input type="text" 
                                                class="form-control @error('weight') is-invalid @enderror"
                                                name="weight" value="{{$inputRawMaterial->weight ?? ''}}">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">کیلوگرم</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>نوع ماده خام</label>
                                        <select name="fk_rawMaterial" 
                                        class="form-control @error('fk_rawMaterial') is-invalid @enderror"
                                        value="{{$inputRawMaterial->fk_rawMaterial ?? ''}}"> 
                                            @foreach ($rawMaterials as $rawMaterial)
                                                <option value="{{$rawMaterial->id}}"
                                                    {{ ((isset($inputRawMaterial)) && 
                                                        $inputRawMaterial->rawMaterial->id == $rawMaterial->id)
                                                    ?
                                                        'selected=""'
                                                    : 
                                                        ''
                                                    }}>
                                                    {{$rawMaterial->name}}
                                                </option>
                                            @endforeach 
                                        </select>
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
            <div id="heading3" class="card-header"
                style="background-color:#1E9FF2;border-radius: 8px">
                <a data-toggle="collapse" href="" data-target="#accordion3"
                    aria-expanded="true" aria-controls="accordion3" class="card-title lead"
                    style="color:#FFFFFF;font-weight: 100">لیست ورودی (مواد خام)</a>
            </div>
            <div id="accordion3" data-parent="#accordionWrap1"
                aria-labelledby="heading3" class="collapse show">
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
                                            <th class="sorting" 
                                                style="width: 108px; font-size: 14px;">
                                                عملیات
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inputRawMaterials as $key => $inputRawMaterial)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"
                                                    style="text-align: center;">
                                                    {{$key+1}}
                                                </td>                                            
                                                <td style="text-align: center;">
                                                    {{$inputRawMaterial->getdateJalali()}}
                                                </td>
                                                <td style="text-align: center;">
                                                    {{$inputRawMaterial->weight}}
                                                </td> 
                                                <td style="text-align: center;">
                                                    {{$inputRawMaterial->RawMaterial->name}}
                                                </td>                                            
                                                <td style="text-align: center;">
                                                <a href = ""
                                                        class="btn btn-sm
                                                        btn-outline-info round mb-0" >
                                                        ویرایش
                                                    </a>
                                                    <a href = ""
                                                        class="btn btn-sm
                                                        btn-outline-danger round mb-0">
                                                        حذف
                                                    </a>
                                                </td>
                                            </tr>  
                                        @endforeach
                                        <tr class="group">
                                            {{-- <td colspan="3"></td> --}}
                                            <td colspan="2">
                                                مجموع ورودی ها
                                            </td>
                                            <td colspan="2">
                                                 کیلوگرم
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

@section('footer')
    <script src="{{asset('js/persian-date.min.js')}}"></script>
    <script src="{{asset('js/persian-datepicker.js')}}"></script>
    <script>

        $(document).ready(function () {

// Start Contractor Input Raw Material

            $("#dateOfInputRawMaterial").pDatepicker({
                initialValueType: 'persian',
                initialValue: false,
                format: 'YYYY/MM/DD',
                autoClose: true,
                altField: '#date_input_raw_material',
                altFormat: 'X', //timestarmp
            });

// End Contractor Input Raw Material

// Start Contractor Input Piece

            $("#dateOfInputPiece").pDatepicker({
                initialValueType: 'persian',
                initialValue: false,
                format: 'YYYY/MM/DD',
                autoClose: true,
                altField: '#date_input_piece',
                altFormat: 'X', //timestarmp
            });

// End Contractor Input Piece

        });

    </script>

@endsection


