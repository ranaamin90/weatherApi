@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Write a city name to get its weather</div>

                    <div class="card-body">
                            <form id="searchForm" class="form-inline">
                                <div class="form-group mx-sm-3 mb-2">
                                    <img src="{{ asset('img/weather.png') }}" width="60" height="60">
                                    <input type="text" class="form-control" id="city" placeholder="City Name">
                                </div>
                                <button type="submit" class="btn btn-primary mb-2" id="ajaxSubmit">Search</button>
                            </form>
                        <div id="div_result">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascripts')
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
    </script>
    <script>
        $("#div_result").hide();

        jQuery(document).ready(function(){
            jQuery('#ajaxSubmit').click(function(e){
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                jQuery.ajax({
                    url: "{{ url('/weather') }}",
                    method: 'get',
                    data: {
                        city: jQuery('#city').val(),
                    },
                    success: function(result){
                        $("#div_result").empty();
                        var json_data = result;
                        var resultArray = [];

                        for(var i in json_data)
                            resultArray.push([i, json_data [i]]);

                        var unit = resultArray[10][1];
                        var json_data_temp = resultArray[1][1];
                        var tempResultArray = [];

                        for(var i in json_data_temp)
                            tempResultArray.push([i, json_data_temp [i]]);

                        var now = tempResultArray[0][1];
                        var min = tempResultArray[1][1];
                        var max = tempResultArray[2][1];

                        $("#div_result").show();
                        var html = '';
                        html += '<p>'+now+' '+unit+' temperature from '+min+' to '+max+' '+unit+'</p>';
                        $("#div_result").append(html);
                    }});
            });
        });
    </script>
@endsection
