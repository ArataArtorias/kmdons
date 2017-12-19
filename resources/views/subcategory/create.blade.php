@extends('layouts.blank')

@push('stylesheets')
@endpush

@section('main_container')

    <!-- page content -->
    <div class="right_col" role="main">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Subcategory</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <br />
              <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="{{ url('/subcategory') }}">
                  {{ csrf_field() }}
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="name" required="required" class="form-control col-md-7 col-xs-12" name="name">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Category <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="category" class="form-control col-md-7 col-xs-12" name="category" required="required">
                          <option value="">Choose</option>
                          @foreach($cats as $cat)
                          <option value="{{ $cat-> id }}">{{ $cat-> name }}</option>
                          @endforeach
                      </select>
                    <!-- <input type="text" id="name" required="required" class="form-control col-md-7 col-xs-12" name="name"> -->
                  </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">Cancel</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /page content -->

    <script type="text/javascript">
    $(document).ready(function() {
        $.listen('parsley:field:validate', function() {
            validateFront();
        });
        $('#demo-form2 .btn').on('click', function() {
            $('#demo-form2').parsley().validate();
            validateFront();
        });
        var validateFront = function() {
            if (true === $('#demo-form2').parsley().isValid()) {
                $('.bs-callout-info').removeClass('hidden');
                $('.bs-callout-warning').addClass('hidden');
            } else {
                $('.bs-callout-info').addClass('hidden');
                $('.bs-callout-warning').removeClass('hidden');
            }
        };
    });
    try {
        hljs.initHighlightingOnLoad();
    } catch (err) {}
    </script>
    <!-- footer content -->
    <footer>
        <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
@endsection
