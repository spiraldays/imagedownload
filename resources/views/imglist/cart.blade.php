@extends('templates.layout')
@section('title','画像リソースダウンロード管理')
@section('description','画像リソースダウンロード管理')
@section('pagetitle','カート')
@include('templates.header')
@include('templates.footer')
@section('content')
<!-- ここにコンテンツ部分の記述 -->
{{--コメントの内容--}}


<div id="imglists">
@foreach ( $view_ary as $word )

<dl class="loop-unit">
<dd>	
<span class="no">{{ $word["itemno"] }}</span>
</dd>
<dt>
<img src="{{ asset('/img') }}/{{ $word["filepath"] }}{{ $word["filename"] }}" alt="">
</dt>
<dd>
<span class="btn negation">
<a href="{{ url('/imglist/del') }}?id={{ $word["no"] }}"><i class="far fa-trash-alt"></i> 選択を解除する</a>
</span>
</dd>
</dl>

@endforeach
</div><!-- /#imglists -->

<div class="btn-wrap">
	
<span class="btn back-btn">
<a href="{{ url('/imglist') }}"><i class="fas fa-plus-circle"></i> 画像を追加選択する</a>
</span>

<p class="text-center">
選択した画像は申請フォーム入力後にダウンロードいただけます。
<br>
▼
</p>

<span class="btn applicant">
<a href="{{ url('/applicant/create') }}"><i class="far fa-file-alt"></i> 申請フォームへ</a>
</span>

</div>
<!-- /.btn-wrap -->

@endsection