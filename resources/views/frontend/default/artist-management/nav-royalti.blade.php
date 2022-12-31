<div id="page-nav">
    <div class="outer">
        <ul>
            <li><a href="{{ route('frontend.auth.user.artist.manager.uploaded') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.uploaded') active @endif" data-translate-text="ALBUMS">{{ __('web.ALBUMS') }}<div class="arrow"></div></a></li>
            <li><a href="{{ route('frontend.auth.user.artist.manager.royalti.artist') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.royalti.artist') active @endif" data-translate-text="ARTISTS">{{ __('web.ARTISTS') }}<div class="arrow"></div></a></li>
        </ul>
    </div>
</div>