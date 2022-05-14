<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <body>
    <table>
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Assigned Library</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $role)
            <tr>
                <th scope="row">{{ $role->name}}</th>
            @endforeach
                <th>
                    <select name="category" id="category">
                        <option value="old(category)" selected disabled>Select Category
                            @foreach($category as $cat)
                           <option value="{{ $cat->id }}">{{ $cat->category }}</option>
                        </option>
                    </select>
                            @endforeach
                </th>
            </tr>
        </tbody>
            </table>
        <h1>Hi</h1>
    </body>
</html>
