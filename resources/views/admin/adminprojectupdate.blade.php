<!DOCTYPE html>
<html lang="en">

  <head>
  @include("admin.admincss")
  <title>Update project</title>
</head>

<body>
@include("admin.navbar")
@include("admin.adminscript")
<h1>Update project</h1>
<br><br/>
<form action="/edit" method="post">
    @csrf 
<input type="hidden" name="id" value="{{$display['id']}}">
<br/><br/>

<input type="text" name="title" value="{{$display['title']}}">
<br/><br/>

<input type="date" name="start_date" value="{{$display['start_date']}}">
<br/><br/>

<input type="date" name="end_date" value="{{$display['end_date']}}">
<br/><br>

<input type="text" name="duration" value="{{$display['duration']}}">
<br/><br/>

<label for="progress">Project Progress:</label>
                <select id="progress" name="progress" value="{{$display['progress']}}">
                @if($display['progress'] =='milestone1') 
                    <option value="milestone1" selected>Milestone 1</option>
                    <option value="milestone2">Milestone 2</option>
                    <option value="finalReport">Final Report</option>
                    @elseif($display['progress'] =='milestone2') 
                    <option value="milestone1" >Milestone 1</option>
                    <option value="milestone2"selected>Milestone 2</option>
                    <option value="finalReport">Final Report</option>
                    @else
                    <option value="milestone1" >Milestone 1</option>
                    <option value="milestone2">Milestone 2</option>
                    <option value="finalReport"selected>Final Report</option>
                    @endif
                </select><br><br>

                <label for="status">Project Status:</label>
                <select id="status" name="status">
                @if($display['status'] =='onTrack') 
                    <option value="onTrack" selected>On Track</option>
                    <option value="delayed" >Delayed</option>
                    <option value="extended" >Extended</option>
                    <option value="completed" >Completed</option>
                    @elseif($display['status'] =='delayed') 
                    <option value="onTrack">On Track</option>
                    <option value="delayed" selected>Delayed</option>
                    <option value="extended" >Extended</option>
                    <option value="completed" >Completed</option>
                    @elseif($display['status'] =='extended')
                    <option value="onTrack" >On Track</option>
                    <option value="delayed" >Delayed</option>
                    <option value="extended" selected>Extended</option>
                    <option value="completed" >Completed</option>
                    @else
                    <option value="onTrack" >On Track</option>
                    <option value="delayed" >Delayed</option>
                    <option value="extended" >Extended</option>
                    <option value="completed" selected>Completed</option>
                    @endif
                </select><br><br>

<button type=submit>UPDATE</button>
<button type=reset>RESET</button>

</form>
</body>
</html>