<nav id="main-nav">
    <div class="toggle-nav">
        <i class="fa fa-bars sidebar-bar"></i>
    </div>
    <ul id="main-menu" class="sm pixelstrap sm-horizontal">
        <li>
            <div class="mobile-back text-end">
                {{ __('site/home/nav.back') }}<i class="fa fa-angle-right ps-2" aria-hidden="true"></i>
            </div>
        </li>
        <li><a href="{{ route('index') }}">{{ __('site/home/nav.home') }}</a></li>
        @foreach ($cats as $category)
            @if (!isset($category->category_id))
                <li>
                    <a href="#">{{ $category->name }}</a>
                    <ul>
                        @foreach ($cats as $cat)
                            @if ($category->id == $cat->category_id)
                                <li><a href="#">{{ $cat->name }}</a>
                                    <ul>
                                        @foreach ($cats as $c)
                                            @if ($cat->id == $c->category_id)
                                                <li><a href="#">{{ $c->name }}</a></li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            @endif
        @endforeach
        <li>
            <a href="#">{{ __('site/home/nav.blogs') }}</a>
        </li>
    </ul>
</nav>
