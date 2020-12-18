<h1>一覧画面</h1>
<p><a href="{{ route('applicant.create') }}">新規追加</a></p>

@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif

<table border="1">
<tr>
<th>id</th>
<th>vc_name</th>
<th>vc_department</th>
<th>email</th>
<th>tx_note</th>
<th>b_enable</th>
<th>created_at</th>
<th>updated_at</th>
</tr>


@foreach ($applicants as $applicant)
<tr>
<td>{{ $applicant->title }}</td>
<th><a href="{{ route('applicant.show',$applicant->id)}}">詳細</a></th>
<th><a href="{{ route('applicant.edit',$applicant->id)}}">編集</a></th>
<th>
<form action="{{ route('applicant.destroy', $applicant->id)}}" method="POST">
@csrf
@method('DELETE')
<input type="submit" name="" value="削除">
</form>
</th>
</tr>
@endforeach



</table>