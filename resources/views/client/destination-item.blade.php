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
                    <!-- Image/Weather/Maps-->
                    <div class="row gx-5">
                        <div class="col-12"><img style="width: 1300px; height: 700px;" class="img-fluid rounded-3 mb-5" src={{$trail->largeImgURL}} alt="..." /></div>
                        <!-- Suggestion-->
                        <div class="col-lg-6 col-xl-4" style="position: absolute;">
                            <div class="card mb-5 mb-xl-0" style="width: 400px; opacity:0.85;">
                                <div class="card-body p-5">
                                    
                                    <div class="mb-3">
                                        <span class="display-4 fw-bold">{{$overallSuggestion}}</span>
                                        
                                    </div>
                                    <ul class="list-unstyled mb-4">
                                        <li class="mb-2">
                                            <i class="bi bi-check text-primary"></i>
                                            <strong>{{$clotheSuggestion1}}</strong>
                                        </li>
                                        <li class="mb-2 text-muted">
                                            <i class="bi bi-x"></i>
                                            {{$clotheSuggestion2}}
                                        </li>
                                        
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="row gx-5">  
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
                    </div>
                        
                </div>
            </section>

@endsection