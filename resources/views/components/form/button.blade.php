<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-amber-100 border border-transparent rounded-md font-semibold text-xs text-black uppercase tracking-widest hover:bg-amber-100 active:bg-amber-200 focus:outline-none focus:border-amber-300 focus:ring ring-amber-400 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
