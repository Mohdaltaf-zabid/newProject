<!DOCTYPE html>
<html lang="en">

  <head>
  @include("student.studentcss")
  <title>Home Page Student</title>
</head>

<body>
    @include("student.studentNavBar")
    @include("student.studentscript")

    <h1>Student Project Lists</h1>
    <br><br/>
    <table id="tablecss">
        <tr>
            <th> Student </th>
            <th> Title </th>
            <th> Start Date </th>
            <th> End Date </th>
            <th> Duration </th>
            <th> Progress </th>
            <th> Status </th>
            <th> supervisor </th>
            <th> Examiners 1 </th>
            <th> Examiners 2 </th>
    </tr>
    
    @foreach($data as $display)
    <tr>
        <td>{{$display->student_name }}</td>
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
        <td>{{$display->sv_name }}</td>
        <td>{{$display->ex1_name }}</td>
        <td>{{$display->ex2_name }}</td>
    </tr>
    @endforeach
    </table>
    </body>

</html>
</body>

</html>