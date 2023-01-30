@extends('index')
@section('content')
    @include('artist-management.nav', ['artist' => $artist])
    <div id="page-content">
        <div class="container settings">
            <div class="page-header artist main small desktop">
                <a class="img ">
                    <img src="{{ $artist->artwork_url }}" alt="{{ auth()->user()->email }}">
                </a>
                <div class="inner">
                    <h1 title="{!! auth()->user()->email !!}">{!! auth()->user()->email !!}<span class="subpage-header"> / {{ __('web.SETTINGS_TITLE_PROFILE') }}</span></h1>
                    <div class="byline">Manage and configure your profile.</div>
                </div>
            </div>
            <form id="artist-profile-form" class="ajax-form" method="post" action="{{ route('frontend.auth.user.artist.manager.profile.save') }}" enctype="multipart/form-data" novalidate>
                <div id="column1" class="full settings">
                    <div class="user-picture-container content row">
                        <div class="fields col-lg-6 col-12">
                            <label class="control-label" data-translate-text="ARTIST_PROFILE_PICTURE">{{ __('web.ARTIST_PROFILE_PICTURE') }}</label>
                            <div class="user-img-container">
                                <img src="{{ $artist->artwork_url }}" class="artist-picture-preview">
                            </div>
                            <div class="user-picture-right">
                                <div class="upload-button-container">
                                    <div id="upload-pic" class="button-upload-form">
                                        <a id="entity-art-browse" class="btn" data-translate-text="UPLOAD_PROFILE_IMAGE">{{ __('web.UPLOAD_PROFILE_IMAGE') }}</a>
                                        <input class="uploader invisible-input" id="upload-artist-pic" name="artwork" accept="image/*" title="" type="file">
                                    </div>
                                    <span id="user-pic-filename"></span>
                                </div>
                                <p class="help-text" data-translate-text="SETTINGS_PICTURE_REQS">{{ __('web.SETTINGS_PICTURE_REQS') }}</p>
                                <p><a id="user-picture-import-twitter" class="disabled btn hide" data-translate-text="SETTINGS_PICTURE_IMPORT_TWITTER">{{ __('web.SETTINGS_PICTURE_IMPORT_TWITTER') }}</a></p>
                            </div>
                        </div>
                        <div class="description col-lg-6 col-12 desktop">
                            <p data-translate-text="SETTINGS_PICTURE_TIP">{!! __('web.SETTINGS_PICTURE_TIP') !!}</p>
                        </div>
                    </div>
                    <div class="content row">
                        <div class="fields col-lg-6 col-12">
                            <label class="control-label" for="name" data-translate-text="FORM_ARTIST_BAND_NAME">{{ __('web.FORM_ARTIST_BAND_NAME') }}</label>
                            <input class="span4" name="name" maxlength="175" value="{!! $artist->name !!}" type="text">
                        </div>
                        <div class="description col-lg-6 col-12 desktop">
                            <p data-translate-text="SETTINGS_NAME_TIP">This will be displayed on your <a href="{{ $artist->permalink_url }}">artist page</a>, so be sure to use a name people will be able to recognize and search for.</p>
                        </div>
                    </div>
                    <div class="content row">
                        <div class="fields col-lg-6 col-12">
                            <label class="control-label" for="location" data-translate-text="FORM_HOME_TOWN">{{ __('web.FORM_HOME_TOWN') }}</label>
                            <input class="span4" name="location" maxlength="175" value="{{ $artist->location }}" type="text">
                        </div>
                    </div>
                    <div class="content row">
                        <div class="fields col-lg-6 col-12">
                            <label class="control-label" for="website" data-translate-text="FORM_WEBSITE_LINK">{{ __('web.FORM_WEBSITE_LINK') }}</label>
                            <input class="span4" name="website" maxlength="175" value="{{ $artist->website }}" type="text">
                        </div>
                    </div>
                    <div class="content row">
                        <div class="fields col-lg-6 col-12">
                            <label class="control-label" for="facebook" data-translate-text="FORM_FACEBOOK_LINK">{{ __('web.FORM_FACEBOOK_LINK') }}</label>
                            <input class="span4" name="facebook" maxlength="175" value="{{ $artist->facebook }}" type="text">
                        </div>
                    </div>
                    <div class="content row">
                        <div class="fields col-lg-6 col-12">
                            <label class="control-label" for="twitter" data-translate-text="FORM_TWITTER_LINK">{{ __('web.FORM_TWITTER_LINK') }}</label>
                            <input class="span4" name="twitter" maxlength="175" value="{{ $artist->twitter }}" type="text">
                        </div>
                    </div>
                    <div class="content row">
                        <div class="fields col-lg-6 col-12">
                            <label class="control-label" for="twitter" data-translate-text="FORM_YOUTUBE_LINK">{{ __('web.FORM_YOUTUBE_LINK') }}</label>
                            <input class="span4" name="youtube" maxlength="175" value="{{ $artist->youtube }}" type="text">
                        </div>
                    </div>
                    <div class="content row">
                        <div class="fields col-lg-6 col-12">
                            <label class="control-label" for="twitter" data-translate-text="FORM_INSTAGRAM_LINK">{{ __('web.FORM_INSTAGRAM_LINK') }}</label>
                            <input class="span4" name="instagram" maxlength="175" value="{{ $artist->instagram }}" type="text">
                        </div>
                    </div><div class="content row">
                        <div class="fields col-lg-6 col-12">
                            <label class="control-label" for="twitter" data-translate-text="FORM_SOUNDCLOUD_LINK">{{ __('web.FORM_SOUNDCLOUD_LINK') }}</label>
                            <input class="span4" name="soundcloud" maxlength="175" value="{{ $artist->soundcloud }}" type="text">
                        </div>
                    </div>
                    <!--<div class="content row">
                        <div class="fields col-lg-6 col-12">
                            <label class="control-label" for="genre" data-translate-text="FROM_DEFAULT_GENRE">{{ __('web.FROM_DEFAULT_GENRE') }}</label>
                            <select class="select2" name="genre[]" placeholder="Select genres" multiple autocomplete="off">
                                {!! genreSelection(explode(',', $artist->genre)) !!}}
                            </select>
                        </div>
                        <div class="description col-lg-6 col-12 desktop">
                            <p data-translate-text="ARTIST_GENRE_TIP">{{ __('web.ARTIST_GENRE_TIP') }}</p>
                        </div>
                    </div>
                    <div class="content row">
                        <div class="fields col-lg-6 col-12">
                            <label class="control-label" for="mood" data-translate-text="FROM_DEFAULT_MOOD">{{ __('web.FROM_DEFAULT_MOOD') }}</label>
                            <select class="select2" name="mood[]" placeholder="Select moods" multiple autocomplete="off">
                                {!! moodSelection(explode(',', $artist->mood)) !!}}
                            </select>
                        </div>
                        <div class="description col-lg-6 col-12 desktop">
                            <p data-translate-text="ARTIST_MOOD_TIP">{{ __('web.ARTIST_MOOD_TIP') }}</p>
                        </div>
                    </div>-->
                    <div class="content row">
                        <div class="fields col-lg-6 col-12">
                            <div class="control">
                                <label class="control-label" for="bio">
                                    <span data-translate-text="FORM_SHORT_BIO">{{ __('web.FORM_SHORT_BIO') }}</span>
                                    <span class="help-text" data-translate-text="FORM_SHORT_BIO_LIMIT">{{ __('web.FORM_SHORT_BIO_LIMIT') }}</span>
                                </label>
                                <textarea type="text" class="span6" name="bio" maxlength="180">{{ $artist->bio }}</textarea>
                            </div>
                        </div>
                        <div class="description col-lg-6 col-12 desktop">
                            <p data-translate-text="ARTIST_BIO_TIP">{{ __('web.ARTIST_BIO_TIP') }}</p>
                        </div>
                    </div>
                    <h2 class="mt-5" data-translate-text="IDENTITY_USER">User's Identity Details</h2>
                    <div class="content row">
                        <div class="fields col-lg-6 col-12">
                            <label class="control-label" for="website" data-translate-text="FORM_NIK">ID Card Number (NIK)</label>
                            @if (empty(auth()->user()->nik))
                                <input class="span4" name="nik" value="{{ auth()->user()->nik }}" type="number">
                                @else
                                <input class="span4 basic-tooltip" tooltip="Ask Our Support to modify the data" name="nik" value="{{ auth()->user()->nik }}" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="user-picture-container content row">
                        <div class="fields col-lg-6 col-12">
                            <label class="control-label" data-translate-text="IDENTITY_CARD_USER">ID Card Picture (KTP/SIM/PASPOR)</label>
                            <div class="user-img-container">
                                <img src="{{ auth()->user()->artwork_ktp_url }}" class="ktp-picture-preview">
                            </div>
                            <div class="user-picture-right">
                                <div class="upload-button-container">
                                    @if (empty(auth()->user()->nik))
                                        <div id="upload-pic" class="button-upload-form">
                                            <a id="entity-art-browse" class="btn" data-translate-text="UPLOAD_PROFILE_IMAGE">{{ __('web.UPLOAD_PROFILE_IMAGE') }}</a>
                                            <input class="uploader invisible-input" id="upload-ktp-pic" name="artwork_ktp" accept="image/*" title="" type="file">
                                        </div>
                                        @else
                                        <div id="upload-pic" class="button-upload-form">
                                            <a id="entity-art-browse basic-tooltip" tooltip="Ask Our Support to modify the data" class="btn" data-translate-text="UPLOAD_PROFILE_IMAGE">{{ __('web.UPLOAD_PROFILE_IMAGE') }}</a>
                                        </div>
                                    @endif                                        
                                    <span id="user-pic-filename"></span>
                                </div>
                                <p class="help-text" data-translate-text="SETTINGS_PICTURE_REQS">{{ __('web.SETTINGS_PICTURE_REQS') }}</p>
                                <p><a id="user-picture-import-twitter" class="disabled btn hide" data-translate-text="SETTINGS_PICTURE_IMPORT_TWITTER">{{ __('web.SETTINGS_PICTURE_IMPORT_TWITTER') }}</a></p>
                            </div>
                        </div>
                        <div class="description col-lg-6 col-12 desktop">
                            <p data-translate-text="SETTINGS_PICTURE_TIP">{!! __('web.SETTINGS_PICTURE_TIP') !!}</p>
                        </div>
                    </div>
                    <h2 class="mt-5" data-translate-text="IDENTITY_USER">User's Tax ID <span class="text-danger">(Need Admin Approval )</span></h2>
                    
                    <div class="content row">
                        <div class="fields col-lg-6 col-12">
                            <label class="control-label" for="website" data-translate-text="FORM_NPWP">Tax ID Status</label>
                            <span class="{{ auth()->user()->status_npwp == 0 ? 'text-danger' : (auth()->user()->status_npwp == 2 ? 'text-warning' : 'text-success') }}">{{ auth()->user()->status_npwp == 0 ? 'Not Approve': (auth()->user()->status_npwp == 2 ? 'OnCheck': 'Approve') }}</span>
                        </div>
                    </div>
                    <div class="content row">
                        <div class="fields col-lg-6 col-12">
                            @if(auth()->user()->status_npwp == 0)
                                <label class="control-label" for="website" data-translate-text="FORM_NPWP">Tax Type</label>
                                {!! makeDropDown(array(
                                    1 => __('Individual'),
                                    2 => __('Organization'),
                                ), 'variant_npwp', auth()->user()->variant_npwp, false) !!}
                                @else
                                <label class="control-label" for="website" data-translate-text="FORM_NPWP">Tax Type</label>
                                <input class="span4 basic-tooltip" tooltip="Ask Our Support to modify the data" for="website" value="{{auth()->user()->variant_npwp == 1 ? 'Individual' : 'Company' }}" readonly>
                            @endif
                        </div>
                    </div><div class="content row">
                        <div class="fields col-lg-6 col-12">
                            <label class="control-label" for="website" data-translate-text="FORM_NPWP">Tax ID (NPWP) Number</label>
                            @if(auth()->user()->status_npwp == 0)
                                <input class="span4" name="npwp" value="{{ auth()->user()->npwp }}" type="text">
                                @else
                                <input class="span4 basic-tooltip" tooltip="Ask Our Support to modify the data" name="npwp" value="{{ auth()->user()->npwp }}" readonly>
                            @endif
                        </div>
                    </div>
                    <div class="user-picture-container content row">
                        <div class="fields col-lg-6 col-12">
                            <label class="control-label" data-translate-text="IDENTITY_CARD_USER">Tax ID Card (NPWP) Picture</label>
                            <div class="user-img-container">
                                <img src="{{ auth()->user()->artwork_npwp_url }}" class="npwp-picture-preview">
                            </div>
                            <div class="user-picture-right">
                                <div class="upload-button-container">
                                    @if(auth()->user()->status_npwp == 0)
                                        <div id="upload-pic" class="button-upload-form">
                                            <a id="entity-art-browse" class="btn" data-translate-text="UPLOAD_PROFILE_IMAGE">{{ __('web.UPLOAD_PROFILE_IMAGE') }}</a>
                                            <input class="uploader invisible-input" id="upload-npwp-pic" name="artwork_npwp" accept="image/*" title="" type="file">
                                        </div>
                                        <span id="user-pic-filename"></span>
                                        @else
                                        <div id="upload-pic" class="button-upload-form">
                                            <a id="entity-art-browse" class="btn red-tooltipr" tooltip="Ask Our Support to modify the data" data-translate-text="UPLOAD_PROFILE_IMAGE">{{ __('web.UPLOAD_PROFILE_IMAGE') }}</a>
                                        </div>
                                        <span id="user-pic-filename"></span>
                                    @endif
                                </div>
                                <p class="help-text" data-translate-text="SETTINGS_PICTURE_REQS">{{ __('web.SETTINGS_PICTURE_REQS') }}</p>
                                <p><a id="user-picture-import-twitter" class="disabled btn hide" data-translate-text="SETTINGS_PICTURE_IMPORT_TWITTER">{{ __('web.SETTINGS_PICTURE_IMPORT_TWITTER') }}</a></p>
                            </div>
                        </div>
                        <div class="description col-lg-6 col-12 desktop">
                            <p data-translate-text="SETTINGS_PICTURE_TIP">{!! __('web.SETTINGS_PICTURE_TIP') !!}</p>
                        </div>
                    </div>
                    <h2 class="mt-5" data-translate-text="WITHDRAW_PAYMENT_METHOD">Bank Account Detail</h2>
                    {{-- Edit by Lindo --}}
                    {{-- <div class="content row">
                        <div class="fields col-lg-6 col-12">
                            <div class="control">
                                <div class="d-flex">
                                    <input class="hide custom-checkbox" id="payment_paypal" type="radio" name="payment_method" value="paypal" @if(auth()->user()->payment_method == 'paypal') checked @endif>
                                    <label class="cbx" for="payment_paypal"></label>
                                    <label class="lbl" for="payment_paypal">Paypal - Minimum {{ \App\Models\Role::getUserValue('monetization_paypal_min_withdraw', auth()->user()->id) }} {{ config('settings.currency', 'USD') }}.</label>
                                </div>
                                <input class="span4" name="paypal_email" value="{{ auth()->user()->payment_paypal }}" type="text">
                            </div>
                        </div>
                        <div class="description col-lg-6 col-12 desktop">
                            <p>Please fill your Paypal email.</p>
                        </div>
                    </div> --}}
                    <div class="content row border-0">
                        <div class="fields col-lg-6 col-12">
                            <div class="control">
                                <div class="d-flex">
                                    <label class="lbl" for="payment_bank">Bank Account Name</label>
                                </div>
                                @if (empty(auth()->user()->account_bank))
                                    <input type="text" name="account_bank" value="{{ auth()->user()->account_bank }}">
                                    @else
                                    <input class="basic-tooltip" tooltip="Ask Our Support to modify the data" type="text" name="account_bank" value="{{ auth()->user()->account_bank }}" readonly>
                                @endif
                            </div>
                            <div class="control mt-2">
                                <div class="d-flex">
                                    <label class="lbl" for="payment_bank">Account Number</label>
                                </div>
                                @if (empty(auth()->user()->payment_bank))
                                    <input type="number" name="payment_bank" value="{{ auth()->user()->payment_bank }}">
                                    @else
                                    <input class="basic-tooltip" tooltip="Ask Our Support to modify the data" type="number" name="payment_bank" value="{{ auth()->user()->payment_bank }}" readonly>
                                @endif
                            </div>
                        </div>
                        <div class="description col-lg-6 col-12 desktop">
                            <p>We only accept Indonesian Bank account at the moment.
                            </p>
                        </div>
                    </div>
                </div>
                <div id="page-column-footer">
                    <div id="primary-actions-footer">
                        <button class="btn save" type="submit">
                            <svg height="24" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 0h24v24H0z" fill="none"/>
                                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                            </svg>
                            <span data-translate-text="SAVE_CHANGES">{{ __('web.SAVE_CHANGES') }}</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
