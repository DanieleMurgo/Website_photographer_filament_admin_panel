<x-layout>
    <x-slot name="title">Projects</x-slot>

    <div class="container mt-nav" id="index-pjs-height">
        <h1>Our Projects</h1>
        <div class="row">
            @foreach ($projects as $project)
            <div class="col-12">
                <div
                    class="card bg-light mb-3 border border-5 border-top-0 border-end-0 border-bottom-0 border-dark py-2">
                    <div class="row g-0 align-items-center ">
                        <div class="col-md-4 ps-5 order-2 order-md-1">
                            <a class="text-decoration-none text-dark" href="{{route('project.show', $project)}}">
                                <h5 class="card-title">{{$project->name}}</h5>
                                <h6>Client: <strong>{{$project->client}}</strong> </h6>
                                <h6>Advertorial on: <strong>{{$project->advertorial_on}}</strong></h6>
                                <h6>Year: <strong>{{$project->year}}</strong></h6>
                            </a>
                        </div>
                        <div class="col-md-8 order-1 order-md-2">
                            <div class="card-body p-0">
                                <div style="--swiper-navigation-color: #808080; --swiper-pagination-color: #808080"
                                    class="swiper mySwiper-pjs px-5 py-2">
                                    <div class="swiper-wrapper">
                                        @foreach ($project->photos()->take(8)->get() as $photo)
                                        <div
                                            class="swiper-slide bg-light d-flex justify-content-center align-items-center">
                                            <a class="text-decoration-none text-dark"
                                                href="{{route('project.show', $project)}}">
                                                <img src="{{ Storage::url($photo->thumb_path) }}"
                                                    class="img-fluid object-fit-contain" alt="...">
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">

            {{ $projects->links() }}
        </div>
    </div>
</x-layout>