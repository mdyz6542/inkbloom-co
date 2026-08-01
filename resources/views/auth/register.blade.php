<x-layouts.storefront title="Create Account · Inkbloom Co.">

<section class="py-20 px-6">
  <div class="max-w-md mx-auto">

    <div class="text-center mb-8">
      <p class="hand text-2xl text-cherry mb-1">join the bloom</p>
      <h1 class="font-display text-4xl">Create your account</h1>
      <p class="text-fog text-sm mt-2">Already have one? <a href="{{ route('login') }}" class="text-cherry font-semibold hover:underline">Log in →</a></p>
    </div>

    <div class="bg-white rounded-4xl border border-cloud p-8">
      <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf
        <div>
          <label class="field-label">Full name</label>
          <input type="text" name="name" value="{{ old('name') }}" class="field-input" placeholder="Maryam Khalid" required autofocus>
          @error('name')<p class="text-cherry text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="field-label">Email address</label>
          <input type="email" name="email" value="{{ old('email') }}" class="field-input" placeholder="you@example.com" required>
          @error('email')<p class="text-cherry text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="field-label">Password</label>
          <input type="password" name="password" class="field-input" placeholder="At least 8 characters" required>
          @error('password')<p class="text-cherry text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="field-label">Confirm password</label>
          <input type="password" name="password_confirmation" class="field-input" placeholder="Same as above" required>
        </div>
        <button type="submit" class="btn-pop w-full justify-center">Create account 🌸</button>
        <p class="text-xs text-fog text-center">By creating an account you agree to our <a href="{{ url('/terms') }}" class="underline">Terms</a> and <a href="{{ url('/privacy-policy') }}" class="underline">Privacy Policy</a>.</p>
      </form>
    </div>

  </div>
</section>

</x-layouts.storefront>
