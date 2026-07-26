<x-guest-layout>

<style>

body{
    background:#0f172a;
}


.login-box{

    background:#111827;

    border-radius:25px;

    padding:40px;

    box-shadow:0 0 30px rgba(0,0,0,0.5);

    border:1px solid #1e293b;

}


.logo{

    color:#facc15;

    font-size:35px;

    font-weight:800;

}


.subtitle{

    color:#94a3b8;

}


.input-style{

    background:#1e293b !important;

    border:1px solid #334155 !important;

    color:white !important;

    border-radius:12px;

}


.input-style:focus{

    border-color:#facc15 !important;

}


.label{

    color:#e2e8f0;

}


.login-btn{

    background:#facc15;

    color:#111827;

    font-weight:bold;

    border-radius:12px;

    padding:12px 30px;

}


.login-btn:hover{

    background:#eab308;

}


.link{

    color:#facc15;

}


</style>



<div class="min-h-screen flex items-center justify-center">


<div class="login-box w-full max-w-md">


<div class="text-center mb-8">


<div class="logo">

💪 FitTrack

</div>


<p class="subtitle mt-2">

Login to continue your fitness journey

</p>


</div>



<!-- Session Status -->

<x-auth-session-status 
    class="mb-4" 
    :status="session('status')" />



<form method="POST" action="{{ route('login') }}">

@csrf



<!-- Email -->

<div>


<x-input-label 
for="email"
class="label"
:value="__('Email')" />


<x-text-input

id="email"

class="block mt-2 w-full input-style"

type="text"

name="email"

:value="old('email')"

required

autofocus

autocomplete="username"

/>


<x-input-error 
:messages="$errors->get('email')" 
class="mt-2" />

</div>




<!-- Password -->

<div class="mt-5">


<x-input-label

for="password"

class="label"

:value="__('Password')" />



<x-text-input

id="password"

class="block mt-2 w-full input-style"

type="password"

name="password"

required

autocomplete="current-password"

/>



<x-input-error 

:messages="$errors->get('password')" 

class="mt-2" />


</div>





<!-- Remember -->


<div class="block mt-5">

<label class="inline-flex items-center">


<input 

id="remember_me"

type="checkbox"

class="rounded"

name="remember">


<span class="ms-2 text-sm text-gray-400">

Remember me

</span>


</label>

</div>





<div class="flex items-center justify-between mt-8">


@if (Route::has('password.request'))

<a class="link text-sm underline"

href="{{ route('password.request') }}">

Forgot Password?

</a>

@endif




<x-primary-button class="login-btn">

Login

</x-primary-button>



</div>



</form>


<div class="text-center mt-6 text-gray-400">


Don't have an account?

<a href="{{ route('register') }}" class="link">

Register

</a>


</div>



</div>


</div>


</x-guest-layout>