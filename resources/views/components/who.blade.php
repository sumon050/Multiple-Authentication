@if(Auth::guard('web')->check())
<p class="text-success">
	You are Logged In as a USER.
</p>
@else
<p class="text-danger">
	You are Logged Out as a USER.
</p>
@endif

@if(Auth::guard('admin')->check())
<p class="text-success">
	You are Logged In as a ADMIN.
</p>
@else
<p class="text-danger">
	You are Logged Out as a ADMIN.
</p>
@endif