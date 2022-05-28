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
    <style>
        body{
            font-family:Calibri;
        }
        thead, tr, td, th{
            border: 1px solid;
        }
        table{
            position: relative;
            top: 50px;
            right:50px;
        }
        td{
            width:200px;
            max-width: 300px;
            margin-left: 10px;
            margin-right: 10px;
            text-align: center;
        }

        th {
            width:200px;
            max-width: 300px;
            height:30px;
        }
    </style>
    <div class="container">
        <div class="card">
                <div class="card" id="card">
                    <div class="row">
                        <img src="/images/CMU-LOGO.png" alt="CMUlogo" style="position:relative; float:left; left:-40px; top:-65px; width: 100px; height:100px;">
                        <div style="position: relative; top: -48px; right: 35px;">
                            <p style="font-size:17px;">Republic of the Philippines</p>
                            <h2 style=" margin-top:-18px">Central Mindanao University</h2>
                            <p style="font-size:17px; margin-top:-18px">Musuan, Maramag, Bukidnon</p>
                        </div>
                    </div>
                    <hr style="position: relative; right: 30px; width: 850px; border: 1px solid black; top: -58px">
                    <p style="position:relative; bottom:70px; right:27px; margin-top:0 !impotant; padding: 0 !important; font-size:17px;">UNIVERSITY LIBRARY</p>
                    <div class="row justify-content-center">
                        <h2 style="position: relative; left: 338px; bottom: 75px;">Visit Report</h2>
                        <div class="col-auto">
                          <table class="table table-responsive" style="absolute: absolute; right: 8px; top:-52px;">
                            <thead>
                                <tr>
                                    <th>ID Number</th>
                                    <th>Name</th>
                                    <th>College</th>
                                    <th>Course</th>
                                    <th>Section</th>
                                </tr>
                            </thead>
                        <tbody>
                            @foreach ($data as $dat)
                                <tr>
                                    <td>
                                        {{ $dat->idNumber }}
                                    </td>
                                    <td >
                                        {{ $dat->studentName }}
                                    </td>
                                    <td >
                                        {{ $dat->college }}
                                    </td>
                                    <td >
                                        {{ $dat->course }}
                                    </td>
                                    <td>
                                        {{ $dat->section }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                   </table>
                </div>
            </div>

                </form>
             </div>
        </div>
    </div>
</body>
</html>
