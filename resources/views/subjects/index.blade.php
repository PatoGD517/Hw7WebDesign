<h1>Subjects</h1>
<a href="{{ route('subjects.create') }}">Add New Subject</a>

<ul>
    @foreach($subjects as $subject)
        <li>
            <a href="{{ route('subjects.show', $subject->id) }}">{{ $subject->name }}</a>
            <a href="{{ route('subjects.edit', $subject->id) }}">Edit</a>
            <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
