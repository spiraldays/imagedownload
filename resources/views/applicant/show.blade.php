<h1>詳細画面</h1>
<p><a href="{{ route('applicant.index')}}">一覧画面</a></p>

<table border="1">
    <tr>
        <th>id</th>
        <th>title</th>
        <th>author</th>
        <th>created_at</th>
        <th>updated_at</th>
    </tr>
    <tr>
        <td>{{ $applicant->id }}</td>
        <td>{{ $applicant->title }}</td>
        <td>{{ $applicant->author }}</td>
        <td>{{ $applicant->created_at }}</td>
        <td>{{ $applicant->updated_at }}</td>
    </tr>
</table>