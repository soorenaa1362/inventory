@extends('system.layouts.app')

@section('header')
    <link rel="stylesheet" type="text/css" href="{{asset('css/persian-datepicker.css')}}">
@endsection

@section('content')

<div class="col-lg-12 col-md-12">
    <div id="accordionWrap1" class="accordion">
        <div class="card collapse-icon accordion-icon-rotate"
            style="background-color:white;border-radius: 8px">
            <div id="heading4" class="card-header"
                style="background-color:#1E9FF2;border-radius: 8px">
                <a data-toggle="collapse" href="" data-target="#accordion4"
                    aria-expanded="true" aria-controls="accordion4" class="card-title lead"
                    style="color:#FFFFFF;font-weight: 100">فرم تفکیک قطعات</a>
            </div>
            <div id="accordion4" data-parent="#accordionWrap1" 
                aria-labelledby="heading4" class="collapse show">
                <div class="card-body" style="padding: 15px">
                <div class="px-3">
                    <form class="form" method="POST"
                    action="">
                        @csrf
                        <input type="hidden" name="id" value="">
                        <div class="form-body">
                            <div class="row">                              
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label for="issueinput3">تاریخ</label>
                                        <input type="text" class="form-control round addpo"
                                            id="dateOfInputPiece"
                                            name="dateOfInputPiece" readonly
                                            required
                                            value=
                                                "">
                                        <input id="date_input_piece" name="date_input_piece" type="hidden"
                                            value=
                                                "">
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="form-group">
                                        <label>مقدار ورودی</label>
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
                                        <label>تعداد ورودی</label>
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

@endsection

@section('footer')
    <script src="{{asset('js/persian-date.min.js')}}"></script>
    <script src="{{asset('js/persian-datepicker.js')}}"></script>
    <script>

        $(document).ready(function () {

// Start Contractor Output Piece

            $("#dateOfOutputPiece").pDatepicker({
                initialValueType: 'persian',
                initialValue: false,
                format: 'YYYY/MM/DD',
                autoClose: true,
                altField: '#date_output_piece',
                altFormat: 'X', //timestarmp
            });

// End Contractor Output Piece

        });

    </script>

@endsection