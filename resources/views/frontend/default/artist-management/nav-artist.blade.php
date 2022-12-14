<div id="page-nav">
    <div class="outer">
        <ul>
            <li><a href="{{ route('frontend.auth.user.artist.manager.artists') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.artists') active @endif" data-translate-text="NAV_DISPLAY_ARTISTS">{{ __('web.NAV_DISPLAY_ARTISTS') }}<div class="arrow"></div></a></li>
            <li><a href="{{ route('frontend.auth.user.artist.manager.primary') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.primary') active @endif" data-translate-text="NAV_PRIMARY">{{ __('web.NAV_PRIMARY') }}<div class="arrow"></div></a></li>
            <li><a href="{{ route('frontend.auth.user.artist.manager.composer') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.composer') active @endif" data-translate-text="NAV_COMPOSER">{{ __('web.NAV_COMPOSER') }}<div class="arrow"></div></a></li>
            <li><a href="{{ route('frontend.auth.user.artist.manager.arranger') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.arranger') active @endif" data-translate-text="NAV_ARRANGER">{{ __('web.NAV_ARRANGER') }}<div class="arrow"></div></a></li>
            <li><a href="{{ route('frontend.auth.user.artist.manager.participants') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.participants') active @endif" data-translate-text="NAV_ALL">{{ __('web.NAV_ALL') }}<div class="arrow"></div></a></li>
        </ul>
    </div>
</div>