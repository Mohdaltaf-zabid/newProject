<!DOCTYPE html>
<html lang="en">

  <head>
  @include("admin.admincss")
</head>

<body>
    @include("admin.navbar")
    @include("admin.adminscript")
    <h1>Project Lists </h1>
<br><br/>
<table id="tablecss">
    <tr>
        <td> Student </td>
        <td> Title </td>
        <td> Start Date </td>
        <td> End Date </td>
        <td> Duration </td>
        <td> Progress </td>
        <td> Status </td>
        <td> supervisor </td>
        <td> Examiners 1 </td>
        <td> Examiners 2 </td>
        <td> Update </td>
        <td> Delete </td>
</tr>

@foreach($data as $display)
<tr>
    <td>{{$display->name }}</td>
    <td>{{$display->title}}</td>
    <td>{{$display->start_date}}</td>
    <td>{{$display->end_date}}</td>
    <td>{{$display->duration}}</td>
    @if($display->progress =='milestone1')        
        <td>Milestone 1</td>         
    @elseif($display->progress =='milestone2')
        <td>Milestone 2</td>
    @else
        <td>Final Report</td>
    @endif
    @if($display->status =='onTrack')         
        <td>On Track</td>         
    @elseif($display->status =='delayed')
        <td>Delayed</td>
    @elseif($display->status =='extended')
        <td>Extended</td>
    @else
        <td>Completed</td>
    @endif
    <td>{{$display->sv }}</td>
    <td>{{$display->ex1 }}</td>
    <td>{{$display->ex2 }}</td>
    <td><a href={{"upd/".$display->id}}>Update</a></td>
    <td><a href={{"del/".$display->id}}>Delete</a></td>
</tr>
@endforeach
</table>
</body>

</html>