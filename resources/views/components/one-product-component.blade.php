<div>
    <div class="work-box">
        <a href="{{$image}}" data-gallery="portfolioGallery" class="portfolio-lightbox">
          <div class="work-img">
            <img src="{{$image}}" alt="" class="img-fluid">
          </div>
        </a>
        <div class="work-content">
          <div class="row">
            <div class="col-sm-8">
              <h2 class="w-title">{{$name}}</h2>
              <div class="w-more">
                @if ($inCart)
                  <button class="btn btn-danger"> <a href="{{route('boutique.add',['product' => $id])}}">
                    enlever
                  </a> </button>
                @else
                <button class="btn btn-success"> <a href="{{route('boutique.add',['product' => $id])}}">
                  ajouter
                </a> </button>
                @endif
                {{-- <span class="w-ctegory"></span> / <span class="w-date">18 Sep. 2018</span> --}}
              </div>
            </div>
            <div class="col-sm-4">
              <div>{{$name}} </div>
              <div>{{$price}} €</div>
              <div>{{$wallet}} {{ $config->unite_point }}</div>
              
            </div>
          </div>
        </div>
      </div>
</div>