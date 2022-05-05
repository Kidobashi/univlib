<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMU Main Library</title>
    <link href="/css/mainlib.css" rel="stylesheet">
</head>
<body>
    <div class="glass-panel">
        <h1><a href="/mainlib">SECTIONS OF CMU MAIN LIBRARY</a></h1>
        <form action="{{ route('visitor') }}" method="GET">
        <div class="mb-3">
            <input type="text" class="form-control" name="visitor" placeholder="Kimi no Namae Wa..." required>
        </div>
        <p>Click the button on which section of the CMU Main Library you wish to go.</p>
        <div class="glass-toolbar">
        <select name="section" id=""> Select section...
          <option class="glass-button" value="Filipiniana">Filipiniana</option>
          <option class="glass-button" value="E-Library">E-Library</option>
          <option class="glass-button" value="Serials">Serials</option>
          <option class="glass-button" value="Information & Control Desk">Information & Control Desk</option>
          <option class="glass-button" value="References">References</option>
          <option class="glass-button" value="Circulation">Circulation</option>
        </select>
        </div>
        <button type="submit" class="submit">Submit</button>
        @if(Session::has('success'))
        <div class="alert alert-success">   
           <h3 style="color: gold;">{{Session::get('success')}}</h3>
        </div>
        @endif
    </div>
    </form>
    </div>
</body>
</html>


