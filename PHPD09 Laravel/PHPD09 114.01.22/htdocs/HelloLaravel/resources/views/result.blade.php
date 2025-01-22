<div>
    @php($cname = '王小妹')
    @foreach($users as $user) 
        @if ($user->cname == '李大媽')
            <div style="color:green">{{$user->cname}}<br/></div>
        @else
            <div style="color:orange">{{$user->cname}}<br/></div>
        @endif
    @endforeach
</div>
