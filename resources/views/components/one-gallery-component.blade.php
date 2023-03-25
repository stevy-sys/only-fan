<div class="card card-blog" style="
      background-color: black;
      ">
    {{-- <div class="card-img">
      <a href="{{route('media.show',['locale' => session('locale'),'media' => $id])}}">
        @if ($type == 'image')
          <img src="{{$file}}" alt="" class="img-fluid">
        @else
        <video width="240" height="250" controls>
          <source src="{{$file}}" type="{{$enctype ? $enctype : 'video/mp4' }}">
        </video>
        @endif
      </a>
    </div> --}}

    @if ($type == 'image')
      <div class="card-img">
        <a href="{{route('media.show',['locale' => session('locale'),'media' => $id])}}">
            <img src="{{$file}}" alt="" class="img-fluid" style="
            width: 200px;
            height: 175px;
            border-radius: 30px;
        ">
        </a>
      </div>
    @else
    <div class="card-img">
      <a href="{{route('media.show',['locale' => session('locale'),'media' => $id])}}">
        <img src="{{$file}}" alt="" class="img-fluid" style="
        width: 200px;
        height: 175px;
        border-radius: 30px;
        ">
      </a>
      {{-- <a href="{{route('media.show',['locale' => session('locale'),'media' => $id])}}">
      <video style="width: 100%;height: auto;" width="200" height="200" controls>
        <source src="{{$file}}" type="{{$enctype ? $enctype : 'video/mp4' }}">
      </video> --}}
    </a>
    </div>
    @endif
    {{-- <div class="card-body"> --}}
      {{-- <div class="card-category-box"> --}}
        {{-- <div class="card-category">
          <h6 class="category">Travel</h6>
        </div> --}}
      {{-- </div> --}}
      {{-- <h3 class="card-title"><a href="blog-single.html">See more ideas about Travel</a></h3>
      <p class="card-description">
        {{$description}}
      </p> --}}
    {{-- </div> --}}
    {{-- <div class="card-footer">
      <div class="post-author">
        <a href="#">
          <img src="assets/img/testimonial-2.jpg" alt="" class="avatar rounded-circle">
          <span class="author">Morgan Freeman</span>
        </a>
      </div>
      <div class="post-date">
        <span class="bi bi-clock"></span> 10 min
      </div>
    </div> --}}
  </div>