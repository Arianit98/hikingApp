@extends('layouts/master')

@section('title', "Destination Item Page")

@push('css-styles')
    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
@endpush

@section('content')
<!-- Page Content-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center mb-5">
                                <h1 class="fw-bolder">{{$trail->name}}</h1>
                                <?php
                                    $bad = array("%20","%2","C");
                                ?>
                                <p class="lead fw-normal text-muted mb-0">{{str_replace($bad," ",$trail->desc)}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col-12"><img style="width: 1300px; height: 700px;" class="img-fluid rounded-3 mb-5" src={{$trail->largeImgURL}} alt="..." /></div>
                        <div class="weatherMaps" style="display: flex; flex-direction:row">
                            <div id="openweathermap-widget-11" style="float: left;">
                            </div>
                                <script src='//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/d3.min.js'></script><script>window.myWidgetParam ? window.myWidgetParam : window.myWidgetParam = [];  window.myWidgetParam.push({id: 11,cityid: '{{$id}}',appid: '9d53e3e29e217be89757b264c15c09c0',units: 'metric',containerid: 'openweathermap-widget-11',  });  (function() {var script = document.createElement('script');script.async = true;script.charset = "utf-8";script.src = "//openweathermap.org/themes/openweathermap/assets/vendor/owm/js/weather-widget-generator.js";var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(script, s);  })();</script>
                        
                            <div class="col-lg-6" style="margin-left: 5px; margin-bottom:50px">
                                <iframe
                                    width="500"
                                    height="234"
                                    style="border:0"
                                    loading="lazy"
                                    allowfullscreen
                                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDSElvjHlPXNKGvhfQE5XUraGIUJ8JjxM4
                                        &q={{str_replace(" ","+",$trail->name)}}">
                                </iframe>
                                
                            </div>
                        </div>
                        
                        <!--<div class="container-fluid px-1 px-md-4 py-5 mx-auto">
                            <div class="row d-flex justify-content-center px-3">
                                <div class="card">
                                    <h2 class="ml-auto mr-4 mt-3 mb-0">{{$trail->name}}</h2>
                                    <p class="ml-auto mr-4 mb-0 med-font">$desc</p>
                                    <h1 class="ml-auto mr-4 large-font">$temp Fahrenheit</h1>
                                    <p class="time-font mb-0 ml-4 mt-auto"> <span class="sm-font">AM</span></p>
                                    <p class="ml-4 mb-4"></p>
                                </div>
                            </div>
                        </div>-->
                       
                    </div>
                     <div class="row gx-5 justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center mb-5">
                                <p class="lead fw-normal text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Totam deserunt architecto enim eos accusantium fugit recusandae illo iste dignissimos possimus facere ducimus odit voluptatibus exercitationem, ex laudantium illum voluptatum corporis.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

@endsection

@push('js-scripts')
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>
@endpush
@push('js-jquery')
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
@endpush