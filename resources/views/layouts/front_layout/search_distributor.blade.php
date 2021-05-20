<aside class="single_sidebar_widget search_widget">
    <form action="{{ route('user.distributor.search') }}" method="POST">@csrf
        <div class="form-group">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="Tìm nhà phân phối" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tìm nhà phân phối'">
                <div class="input-group-append">
                <button class="btns" type="button" type="submit"><i class="ti-search"></i></button>
                </div>
            </div>
        </div>
        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
    </form>
</aside>
