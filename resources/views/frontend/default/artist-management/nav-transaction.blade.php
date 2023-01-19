<div id="page-nav">
    <div class="outer">
        <ul>
            <li><a href="{{ route('frontend.auth.user.artist.manager.transaction') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.transaction') active @endif" data-translate-text="TRANSACTION">{{ __('web.TRANSACTION') }}<div class="arrow"></div></a></li>
            <li><a href="{{ route('frontend.auth.user.artist.manager.convert.list') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.convert.list') active @endif" data-translate-text="CONVERT_ROYALTY">Convert Royalty<div class="arrow"></div></a></li>
            <li><a href="{{ route('frontend.auth.user.artist.manager.withdraw.list') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.withdraw.list') active @endif" data-translate-text="WITHDRAW">{{ __('web.WITHDRAW') }}<div class="arrow"></div></a></li>
        </ul>
    </div>
</div>