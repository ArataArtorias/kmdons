@extends('layouts.blank')

@push('stylesheets')
    <!-- Example -->
    <!--<link href=" <link href="{{ asset("css/myFile.min.css") }}" rel="stylesheet">" rel="stylesheet">-->
@endpush

@section('main_container')

<div class="right_col" role="main">
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Brands</h2>

          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <br />

          <table class="table" id="table">
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
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
              </tr>
            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $('#table').DataTable();
} );
 </script>

@endsection
