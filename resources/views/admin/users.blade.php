<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admincss')
    <title>List of User</title>

</head>

<body>
    @include('admin.adminscript')
    @include('admin.navbar')
    <h1>User Lists </h1>
    <br>
    <table id="tablecss">
        <tr>
            <th> ID </th>
            <th> Name </th>
            <th> Email </th>
            <th> User Type </th>
            <th> Update </th>
            <th> Delete </th>
        </tr>

        @foreach ($data as $data)
            <tr>
                <td>{{ $data['id'] }}</td>
                <td>{{ $data['name'] }}</td>
                <td>{{ $data['email'] }}</td>
                @if ($data->usertype == '1')
                    <td>FYP coordinator</td>
                @elseif($data->usertype == '2')
                    <td>Examiner</td>
                @elseif($data->usertype == '3')
                    <td>Supervisor</td>
                @else
                    <td>Student</td>
                @endif
                <td><a href={{ 'updUser/' . $data['id'] }}>Update</a></td>
                <td><a href={{ 'delUser/' . $data['id'] }}>Delete</a></td>
            </tr>
        @endforeach
    </table>

</body>

</html>
