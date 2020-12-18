@extends('templates.layout')
@section('title','画像リソースダウンロード管理')
@section('description','画像リソースダウンロード管理')
@section('pagetitle','ダウンロードページ')
@include('templates.header')
@include('templates.footer')
@section('content')
<!-- ここにコンテンツ部分の記述 -->
{{--コメントの内容--}}



<div id="imglists">
@foreach ($session_ids as $data)

<dl class="loop-unit">
<dd>
<span class="no">{{ $data["itemno"] }}</span>
</dd>
<dt>	
<a href="./applicant/download?id={{ $data["no"] }}" target="_blank">
<img src="{{ asset("img/".$data["filepath"].$data["filename"]) }}" alt="te">
</a>
</dt>
<dd>
<span class="btn cart-btn">
<a href="./applicant/download?id={{ $data["no"] }}" target="_blank"><i class="fas fa-download"></i> 画像ダウンロード</a>
</span>
</dd>
</dl>

@endforeach

</div><!-- /#imglists -->


<div class="btn-wrap">
<span class="btn negation">
<a href="{{ route('applicant.index')}}">一覧画面へ戻る</a>
</span>
</div>



@endsection