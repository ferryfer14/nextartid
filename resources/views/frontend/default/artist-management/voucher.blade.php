@extends('index')
@section('content')
    @if(isset($voucher) && count($voucher))
        <div class="content home-section swiper apple-music-look home-content-container" style="margin-bottom: 0px;">
            <div class="swiper-container swiper-container-slide">
                <div class="swiper-wrapper">
                    @foreach ($voucher as $v)
                        @if(isset($v->id))
                            <div class="module module-cell swiper station swiper-slide draggable" data-toggle="contextmenu" data-trigger="right">
                                <div class="img-container" style="width: 100%;">
                                    <img class="img" style="height: 100%;" src="{{$v->artwork_url}}" alt="{{$v->code}}">
                                </div>
                                <div class="video-description justify-content-center">
                                    <div class="row d-flex align-items-center">
                                        <div class="col-sm-4">
                                            Kode
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="input-group col-xs-12">
                                                <input type="text" class="form-control input-lg" readonly value="{{$v->code}}">
                                                <span class="input-group-btn">
                                                    <button class="copy btn btn-primary input-lg" onclick="copyToClipboard('{{$v->code}}')" type="button"><i class="fas fa-fw fa-file"></i> Copy</button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="description">{{$v->description}}</div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <a class="home-pageable-nav previous-pageable-nav swiper-arrow-left" style="left: 20px !important; bottom: 50% !important;">
                <div class="icon pagable-icon">
                    <svg height="16" viewBox="0 0 501.5 501.5" width="16" xmlns="http://www.w3.org/2000/svg"><g><path d="M302.67 90.877l55.77 55.508L254.575 250.75 358.44 355.116l-55.77 55.506L143.56 250.75z"></path></g></svg>
                </div>
            </a>
            <a class="home-pageable-nav next-pageable-nav swiper-arrow-right" style="right: 20px !important; bottom: 50% !important;">
                <div class="icon pagable-icon">
                    <svg height="16" viewBox="0 0 501.5 501.5" width="16" xmlns="http://www.w3.org/2000/svg"><g><path d="M302.67 90.877l55.77 55.508L254.575 250.75 358.44 355.116l-55.77 55.506L143.56 250.75z"></path></g></svg>
                </div>
            </a>
        </div>
    @endif
@endsection