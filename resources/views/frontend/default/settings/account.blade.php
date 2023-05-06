@extends('index')
@section('content')
    @include('settings.nav')
    <div id="page-content">
        <div class="container">
            <form id="settings-account-form" class="ajax-form" method="post" action="{{ url('auth/user/settings/account') }}"
                novalidate>
                <div class="page-header ">
                    <h1><span data-translate-text="SETTINGS_TITLE">{{ __('web.SETTINGS_TITLE') }}</span> / <span
                            data-translate-text="SETTINGS_TITLE_ACCOUNT">{{ __('web.SETTINGS_TITLE_ACCOUNT') }}</span></h1>
                </div>
                <div id="column1" class="full settings">
                    <div class="content row">
                        <div class="fields col-lg-6 col-12">
                            <div class="controls">
                                <label class="control-label" for="username"
                                    data-translate-text="SETTINGS_USERNAME_TITLE">{{ __('web.SETTINGS_USERNAME_TITLE') }}</label>
                                <input name="username" class="span4" value="{{ auth()->user()->username }}" type="text"
                                    required>
                            </div>
                        </div>
                        <div class="description col-lg-6 col-12 desktop">
                            <p data-translate-text="SETTINGS_USERNAME_TIP"><a
                                    href="{{ route('frontend.user', ['username' => auth()->user()->username]) }}"
                                    target="_blank">{{ route('frontend.user', ['username' => auth()->user()->username]) }}</a>.
                                {{ __('web.SETTINGS_USERNAME_TIP') }}</p>
                        </div>
                    </div>
                    <div class="content row">
                        <div class="fields col-lg-6 col-12">
                            <div class="control"><label class="control-label" for="email"
                                    data-translate-text="EMAIL}">{{ __('web.EMAIL') }}</label>
                                <input name="email" class="span4" value="{{ auth()->user()->email }}" type="text"
                                    required>
                            </div>
                        </div>
                        <div class="description col-lg-6 col-12 desktop">
                            <p data-translate-text="SETTINGS_EMAIL_TIP">{!! __('web.SETTINGS_EMAIL_TIP') !!}</p>
                        </div>
                    </div>
                    <div class="content row">
                        <div class="fields col-lg-6 col-12">
                            <div class="control">
                                <label class="control-label" for="password"
                                    data-translate-text="SETTINGS_CURRENT_PASSWORD">{{ __('web.SETTINGS_CURRENT_PASSWORD') }}</label>
                                <input name="password" class="span4" type="password" required>
                            </div>
                        </div>
                        <div class="description col-lg-6 col-12 desktop">
                            <p class="bold" data-translate-text="SETTINGS_CURRENT_PASSWORD_TIP">
                                {{ __('web.SETTINGS_CURRENT_PASSWORD_TIP') }}</p>
                        </div>
                    </div>
                    <div class="content row">
                        <div class="fields col-lg-6 col-12">
                            <div class="control">
                                <label class="control-label" for="make_a_user_nft">Make me NFT Account User</label>
                                @if (auth()->user()->user_nextverse == 0)
                                    <a class="btn make-account-nft" data-url="{{ config('settings.url_nextverse') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                                            <path
                                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
                                            <path
                                                d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
                                        </svg>
                                        <span>Make account NFT</span>
                                    </a>
                                @else
                                    <a class="btn" href="{{ config('settings.url_nextverse') }}" target="#_blank">
                                        <svg height="24" viewBox="0 0 24 24" width="18"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                                        </svg>
                                        <span class="text-success">Open NextVerse</span>
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="description col-lg-6 col-12 desktop">
                            <p class="bold">Make a account in NextVerse for create your assets to NFT</p>
                        </div>
                    </div>
                    <div id="settings-third-party-auth" class="content hide">
                        <p class="centered-bold-tip" data-translate-text="SETTINGS_VERIFY_AUTH_TIP">Third-party
                            authentication will be required to make the above changes.</p>
                    </div>
                </div>
                <div id="page-column-footer">
                    <div id="primary-actions-footer">
                        <button class="btn save" type="submit">
                            <svg height="24" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
                            </svg>
                            <span data-translate-text="SAVE_CHANGES">{{ __('web.SAVE_CHANGES') }}</span>
                        </button>
                        <a class="btn cancel">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="24" viewBox="0 0 24 24">
                                <path
                                    d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z" />
                                <path d="M0 0h24v24H0z" fill="none" />
                            </svg>
                            <span data-translate-text="CANCEL">{{ __('web.CANCEL') }}</span>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
