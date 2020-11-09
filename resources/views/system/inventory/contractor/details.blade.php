@extends('system.layouts.app')

@section('header')
    <link rel="stylesheet" type="text/css" href="{{asset('css/persian-datepicker.css')}}">
@endsection

@section('content')

    @include('system.inventory.contractor.partials.currentContract' , [''])

    @include('system.inventory.contractor.partials.inventoryButtons' , [''])

    {{-- @include('system.inventory.contractor.partials.contractorInputRawMaterial' , ['']) --}}

    {{-- @include('system.inventory.contractor.partials.contractorInputPiece' , ['']) --}}

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
