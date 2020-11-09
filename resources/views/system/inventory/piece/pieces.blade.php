@extends('system.layouts.app')

@section('content')
<!-- Create Piece : Start -->
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
                    style="color:#FFFFFF;font-weight: 100">فرم ثبت قطعه</a>
            </div>
            <div id="accordion10" data-parent="#accordionWrap1"
                aria-labelledby="heading10" class="collapse show">
                <div class="card-body" style="padding: 15px">
                    <div class="px-3">
                        <form class="form" method="post"
                            action="{{route('PieceStore')}}">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <input type="hidden" name='id'
                                            value="{{$piece->id ?? ''}}">
                                        <fieldset class="form-group">
                                            <label>نام قطعه</label>
                                            <input type="text"
                                            class="form-control round @error('name') is-invalid @enderror" name="name"
                                            value="{{$piece->name ?? ''}}">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label>نوع جنس</label>
                                            <input type="text"
                                            class="form-control round @error('material') is-invalid @enderror" name="material"
                                            value="{{$piece->material ?? ''}}">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label>وزن (گرم)</label>
                                            <input type="text"
                                            class="form-control round @error('weight') is-invalid @enderror" name="weight"
                                            value="{{$piece->weight ?? ''}}">
                                        </fieldset>
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
                    <!-- End PX 3 -->
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
<!-- Create Piece : End -->

<!-- List Piece : Start -->
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="card-title">لیست قطعات</h4>
                    </div>
                </div>
            </div>
            <div class="card-body collapse show">
                <div class="card-block card-dashboard">
                    <p class="card-text"></p>
                    <div id="DataTables_10_wrapper"
                        class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-sm-12">
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
                                                نام قطعه
                                            </th>
                                            <th class="sorting"
                                                style="width: 100px; font-size: 14px;">
                                                نوع جنس
                                            </th>
                                            <th class="sorting"
                                                style="width: 97px; font-size: 14px;">
                                                وزن (گرم)
                                            </th>
                                            <th class="sorting" 
                                                style="width: 108px; font-size: 14px;">
                                                عملیات
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pieces as $key => $piece)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"
                                                    style="text-align: center;">
                                                    {{$key+1}}
                                                </td>
                                                <td style="text-align: center;">
                                                    {{$piece->name}}
                                                </td>
                                                <td style="text-align: center;">
                                                    {{$piece->material}}
                                                </td>
                                                <td style="text-align: center;">
                                                    {{$piece->weight}}
                                                </td>
                                                <td style="text-align: center;">
                                                    <a href = "{{route('PieceEdit' , [$piece->id])}}"
                                                        class="btn btn-sm
                                                        btn-outline-info round mb-0" >
                                                        ویرایش
                                                    </a>
                                                    <a href = "{{route('PieceDestroy' , [$piece->id])}}"
                                                        onclick="return confirm('آیا تمایل به حذف این قطعه دارید ؟');"
                                                        class="btn btn-sm
                                                        btn-outline-danger round mb-0">
                                                        حذف
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Col Sm 12 -->
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
<!-- List Piece : End -->    
@endsection