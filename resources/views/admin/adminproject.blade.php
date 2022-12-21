<!DOCTYPE html>
<html lang="en">

  <head>
  @include("admin.admincss")
  <title>Create project</title>
</head>

<body>
@include("admin.navbar")
@include("admin.adminscript")
<h1>Create project</h1>
<br><br/>
<form method="post" action="addProject">
    @csrf
    <!-- <input type = "text" name="id" placeholder="ID"</input><br/><br/>-->
    <label for="name">Title :</label>
    <input type="text" name="title" placeholder="Title" </input><br /><br />
    <label for="start_date">Start Date :</label>
    <input type="date" name="start_date" placeholder="Start Date" </input><br /><br>
    <label for="end_date">End Date :</label>
    <input type="date" name="end_date" placeholder="End Date" </input><br /><br>
    <label for="name">Duration :</label>
    <input type="text" name="duration" placeholder="Duration" </input><br /><br />
    <label for="progress">Project Progress:</label>
    <select id="progress" name="progress">
        <option value="milestone1">Milestone 1</option>
        <option value="milestone2">Milestone 2</option>
        <option value="finalReport">Final Report</option>
    </select><br><br>
    <label for="status">Project Status:</label>
    <select id="status" name="status">
        <option value="onTrack">On Track</option>
        <option value="delayed">Delayed</option>
        <option value="extended">Extended</option>
        <option value="completed">Completed</option>
    </select><br><br>

    <label for="student">Student:</label>
    <select id="student" name="student">
    @foreach($stud as $data)
        <option value="{{$data['id']}}">{{$data['name']}}</option>
        @endforeach
    </select><br><br>

    <label for="Supervisor">Supervisor:</label>
    <select id="Supervisor" name="Supervisor">
    @foreach($sup as $data)
        <option value="{{$data['id']}}">{{$data['name']}}</option>
        @endforeach
    </select><br><br>

    <label for="Examiner1">Examiner 1:</label>
    <select id="Examiner1" name="Examiner1">
    @foreach($exam1 as $data)
        <option value="{{$data['id']}}">{{$data['name']}}</option>
        @endforeach
    </select><br><br>

    <label for="Examiner2">Examiner 2:</label>
    <select id="Examiner2" name="Examiner2">
    @foreach($exam2 as $data)
        <option value="{{$data['id']}}">{{$data['name']}}</option>
        @endforeach
    </select><br><br>

    <button type="submit">Add</button>
    <button type="reset">Reset Form</button>
</form>

</body>

</html>