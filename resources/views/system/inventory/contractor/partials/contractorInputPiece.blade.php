
<div class="col-lg-12 col-md-12">
    <div id="accordionWrap1" class="accordion">
        <div class="card collapse-icon accordion-icon-rotate"
            style="background-color:white;border-radius: 8px">
            <div id="heading4" class="card-header"
                style="background-color:#1E9FF2;border-radius: 8px">
                <a data-toggle="collapse" href="" data-target="#accordion4"
                    aria-expanded="true" aria-controls="accordion4" class="card-title lead"
                    style="color:#FFFFFF;font-weight: 100">فرم ثبت ورودی (قطعات تولید شده)</a>
            </div>
            <div id="accordion4" data-parent="#accordionWrap1" 
                aria-labelledby="heading4" class="collapse show">
                <div class="card-body" style="padding: 15px">
                <div class="px-3">
                    <form class="form" method="POST"
                action="{{route('InventoryContractorContractInputPiece' , [$contractorContract->id])}}">
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


<div class="col-lg-12">
    <div id="accordionWrap1" class="accordion">
        <div class="card collapse-icon accordion-icon-rotate"
            style="background-color:white;border-radius: 8px">
            <div id="heading5" class="card-header"
                style="background-color:#1E9FF2;border-radius: 8px">
                <a data-toggle="collapse" href="" data-target="#accordion5"
                    aria-expanded="true" aria-controls="accordion5" class="card-title lead"
                    style="color:#FFFFFF;font-weight: 100">لیست ورودی (قطعات تولید شده)</a>
            </div>
            <div id="accordion5" data-parent="#accordionWrap1"
                aria-labelledby="heading5" class="collapse show">
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
                                                style="width: 50px; font-size: 14px;">
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
                                                style="width: 100px; font-size: 13px;">
                                                تعداد ورودی
                                            </th>
                                            <th class="sorting"
                                                style="width: 200px; font-size: 14px;">
                                                عملیات
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($myContractorInputPiece as $key => $contractorInputPiece)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1"
                                                    style="text-align: center;">
                                                    {{$key+1}}
                                                </td>
                                                <td style="text-align: center;">
                                                    {{$contractorInputPiece->getdateJalali()}}
                                                </td>
                                                <td style="text-align: center;">
                                                    {{$contractorInputPiece->weight}} کیلوگرم
                                                </td>
                                                <td style="text-align: center;">
                                                    {{$contractorInputPiece->number}} عدد
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
                                                مجموع  ورودی ها
                                            </td>
                                            <td colspan="1">
                                                {{$sum_weight_inputPiece}}کیلوگرم
                                            </td>
                                            <td colspan="1">
                                                {{$sum_number_inputPiece}}عدد
                                            </td>
                                        </tr>                                                                           
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-8"></div>
                            <div class="col-3">
                                <a class="form-control round btn btn-info"
                                    href="{{route('InventoryContractorContractInputPieceViewList' , [$contractorContract->id])}}">
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



