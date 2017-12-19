@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('title')
<title>Create a Brand</title>
@endsection

@section('main_container')

<div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">

        <div class="x_panel">
          <div class="x_title">
            <h2>Brand</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
              </button>
              {!!Session::get('message')!!}
            </div>
      			@endif
            <br />
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <!-- <table id="example" class="display" cellspacing="0" width="100%"> -->
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th style="width:30%">Profile</th>
                  <th>Date Created</th>
                  {{-- @if(Auth::user()->adminOrCurrentUserOwns($brands)) --}}
                  <th>Edit</th>
                  {{-- @endif --}}
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($brands->chunk(3) as $chunk)
                @foreach($chunk as $brand)
                <tr>
                  <td>{{ $brand->id }}</td>
                  <td><a href="/brand/{{ $brand->id }}">{{ $brand->name }}</a></td>
                  <td>{{ $brand->profile }}</td>
                  <td>{{ $brand->created_at }}</td>
                  @if(Auth::user()->adminOrCurrentUserOwns($brand))
                  <td><a href="{{ url('/brand/'.$brand->id.'/edit') }}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a></td>
                  @endif
                  <td><a href="/brand/{{ $brand->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a></td>
                </tr>
                @endforeach
                @endforeach
              </tbody>
            </table>

            <div> <a href="{{ url('/brand/create') }}">
              <button type="button" class="btn btn-lg btn-primary">
                Create New
              </button></a>

              <a href="{{ url('/pdf') }}">
                <button type="button" class="btn btn-lg btn-primary">
                  PDF
                </button>
              </a>

              <a href="{{ url('/excel') }}">
                <button type="button" class="btn btn-lg btn-primary">
                  EXCEL
                </button>
              </a>

              <a href="{{ url('/generate-docx') }}">
                <button type="button" class="btn btn-lg btn-primary">
                  DOCX
                </button>
              </a>

            </div>

            <!-- <table class="table" id="table">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th class="text-center">First Name</th>
                  <th class="text-center">Last Name</th>
                  <th class="text-center">Email</th>
                  <th class="text-center">Gender</th>
                  <th class="text-center">Country</th>
                  <th class="text-center">Salary ($)</th>
                  <th class="text-center">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  // $(document).ready(function() {
  //   $('#example').DataTable();
  // } );
  // $(document).ready(function() {
  //   $('#table').DataTable();
  // } );
  $(document).ready(function() {
    // var handleDataTableButtons = function() {
    //   if ($("#datatable-buttons").length) {
    //     $("#datatable-buttons").DataTable({
    //       dom: "Bfrtip",
    //       buttons: [
    //         {
    //           extend: "copy",
    //           className: "btn-sm"
    //         },
    //         {
    //           extend: "csv",
    //           className: "btn-sm"
    //         },
    //         {
    //           extend: "excel",
    //           className: "btn-sm"
    //         },
    //         {
    //           extend: "pdfHtml5",
    //           className: "btn-sm"
    //         },
    //         {
    //           extend: "print",
    //           className: "btn-sm"
    //         },
    //       ],
    //       responsive: true
    //     });
    //   }
    // };
    //
    // TableManageButtons = function() {
    //   "use strict";
    //   return {
    //     init: function() {
    //       handleDataTableButtons();
    //     }
    //   };
    // }();
    //
    // $('#datatable').dataTable();
    // $('#datatable-keytable').DataTable({
    //   keys: true
    // });

    // $('#datatable-responsive').DataTable();

    $('#datatable-responsive').DataTable( {
      // "columnDefs": [
      //   { "width": "20%", "targets": 0 }
      // ]
      // columnDefs: [ {
      //   targets: 2,
      //   render: function ( data, type, row ) {
      //     return data.substr( 0, 10 );
      //   }
      // } ]
    } );

    // $('#datatable-scroller').DataTable({
    //   ajax: "js/datatables/json/scroller-demo.json",
    //   deferRender: true,
    //   scrollY: 380,
    //   scrollCollapse: true,
    //   scroller: true
    // });
    //
    // var table = $('#datatable-fixed-header').DataTable({
    //   fixedHeader: true
    // });

    TableManageButtons.init();
  });
  </script>

@endsection
