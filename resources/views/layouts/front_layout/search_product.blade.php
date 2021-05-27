<div class="search-model-box">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-btn">+</div>
        <form class="search-model-form" action="{{ route('user.search.product') }}" method="POST"> @csrf
            <input type="text" name="search" id="search-input" placeholder="{{__('label.searchproduct')}}">
            <button class="btn btn-success" type="submit"><span class="flaticon-search"></span></button>
        </form>
    </div>
</div>
