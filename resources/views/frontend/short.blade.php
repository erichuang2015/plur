@extends('layouts.frontend')

@section('css_class', 'view_short')

@section('content')
<div class="container">
  <div class="row header mt-5">
  <div class="col-md-9">
    @if (session('msgLinkAlreadyExists'))
    <div class="alert alert-success">
      {{ session('msgLinkAlreadyExists') }}
    </div>
    @endif

    <ul class="list-inline">
      <li class="list-inline-item">
        <i class="far fa-clock"></i>
        <i>{{ $created_at }}</i>
      </li>
      <li class="list-inline-item">
        <i class="far fa-eye"></i>
        <i>{{ $views }}</i>
      </li>
    </ul>
    <div class="title">{{ $long_url_title }}</div>
  </div>
  </div>

  <div class="row mt-3">
  <div class="col-md-9">
    <div class="row body">
      <div class="col-md">
        <img src="data:{{$qrCodeData}};base64,{{$qrCodebase64}}" alt="QR Code">
      </div>
      <div class="col-md-9">
        <b>Original URL</b>
        <div class="long-url"><a href="{{ $long_url_href }}" target="_blank" title="{{ $long_url_href }}">{{ $long_url }}</a></div>

        <br>

        <b>Short URL</b> <br>
        <span class="short-url"><a href="{{ $short_url_href }}" target="_blank" id="copy">{{ $short_url }}</a></span>
        <button class="btn btn-outline-success btn-copy ml-3" data-clipboard-text="{{ $short_url_href }}" title="Copy to clipboard">Copy</button>
        <small class="text-info" id="url-copied"></small>

        <br><br>

        <b>Share to:</b>
        <div class="socials-share" data-share-url="{{ $short_url_href }}">
          <button class="btn btn-facebook social-share-network" data-social-network="facebook"><i class="fab fa-facebook-f"></i></button>
          <button class="btn btn-twitter social-share-network" data-social-network="twitter"><i class="fab fa-twitter"></i></button>
          <button class="btn btn-google-plus social-share-network" data-social-network="google"><i class="fab fa-google-plus-g"></i></button>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
@endsection
