<div>
    @if (Auth::check())
   <button>click</button>{{json_decode(Auth::user(), true)['name']}}
    @endif  
</div>
