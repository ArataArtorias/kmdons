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
            @if($brands->count() > 0)
            <table class="table table-hover table-bordered table-striped">
              <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Profile</th>
                <th>Date Created</th>
              </thead>
              <tbody>
                @foreach($brands as $brand)
                <tr>
                  <td>{{ $brand->id }}</td>
                  <td><a href="/brand/{{ $brand->id }}">{{ $brand->name }}</a></td>
                  <td>{{ $brand->profile }}</td>
                  <td>{{ $brand->created_at }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @else
            Sorry, no Widgets
            @endif
            {{ $brands->links() }}

            <div> <a href="/brand/create">
              <button type="button" class="btn btn-lg btn-primary">
                Create New
              </button></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
