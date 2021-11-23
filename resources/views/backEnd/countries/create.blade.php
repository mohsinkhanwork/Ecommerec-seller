@extends('backEnd.layouts.master')
@section('title','Add Country')
@section('content')
 
    <div id="breadcrumb"> <a href="{{url('/admin')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home </a> <a href="{{route('country.index')}}">Countries</a> <a href="{{route('country.create')}}" class="current">Add New Country</a> </div>
    <div class="container-fluid">
        @if(Session::has('message'))
            <div class="alert alert-success text-center" role="alert">
                <strong>Well done! &nbsp;</strong>{{Session::get('message')}}
            </div>
        @endif
        <div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                <h5> Add New Country </h5>
            </div>
            <div class="widget-content nopadding">
                <form id="country_add_form" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    <div class="control-group">
                        <label class="control-label">Select Countries</label>
                        <div class="controls">
                    <input type="text" name="country_name" id="country_name" class="form-control" value="{{old('country_name')}}" title="" required="required" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('country_name')}}</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="p_name" class="control-label">Country Code</label>
                        <div class="controls{{$errors->has('country_code')?' has-error':''}}">
                            <input type="number" name="country_code" id="country_code" class="form-control" value="{{old('country_code')}}" title="" required="required" style="width: 400px;">
                            <span class="text-danger">{{$errors->first('country_code')}}</span>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label for="" class="control-label"></label>
                        <div class="controls">
                            <button type="submit" class="btn btn-success">Add New Country</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script type="text/javascript">
        
    
$(document).ready(function(){
    $('#country_add_form').on('submit', function(e) {
         e.preventDefault();

         $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                  }
                });

        var country_name = $('#country_name').val();
        var country_code = $('#country_code').val();

        $.ajax({

                url: "{{route('country.store')}}",
                type: "POST",
                data: {

                    "country_name": country_name,
                    "country_code": country_code,
                },

                success: function(data) {
                    
                 alert('success');

                },
                error: function(xhr, status, error) {

                     alert('error');
                },
        });
    });
});



</script>

@endsection
@section('jsblock')
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.ui.custom.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-colorpicker.js')}}"></script>
    <script src="{{asset('js/jquery.toggle.buttons.js')}}"></script>
    <script src="{{asset('js/masked.js')}}"></script>
    <script src="{{asset('js/jquery.uniform.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/matrix.js')}}"></script>
    <script src="{{asset('js/matrix.form_common.js')}}"></script>
    <script src="{{asset('js/wysihtml5-0.3.0.js')}}"></script>
    <script src="{{asset('js/jquery.peity.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-wysihtml5.js')}}"></script>
@endsection