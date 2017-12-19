@extends('layouts.blank')

<!-- @push('stylesheets')
@endpush -->

@section('main_container')

<div class="right_col" role="main">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Category</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Date Created</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach($subcats as $subcat)
                <tr>
                  <td>{{ $subcat->id }}</td>
                  <td><a href="/subcategory/{{ $subcat->id }}">{{ $subcat->name }}</a></td>
                  <td>{{ $subcat->catname }}</td>
                  <td>{{ $subcat->created_at }}</td>
                  <td><a href="/subcategory/{{ $subcat->id }}/edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a></td>
                  <td>
                    <div class="form-group">
                      <form class="form" role="form"
                      method="POST" action="{{ url('/category/'. $subcat->id) }}">
                      <input type="hidden" name="_method" value="delete">
                      {{ csrf_field() }}
                      <input class="btn btn-xs btn-danger" Onclick="return ConfirmDelete();" type="submit" value="Delete">
                    </form>
                  </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

            <div> <a href="/category/create">
              <button type="button" class="btn btn-lg btn-primary">
                Create New
              </button></a>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
  $(document).ready(function() {
    $('#datatable-responsive').DataTable();
    TableManageButtons.init();
  });
  </script>

  <script>
  function ConfirmDelete()
  {
    var x = confirm("Are you sure you want to delete?");
    if (x)
    return true;
    else
    return false;
  }
  </script>

@endsection
