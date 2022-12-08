<div id="page-nav">
    <div class="outer">
        <ul>
            <li><a href="{{ route('frontend.auth.user.artist.manager.artists') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.artists') active @endif" data-translate-text="ARTISTS">{{ __('web.NAV_ARTISTS') }}<div class="arrow"></div></a></li>
            <li><a href="{{ route('frontend.auth.user.artist.manager.participants') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.participants') active @endif" data-translate-text="PARTICIPANTS">{{ __('web.NAV_PARTICIPANTS') }}<div class="arrow"></div></a></li>
        </ul>
    </div>
</div>