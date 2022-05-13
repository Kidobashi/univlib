<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/invoice.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="card">
                <div class="card" id="card">
                    <img src="/images/cmulogo.png" alt="CMUlogo" style="position:relative; float:left; left:-40px; top:-65px; width: 100px; height:100px;">
                    <h2 style="position: absolute; left: 520px; top: 80px;">Central Mindanao University</h2>
                    <table class="table" style="margin: 40px 0;">
                        <thead>
                            <th scope="col">ID Number</th>
                            <th scope="col">Name</th>
                            <th scope="col">College</th>
                            <th scope="col">Course</th>
                            <th scope="col">Section</th>
                            <th scope="col">Date</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $dat)
                                <tr>
                                    <td>
                                        {{ $dat->idNumber }}
                                    </td>
                                    <td>
                                        {{ $dat->studentName }}
                                    </td>
                                    <td>
                                        {{ $dat->college }}
                                    </td>
                                    <td>
                                        {{ $dat->course }} 
                                    </td>
                                    <td>
                                        {{ $dat->section }}
                                    </td>
                                    <td>
                                        {{ $dat->created_at }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                   </table>
                </form>
             </div>
        </div>
    </div>
</body>
</html>