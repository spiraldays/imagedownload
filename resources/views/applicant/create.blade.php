@extends('templates.layout')
@section('title','画像リソースダウンロード管理')
@section('description','画像リソースダウンロード管理')
@section('pagetitle','申請フォーム')
@include('templates.header')
@include('templates.footer')
@section('content')
<!-- ここにコンテンツ部分の記述 -->
{{--コメントの内容--}}

<div id="page-form">
	


@if ($errors->any())
<ul class="err-msg">
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
@endif

<div class="formarea">

<form action="{{ route('applicant.store')}}" method="POST" name="applicant_form">
@csrf

<dl class="require">
<dt>申請者：</dt>
<dd>
<input type="text" name="vc_name" value="{{old('vc_name')}}">
</dd>
</dl>

<dl class="require">
<dt>部署：</dt>
<dd>
<input type="text" name="vc_department" value="{{old('vc_department')}}">
</dd>
</dl>

<dl>
<dt>メール：</dt>
<dd>
<input type="text" name="email" value="{{old('email')}}">
</dd>
</dl>

<dl>
<dt>ご利用用途など：</dt>
<dd>
<textarea type="text" name="tx_note" value="{{old('tx_note')}}"></textarea>
</dd>
</dl>


<div class="btn-wrap">
<span class="btn applicant">
<a href="javascript:void(0)" onclick="document.applicant_form.submit();return false;"><i class="far fa-file-alt"></i> 申請する</a>
</span>

<span class="btn negation">
<a href="{{ route('applicant.index')}}">一覧画面へ戻る</a>
</span>
</div>

</form>
</div>
<!-- /.formarea -->



</div>
<!-- /#page-form -->

@endsection