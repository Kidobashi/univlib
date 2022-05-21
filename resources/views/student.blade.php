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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMU Library and Reading Rooms</title>
    <link href="/css/mainlib.css" rel="stylesheet">
</head>
<body>
    <div class="glass-panel">
        @if($rrAssignment->category == 'Main Library')
        <h1><a href="#">CMU MAIN LIBRARY</a></h1>
        @endif
        @if($rrAssignment->category == 'CON LIbrarian')
        <h1><a href="#">CON READING ROOM</a></h1>
        @endif
        @if($rrAssignment->category == 'COE Librarian')
        <h1><a href="#">COE READING ROOM</a></h1>
        @endif
        @if($rrAssignment->category == 'CISC Librarian')
        <h1><a href="#">CISC READING ROOM</a></h1>
        @endif
        <form action="{{ route('verify') }}" method="GET">
        <div class="mb-3">
            <input type="text" class="form-control" name="verify" placeholder="Enter ID or Name" required>
        </div>
        <input type="text" name="library" value="{{ $rrAssignment->category }}" style="display: none;" required>
        @if($rrAssignment->category == 'Main Library')
        <div class="glass-toolbar">
        <select name="section" id="" required><option value="" disabled selected>Select section</option>
          <option class="glass-button" value="Filipiniana">Filipiniana</option>
          <option class="glass-button" value="E-Library">E-Library</option>
          <option class="glass-button" value="Serials">Serials</option>
          <option class="glass-button" value="Information & Control Desk">Information & Control Desk</option>
          <option class="glass-button" value="References">References</option>
          <option class="glass-button" value="Circulation">Circulation</option>
        </select>
        </div>
        @endif
        <button type="submit" class="submit">Submit</button>
        @if(Session::has('success'))
        <div id="alert" class="alert alert-success">
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
    $(".alert alert-success").slideDown(300).delay(5000).hide(300);

    setInterval(function(){
   $('#alert').load('/views/student');
    }, 200)
    });

    $.ajax({
    url: '127.0.0.1:8000/student',
    success: function(data) {
      $('#alert').html(data).delay(200);
    }
    });
</script>
