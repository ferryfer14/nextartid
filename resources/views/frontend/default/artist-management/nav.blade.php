<div id="page-nav">
    <div class="outer">
        <ul>
            <li><a href="{{ route('frontend.auth.user.artist.manager') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager') active @endif" data-translate-text="DASHBOARD">{{ __('web.DASHBOARD') }}<div class="arrow"></div></a></li>
            <li><a href="{{ route('frontend.auth.user.artist.manager.artists') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.artists') active @endif" data-translate-text="ARTISTS">{{ __('web.NAV_ARTISTS') }}<div class="arrow"></div></a></li>
            <li><a href="{{ route('frontend.auth.user.artist.manager.albums') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.albums') active @endif" data-translate-text="ALBUMS">{{ __('web.ALBUMS') }}<div class="arrow"></div></a></li>
            <!--@if(\App\Models\Role::getValue('artist_allow_podcast'))
                <li><a href="{{ route('frontend.auth.user.artist.manager.podcasts') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.podcasts') active @endif" data-translate-text="PODCASTS">{{ __('web.PODCASTS') }}<div class="arrow"></div></a></li>
            @endif
            @if(env('VIDEO_MODULE') == 'true')
                <li><a href="{{ route('frontend.auth.user.artist.manager.videos') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.videos') active @endif" data-translate-text="VIDEOS">{{ __('web.VIDEOS') }}<div class="arrow"></div></a></li>
            @endif
            <li><a href="{{ route('frontend.auth.user.artist.manager.events') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.events') active @endif" data-translate-text="EVENTS">{{ __('web.EVENTS') }}<div class="arrow"></div></a></li>-->
            <li><a href="{{ route('frontend.auth.user.artist.manager.transaction') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.transaction') active @endif" data-translate-text="TRANSACTION">{{ __('web.TRANSACTION') }}<div class="arrow"></div></a></li>
            <li><a href="{{ route('frontend.auth.user.artist.manager.uploaded') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.uploaded') active @endif" data-translate-text="ROYALTI">{{ __('web.ROYALTI') }}<div class="arrow"></div></a></li>
            <li><a href="{{ route('frontend.auth.user.artist.manager.profile') }}" class="page-nav-link @if(Route::currentRouteName() == 'frontend.auth.user.artist.manager.profile') active @endif" data-translate-text="PROFILE">{{ __('web.PROFILE') }}<div class="arrow"></div></a></li>
        </ul>
    </div>
</div>
<script>var artist_data_{{ $artist->id }} = {!! json_encode($artist->makeHidden('songs')->makeHidden('activities')) !!}</script>