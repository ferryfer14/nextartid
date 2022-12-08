<div id="page-nav">
    <div class="outer">
        <ul>
            <li><a href="{{ route('frontend.auth.user.artist.manager.albums') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.albums') active @endif" data-translate-text="ALBUMS_ALL">{{ __('web.ALBUMS_ALL') }}<div class="arrow"></div></a></li>
            <li><a href="{{ route('frontend.auth.user.artist.manager.unpaid') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.unpaid') active @endif" data-translate-text="ALBUMS_UNPAID">{{ __('web.ALBUMS_UNPAID') }}<div class="arrow"></div></a></li>
            <li><a href="{{ route('frontend.auth.user.artist.manager.paid') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.paid') active @endif" data-translate-text="ALBUMS_PAID">{{ __('web.ALBUMS_PAID') }}<div class="arrow"></div></a></li>
            <li><a href="{{ route('frontend.auth.user.artist.manager.release') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.release') active @endif" data-translate-text="ALBUMS_RELEASE">{{ __('web.ALBUMS_RELEASE') }}<div class="arrow"></div></a></li>
        </ul>
    </div>
</div>