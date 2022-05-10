<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="card" id="card">
        <img src="/images/cmulogo.png" alt="CMUlogo" style="float:left;width: 100px; height:100px;">
        <h2 style="position: absolute; left: 380px;">Central Mindanao University</h2>
        <table class="table" style="margin: 40px 0;">
            <thead>
                <th scope="col">ID Number</th>
                <th scope="col">Name</th>
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
    </div>
</body>
</html>