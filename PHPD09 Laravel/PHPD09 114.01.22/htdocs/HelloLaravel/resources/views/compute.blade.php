<div>
   <form method="post">
        @csrf
        <input name="a" value="{{$a}}"><p>
        <input name="b" value="{{$b}}"><p>
        <button>加法</button>
   </form>
   <hr>
   <?php
//    if (isset($result)) {
//         print($result);
//    }
   ?>
   {{$result}}
</div>
