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
    <script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@600&display=swap" rel="stylesheet">
<link href="/css/mainlib.css" rel="stylesheet">
</head>
<body>
    <div class="glass-panel" style="margin-top:150px;">
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
        @If($rrAssignment->category != 'Main Library')
            <input type="text" class="form-control" name="verify" placeholder="Enter ID or Name" required>
        @endif
        </div>
        <input type="text" name="library" value={{ $rrAssignment->category }} style="display: none;" required>
        @if($rrAssignment->category == 'Main Library')
        <div class="glass-toolbar">
            <input type="text" class="form-control" name="verify" placeholder="Enter ID or Name" required>
        <select name="section" id="" required><option value="" disabled selected>Select Section</option>
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
        </div>
    </form>
    </div>
    @if(Session::has('success'))
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div id="content" class="modal-dialog">
            <div class="modal-content">
            <div class="modal-body">
                        <h3 style="display: block; color: black;">{{Session::get('success')}}</h3>
                    </div>
                </div>
            </div>
    </div>
    @endif
</body>
</html>
<script src="js/jq.js"></script>
<script>
$(window).on('load', function(){
    $('#exampleModal').modal('show');
});

window.setTimeout("closeHelpDiv();", 5000);

function closeHelpDiv(){
    $('#exampleModal').modal('hide');
}


</script>
