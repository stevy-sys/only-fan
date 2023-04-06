<div class="card card-blog" style="
      background-color: <?php echo $config->bg_color_footer ?>;
      border: none;
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
      @if ($active)
      <div class="card-img" style="
      position: relative;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      font-size: 53px;
      color: <?php echo $config->bg_color_footer ?>; 
      ">
        <a href="{{route('media.show',['media' => $id ,'locale' => session('locale')])}}">
            <img src="{{$file}}" alt="" class="img-fluid img-gallerie" style="
            width: 200px;
            height: 175px;
            border-radius: 30px;
        ">
        </a>
      </div>
      @else
        <div class="card-img" style="
        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 53px;
        color: <?php echo $config->bg_color_footer ?>; 
        "
        >
          <i style="
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            "
           class="bi bi-lock cadena"></i>
            <a href="{{route('subscribe.index',['locale' => session('locale'),'media' => $id])}}">
              <img 
              src="data:image/jpeg;base64,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"
              class="img-fluid img-gallerie" style="
              width: 200px;
              height: 175px;
              border-radius: 30px;
              ">
            </a>
        </div>
      @endif
    @else
    <div class="card-img" style=" 
        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 53px;
        color: <?php echo $config->bg_color_footer ?>; 
    ">
      <i style="
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
      " class="bi bi-lock cadena"></i>
        <a href="{{route('subscribe.index',['locale' => session('locale'),'media' => $id])}}">
          <img 
          src="data:image/jpeg;base64,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" alt="" class="img-fluid img-gallerie" style="
          width: 200px;
          height: 175px;
          border-radius: 30px;
          ">
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