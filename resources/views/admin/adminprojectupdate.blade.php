<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admincss')
    <title>Update project</title>
</head>

<body>
    @include('admin.navbar')
    @include('admin.adminscript')
    <h1>Update project</h1>
    <br><br />
    <form action="/edit" method="post">
        <ul class="form-style-1">
            @csrf

            <input type="hidden" name="id" value="{{ $display['id'] }}">
            <br /><br />

            <li>
                <label>Title <span class="required">*</span></label>
                <input type="text" name="title" value="{{ $display['title'] }}" class="field-long" required>
                <br /><br />
            </li>

            <li>
                <label>Start Date <span class="required">*</span></label>
                <input type="date" name="start_date" value="{{ $display['start_date'] }}" class="field-long"
                    required>
                <br /><br />
            </li>

            <li>
                <label>End Date <span class="required">*</span></label>
                <input type="date" name="end_date" value="{{ $display['end_date'] }}" class="field-long" required>
                <br /><br>
            </li>

            <li>
                <label>Duration <span class="required">*</span></label>
                <input type="text" name="duration" value="{{ $display['duration'] }}" class="field-long" required>
                <br /><br />
            </li>

            <li>
                <label for="progress">Project Progress:</label>
                <select id="progress" name="progress" value="{{ $display['progress'] }}" class="field-long" required>
                    @if ($display['progress'] == 'milestone1')
                        <option value="milestone1" selected>Milestone 1</option>
                        <option value="milestone2">Milestone 2</option>
                        <option value="finalReport">Final Report</option>
                    @elseif($display['progress'] == 'milestone2')
                        <option value="milestone1">Milestone 1</option>
                        <option value="milestone2"selected>Milestone 2</option>
                        <option value="finalReport">Final Report</option>
                    @else
                        <option value="milestone1">Milestone 1</option>
                        <option value="milestone2">Milestone 2</option>
                        <option value="finalReport"selected>Final Report</option>
                    @endif
                </select><br><br>
            </li>

            <li>
                <label for="status">Project Status:</label>
                <select id="status" name="status" class="field-long" required>
                    @if ($display['status'] == 'onTrack')
                        <option value="onTrack" selected>On Track</option>
                        <option value="delayed">Delayed</option>
                        <option value="extended">Extended</option>
                        <option value="completed">Completed</option>
                    @elseif($display['status'] == 'delayed')
                        <option value="onTrack">On Track</option>
                        <option value="delayed" selected>Delayed</option>
                        <option value="extended">Extended</option>
                        <option value="completed">Completed</option>
                    @elseif($display['status'] == 'extended')
                        <option value="onTrack">On Track</option>
                        <option value="delayed">Delayed</option>
                        <option value="extended" selected>Extended</option>
                        <option value="completed">Completed</option>
                    @else
                        <option value="onTrack">On Track</option>
                        <option value="delayed">Delayed</option>
                        <option value="extended">Extended</option>
                        <option value="completed" selected>Completed</option>
                    @endif
                </select><br><br>
            </li>

            <li>
                <label for="student">Student:</label>
                <select id="student" name="student" class="field-select">
                    @foreach ($stud as $data)
                        <option value="{{ $data['id'] }}" {{ $data['id'] == $display['stud'] ? 'selected' : '' }}>
                            {{ $data['name'] }}</option>
                    @endforeach
                </select><br><br>
            </li>

            <li>
                <label for="Supervisor">Supervisor:</label>
                <select id="Supervisor" name="Supervisor" class="field-select">
                    @foreach ($sup as $data)
                        <option value="{{ $data['id'] }}" {{ $data['id'] == $display['sv'] ? 'selected' : '' }}>
                            {{ $data['name'] }}</option>
                    @endforeach
                </select><br><br>
            </li>

            <li>
                <label for="Examiner1">Examiner 1:</label>
                <select id="Examiner1" name="Examiner1" class="field-select">
                    @foreach ($exam1 as $data)
                        <option value="{{ $data['id'] }}" {{ $data['id'] == $display['ex1'] ? 'selected' : '' }}>
                            {{ $data['name'] }}</option>
                    @endforeach
                </select><br><br>
            </li>

            <li>
                <label for="Examiner2">Examiner 2:</label>
                <select id="Examiner2" name="Examiner2" class="field-select">
                    @foreach ($exam2 as $data)
                        <option value="{{ $data['id'] }}" {{ $data['id'] == $display['ex2'] ? 'selected' : '' }}>
                            {{ $data['name'] }}</option>
                    @endforeach
                </select><br><br>
            </li>

            <button class="button" type=submit>UPDATE</button>
            <button class="button" type=reset>RESET</button>
        </ul>

    </form>
</body>

</html>
