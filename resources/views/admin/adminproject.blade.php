<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admincss')
    <title>Create project</title>
</head>

<body>
    @include('admin.navbar')
    @include('admin.adminscript')
    <h1>Create project</h1>
    <br>
    <form method="post" action="addProject">
        <ul class="form-style-1">
            @csrf
            <!-- <input type = "text" name="id" placeholder="ID"</input><br/><br/>-->

            <li>
                <label for="name">Title :<span class="required">*</span></label>
                <input type="text" name="title" placeholder="Title" class="field-long" required</input><br /><br />
            </li>

            <li>
                <label for="start_date">Start Date :<span class="required">*</span></label>
                <input type="date" name="start_date" placeholder="Start Date" class="field-long" required </input><br /><br>
            </li>

            <li>
                <label for="end_date">End Date :<span class="required">*</span></label>
                <input type="date" name="end_date" placeholder="End Date" class="field-long" required </input><br /><br>
            </li>

            <li>
                <label for="name">Duration :<span class="required">*</span></label>
                <input type="text" name="duration" placeholder="Duration" class="field-long" required </input><br /><br />
            </li>

            <li>
                <label for="progress">Project Progress:<span class="required">*</span></label>
                <select id="progress" name="progress" class="field-select"class="field-select" >
                    <option value="milestone1">Milestone 1</option>
                    <option value="milestone2">Milestone 2</option>
                    <option value="finalReport">Final Report</option>
                </select><br><br>
                <label for="status">Project Status:<span class="required">*</span></label>
                <select id="status" name="status" class="field-select">
                    <option value="onTrack">On Track</option>
                    <option value="delayed">Delayed</option>
                    <option value="extended">Extended</option>
                    <option value="completed">Completed</option>
                </select><br><br>
            </li>

            <li>
                <label for="student">Student:<span class="required">*</span></label>
                <select id="student" name="student" class="field-select">
                    @foreach ($stud as $data)
                        <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                    @endforeach
                </select><br><br>
            </li>

            <li>
                <label for="Supervisor">Supervisor:<span class="required">*</span></label>
                <select id="Supervisor" name="Supervisor" class="field-select">
                    @foreach ($sup as $data)
                        <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                    @endforeach
                </select><br><br>
            </li>

            <li>
                <label for="Examiner1">Examiner 1:<span class="required">*</span></label>
                <select id="Examiner1" name="Examiner1" class="field-select">
                    @foreach ($exam1 as $data)
                        <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                    @endforeach
                </select><br><br>
            </li>

            <li>
                <label for="Examiner2">Examiner 2:<span class="required">*</span></label>
                <select id="Examiner2" name="Examiner2" class="field-select">
                    @foreach ($exam2 as $data)
                        <option value="{{ $data['id'] }}">{{ $data['name'] }}</option>
                    @endforeach
                </select><br><br>
            </li>
                <button class="button" type="submit">Add</button>
                <button class="button" type="reset">Reset Form</button>
    </form>

</body>

</html>
