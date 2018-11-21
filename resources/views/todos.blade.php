
<table class="table table-striped">
    <thead>
        <tr>
            <th>
                <input type="checkbox" class="check-all">
            </th>
            <th>Todo</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($todos as $todo)
        <tr>
            <td><input type="checkbox" class="check-todo" data-id="{{ $todo->id }}" @if($todo->completed) checked="checked" @endif></td>
            <td @if($todo->completed) class="completed" @endif>{{ $todo->title }}</td>
            <td><span class="fa fa-trash del-todo" data-id="{{ $todo->id }}"></span></td>
        </tr>
    @endforeach
    </tbody>
</table>