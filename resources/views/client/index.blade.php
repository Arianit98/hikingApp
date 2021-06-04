@extends('layouts/master')



@section('title', "Home Page")



@section('content')

   <!-- Header-->
            <header class="bg-dark py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2">Excited for your new adventure?</h1>
                                <p class="lead fw-normal text-white-50 mb-4">Your next destination is just one search away</p>
                                    <form action="{{route('Hike.destination')}}">
                                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                            <input type="text" class="form-control" name="hikingDestination" id="hikingDestination" aria-describedby="textHelp" placeholder="Enter your destination">    
                                            <input type="submit" class="btn btn-outline-light btn-lg px-4" value="Search" href="#!">Search</a>
                                        </div>
                                    </form> 
                                
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="{{asset('assets/landscape.jpg')}}" alt="..." /></div>
                    </div>
                </div>
            </header>
          
            <!-- Testimonial section-->
            <div class="py-5 bg-light">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-10 col-xl-7">
                            <div class="text-center">
                                <div class="fs-4 mb-4 fst-italic">"Working with Start Bootstrap templates has saved me tons of development time when building new projects! Starting with a Bootstrap template just makes things easier!"</div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                    <div class="fw-bold">
                                        Tom Ato
                                        <span class="fw-bold text-primary mx-1">/</span>
                                        CEO, Pomodoro
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </section>
        </main>

@endsection