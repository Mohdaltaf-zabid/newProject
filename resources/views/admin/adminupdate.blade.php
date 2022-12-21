<!DOCTYPE html>
<html lang="en">

  <head>
  @include("admin.admincss")
</head>

<body>
    
@include("admin.navbar")
    @include("admin.adminscript")
    <h1> Update User </h1>
<form action="/editUser" method="post">
    @csrf 
<input type="hidden" name="id" value="{{$display['id']}}">
<br/><br />

<input type="text" name="name" value="{{$display['name']}}">
<br /><br />

<input type="email" name="email" value="{{$display['email']}}">
<br /><br />

<label for="userType">User Type:</label>
<select id="usertype" name="usertype">
    @if($display['usertype'] =='0') 
        <option value="0" selected>Student</option>
        <option value="3">Supervisor</option>
        <option value="2">Examiner</option>
        <option value="1">FYP coordinator</option>
    @elseif($display['usertype'] =='1') 
        <option value="0" >Student</option>
        <option value="3">Supervisor</option>
        <option value="2">Examiner</option>
        <option value="1" selected>FYP coordinator</option>
    @elseif($display['usertype'] =='2') 
        <option value="0" >Student</option>
        <option value="3">Supervisor</option>
        <option value="2" selected>Examiner</option>
        <option value="1">FYP coordinator</option>
    @else
        <option value="0" >Student</option>
        <option value="3" selected>Supervisor</option>
        <option value="2">Examiner</option>
        <option value="1">FYP coordinator</option>
        @endif
</select><br><br>

<button type=submit>UPDATE</button>
<button type=reset>RESET</button>

</form>
</body>

</html>