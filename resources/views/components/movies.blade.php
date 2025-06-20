<div class="carousel-item active">
    <div class="d-flex justify-content-between gap-2">
        @for($i = 0; $i < 4; $i++)
            <a href="#">
                <div class="position-relative rounded">
                    <div class="w-100 position-absolute z-2 d-flex justify-content-between">
                            <p class="text-light fs-4 fw-bold px-3 py-4">{{$movies[$i]->year}}</p>
                            @if($movies[$i]->translated)
                                <p class="text-light fs-4 fw-bold px-3 py-4">DUB</p>
                            @else
                                <p class="text-light fs-4 fw-bold px-3 py-4">LEG</p>
                            @endif
                    </div>
                    <div class="card-content">
                        <img src="{{asset("{$movies[$i]->image_path}")}}" alt="{{$movies[$i]->title}}" class="card-container_image">
                    </div>
                </div>
            </a>
        @endfor
    </div>
</div>
<div class="carousel-item">
    <div class="d-flex justify-content-around">
        @for($i = 1; $i < 5; $i++)
            <a href="#">
                <div class="position-relative rounded">
                    <div class="w-100 position-absolute z-2 d-flex justify-content-between">
                        <p class="text-light fs-4 fw-bold px-3 py-4">{{$movies[$i]->year}}</p>
                        @if($movies[$i]->translated)
                            <p class="text-light fs-4 fw-bold px-3 py-4">DUB</p>
                        @else
                            <p class="text-light fs-4 fw-bold px-3 py-4">LEG</p>
                        @endif
                    </div>
                    <img src="{{asset("{$movies[$i]->image_path}")}}" alt="{{$movies[$i]->title}}" class="card-container_image">
                </div>
            </a>
        @endfor
    </div>
</div>