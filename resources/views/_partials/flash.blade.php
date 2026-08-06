{{-- resources/views/_partials/flash.blade.php --}}
@if(session('success'))
<div class="alert alert-success" id="flash-msg">
    <span>✅ {{ session('success') }}</span>
    <button onclick="this.parentElement.remove()">×</button>
</div>
@endif
@if(session('error'))
<div class="alert alert-error" id="flash-msg">
    <span>❌ {{ session('error') }}</span>
    <button onclick="this.parentElement.remove()">×</button>
</div>
@endif
@if($errors->any())
<div class="alert alert-error">
    @foreach($errors->all() as $e)<div>• {{ $e }}</div>@endforeach
</div>
@endif

<style>
.alert { display:flex; align-items:flex-start; justify-content:space-between; gap:12px; padding:14px 18px; border-radius:10px; margin-bottom:24px; font-size:0.9rem; font-weight:500; }
.alert-success { background:#f0fdf4; border:1px solid #bbf7d0; color:#166534; }
.alert-error   { background:#fef2f2; border:1px solid #fecaca; color:#991b1b; flex-direction:column; }
.alert button  { background:none; border:none; cursor:pointer; font-size:1.2rem; color:inherit; opacity:0.6; flex-shrink:0; }
</style>
