<h1>{{ $subject->name }}</h1>

<a href="{{ route('subjects.index') }}">Back to Subjects</a>

<h2>Activities</h2>
<a href="{{ route('subjects.activities.create', $subject->id) }}">Add Activity</a>

<ul>
    @foreach($subject->activities as $activity)
        <li>{{ $activity->type }} - {{ $activity->grade }} - {{ $activity->date }}
            <a href="{{ route('subjects.activities.edit', [$subject->id, $activity->id]) }}">Edit</a>
            <form action="{{ route('subjects.activities.destroy', [$subject->id, $activity->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
