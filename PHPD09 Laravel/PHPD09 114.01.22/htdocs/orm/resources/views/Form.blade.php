@if ($errors->any())
    <ul style="color:red">
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
@endif
<div>
    <form method="post" enctype="multipart/form-data">
    @csrf
    帳號 <input name="uid" value="{{old('uid')}}"><p>
    密碼 <input type="text" name="password"><p>
    確認 <input type="text" name="password_confirmation"></p>
    <input type="file" name="photo"><p>
    <button>Submit</button>
    </form>
</div>
