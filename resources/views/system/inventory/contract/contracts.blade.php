@extends ('system.layouts.app')

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
            <div id="heading10" class="card-header"
                style="background-color:#1E9FF2;border-radius: 8px">
                <a data-toggle="collapse" href="" data-target="#accordion10"
                    aria-expanded="true" aria-controls="accordion10" class="card-title lead"
                    style="color:#FFFFFF;font-weight: 100">فرم ثبت قرارداد</a>
            </div>
            <div id="accordion10" data-parent="#accordionWrap1" 
                aria-labelledby="heading10" class="collapse show">
                <div class="card-body" style="padding: 15px">
                <div class="px-3">
                    <form class="form" action="{{route('ContractStore')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$contract->id ?? ''}}">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label>طرف قرارداد / خریدار</label>
                                        <div class="input-group">
                                            <select name="fk_customer" 
                                                class="form-control @error('fk_customer') is-invalid @enderror"
                                                value="{{$contract->fk_customer ?? ''}}">
                                                @foreach ($customers as $customer)
                                                    <option value="{{$customer->id}}"
                                                        {{ ((isset($contract)) &&
                                                            $contract->customer->id == $customer->id) 
                                                            ?
                                                                ' selected=""'
                                                            :
                                                                '' 
                                                        }}>
                                                        {{ $customer->name }}                                                        
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                    <div class="form-group">
                                        <label for="issueinput3">تاریخ عقد قرارداد</label>
                                        <input type="text" 
                                            class="form-control round addpo @error('date') is-invalid @enderror"
                                            id="dateOfContract"
                                            name="dateOfContract" readonly
                                            required
                                            value ="{{(isset($contract)) ? $contract->getdateJalali() : ''}}">
                                        <input id="date" name="date" type="hidden"                                            
                                            value = "{{(isset($contract)) ? $contract->getdateTimestamp() : ''}}">
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>نوع قطعه</label>
                                        <select name="fk_piece" class="form-control @error('fk_piece') is-invalid @enderror"
                                            value="{{$contract->fk_piece ?? ''}}"> 
                                            @foreach ($pieces as $piece)
                                                <option value="{{$piece->id}}"
                                                    {{ ((isset($contract)) && 
                                                        $contract->piece->id == $piece->id)
                                                    ?
                                                        'selected=""'
                                                    : 
                                                        ''
                                                    }}>
                                                    {{$piece->name}}
                                                </option>
                                            @endforeach       
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>قیمت تمام شده</label>
                                        <div class="input-group">
                                            <input type="text" 
                                                class="form-control @error('fixed_price') is-invalid @enderror"
                                                name="fixed_price" value="{{$contract->fixed_price ?? ''}}">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>قیمت فروش</label>
                                        <div class="input-group">
                                            <input type="text" 
                                                class="form-control @error('sales_price') is-invalid @enderror"
                                                name="sales_price" value="{{$contract->sales_price ?? ''}}">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>تیراژ</label>
                                        <div class="input-group">
                                            <input type="text" 
                                                class="form-control @error('circulation') is-invalid @enderror"
                                                name="circulation" value="{{$contract->circulation ?? ''}}">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">عدد</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>مبلغ کل قرارداد</label>
                                        <div class="input-group">
                                            <input type="text" 
                                                class="form-control @error('total_amount') is-invalid @enderror"
                                                name="total_amount" value="{{$contract->total_amount ?? ''}}">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">تومان</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>مبلغ پیش پرداخت</label>
                                        <div class="input-group">
                                            <input type="text" 
                                                class="form-control @error('prepayment') is-invalid @enderror"
                                                name="prepayment" value="{{$contract->prepayment ?? ''}}">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">تومان</span>
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
                                            style="width: 20px; font-size: 14px;">
                                            ردیف
                                        </th>
                                        <th class="sorting"
                                            style="width: 100px; font-size: 14px;">
                                            شماره قرارداد
                                        </th>
                                        <th class="sorting"
                                            style="width: 100px; font-size: 14px;">
                                            طرف قرارداد
                                        </th>
                                        <th class="sorting"
                                            style="width: 97px; font-size: 14px;">
                                            تاریخ عقد قرارداد
                                        </th>
                                        <th class="sorting"
                                            style="width: 70px; font-size: 14px;">
                                            نوع قطعه
                                        </th>
                                        <th class="sorting"
                                            style="width: 97px; font-size: 14px;">
                                            تعداد کل
                                        </th>
                                        <th class="sorting"
                                            style="width: 108px; font-size: 14px;">
                                            عملیات
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contracts as $key => $contract)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1"
                                                style="text-align: center;">
                                                {{$key+1}}
                                            </td>
                                            <td style="text-align: center;">
                                                {{$contract->contract_number}}
                                            </td>
                                            <td style="text-align: center;">
                                                {{$contract->Customer->name}}
                                            </td>
                                            <td style="text-align: center;">
                                                {{$contract->getdateJalali()}}
                                            </td>
                                            <td style="text-align: center;">
                                                {{$contract->Piece->name}}
                                            </td>
                                            <td style="text-align: center;">
                                                {{$contract->circulation}}
                                            </td>
                                            <td style="text-align: center;">
                                                <a href = "{{route('ContractEdit' , [$contract->id])}}"
                                                    class="btn btn-sm
                                                    btn-outline-info round mb-0" >ویرایش
                                                </a>
                                                <a href = "{{route('ContractDestroy' , [$contract->id])}}"
                                                    onclick="return confirm('آیا تمایل به حذف این قرارداد دارید ؟');"
                                                    class="btn btn-sm
                                                    btn-outline-danger round mb-0">حذف
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
@endsection

@section('footer')
    <script src="{{asset('js/persian-date.min.js')}}"></script>
    <script src="{{asset('js/persian-datepicker.js')}}"></script>
    <script>
        $(document).ready(function () {
            console.log("tdsdsjd");
        $("#dateOfContract").pDatepicker({
            initialValueType: 'persian',
            initialValue: false,
            format: 'YYYY/MM/DD',
            autoClose: true,
            altField: '#date',
            altFormat: 'X', //timestarmp
        });

        });
    </script>
@endsection