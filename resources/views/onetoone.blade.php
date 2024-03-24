<!DOCTYPE html>
<html>
<head>
    <title>Persons and Profiles</title>
    <link rel="stylesheet" href="{{ asset('css/onetoone.css') }}">
</head>
<body>

<table>
    <thead>
        <tr>
            <th>Fullname</th>
            <th>Email</th>
            <th>Profile Contact</th>
            <th>Profile Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($persons as $person)
            <tr>
                <td>{{ $person->fullname }}</td>
                <td>{{ $person->email }}</td>
                <td>{{ $person->profile->contact ?? 'No Contact' }}</td>
                <td>{{ $person->profile->address ?? 'No Address' }}</td>
                <td><a href="{{ route('create', ['person_id' => $person->id]) }}" class="btn">Post</a></td>
               
        @endforeach
    </tbody>
</table>

</body>
</html>
