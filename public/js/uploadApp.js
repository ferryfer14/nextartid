(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else if (typeof exports === 'object') {
        factory(require('jquery'));
    } else {
        factory(jQuery);
    }
})(function ($) {
    "use strict";

    $.blueimp.fileupload.prototype._specialOptions.push(
        'filesContainer',
        'uploadTemplateId'
    );

    // The UI version extends the file upload widget
    // and adds complete user interface interaction:
    $.widget('blueimp.fileupload', $.blueimp.fileupload, {

        options: {
            // By default, files added to the widget are uploaded as soon
            // as the user clicks on the start buttons. To enable automatic
            // uploads, set the following option to true:
            autoUpload: true,
            // The ID of the upload template:
            uploadTemplateId: $('#fileupload').attr('data-template'),
            // The ID of the download template:
            // The container for the list of files. If undefined, it is set to
            // an element with class "files" inside of the widget element:
            filesContainer: $('.uploaded-files'),
            // By default, files are appended to the files container.
            // Set the following option to true, to prepend files instead:
            prependFiles: false,
            // The expected data type of the upload response, sets the dataType
            // option of the $.ajax upload requests:
            dataType: 'json',
            //Limit update time
            shouldUpdate: true,
            // Error and info messages:
            messages: {
                unknownError: 'Unknown error'
            },
            // Function returning the current number of files,
            // used by the maxNumberOfFiles validation:
            getNumberOfFiles: function () {
                return this.filesContainer.children()
                    .not('.processing').length;
            },

            // Callback to retrieve the list of files from the server response:
            getFilesFromResponse: function (data) {
                if (data.result && $.isArray(data.result.files)) {
                    return data.result.files;
                }
                return [];
            },

            // The add callback is invoked as soon as files are added to the fileupload
            // widget (via file input selection, drag & drop or add API call).
            // See the basic file upload widget for more information:
            add: function (e, data) {
                if (e.isDefaultPrevented()) {
                    return false;
                }
                var $this = $(this),
                    that = $this.data('blueimp-fileupload') ||
                        $this.data('fileupload'),
                    options = that.options;
                data.context = that._renderUpload(data.files)
                    .data('data', data)
                    .addClass('processing');
                $('.uploaded-files').append(data.context);

                $('#upload-file-button').addClass('d-none');
                //return false;
                that._forceReflow(data.context);
                that._transition(data.context);
                data.process(function () {
                    return $this.fileupload('process', data);
                }).always(function () {
                    data.context.each(function (index) {
                        $(this).find('.size').text(
                            that._formatFileSize(data.files[index].size)
                        );
                    }).removeClass('processing');
                    that._renderPreviews(data);
                }).done(function () {
                    data.context.find('.start').prop('disabled', false);
                    if ((that._trigger('added', e, data) !== false) && (options.autoUpload || data.autoUpload) && data.autoUpload !== false) {
                        data.submit();
                    }
                }).fail(function () {
                    if (data.files.error) {
                        data.context.each(function (index) {
                            var error = data.files[index].error;
                            if (error) {
                                $(this).find('.error').text(error);
                            }
                        });
                    }
                });


            },
            // Callback for the start of each file upload request:
            send: function (e, data) {
                if (e.isDefaultPrevented()) {
                    return false;
                }
                var that = $(this).data('blueimp-fileupload') ||
                    $(this).data('fileupload');
                if (data.context && data.dataType &&
                    data.dataType.substr(0, 6) === 'iframe') {
                    // Iframe Transport does not support progress events.
                    // In lack of an indeterminate progress bar, we set
                    // the progress to 100%, showing the full animated bar:
                    data.context
                        .find('.progress').addClass(
                        !$.support.transition && 'progress-animated'
                    )
                        .attr('aria-valuenow', 100)
                        .children().first().css(
                        'width',
                        '100%'
                    );
                }
                return that._trigger('sent', e, data);
            },
            // Callback for successful uploads:
            done: function (e, data) {
                if (e.isDefaultPrevented()) {
                    return false;
                }
                var that = $(this).data('blueimp-fileupload') ||
                    $(this).data('fileupload'),
                    getFilesFromResponse = data.getFilesFromResponse ||
                        that.options.getFilesFromResponse,
                    files = getFilesFromResponse(data),
                    template,
                    deferred;
                if (data.context) {
                    data.context.each(function (index) {
                        var file = files[index] ||
                            {error: 'Empty file upload result'};
                        deferred = that._addFinishedDeferreds();
                        that._transition($(this)).done(

                            function () {
                                var $thisForm = $(this);
                                console.log(data.result);
                                var song = data.result;
                                $(this).find('.template-upload').attr('data-id', song.id);
                                $(this).find('input[name="id"]').val(song.id);
                                $(this).find('.upload-info-progress-outer').addClass('hide');
                                $(this).find('.upload-info-file').addClass('hide');
                                $(this).find('.upload-info-footer').removeClass('hide');
                                $(this).find('.song-info-container-overlay').addClass('hide');
                                $(this).find('.img-container img').attr('src', song.artwork_url);
                                $(this).find('.song-name-input').val(song.title);
                                $(this).find('input[name="type"]').val(song.album.type);
                                $.engineUtils.makeSelectOption($(this).find('select[name=display_artist]'), User.userInfo.my_artist);
                                $.engineUtils.makeSelectOption($(this).find('select[name=genre]'), User.userInfo.allow_genres);
                                $.engineUtils.makeSelectOption($(this).find('select[name=second_genre]'), User.userInfo.allow_genres);
                                $.engineUtils.makeSelectOption($(this).find('select[name=group_genre]'), User.userInfo.group_genre);
                                $(this).find("select[name='display_artist']").change(function() {
                                    $thisForm.find("[name='primary-artist']").val($(this).find("option:selected").text());
                                });
                                if($(this).find('.artist-selection').length) {
                                    for (var i=0; i < song.artists.length; i++)  {
                                        if($(this).find('.artist-selection option[value=' + song.artists[i].id + ']').length) {
                                            $(this).find('.artist-selection option[value=' + song.artists[i].id + ']').attr('selected','selected');
                                        } else {
                                            $(this).find('.artist-selection').append($('<option>', {
                                                value: song.artists[i].id,
                                                text: song.artists[i].name
                                            }));
                                            $(this).find('.artist-selection option[value=' + song.artists[i].id + ']').attr('selected','selected');
                                        }
                                    };
                                    $(this).find('.artist-selection').select2({
                                        placeholder: "Select one or multi",
                                        maximumSelectionLength: 4
                                    });
                                }

                                if(song.bpm !== undefined) {
                                    $(this).find('.bpm-control').removeClass('d-none');
                                    $(this).find('.attachment-control').removeClass('d-none');
                                }

                                $(this).find('.datepicker').datepicker();
                                if (song.album.display_artist) {
                                    $thisForm.find('select[name=display_artist] option[value="' + song.album.display_artist + '"]').attr('selected', 'selected');
                                    if(song.album.album_type.max == 1){
                                        getImgURL(song.album.artwork_url, (imgBlob)=>{
                                            // Load img blob to input
                                            // WIP: UTF8 character error
                                            let fileName = 'album.jpg'
                                            let file = new File([imgBlob], fileName,{type:"image/jpeg", lastModified:new Date().getTime()}, 'utf-8');
                                            let container = new DataTransfer(); 
                                            container.items.add(file);
                                            $thisForm.find("[name='artwork']").prop("files", container.files);
                                            
                                        });
                                        $thisForm.find('.img').attr('src',song.album.artwork_url);
                                        $thisForm.find('.song-name-input').val(song.album.title);
                                        $thisForm.find('.song-name-input').attr('readonly', true);
                                        $thisForm.find('select[name=display_artist]').find("option:not(:selected)").attr('disabled', true);
                                        $thisForm.find('select[name=display_artist]').attr('readonly', true);
                                    }
                                }
                                $thisForm.find("[name='remix_version']").val(song.album.remix_version);
                                $thisForm.find("[name='label']").val(song.album.label);
                                $thisForm.find("[name='publisher_year']").val(song.album.recording_year);
                                $thisForm.find("[name='publisher_name']").val(song.album.recording_name);
                                $thisForm.find("[name='primary-artist']").val($thisForm.find("select[name=display_artist]").find('option:selected').text());
                                $thisForm.find("[name='composer']").val(song.album.composer);
                                $thisForm.find("[name='arranger']").val(song.album.arranger);
                                $thisForm.find("[name='lyricist']").val(song.album.lyricist);
                                if (song.album.genre) {
                                    $thisForm.find('select[name=genre] option[value="' + song.album.genre + '"]').attr('selected', 'selected');
                                }
                                if (song.album.second_genre) {
                                    $thisForm.find('select[name=second_genre] option[value="' + song.album.genre + '"]').remove();
                                    $thisForm.find('select[name=second_genre] option[value="' + song.album.second_genre + '"]').attr('selected', 'selected');
                                }
                                if (song.album.group_genre) {
                                    $thisForm.find('select[name=group_genre] option[value="' + song.album.group_genre + '"]').attr('selected', 'selected');
                                }
                                if (song.album.language) {
                                    $thisForm.find('select[name=language] option[value="' + song.album.language + '"]').attr('selected', 'selected');
                                }
                                $thisForm.find("[name='isrc-code']").change(function() {
                                    if(this.checked) {
                                        $thisForm.find("[name='isrc']").val('');
                                        $thisForm.find("[name='isrc']").attr("readonly", "readonly");
                                    }else{
                                        $thisForm.find("[name='isrc']").removeAttr("readonly");
                                    }
                                });
                                $thisForm.find("[name='start_point']").timepicker({
                                    timeFormat: 'mm:ss',
                                    interval: 60,
                                    minTime: '10',
                                    maxTime: '6:00pm',
                                    defaultTime: '11',
                                    startTime: '10:00',
                                    dynamic: false,
                                    dropdown: true,
                                    scrollbar: true
                                });
                                if(song.artist_roles.length > 0){
                                    //var objTo = document.getElementsByClassName('additional_artist');
                                    $thisForm.find('#additional_artist').html('');
                                    for(var i=0;i<song.artist_roles.length;i++){
                                        if(i==0){
                                            var divtest = document.createElement("div");
                                            divtest.setAttribute("class", "row");
                                            var divsel = document.createElement("div");
                                            divsel.setAttribute("class", "col-md-5");
                                            var select = document.createElement("select");
                                            select.setAttribute("class", "select2");
                                            select.setAttribute("name", "roles[]");
                                            select.setAttribute("id", "roles"+i);
                                            divsel.appendChild(select);
                                            var divput = document.createElement("div");
                                            divput.setAttribute("class", "col-md-7 d-flex align-items-center");
                                            divput.innerHTML = '<input name="additional-artist[]" type="text" placeholder="Additional Artist Role Name" value="'+song.artist_roles[i].artist_name+'" autocomplete="off"><a class="bg-success text-white edit-btn-add-artist p-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg></a>';
                                            //var select = selectDownArtist(artist_roles[i].artist_role);
                                            console.log(select)
                                            divtest.append(divsel, divput);  
                                            $thisForm.find('#additional_artist').html(divtest);
                                            $.engineUtils.makeSelectOption($thisForm.find('#roles'+i), User.userInfo.artists_roles);
                                            $thisForm.find('#roles'+i+' option[value="' + song.artist_roles[i].artist_role + '"]').attr('selected', 'selected')
                                        }else{
                                            var divtest = document.createElement("div");
                                            divtest.setAttribute("class", "row removeclass"+i);
                                            var divsel = document.createElement("div");
                                            divsel.setAttribute("class", "col-md-5");
                                            var select = document.createElement("select");
                                            select.setAttribute("class", "select2");
                                            select.setAttribute("name", "roles[]");
                                            select.setAttribute("id", "roles"+i);
                                            divsel.appendChild(select);
                                            var divput = document.createElement("div");
                                            divput.setAttribute("class", "col-md-7 d-flex align-items-center");
                                            divput.innerHTML = '<input name="additional-artist[]" type="text" placeholder="Additional Artist Role Name" value="'+song.artist_roles[i].artist_name+'" autocomplete="off"><a data-id="'+i+'" class="bg-white text-danger remove_add_fields p-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg></a>';
                                            //var select = selectDownArtist(artist_roles[i].artist_role);
                                            console.log(select)
                                            divtest.append(divsel, divput);  
                                            $thisForm.find('#additional_artist').append(divtest);
                                            $.engineUtils.makeSelectOption($thisForm.find('#roles'+i), User.userInfo.artists_roles);
                                            $thisForm.find('#roles'+i+' option[value="' + song.artist_roles[i].artist_role + '"]').attr('selected', 'selected')
                                        
                                        }
                                    }
                                }else{
                                    $thisForm.find('#additional_artist').html('');
                                    //var objTo = document.getElementsByClassName('additional_artist');
                                    var divtest = document.createElement("div");
                                    divtest.setAttribute("class", "row");
                                    divtest.innerHTML = '<div class="col-md-5">'+dropDownArtist+'</div><div class="col-md-7 d-flex align-items-center"><input name="additional-artist[]" type="text" placeholder="Additional Artist Role Name" autocomplete="off"><a class="bg-success text-white edit-btn-add-artist p-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16"><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg></a></div>';
                                    $thisForm.find('#additional_artist').html(divtest);
                                }
                                $('.upload-edit-song-form').ajaxForm({
                                    beforeSubmit: function(data, $form, options) {
                                        var error = 0;
                                        Object.keys(data).forEach(function eachKey(key) {
                                            if (data[key].required && !data[key].value) {
                                                $form.find("[name='" + data[key].name + "']").closest(".control").addClass("field-error");
                                                error++;
                                            } else if (data[key].required && data[key].value) {
                                                $form.find("[name='" + data[key].name + "']").closest(".control").removeClass("field-error");
                                            }
                                        });
                                        if (error) return false;
                                        $form.find("[type='submit']").attr("disabled", "disabled");
                                        $form.find("[type='submit']").addClass("btn-loading");
                                    },
                                    success: function(response, textStatus, xhr, $form) {
                                        Artist.upload.edit(response, $form);
                                        if(song.album.album_type.max == song.album.song_count){
                                            window.location.href = "/artist-management/albums/"+song.album.id;                    
                                        }
                                        song.album.song_count = song.album.song_count+1;
                                        $('#upload-file-button').removeClass('d-none');
                                        $form.find("[type='submit']").removeClass("btn-loading");
                                    },
                                    error: function(e, textStatus, xhr, $form) {
                                        if (e.status === 429) {
                                            Toast.show('error', Language.text.POPUP_COMMENT_DISABLED, null);
                                        } else {
                                            $form.find(".control").removeClass("field-error");
                                            var errors = e.responseJSON.errors;
                                            $.each(errors, function(key, value) {
                                                Toast.show("error", value[0], null);
                                            });
                                            $form.find('.error').removeClass('hide').html(e.responseJSON.errors[Object.keys(e.responseJSON.errors)[0]][0]);
                                            $form.find("[name='" + Object.keys(e.responseJSON.errors)[0] + "']").closest(".control").addClass("field-error");
                                        }
                                        $form.find("[type='submit']").removeAttr("disabled");
                                        $form.find("[type='submit']").removeClass("btn-loading");
                                    }
                                });
                            }
                        );
                    });
                } else {
                    alert('Message here');
                }
            },
            // Callback for failed (abort or error) uploads:
            fail: function (e, data) {
                if (e.isDefaultPrevented()) {
                    return false;
                }
                var that = $(this).data('blueimp-fileupload') ||
                    $(this).data('fileupload'),
                    template,
                    deferred;
                if (data.context) {
                    data.context.each(function (index) {
                        if (data.errorThrown !== 'abort') {
                            var file = data.files[index];
                            file.error = file.error || data.errorThrown ||
                                data.i18n('unknownError');
                            deferred = that._addFinishedDeferreds();
                            that._transition($(this)).done(
                                function () {
                                    var errors = data._response.jqXHR.responseJSON.errors
                                    $(this).find('.error').removeClass('hide');
                                    $(this).find('.error').html(errors[Object.keys(errors)[0]][0]);
                                    var that = $(this);
                                    setTimeout(function () {
                                        that.fadeOut();
                                    }, 5000)
                                }
                            );
                        } else {
                            deferred = that._addFinishedDeferreds();
                            that._transition($(this)).done(
                                function () {
                                    $(this).remove();
                                    that._trigger('failed', e, data);
                                    that._trigger('finished', e, data);
                                    deferred.resolve();
                                }
                            );
                        }
                    });
                } else if (data.errorThrown !== 'abort') {
                    data.context = that._renderUpload(data.files)[
                        that.options.prependFiles ? 'prependTo' : 'appendTo'
                        ](that.options.filesContainer)
                        .data('data', data);
                    that._forceReflow(data.context);
                    deferred = that._addFinishedDeferreds();
                    that._transition(data.context).done(
                        function () {
                            data.context = $(this);
                            that._trigger('failed', e, data);
                            that._trigger('finished', e, data);
                            deferred.resolve();
                        }
                    );
                } else {
                    that._trigger('failed', e, data);
                    that._trigger('finished', e, data);
                    that._addFinishedDeferreds().resolve();
                }
            },
            // Callback for upload progress events:
            progress: function (e, data) {
                if (e.isDefaultPrevented()) {
                    return false;
                }
                var that = $(this).data('blueimp-fileupload') || $(this).data('fileupload');
                var progress = Math.floor(data.loaded / data.total * 100);
                if (data.context) {
                    data.context.each(function () {
                        $(this).find('.progress')
                            .attr('aria-valuenow', progress)
                            .css(
                                'width',
                                progress + '%'
                            );
                        $(this).find('.upload-info-extra').html(that._renderExtendedProgress(data));
                        $(this).find('.upload-info-bitrate').html(that._formatBitrate(data.bitrate));
                        if(progress === 100) {
                            $(this).find('.upload-info-file').html(Language.text.CONVERTING_ALERT);
                        }
                    });
                }
            },
            // Callback for global upload progress events:
            progressall: function (e, data) {
                if (e.isDefaultPrevented()) {
                    return false;
                }
                var $this = $(this),
                    that = ($this.data('blueimp-fileupload') || $this.data('fileupload')),
                    progress = Math.floor(data.loaded / data.total * 100),
                    globalProgressNode = $this.find('.fileupload-progress'),
                    extendedProgressNode = globalProgressNode
                        .find('.progress-extended');
                if (extendedProgressNode.length) {
                    extendedProgressNode.html(
                        ($this.data('blueimp-fileupload') || $this.data('fileupload'))
                            ._renderExtendedProgress(data)
                    );
                }
                globalProgressNode
                    .find('.progress')
                    .attr('aria-valuenow', progress)
                    .css(
                        'width',
                        progress + '%'
                    );
                var today = new Date();
                var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();


                if(today.getSeconds() % 3 === 0 && that.options.shouldUpdate) {
                    //Artist.upload.speedChartLabel.push(time);
                    //Artist.upload.speedChartData.push(that._rawBitrate(data.bitrate));

                    that.options.shouldUpdate = false;
                    Artist.upload.chart.update(time, that._rawBitrate(data.bitrate));

                    setTimeout(function () {
                        that.options.shouldUpdate = true;
                    }, 3000)
                    ///console.log(Artist.upload.speedChartLabel, Artist.upload.speedChartData);

                    /*window.updateInfoData.push({'speed': that._rawBitrate(data.bitrate), time: time});
                    if(window.updateInfoData.length > 30) window.updateInfoData.splice(0, 2)
                    speedChart.setData(window.updateInfoData);
                    //console.log(window.updateInfoData);*/

                }

            },
            // Callback for uploads start, equivalent to the global ajaxStart event:
            start: function (e) {
                if (e.isDefaultPrevented()) {
                    return false;
                }
                var that = $(this).data('blueimp-fileupload') ||
                    $(this).data('fileupload');
                that._resetFinishedDeferreds();
                that._transition($(this).find('.fileupload-progress')).done(
                    function () {
                        that._trigger('started', e);
                    }
                );
            },
            // Callback for uploads stop, equivalent to the global ajaxStop event:
            stop: function (e) {
                if (e.isDefaultPrevented()) {
                    return false;
                }
                var that = $(this).data('blueimp-fileupload') ||
                    $(this).data('fileupload'),
                    deferred = that._addFinishedDeferreds();
                $.when.apply($, that._getFinishedDeferreds())
                    .done(function () {
                        that._trigger('stopped', e);
                    });
                that._transition($(this).find('.fileupload-progress')).done(
                    function () {
                        $(this).find('.progress')
                            .attr('aria-valuenow', '0')
                            .children().first().css('width', '0%');
                        $(this).find('.progress-extended').html('&nbsp;');
                        deferred.resolve();
                    }
                );
            },
            processstart: function (e) {
                if (e.isDefaultPrevented()) {
                    return false;
                }
                $(this).addClass('fileupload-processing');
            },
            processstop: function (e) {
                if (e.isDefaultPrevented()) {
                    return false;
                }
                $(this).removeClass('fileupload-processing');
            },
            // Callback for file deletion:
            destroy: function (e, data) {
                if (e.isDefaultPrevented()) {
                    return false;
                }
                var that = $(this).data('blueimp-fileupload') ||
                    $(this).data('fileupload'),
                    removeNode = function () {
                        that._transition(data.context).done(
                            function () {
                                $(this).remove();
                                that._trigger('destroyed', e, data);
                            }
                        );
                    };
                if (data.url) {
                    data.dataType = data.dataType || that.options.dataType;
                    $.ajax(data).done(removeNode).fail(function () {
                        that._trigger('destroyfailed', e, data);
                    });
                } else {
                    removeNode();
                }
            }
        },

        _resetFinishedDeferreds: function () {
            this._finishedUploads = [];
        },

        _addFinishedDeferreds: function (deferred) {
            if (!deferred) {
                deferred = $.Deferred();
            }
            this._finishedUploads.push(deferred);
            return deferred;
        },

        _getFinishedDeferreds: function () {
            return this._finishedUploads;
        },

        // Link handler, that allows to download files
        // by drag & drop of the links to the desktop:
        _enableDragToDesktop: function () {
            var link = $(this),
                url = link.prop('href'),
                name = link.prop('download'),
                type = 'application/octet-stream';
            link.bind('dragstart', function (e) {
                try {
                    e.originalEvent.dataTransfer.setData(
                        'DownloadURL',
                        [type, name, url].join(':')
                    );
                } catch (ignore) {}
            });
        },

        _formatFileSize: function (bytes) {
            if (typeof bytes !== 'number') {
                return '';
            }
            if (bytes >= 1000000000) {
                return (bytes / 1000000000).toFixed(2) + ' GB';
            }
            if (bytes >= 1000000) {
                return (bytes / 1000000).toFixed(2) + ' MB';
            }
            return (bytes / 1000).toFixed(2) + ' KB';
        },

        _formatBitrate: function (bits) {
            if (typeof bits !== 'number') {
                return '';
            }
            if (bits >= 1000000000) {
                return (bits / 1000000000).toFixed(2) + ' Gbit/s';
            }
            if (bits >= 1000000) {
                return (bits / 1000000).toFixed(2) + ' Mbit/s';
            }
            if (bits >= 1000) {
                return (bits / 1000).toFixed(2) + ' kbit/s';
            }
            return bits.toFixed(2) + ' bit/s';
        },

        _rawBitrate: function (bits) {
            if (typeof bits !== 'number') {
                return '';
            }
            return parseInt((bits / 1000).toFixed(2));
        },

        _formatTime: function (seconds) {
            var date = new Date(seconds * 1000),
                days = Math.floor(seconds / 86400);
            days = days ? days + 'd ' : '';
            return days +
                ('0' + date.getUTCHours()).slice(-2) + ':' +
                ('0' + date.getUTCMinutes()).slice(-2) + ':' +
                ('0' + date.getUTCSeconds()).slice(-2);
        },

        _formatPercentage: function (floatValue) {
            return (floatValue * 100).toFixed(2) + ' %';
        },

        _renderExtendedProgress: function (data) {
            return this._formatTime(
                (data.total - data.loaded) * 8 / data.bitrate
                ) + ' | ' +
                this._formatPercentage(
                    data.loaded / data.total
                ) + ' | ' +
                this._formatFileSize(data.loaded) + ' / ' +
                this._formatFileSize(data.total);
        },

        _renderTemplate: function (func, files) {
            if (!func) {
                return $();
            }
            var result = func({
                files: files,
                formatFileSize: this._formatFileSize,
                options: this.options
            });
            if (result instanceof $) {
                return result;
            }
            return $(this.options.templatesContainer).html(result).children();
        },

        _renderPreviews: function (data) {
            data.context.find('.preview').each(function (index, elm) {
                $(elm).append(data.files[index].preview);
            });
        },

        _renderUpload: function (files) {
            return this._renderTemplate(
                this.options.uploadTemplate,
                files
            );
        },

        _renderDownload: function (files) {
            return this._renderTemplate(
                this.options.downloadTemplate,
                files
            ).find('a[download]').each(this._enableDragToDesktop).end();
        },

        _startHandler: function (e) {
            e.preventDefault();
            var button = $(e.currentTarget),
                template = button.closest('.template-upload'),
                data = template.data('data');
            button.prop('disabled', true);
            if (data && data.submit) {
                data.submit();
            }
        },

        _cancelHandler: function (e) {
            e.preventDefault();
            var template = $(e.currentTarget)
                    .closest('.template-upload'),
                data = template.data('data') || {};
            data.context = data.context || template;
            if (data.abort) {
                data.abort();
            } else {
                data.errorThrown = 'abort';
                this._trigger('fail', e, data);
            }
        },

        _deleteHandler: function (e) {
            e.preventDefault();
            var button = $(e.currentTarget);
            this._trigger('destroy', e, $.extend({
                context: button.closest('.template-download'),
                type: 'DELETE'
            }, button.data()));
        },

        _forceReflow: function (node) {
            return $.support.transition && node.length &&
                node[0].offsetWidth;
        },

        _transition: function (node) {
            var dfd = $.Deferred();
            if ($.support.transition && node.hasClass('fade') && node.is(':visible')) {
                node.bind(
                    $.support.transition.end,
                    function (e) {
                        // Make sure we don't respond to other transitions events
                        // in the container element, e.g. from button elements:
                        if (e.target === node[0]) {
                            node.unbind($.support.transition.end);
                            dfd.resolveWith(node);
                        }
                    }
                ).toggleClass('in');
            } else {
                node.toggleClass('in');
                dfd.resolveWith(node);
            }
            return dfd;
        },

        _initButtonBarEventHandlers: function () {
            var fileUploadButtonBar = this.element.find('.fileupload-buttonbar'),
                filesList = this.options.filesContainer;
            this._on(fileUploadButtonBar.find('.start'), {
                click: function (e) {
                    e.preventDefault();
                    filesList.find('.start').click();
                }
            });
            this._on(fileUploadButtonBar.find('.cancel'), {
                click: function (e) {
                    e.preventDefault();
                    filesList.find('.cancel').click();
                }
            });
            this._on(fileUploadButtonBar.find('.delete'), {
                click: function (e) {
                    e.preventDefault();
                    filesList.find('.toggle:checked')
                        .closest('.template-download')
                        .find('.delete').click();
                    fileUploadButtonBar.find('.toggle')
                        .prop('checked', false);
                }
            });
            this._on(fileUploadButtonBar.find('.toggle'), {
                change: function (e) {
                    filesList.find('.toggle').prop(
                        'checked',
                        $(e.currentTarget).is(':checked')
                    );
                }
            });
        },

        _destroyButtonBarEventHandlers: function () {
            this._off(
                this.element.find('.fileupload-buttonbar')
                    .find('.start, .cancel, .delete'),
                'click'
            );
            this._off(
                this.element.find('.fileupload-buttonbar .toggle'),
                'change.'
            );
        },

        _initEventHandlers: function () {
            this._super();
            this._on(this.options.filesContainer, {
                'click .start': this._startHandler,
                'click .cancel': this._cancelHandler,
                'click .delete': this._deleteHandler
            });
            this._initButtonBarEventHandlers();
        },

        _destroyEventHandlers: function () {
            this._destroyButtonBarEventHandlers();
            this._off(this.options.filesContainer, 'click');
            this._super();
        },

        _enableFileInputButton: function () {
            this.element.find('.fileinput-button input')
                .prop('disabled', false)
                .parent().removeClass('disabled');
        },

        _disableFileInputButton: function () {
            this.element.find('.fileinput-button input')
                .prop('disabled', true)
                .parent().addClass('disabled');
        },

        _initTemplates: function () {
            var options = this.options;
            options.templatesContainer = this.document[0].createElement(
                options.filesContainer.prop('nodeName')
            );
            if (window.tmpl) {
                options.uploadTemplate = window.tmpl($('#fileupload').attr('data-template'));
            }
        },

        _initFilesContainer: function () {
            var options = this.options;
            if (options.filesContainer === undefined) {
                options.filesContainer = this.element.find('.files');
            } else if (!(options.filesContainer instanceof $)) {
                options.filesContainer = $(options.filesContainer);
            }
        },

        _initSpecialOptions: function () {
            this._super();
            this._initFilesContainer();
            this._initTemplates();
        },

        _create: function () {
            this._super();
            this._resetFinishedDeferreds();
            if (!$.support.fileInput) {
                this._disableFileInputButton();
            }
        },

        enable: function () {
            var wasDisabled = false;
            if (this.options.disabled) {
                wasDisabled = true;
            }
            this._super();
            if (wasDisabled) {
                this.element.find('input, button').prop('disabled', false);
                this._enableFileInputButton();
            }
        },

        disable: function () {
            if (!this.options.disabled) {
                this.element.find('input, button').prop('disabled', true);
                this._disableFileInputButton();
            }
            this._super();
        }

    });
});


