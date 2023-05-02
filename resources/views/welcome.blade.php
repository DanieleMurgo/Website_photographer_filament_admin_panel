<x-layout>
    <x-slot name="title">Welcome</x-slot>

    <div class="container-fluid px-0">
        <x-masthead />
    </div>

    <section>
        <div class="container">
            <h2 class="mt-5 text-secondary text-center">
                "We seek to expand your eye beyond what is (not) seen, and implement by creating symbols, which are
                finally de-contextualized. We make magic by merging art with fashion!"
            </h2>
            <div class="row mt-5">
                <div class="col-12 col-md-4">
                    <!-- Swiper -->
                    <div class="swiper mySwiper-welcome-prew">
                        <div class="swiper-wrapper">
                            <!-- Solo la prima slide della preview necessità di un leggero ritardo per dare effetto scorrimento -->
                            <div class="swiper-slide d-flex align-items-center" data-swiper-autoplay="2700"
                                id="firstSlide">
                                <div>
                                    <div class="img-preview-dimension">
                                        @if($projects->first()->photos()->first())
                                        <img src="{{ Storage::url($projects->first()->photos()->first()->path) }}"
                                            alt="" class="img-fluid">
                                        @else
                                        <img src="https://swiperjs.com/demos/images/nature-6.jpg" alt=""
                                            class="img-fluid">
                                        @endif
                                    </div>
                                    <div class="mt-5 text-start">
                                        <h5 class="card-title">{{$projects->first()->name}}</h5>
                                        <h6 class="mt-3">Client: <strong>{{$projects->first()->client}} </strong> </h6>
                                        <h6>Advertorial on: <strong>{{$projects->first()->advertorial_on}}</strong></h6>
                                        <h6>Year: <strong>{{$projects->first()->year}}</strong></h6>
                                    </div>
                                </div>
                            </div>

                            @foreach($projects->skip(1) as $project)
                            <div class="swiper-slide d-flex align-items-center">
                                <div>
                                    <div class="img-preview-dimension">
                                        @if($project->photos()->first())
                                        <img src="{{ Storage::url($project->photos()->first()->thumb_path) }}" alt=""
                                            class="img-fluid">
                                        @else
                                        <img src="https://swiperjs.com/demos/images/nature-6.jpg" alt="" class="">
                                        @endif
                                    </div>
                                    <div class="mt-5 text-start">
                                        <h5 class="card-title">{{$project->name}}</h5>
                                        <h6 class="mt-3">Client: <strong>{{$project->client}} </strong> </h6>
                                        <h6>Advertorial on: <strong>{{$project->advertorial_on}}</strong></h6>
                                        <h6>Year: <strong>{{$project->year}}</strong></h6>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8 d-none d-sm-block">
                    <!-- Swiper principal -->
                    <div class="swiper mySwiper-welcome-img d-sm-none d-md-block">
                        <div class="swiper-wrapper">
                            @foreach($projects as $project)
                            <div class="swiper-slide">
                                    @if($project->photos()->skip(1)->first())
                                    <img src="{{ Storage::url($project->photos()->skip(1)->first()->thumb_path) }}"
                                        alt="" class="img-fluid">
                                    @else
                                    <img src="https://swiperjs.com/demos/images/nature-5.jpg" alt="" class="img-fluid">
                                    @endif
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sezione ultimo annuncio, capire se modificare questa sezione -->
    <section>
        <div class="container">
            <h2 class="mt-5 text-secondary text-center">
                "We aspire to give you a complete communication experience: not only in fashion; but also in
                art,architecture, design, illustration, literature, philosophy, and music; merging all into an
                unbreakable
                whole. The end result can also serve as a brand, with its own touch of authenticity."
            </h2>
        </div>
        <div class="bar">
            <span class="bar_content d-none d-sm-block">
                Fattura Studio
            </span>
        </div>
    </section>

    <!-- Swiper with all photos -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="swiper mySwiperEndWelcome">
                        <div class="swiper-wrapper">
                            @foreach($photos as $photo)
                            <div class="swiper-slide">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img src="{{ Storage::url($photo->thumb_path) }}" alt=""
                                        class="img-fluid shadow-lg p-3 bg-body rounded">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>



</x-layout>