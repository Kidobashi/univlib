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
                    <img src="/images/cmulogo.png" alt="CMUlogo" style="position:relative; float:left; left:-40px; top:-65px; width: 100px; height:100px;">
                    <h2 style="position: absolute; left: 800px; top: 80px;">Central Mindanao University</h2>
                    <div class="row justify-content-center">
                        <div class="col-auto">
                          <table class="table table-responsive">
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
