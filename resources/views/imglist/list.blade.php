@extends('templates.layout')
@section('title','画像リソースダウンロード管理')
@section('description','画像リソースダウンロード管理')
@section('pagetitle','')
@include('templates.header')
@include('templates.footer')
@section('content')
<!-- ここにコンテンツ部分の記述 -->
{{--コメントの内容--}}



<script type="text/javascript"><!--
$(document).ready(function(){

	//動的フィルタ
	$('#imglists').searcher({
		itemSelector: 'dl',
		textSelector:  '',
		inputSelector: '#listsearchinput'
	});

	//フィルタクリア
	$('#filterclear').click(function(){
		location.href='./imglist';
	});

});// -->
</script>


<div class="readme">
<h2><span>画像ダウンロードについて</span></h2>
<p>
ご利用いただきたい画像を「選択する」ボタンを押し申請フォームを入力してください。<br>
申請フォーム入力後の画面で画像ダウンロードができます。
</p>
<span class="notice">【ご利用上の注意事項】</span>
<span class="subnotice">- 必ずお読みください -</span>
<ul>
<li>ダウンロードした画像は申請用途以外の利用は禁止します。</li>
<li>ダウンロードした画像を他者へ渡すことは禁止です。（利用者・利用案件ごと申請ください）</li>
<li>良識の範囲内でのご利用でお願いします、使用の可否判断について不明な場合は所属長まで確認ください。</li>
</ul>
</div>
<!-- /.readme -->

<dl class="filterinput">
<dt>商品番号フィルタ：</dt>
<dd class="input">
<input type="text" name="filter" value="" id="listsearchinput">
<span class="ex">ex) TH0011</span>
</dd>
<dd class="clear">
<span id="filterclear">クリア</span>
</dd>
</dl>



<form action="{{ url('/imglist/cart')}}" method="GET">
<div id="imglists">
@csrf
@foreach ( $data as $word )

<dl class="loop-unit">
<dd>
<span class="no">{{ $word["itemno"] }}</span>
</dd>
<dt>
<img src="{{ asset('/img') }}/{{ $word["filepath"] }}{{ $word["filename"] }}" alt="">
</dt>
<dd>
<span class="btn cart-btn">
<a href="{{ url('/imglist/cart') }}?id={{ $word["no"] }}"><i class="fas fa-file-download"></i> 選択する</a>
</span>
</dd>
</dl>

@endforeach

</div><!-- /#imglists -->
</form>


</div>



@endsection