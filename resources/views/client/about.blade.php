@extends('layouts/master')



@section('title', "About Page")

@section('content')
    
    <!-- Header-->
    <header class="py-5">
                <div class="container px-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xxl-6">
                            <div class="text-center my-5">
                                <h1 class="fw-bolder mb-3">Hike in the most remarkable trails.</h1>
                                <p class="lead fw-normal text-muted mb-4">Let's Hike is a platform that offers you the possibility to make out the most from your weekends. Wherever you are, you can search for the outdoor trails in the zone. Moreover, the weather for that zone will be shown on our platform for the upcoming days.</p>
                                <a class="btn btn-primary btn-lg" href="#scroll-target">Read our story</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- About section one-->
            <section class="py-5 bg-light" id="scroll-target">
                <div class="container px-5 my-5">
                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="{{asset('assets/foggy_landscape.png')}}" alt="..." /></div>
                        <div class="col-lg-6">
                            <h2 class="fw-bolder">About Us</h2>
                            <p class="lead fw-normal text-muted mb-0">Hiking calms your mind and inspires you to become a better version of yourself. So that's where it CLICKED in our minds, and we put our skills and passion into the game, and we created this phenomenal helpful platform.</p>
                        </div>
                    </div>
                </div>
            </section>
            <!-- About section two-->
            <!--<section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div>
                        <div class="col-lg-6">
                            <h2 class="fw-bolder">Growth &amp; beyond</h2>
                            <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.</p>
                        </div>
                    </div>
                </div>
            </section>-->
            <!-- Team members section-->
            <section class="py-5 bg-light">
                <div class="container px-5 my-5">
                    <div class="text-center">
                        <h2 class="fw-bolder">Our team</h2>
                        <p class="lead fw-normal text-muted mb-5">Dedicated to quality and your success</p>
                    </div>
                    <div class="row gx-5 row-cols-1 row-cols-sm-2 row-cols-xl-4 justify-content-center">
                        <!--<div class="col mb-5 mb-5 mb-xl-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                                <h5 class="fw-bolder">Ibbie Eckart</h5>
                                <div class="fst-italic text-muted">Founder &amp; CEO</div>
                            </div>
                        </div>-->
                        <div class="col mb-5 mb-5 mb-xl-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="{{asset('assets/Arianit_Mehana_small.png')}}" alt="..." />
                                <h5 class="fw-bolder">Arianit Mehana</h5>
                                <div class="fst-italic text-muted">Back-End Developer</div>
                            </div>
                        </div>
                        <div class="col mb-5 mb-5 mb-sm-0">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="{{asset('assets/Granit_Temaj_small.png')}}" alt="..." />
                                <h5 class="fw-bolder">Granit Temaj</h5>
                                <div class="fst-italic text-muted">Front-End Developer</div>
                            </div>
                        </div>
                        <!--<div class="col mb-5">
                            <div class="text-center">
                                <img class="img-fluid rounded-circle mb-4 px-4" src="https://dummyimage.com/150x150/ced4da/6c757d" alt="..." />
                                <h5 class="fw-bolder">Malvina Cilla</h5>
                                <div class="fst-italic text-muted">CTO</div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </section>
        </main>

@endsection