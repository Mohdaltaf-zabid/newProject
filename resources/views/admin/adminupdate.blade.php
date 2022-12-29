<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admincss')
    <title>Update User</title>
</head>

<body>

    @include('admin.navbar')
    @include('admin.adminscript')
    <h1> Update User </h1>
    <form action="/editUser" method="post">
        <ul class="form-style-1">
            @csrf
            <input type="hidden" name="id" value="{{ $display['id'] }}">
            <br /><br />
            <li>
                <label>Name <span class="required">*</span></label>
                <input type="text" name="name" value="{{ $display['name'] }}" class="field-long" required>
                <br /><br />
            </li>

            <li>
                <label>Email <span class="required">*</span></label>
                <input type="email" name="email" value="{{ $display['email'] }}" class="field-long" class="field-long" required>
                <br /><br />
            </li>

            <li>
                <label for="userType">User Type:<span class="required">*</span></label>
                <select id="usertype" name="usertype" class="field-long" required> 
                    @if ($display['usertype'] == '0')
                        <option value="0" selected>Student</option>
                        <option value="3">Supervisor</option>
                        <option value="2">Examiner</option>
                        <option value="1">FYP coordinator</option>
                    @elseif($display['usertype'] == '1')
                        <option value="0">Student</option>
                        <option value="3">Supervisor</option>
                        <option value="2">Examiner</option>
                        <option value="1" selected>FYP coordinator</option>
                    @elseif($display['usertype'] == '2')
                        <option value="0">Student</option>
                        <option value="3">Supervisor</option>
                        <option value="2" selected>Examiner</option>
                        <option value="1">FYP coordinator</option>
                    @else
                        <option value="0">Student</option>
                        <option value="3" selected>Supervisor</option>
                        <option value="2">Examiner</option>
                        <option value="1">FYP coordinator</option>
                    @endif
                </select><br><br>
            </li>

            <button class="button" type=submit>UPDATE</button>
            <button class="button" type=reset>RESET</button>
        </ul>
    </form>
</body>

</html>
