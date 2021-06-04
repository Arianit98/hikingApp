@extends('layouts/master')



@section('title', "Destination Page")



@section('content')

   <!-- Page Content-->
   <!-- <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="text-center mb-5">
                        <h1 class="fw-bolder">Trails in {{$hikingDestination}}</h1>
                        <p class="lead fw-normal text-muted mb-0"></p>
                    </div>
                    <div class="row gx-5" >
                    @foreach($hikingPlaces->trails as $trail)

                   
                        
                    
                        <div class="col-lg-6" style="width: 32%;">
                            <div class="position-relative mb-5" >
                                <img style="height:auto; width:auto;" class="img-fluid rounded-3 mb-3" src={{$trail->thumbURL}} alt="TEST" />
                                <a class="h3 fw-bolder text-decoration-none link-dark stretched-link" href="{{route('Hike.destination-item',[$trail->id])}}">{{$trail->name}}</a>
                                <p>Difficulity : {{$trail->difficulty}}</p>
                            </div>
                        </div>

                    @endforeach-->

            <!-- Blog preview section-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="text-center">
                                <h2 class="fw-bolder">Trails in {{$hikingDestination}}</h2>
                                <p class="lead fw-normal text-muted mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque fugit ratione dicta mollitia. Officiis ad.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                    @foreach($hikingPlaces->trails as $trail)

                        <?php
                            $bad = array("%20","%2","C");
                        ?>
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top"  src={{$trail->thumbURL}} alt="..." />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">New</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="{{route('Hike.destination-item',[$trail->id])}}"><h5 class="card-title mb-3">{{$trail->name}}</h5></a>
                                    <p class="card-text mb-0">Difficulity : {{$trail->difficulty}}</p>
                                </div>
    
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
        
@endsection