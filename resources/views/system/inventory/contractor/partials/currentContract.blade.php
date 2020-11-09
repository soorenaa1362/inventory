<div class="col-lg-12 col-md-12">
    <div id="accordionWrap1" class="accordion">
        <div class="card collapse-icon accordion-icon-rotate"
            style="background-color:white;border-radius: 8px">
            <div id="heading1" class="card-header"
                style="background-color:#1E9FF2;border-radius: 8px">
                <a data-toggle="collapse" href="" data-target="#accordion1"
                    aria-expanded="false" aria-controls="accordion1" class="card-title lead"
                    style="color:#FFFFFF;font-weight: 100">جزییات قرارداد جاری ({{$repository}})</a>
            </div>
            <div id="accordion1" data-parent="#accordionWrap1" 
                aria-labelledby="heading1" class="collapse">
                <div class="card-body" style="padding: 15px">
                    <div class="col-12">
                        <div class="card">
                            <form>
                                <div class="row">
                                    <div class="col-xl-2 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="disabledInput">شماره قرارداد</label>
                                            <input type="text" class="form-control round"
                                            id="readonlyInput" readonly="readonly"
                                            value="{{$allocateContractor->Stage->Contract->contract_number}}">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="disabledInput">نام پیمانکار</label>
                                            <input type="text" class="form-control round"
                                            id="readonlyInput" readonly="readonly"
                                            value="{{$allocateContractor->Contractor->name}}">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-3 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="disabledInput">تاریخ شروع</label>
                                            <input type="text" class="form-control round"
                                            id="readonlyInput" readonly="readonly"
                                            value="{{$contractorContract->getdateJalali()}}">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="disabledInput">نوع قطعه</label>
                                            <input type="text" class="form-control round"
                                            id="readonlyInput" readonly="readonly"
                                            value="{{$allocateContractor->Stage->Contract->Piece->name}}">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="disabledInput">کارمزد واحد پیمانکار</label>
                                            <input type="text" class="form-control round"
                                            id="readonlyInput" readonly="readonly"
                                            value="{{$contractorContract->unit_fee}} تومان">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="disabledInput">مجموع کارمزد پیمانکار</label>
                                            <input type="text" class="form-control round"
                                            id="readonlyInput" readonly="readonly"
                                            value="{{$totalUnitFee}} تومان">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="disabledInput">تیراژ تولید</label>
                                            <input type="text" class="form-control round"
                                            id="readonlyInput" readonly="readonly"
                                            value="{{$allocateContractor->Stage->Contract->circulation}} عدد">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="disabledInput">
                                            مقدار مواد اولیه لازم(مواد خام)
                                            </label>
                                            <input type="text" class="form-control round"
                                            id="readonlyInput" readonly="readonly"
                                            value="{{$contractorContract->raw_material}} کیلوگرم">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="disabledInput">
                                            ورودی به این انبار(مواد خام)
                                            </label>
                                            <input type="text" class="form-control round"
                                            id="readonlyInput" readonly="readonly"
                                            value="{{$sum_weight_inputRawMaterial ?? ''}} کیلوگرم">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="disabledInput">
                                            مقدار ورودی (قطعات تولید شده)
                                            </label>
                                            <input type="text" class="form-control round"
                                            id="readonlyInput" readonly="readonly"
                                            value=" کیلوگرم">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="disabledInput">
                                            تعداد ورودی (قطعات تولید شده)
                                            </label>
                                            <input type="text" class="form-control round"
                                            id="readonlyInput" readonly="readonly"
                                            value="عدد">
                                        </fieldset>
                                    </div>
                                    
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="disabledInput">
                                            مجموع قطعات خروجی از این انبار
                                            </label>
                                            <input type="text" class="form-control round"
                                            id="readonlyInput" readonly="readonly"
                                            value="{{$sum_number_outputPiece}} عدد">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="disabledInput">
                                            مجموع قطعات سالم
                                            </label>
                                            <input type="text" class="form-control round"
                                            id="readonlyInput" readonly="readonly"
                                            value=" عدد">
                                        </fieldset>
                                    </div>
                                    <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                                        <fieldset class="form-group">
                                            <label for="disabledInput">
                                            مجموع قطعات ناسالم
                                            </label>
                                            <input type="text" class="form-control round"
                                            id="readonlyInput" readonly="readonly"
                                            value=" عدد">
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- End Card -->
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

