<div>
   <!-- Form to submit user account -->
   <form method="post" action="{{ route('user.checkAccount') }}"> <!-- Add the action to the correct route -->
        @csrf
        <p>請輸入使用者帳號:</p>
        <input name="account" value="{{ old('account', $account) }}"><p>
        <button>提交</button>
   </form>
   
   <hr>

   <!-- Check if the $result variable is set and display it -->
   @isset($result)
       <p>{{ $result }}</p>
   @else
       <p>No result available.</p>
   @endisset
</div>

