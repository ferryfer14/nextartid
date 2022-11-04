<script id="template-upload" type="text/x-tmpl">
{% for (var g=0, file; file=o.files[g]; g++) { %}
    <div class="template-upload upload-info card">
        <form class="upload-edit-song-form m-0" method="POST" action="{{ route('frontend.auth.user.artist.manager.song.edit.post') }}" enctype="multipart/form-data">
            <div class="upload-info-content">
                <div class="error hide">
                </div>
                <div class="upload-info-progress-outer">
                    <div class="upload-info-progress progress"></div>
                </div>
                <div class="upload-info-file">
                    <span>Speed <span class="upload-info-bitrate"></span></span>
                    <span class="upload-info-extra"></span>

                </div>
                <div class="upload-info-block">
                    <div class="img-container">
                        <img class="img"/>
                        <div class="edit-artwork edit-song-artwork">
                            <input class="edit-song-artwork-input" name="artwork" type="file" accept="image/*">
                            <span>{{ __('web.EDIT') }}</span>
                        </div>
                    </div>
                    <div class="song-info-container">
                        <div class="control field">
                            <label for="title">
                                <span data-translate-text="FORM_TITLE">{{ __('web.FORM_TITLE') }}</span>
                            </label>
                            <input class="song-name-input" name="title" type="text" autocomplete="off" value="{%=file.name%}" required>
                        </div>
                        <div class="control field">
                            <label>
                                <span data-translate-text="{{ __('FORM_ALBUM_VERSION') }}">{{ __('Remix or Version (optional)') }}</span>
                            </label>
                            <input name="remix_version" type="text" placeholder="Remix or Version" autocomplete="off">
                        </div>
                        <div class="control field">
                            <label for="name">
                                <span data-translate-text="FORM_DISPLAY_ARTIST">{{ __('web.FORM_DISPLAY_ARTIST') }}</span>
                            </label>
                            
                        <select class="select2" name="display_artist" placeholder="Select artist" autocomplete="off">
                        </select>
                        <!--<input name="display_artist" type="text" placeholder="Primary Artist Name" autocomplete="off">-->
                        </div>
                        <div class="control field" mb-0>
                            <label for="artist-job">
                                <span data-translate-text="FORM_ARTISTS_ROLES">{{ __('web.FORM_ARTISTS_ROLES') }}</span>
                            </label>
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="Primary Artist" readonly="">
                                </div>
                                <div class="col-md-7">
                                    <input name="primary-artist" readonly type="text" placeholder="Primary Artist Name" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="Composer" readonly="">
                                </div>
                                <div class="col-md-7">
                                    <input name="composer" type="text" placeholder="Artist Name" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="Arranger" readonly="">
                                </div>
                                <div class="col-md-7">
                                    <input name="arranger" type="text" placeholder="Artist Name" autocomplete="off">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" class="form-control" value="Lyricist" readonly="">
                                </div>
                                <div class="col-md-7">
                                    <input name="lyricist" type="text" placeholder="Artist Name" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <label for="name">
                            <span data-translate-text="LABEL_OPTIONAL">{{ __('web.LABEL_OPTIONAL') }}</span>
                        </label>
                        <div class="control field" mb-0>
                            <div class="row">
                                <div class="col-md-5">
                                {!! makeDropDown(array(
                                    1 => __('Primary Artist'),
                                    2 => __('Performer'),
                                    3 => __('Producer'),
                                    4 => __('Remixer'),
                                    5 => __('Composer'),
                                    6 => __('Lyricist'),
                                    7 => __('Publisher'),
                                    8 => __('Featuring'),
                                    9 => __('with'),
                                    10 => __('Arranger'),
                                ), 'roles[]', 1, true) !!}
                                </div>
                                <div class="col-md-7 d-flex align-items-center">
                                    <input name="additional-artist[]" type="text" placeholder="Additional Artist Role Name" autocomplete="off">          
                                    <a class="bg-success text-white btn-add-artist p-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                        </svg>
                                    </a>
                                </div>
                             </div>
                             <div id="additional_artist">
                             </div>
                        </div>
                        <div class="control field">
                            <label for="name">
                                <span data-translate-text="FORM_LABEL">{{ __('web.FORM_LABEL') }}</span>
                            </label>
                            <input name="label" type="text" placeholder="Label's Name" autocomplete="off">
                        </div>
                        <div class="control field">
                            <label>
                                <span data-translate-text="{{ __('FORM_GENRES1') }}">{{ __('web.FORM_GENRES1') }}</span>
                            </label>
                            <select class="select2" name="genre" placeholder="Select genres" autocomplete="off">
                            </select>
                        </div>
                        <div class="control field">
                            <label>
                                <span data-translate-text="{{ __('FORM_GENRES2') }}">{{ __('web.FORM_GENRES2') }}</span>
                            </label>
                            <select class="select2" name="second_genre" placeholder="Select genres" autocomplete="off">
                            </select>
                        </div>
                        <div class="control field">
                            <label>
                                <span data-translate-text="{{ __('FORM_GENRES3') }}">{{ __('web.FORM_GENRES3') }}</span>
                            </label>
                            <select class="select2" name="group_genre" placeholder="Select genres" autocomplete="off">
                            </select>
                        </div>
                        <div class="control field">
                            <label for="isrc-code">
                                <span data-translate-text="FORM_ISRC_CODE">{{ __('web.FORM_ISRC_CODE') }}</span>
                            </label>
                            <input name="isrc" type="text" placeholder="Your ISRC Code" readonly>
                            <input name="isrc-code" type="checkbox" checked="checked">
                            I don't have one, assign a UPC code to this release automatically
                        </div>
                        <div class="control field">
                            <label for="iswc-code">
                                <span data-translate-text="FORM_ISWC_CODE">{{ __('web.FORM_ISWC_CODE') }}</span>
                            </label>
                            <input name="iswc" type="text" placeholder="Your ISWC Code">
                        </div>
                        <div class="control field" mb-0>
                            <label for="license-recording">
                                <span data-translate-text="FORM_PUBLISHING">{{ __('web.FORM_PUBLISHING') }}</span>
                            </label>
                            <div class="row">
                                <div class="col-md-3">
                                    <input title="The Year of publish" value="{{date('Y')}}" type="text" name="publisher_year" placeholder="Year" class="form-control" autocomplete="off">
                                </div>
                                <div class="col-md-9">
                                        <input title="Publisher Name" value="Nextart" name="publisher_name" type="text" placeholder="Publisher Name" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="control field">
                            <label>
                                <span data-translate-text="FORM_LYRIC">{{ __('web.FORM_LYRIC') }}</span>
                            </label>
                            <textarea type="text" name="lirik" maxlength="180"></textarea>
                        </div>
                        <div class="control field row mb-0">
                            <div class="col-12">
                                <div class="row ml-0 mr-0 mt-2 explicit-check-box">
                                    <input class="hide custom-checkbox" type="checkbox" value="1" name="explicit" id="upload-explicit-id-{%=btoa(unescape(encodeURIComponent(file.name))).replace(/=/g, '')%}">
                                    <label class="cbx" for="upload-explicit-id-{%=btoa(unescape(encodeURIComponent(file.name))).replace(/=/g, '')%}"></label>
                                    <label class="lbl" for="upload-explicit-id-{%=btoa(unescape(encodeURIComponent(file.name))).replace(/=/g, '')%}">{{ __('web.SONG_EXPLICIT') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="control field">
                            <label for="language">
                                <span data-translate-text="FORM_LANGUAGE">{{ __('web.FORM_LANGUAGE') }}</span>
                            </label>
                            {!! makeDropDown(array(
                                1 => __('Indonesia'),
                                2 => __('English'),
                            ), 'language', null, true) !!}
                        </div>
                        <div class="control field mb-0">
                            <div class="row ml-0 mr-0 mt-2 separately-check-box">
                                <input class="hide custom-checkbox" type="checkbox" value="1" name="separately" id="edit-song-separately">
                                <label class="cbx" for="edit-song-separately"></label>
                                <label class="lbl" for="edit-song-separately">{{ __('web.FORM_SEPARATELY') }}</label>
                            </div>
                        </div>
                        <!--
                        <div class="control field">
                            <label for="created_at">
                                <span data-translate-text="FORM_SCHEDULE_PUBLISH">{{ __('web.FORM_SCHEDULE_PUBLISH') }}</span>
                            </label>
                            <input class="datepicker" name="created_at" type="text" placeholder="{{ __('web.IMMEDIATELY') }}" autocomplete="off">
                        </div>
                        <div class="control field">
                            <label for="copyright">
                                <span data-translate-text="FORM_COPYRIGHT">{{ __('web.FORM_COPYRIGHT') }}</span>
                            </label>
                            <input name="copyright" type="text" autocomplete="off" value="">
                        </div>
                        -->
                        <div class="control field bpm-control d-none">
                            <label for="bpm">
                                <span data-translate-text="FORM_BPM">{{ __('web.FORM_BPM') }}</span>
                            </label>
                            <input name="bpm" type="text" autocomplete="off" value="">
                        </div>
                        <div class="control field attachment-control d-none">
                            <label for="bpm">
                                <span data-translate-text="FORM_ATTACHMENT">{{ __('web.FORM_ATTACHMENT') }}</span>
                            </label>
                            <div class="input-group col-xs-12">
                                <input type="file" name="attachment" class="file-selector" accept=".zip,.rar">
                                <input type="text" class="form-control input-lg" disabled="" placeholder="{{ __('web.FORM_ATTACHMENT_TIP') }}">
                                <span class="input-group-btn">
                                    <button class="browse btn btn-secondary input-lg" type="button">{{ __('web.BROWSE') }}</button>
                                </span>
                            </div>
                        </div>
                        <div class="control field row mb-0">
                            <div class="col-12">
                                <div class="row ml-0 mr-0 mt-2 visibility-check-box">
                                    <input class="hide custom-checkbox" type="checkbox" name="visibility" id="upload-visibility-id-{%=btoa(unescape(encodeURIComponent(file.name))).replace(/=/g, '')%}" checked>
                                    <label class="cbx" for="upload-visibility-id-{%=btoa(unescape(encodeURIComponent(file.name))).replace(/=/g, '')%}"></label>
                                    <label class="lbl" for="upload-visibility-id-{%=btoa(unescape(encodeURIComponent(file.name))).replace(/=/g, '')%}">{{ __('web.MAKE_PUBLIC') }}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row ml-0 mr-0 mt-2 comments-check-box">
                                    <input class="hide custom-checkbox" type="checkbox" name="comments" id="upload-comments-id-{%=btoa(unescape(encodeURIComponent(file.name))).replace(/=/g, '')%}" checked>
                                    <label class="cbx" for="upload-comments-id-{%=btoa(unescape(encodeURIComponent(file.name))).replace(/=/g, '')%}"></label>
                                    <label class="lbl" for="upload-comments-id-{%=btoa(unescape(encodeURIComponent(file.name))).replace(/=/g, '')%}">{{ __('web.ALLOW_COMMENTS') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="control field row mb-0">
                            <div class="col-12">
                                <div class="row ml-0 mr-0 mt-2 notification-check-box">
                                    <input class="hide custom-checkbox" type="checkbox" name="notification" id="upload-notification-id-{%=btoa(unescape(encodeURIComponent(file.name))).replace(/=/g, '')%}" checked>
                                    <label class="cbx" for="upload-notification-id-{%=btoa(unescape(encodeURIComponent(file.name))).replace(/=/g, '')%}"></label>
                                    <label class="lbl" for="upload-notification-id-{%=btoa(unescape(encodeURIComponent(file.name))).replace(/=/g, '')%}">{{ __('web.NOTIFY_MY_FANS') }}</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row ml-0 mr-0 mt-2 downloadable-check-box">
                                    <input class="hide custom-checkbox" type="checkbox" name="downloadable" id="upload-downloadable-id-{%=btoa(unescape(encodeURIComponent(file.name))).replace(/=/g, '')%}" checked>
                                    <label class="cbx" for="upload-downloadable-id-{%=btoa(unescape(encodeURIComponent(file.name))).replace(/=/g, '')%}"></label>
                                    <label class="lbl" for="upload-downloadable-id-{%=btoa(unescape(encodeURIComponent(file.name))).replace(/=/g, '')%}">{{ __('web.ALLOW_DOWNLOAD') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="control field row mb-0">
                            <div class="col-12">
                                <div class="row ml-0 mr-0 mt-2 selling-check-box" data-toggle="collapse" href="#collapse-id-{%=btoa(unescape(encodeURIComponent(file.name))).replace(/=/g, '')%}" role="button" aria-expanded="false" aria-controls="collapse-id-{%=btoa(unescape(encodeURIComponent(file.name))).replace(/=/g, '')%}">
                                    <input class="hide custom-checkbox" type="checkbox" name="selling" id="upload-selling-id-{%=btoa(unescape(encodeURIComponent(file.name))).replace(/=/g, '')%}">
                                    <label class="cbx" for="upload-selling-id-{%=btoa(unescape(encodeURIComponent(file.name))).replace(/=/g, '')%}"></label>
                                    <label class="lbl" for="upload-selling-id-{%=btoa(unescape(encodeURIComponent(file.name))).replace(/=/g, '')%}">{{ __('web.SELL_THIS_SONG') }}</label>
                                </div>
                            </div>
                        </div>
                        <div class="control field collapse" id="collapse-id-{%=btoa(unescape(encodeURIComponent(file.name))).replace(/=/g, '')%}">
                            <label for="created_at">
                                <span data-translate-text="FORM_PRICE">{{ __('web.FORM_PRICE') }} </span>
                            </label>
                            <input name="price" type="number" step="1" min="{{ \App\Models\Role::getValue('monetization_song_min_price') }}" max="{{ \App\Models\Role::getValue('monetization_song_max_price') }}" placeholder="{{ __('web.SELL_THIS_SONG_TIP') }}" autocomplete="off">
                        </div>
                        <div class="song-info-container-overlay">
                            <div class="wrapper no-margin">
                                <div class="wrapper-cell upload">
                                    <div class="text">
                                        <div class="text-line"> </div>
                                        <div class="text-line"></div>
                                    </div>
                                    <div class="text">
                                        <div class="text-line"> </div>
                                        <div class="text-line"></div>
                                    </div>
                                    <div class="text">
                                        <div class="text-line"> </div>
                                        <div class="text-line"></div>
                                    </div>
                                    <div class="text">
                                        <div class="text-line"> </div>
                                        <div class="text-line"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="upload-info-footer hide">
                <input name="id" type="hidden">
                <input name="type" type="hidden">
                <button class="btn btn-primary save" type="submit" data-translate-text="SAVE">{{ __('SAVE') }}</button>
                </div>
            </div>
        </form>
    </div>
{% } %}
</script>