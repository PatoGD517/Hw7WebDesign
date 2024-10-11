<h1>Activities for {{ $subject->name }}</h1>

<a href="{{ route('subjects.activities.create', $subject->id) }}">Add New Activity</a>

<table>
    <thead>
        <tr>
            <th>Type</th>
            <th>Grade</th>
            <th>Date</th>
            <th>Note</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($subject->activities as $activity)
        <tr>
            <td>{{ $activity->type }}</td>
            <td>{{ $activity->grade }}</td>
            <td>{{ $activity->date }}</td>
            <td>{{ $activity->note }}</td>
            <td>
                <a href="{{ route('subjects.activities.edit', [$subject->id, $activity->id]) }}">Edit</a>
                <form action="{{ route('subjects.activities.destroy', [$subject->id, $activity->id]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('subjects.index') }}">Back to Subjects</a>
