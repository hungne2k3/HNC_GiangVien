<button {{ $attributes->merge(['type' => 'submit', 'class' => 'login__button']) }}>
    {{ $slot }}
</button>
