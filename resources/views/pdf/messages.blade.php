<html>
<head></head>
<body>
<h1>Messages List</h1>
<table>
    <thead>
    <tr>
        <th>Picture</th>
        <th>Name</th>
        <th>E-Mail</th>
        <th>Message</th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $message)
        <tr>
            <td><img class="image" src="data:image/jpeg;base64, {{ base64_encode(@file_get_contents(asset('images/'.$message->avatar))) }}" width="50px" height="50px"></td>
            <td>{{ $message->name }}</td>
            <td>{{ $message->email }}</td>
            <td>{{ $message->message }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>

