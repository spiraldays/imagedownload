<h1> Item List</h1>
<p><a href="{{ route('item.create') }}">新規追加</a></p>
 
<table>
    <tr>
        <th>title</th>
        <th>詳細</th>
        <th>編集</th>
        <th>削除</th>
    </tr>
    @foreach ($items as $item)
    <tr>
        <td>{{ $item->name }}</td>
        <th><a href="{{ route('item.show' , $item->id)}}">詳細</a></th>
        <th><a href="{{ route('item.edit', $item->id)}}">編集</a></th>
        <th>
            <form action="{{ route('item.destroy', $item->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <input type="submit" name="" value="削除">
            </form>
        </th>
    </tr>
    @endforeach
</table>