<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waitlist</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:wght@200;800&display=swap" rel="stylesheet">
</head>
<body class="bg-[#111827]">
    {{-- <h1 class="flex-1>Waitlisted Emails</h1> --}}
    <div class="relative overflow-x-auto shadow-md p-10 flex-1 dark:bg-[#111827]">
    <table border="1" class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">ID</th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Email</th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Created At</th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($waitlists as $waitlist)
                <tr>
                    <td class="px-6 py-4">{{ $waitlist->id }}</td>
                    <td class="px-6 py-4">{{ $waitlist->email }}</td>
                    <td class="px-6 py-4">{{ $waitlist->created_at }}</td>
                    <td class="px-6 py-4">
                        <form action="/waitlist/{{ $waitlist->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-1/2 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" type="email" name="email" value="{{ $waitlist->email }}" required>
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Update</button>
                        </form>
                        <form action="/waitlist/{{ $waitlist->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</body>
</html>
