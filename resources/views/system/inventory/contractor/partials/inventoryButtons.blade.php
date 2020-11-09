<!-- Start The Buttons Card -->
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title-wrap bar-success">
                <div class="row">
                    <div class="col-md-9">
                        <h4 class="card-title">جزییات انبار</h4>
                    </div>
                </div>
            </div>
            <div class="card-body collapse show">
                <div class="card-block card-dashboard">
                    <p class="card-text"></p>
                    <div id="DataTables_10_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        <div class="row">
                            <div class="col-lg-4">
                                <a class="btn btn-info btn-lg btn-block"
                                href = "{{route('ContractorInputRawMaterial' , [$contractorContract->id])}}">
                                    ورودی (مواد خام)
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a class="btn btn-success btn-lg btn-block"
                                href = "{{route('ContractorInputPiece' , [$contractorContract->id])}}">
                                    ورودی (قطعات تولید شده)
                                </a>
                            </div>
                            <div class="col-lg-4">
                                <a class="btn btn-warning btn-lg btn-block"
                                href = "">
                                    خروجی انبار
                                </a>
                            </div>
                        </div>
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
<!-- End The Buttons Card -->
