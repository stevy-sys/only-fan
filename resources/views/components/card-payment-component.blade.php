<div class="service-box">
    <div class="service-ico">
        <span class="ico-circle"><i class="{{$icon}}"></i></span>
    </div>
    <div class="service-content">
        <h2 class="s-title">{{ $amount }} {{$devise}}</h2>
        <p class="s-description text-center">
            <h3>{{ $description }}</h3>
            {{-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni adipisci eaque autem fugiat! Quia,
            provident vitae! Magni
            tempora perferendis eum non provident. --}}
        </p>
        @if (auth()->guard('web')->check())
            <form action="{{ route('payment.process',['locale' => session('locale')]) }}" method="POST">
            <input type="hidden" value="{{$id}}" name="subscribe">
            @csrf
            <script
                src="https://checkout.stripe.com/checkout.js"
                class="stripe-button"
                data-key="{{ env('STRIPE_KEY') }}"
                data-amount="{{$amount}}"
                data-name="Aphrodite"
                data-description="{{$amount}}"
                data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                data-locale="auto">
            </script>
        </form>
        @else
            <a href="{{route('subscribe.index',['locale' => session('locale')])}}"><p><button class="btn btn-danger"> Abonnee</button></p> </a>
        @endif
        
    </div>
    
</div>