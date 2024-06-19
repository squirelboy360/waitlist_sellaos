<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waitlist</title>
</head>
<body>
    <h1>Waitlisted Emails</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($waitlists as $waitlist)
                <tr>
                    <td>{{ $waitlist->id }}</td>
                    <td>{{ $waitlist->email }}</td>
                    <td>{{ $waitlist->created_at }}</td>
                    <td>
                        <form action="/waitlist/{{ $waitlist->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <input type="email" name="email" value="{{ $waitlist->email }}" required>
                            <button type="submit">Update</button>
                        </form>
                        <form action="/waitlist/{{ $waitlist->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
