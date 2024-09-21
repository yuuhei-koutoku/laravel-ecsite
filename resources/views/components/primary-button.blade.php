<button {{ $attributes->merge(['type' => 'submit', 'class' => isset($user) && $user->id == 1 ? 'text-white bg-indigo-300 border-0 py-2 px-6 focus:outline-none rounded text-lg' : 'text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg']) }}
    @if(isset($user) && $user->id == 1) disabled @endif>
    {{ $slot }}
</button>
