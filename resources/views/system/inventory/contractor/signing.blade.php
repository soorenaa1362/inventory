
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
                    <div class="col-md-8">
                        <h4 class="card-title">قرارداد مورد نظر</h4>
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
                                            شماره قرارداد
                                        </th>
                                        <th class="sorting"
                                            style="width: 100px; font-size: 14px;">
                                            طرف قرارداد
                                        </th>
                                        <th class="sorting"
                                            style="width: 100px; font-size: 14px;">
                                            نوع قطعه
                                        </th>
                                        <th class="sorting"
                                            style="width: 100px; font-size: 14px;">
                                            تیراژ
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="odd">
                                        <td style="text-align: center;">
                                            {{$allocateContractor->Stage->Contract->contract_number}}    
                                        </td>
                                        <td style="text-align: center;">
                                            {{$allocateContractor->Stage->Contract->Customer->name}}    
                                        </td>
                                        <td style="text-align: center;">
                                            {{$allocateContractor->Stage->Contract->Piece->name}}    
                                        </td>
                                        <td style="text-align: center;">
                                            {{$allocateContractor->Stage->Contract->circulation}}    
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
</div>

<div class="container">
    @include('system.layouts.messages')
</div>
<div class="col-lg-12 col-md-12">
    <div id="accordionWrap1" class="accordion">
        <div class="card collapse-icon accordion-icon-rotate"
            style="background-color:white;border-radius: 8px">
            <div id="heading10" class="card-header"
                style="background-color:#1E9FF2;border-radius: 8px">
                <a data-toggle="collapse" href="" data-target="#accordion10"
                    aria-expanded="false" aria-controls="accordion10" class="card-title lead"
                    style="color:#FFFFFF;font-weight: 100">
                    فرم قرارداد تولید {{$allocateContractor->Stage->Contract->Piece->name}} 
                    با {{$allocateContractor->Contractor->name}}
                </a>
            </div>
            <div id="accordion10" data-parent="#accordionWrap1" aria-labelledby="heading10"
                class="collapse">
                <div class="card-body" style="padding: 15px">
                    <form action="{{route('ContractorContractStore' , [$allocateContractor->id])}}"
                        method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$contractorContract->id ?? ''}}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>تاریخ شروع</label>
                                    <input type="text" class="form-control @error('start_date') is-invalid @enderror round addpo"
                                        id="startdatefake"
                                        name="startdatefake" readonly required
                                        value=
                                            "{{(isset($contractorContract)) ? $contractorContract->getdateJalali() : ''}}">
                                            <input id="startdate" name="start_date" type="hidden"                                        
                                        value=
                                            "{{(isset($contractorContract)) ? $contractorContract->getdateTimestamp() : ''}}">
                                </div>
                            </div>                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>کارمزد واحد (تومان)</label>
                                    <input type="text" 
                                        class="form-control @error('unit_fee') is-invalid @enderror addpo"
                                        name="unit_fee"
                                        value="{{$contractorContract->unit_fee ?? ''}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>مقدار مواد اولیه لازم (کیلوگرم)</label>
                                    <input type="text" 
                                        class="form-control @error('raw_material') is-invalid @enderror addpo"
                                        name="raw_material"
                                        value="{{$contractorContract->raw_material ?? ''}}">
                                </div>
                            </div>
                            <div class="col-lg-3"></div>
                            <div class="col-md-6">
                                <input type="submit"
                                    class="form-control round btn btn-success"
                                    value="ثبت قرارداد با پیمانکار"
                                    style="color: #FFFFFF;margin-top: 34px;">
                            </div>
                            <div class="col-lg-3"></div>
                        </div>
                    </form>
                </div>
                <!-- End Card Body -->
            </div>
            <!-- End Accordion10 -->
        </div>
        <!-- End Card -->
    </div>
    <!-- End accordionWrap1 -->
</div>


<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <div class="row">
                    <div class="col-md-8">
                        <h4 class="card-title">مفاد قرارداد</h4>
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
                                            style="width: 97px; font-size: 14px;">
                                            تاریخ  شروع
                                        </th>
                                        <th class="sorting"
                                            style="width: 70px; font-size: 14px;">
                                            کارمزد واحد
                                        </th>
                                        <th class="sorting"
                                            style="width: 97px; font-size: 14px;">
                                            مقدار مواد اولیه لازم
                                        </th>
                                        <th class="sorting"
                                            style="width: 108px; font-size: 14px;">
                                            عملیات
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contractorContracts as $contractorContract)
                                        <tr role="row" class="odd">
                                            <td style="text-align: center;">
                                                {{$contractorContract->getdateJalali()}}
                                            </td>
                                            <td style="text-align: center;">
                                                {{$contractorContract->unit_fee}}
                                            </td>
                                            <td style="text-align: center;">
                                                {{$contractorContract->raw_material}}
                                            </td>
                                            <td style="text-align: center;">
                                                <a href = "{{route('ContractorContractDetails' , [$contractorContract->id])}}"
                                                    class="btn btn-sm
                                                    btn-outline-success round mb-0">
                                                    مشاهده جزییات
                                                </a>
                                                <a href = "{{route('ContractorContractEdit' , [$contractorContract->id])}}"
                                                    class="btn btn-sm
                                                    btn-outline-info round mb-0">
                                                    ویرایش
                                                </a>                                              
                                                <a href = "{{route('ContractorContractDestroy' , [$contractorContract->id])}}"
                                                    class="btn btn-sm
                                                    btn-outline-info round mb-0">
                                                    حذف
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
@endsection

@section('footer')
    <script src="{{asset('js/persian-date.min.js')}}"></script>
    <script src="{{asset('js/persian-datepicker.js')}}"></script>
    <script>
        $(document).ready(function () {
// Start Contractor Contract
            $("#startdatefake").pDatepicker({
                initialValueType: 'persian',
                initialValue: false,
                format: 'YYYY/MM/DD',
                autoClose: true,
                altField: '#startdate',
                altFormat: 'X', //timestarmp
            });
// End Contractor Contract
        });
    </script>
@endsection

