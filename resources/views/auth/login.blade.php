<x-layouts.storefront title="Login · Inkbloom Co.">

<section class="py-20 px-6">
  <div class="max-w-md mx-auto">

    <div class="text-center mb-8">
      <p class="hand text-2xl text-cherry mb-1">welcome back</p>
      <h1 class="font-display text-4xl">Log in to your account</h1>
      <p class="text-fog text-sm mt-2">Don't have one? <a href="{{ route('register') }}" class="text-cherry font-semibold hover:underline">Create account →</a></p>
    </div>

    <div class="bg-white rounded-4xl border border-cloud p-8">

      <x-auth-session-status class="mb-4 text-sm text-green-600 bg-green-50 rounded-2xl px-4 py-3" :status="session('status')" />

      <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf
        <div>
          <label class="field-label">Email address</label>
          <input id="email" type="email" name="email" value="{{ old('email') }}" class="field-input" placeholder="you@example.com" required autofocus>
          @error('email')<p class="text-cherry text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="field-label">Password</label>
          <input id="password" type="password" name="password" class="field-input" placeholder="••••••••" required>
          @error('password')<p class="text-cherry text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div class="flex items-center justify-between text-sm">
          <label class="flex items-center gap-2 cursor-pointer text-fog">
            <input type="checkbox" name="remember" class="accent-cherry"> Remember me
          </label>
          @if(Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="text-cherry hover:underline">Forgot password?</a>
          @endif
        </div>
        <button type="submit" class="btn-pop w-full justify-center">Log in 🌸</button>
      </form>

    </div>

  </div>
</section>

</x-layouts.storefront>
