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

            <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Profile</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
          <tr>
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

@endsection

@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        // processing: true,
        // serverSide: true,
        // ajax: '{!! route('brand.index') !!}',
        // columns: [
        //     { data: 'id', name: 'id' },
        //     { data: 'name', name: 'name' },
        //     { data: 'profile', name: 'profile' },
        //     { data: 'created_at', name: 'created_at' },
        //     { data: 'updated_at', name: 'updated_at' }
        // ]
    });
});
</script>
@endpush
