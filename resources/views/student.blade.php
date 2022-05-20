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
        <form action="{{ route('verify') }}" method="GET">
            <p>If you are student input ID number otherwise just name is enough. Thank You. DO NOT IGNORE</p>
        <div class="mb-3">
            <input type="text" class="form-control" name="verify" placeholder="Enter your name" required>
        </div>
        @can('is-librarian')
            <?php
                $user = DB::table('users')->find(auth()->user()->id);

                $assignment = DB::table('librarian_users')->select('category_id')
                ->where('user_id', '=', auth()->user()->id)->first();

                $rrAssignment = DB::table('librarian_cat')->select('category')
                ->where('id', '=', $assignment->category_id)->first();
                //dd($role);
                ?>
        @endcan
        <p>Click the button on which section of the CMU Main Library you wish to go.</p>
        <div class="glass-toolbar">
            <input type="text" name="library" value="{{ $rrAssignment->category }}" required>
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

<script>
    $(document).ready(function(){
    $(".alert").slideDown(300).delay(5000).hide(300);
});
</script>
