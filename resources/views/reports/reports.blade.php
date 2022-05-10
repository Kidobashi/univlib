@extends('templates.main')
@section('content')
<form action="{{ route('reportDate') }}" method="GET">
    <div class="subdate" >
        <h1 style="position: absolute; float: left; padding: 10px;">Visit Reports</h1>
        <input type="date" name="reportDate" placeholder="Report Date" style="position: relative; left: 915px; margin:20px 0;">
        <button type="submit" class="submit"style="position: relative; left: 918px; margin-right:0px;">Search</button>
    </div>
<div class="card" id="card">
    <img src="/images/cmulogo.png" alt="CMUlogo" style="float:left;width: 100px; height:100px;">
    <h2 style="position: absolute; left: 380px;">Central Mindanao University</h2>
    <h3 value="">{{ $repDate }}</h3>
    <table class="table" id='reports' style="margin: 40px 0;">
        <thead>
            <th scope="col">ID Number</th>
            <th scope="co l">Name</th>
            <th scope="col">College</th>
            <th scope="col">Course</th>
            <th scope="col">Section</th>
        </thead>
        <tbody>
            @foreach ($reportDate as $report)
                <tr>
                    <td>
                        {{ $report->idNumber }}
                    </td>
                    <td>
                        {{ $report->studentName }}
                    </td>
                    <td>
                        {{ $report->college }}
                    </td>
                    <td>
                        {{ $report->course }} 
                    </td>
                    <td>
                        {{ $report->section }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-primary" href="{{ URL::to('/reports/pdf') }}">Export to PDF</a>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#reports').Datable({
            dom: '<"mt-4 pb-0 d-inline pl-2"B>frtip',
            buttons: [
                {
                    extend: 'csvHTML5',
                    filename: 'Reports',
                    title: ' ',
                    text: '<si class ="fa-solid fa-download ml-5"></i> Visit Reports'
                },
            ]
        });
    });
</script>
@endsection