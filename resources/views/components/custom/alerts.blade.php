@if (Session::has('success'))
    <div class="flex items-center bg-green-500 text-white text-sm font-bold px-4 py-3" role="alert">
        <span class="material-symbols-outlined"> done </span>
        <p>{{ Session::get('success') }}</p>
    </div>
@endif
