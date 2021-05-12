<x-layout>
    <x-slot name="title">Login</x-slot>
    <x-slot name="subtitle">Please login to continue</x-slot>

    <form action="{!! url('/login') !!}" method="POST" class="container is-max-desktop">
      @csrf

      <p>
        <input class="input" type="text" placeholder="Email" name="email">
        {{ $errors->first('email') }}
      </p>

      <p>
        <input class="input mt-3" type="password" placeholder="Password" name="password">
        {{ $errors->first('password') }}
      </p>

      <button class="button is-primary mt-3" type="submit">Login</button>
    </form>
</x-layout>
