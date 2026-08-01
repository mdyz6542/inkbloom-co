<x-layouts.storefront title="Checkout · Inkbloom Co.">

<section class="py-12 px-6">
  <div class="max-w-5xl mx-auto">

    <div class="mb-8">
      <p class="hand text-xl text-cherry mb-1">almost yours</p>
      <h1 class="font-display text-4xl">Checkout</h1>
    </div>

    <form method="POST" action="{{ route('checkout.place') }}" x-data="{ submitting: false }" @submit="submitting = true">
      @csrf
      <div class="grid md:grid-cols-[1fr_340px] gap-8">

        {{-- Left: Form --}}
        <div class="space-y-6">

          {{-- Contact --}}
          <div class="bg-white rounded-3xl border border-cloud p-6">
            <h2 class="font-display text-xl mb-5">Contact</h2>
            <div class="space-y-4">
              <div class="grid md:grid-cols-2 gap-4">
                <div>
                  <label class="field-label">Full name *</label>
                  <input type="text" name="name" value="{{ old('name', auth()->user()?->name) }}" class="field-input" placeholder="Maryam Khalid" required>
                  @error('name')<p class="text-cherry text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                  <label class="field-label">Phone number *</label>
                  <input type="tel" name="phone" value="{{ old('phone') }}" class="field-input" placeholder="03001234567" required>
                  @error('phone')<p class="text-cherry text-xs mt-1">{{ $message }}</p>@enderror
                </div>
              </div>
              <div>
                <label class="field-label">Email address *</label>
                <input type="email" name="email" value="{{ old('email', auth()->user()?->email) }}" class="field-input" placeholder="you@example.com" required>
                @error('email')<p class="text-cherry text-xs mt-1">{{ $message }}</p>@enderror
              </div>
            </div>
          </div>

          {{-- Delivery Address --}}
          <div class="bg-white rounded-3xl border border-cloud p-6">
            <h2 class="font-display text-xl mb-5">Delivery Address</h2>
            <div class="space-y-4">
              <div>
                <label class="field-label">Address line 1 *</label>
                <input type="text" name="line1" value="{{ old('line1') }}" class="field-input" placeholder="House no. / Street no." required>
                @error('line1')<p class="text-cherry text-xs mt-1">{{ $message }}</p>@enderror
              </div>
              <div>
                <label class="field-label">Address line 2 <span class="text-fog font-normal">(optional)</span></label>
                <input type="text" name="line2" value="{{ old('line2') }}" class="field-input" placeholder="Area / Block / Sector">
              </div>
              <div class="grid md:grid-cols-2 gap-4">
                <div>
                  <label class="field-label">City *</label>
                  <input type="text" name="city" value="{{ old('city') }}" class="field-input" placeholder="Lahore" required>
                  @error('city')<p class="text-cherry text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                  <label class="field-label">Province <span class="text-fog font-normal">(optional)</span></label>
                  <select name="province" class="field-input">
                    <option value="">Select province</option>
                    <option value="Punjab" {{ old('province') == 'Punjab' ? 'selected' : '' }}>Punjab</option>
                    <option value="Sindh" {{ old('province') == 'Sindh' ? 'selected' : '' }}>Sindh</option>
                    <option value="KPK" {{ old('province') == 'KPK' ? 'selected' : '' }}>KPK</option>
                    <option value="Balochistan" {{ old('province') == 'Balochistan' ? 'selected' : '' }}>Balochistan</option>
                    <option value="Islamabad" {{ old('province') == 'Islamabad' ? 'selected' : '' }}>Islamabad (ICT)</option>
                    <option value="AJK" {{ old('province') == 'AJK' ? 'selected' : '' }}>AJK</option>
                    <option value="GB" {{ old('province') == 'GB' ? 'selected' : '' }}>Gilgit-Baltistan</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          {{-- Payment Method --}}
          <div class="bg-white rounded-3xl border border-cloud p-6">
            <h2 class="font-display text-xl mb-5">Payment Method</h2>
            <div class="space-y-3" x-data="{ payment: '{{ old('payment_method', 'cod') }}' }">

              <label class="flex items-center gap-4 p-4 rounded-2xl border-2 cursor-pointer transition-colors" :class="payment === 'cod' ? 'border-cherry bg-blush/30' : 'border-cloud'">
                <input type="radio" name="payment_method" value="cod" x-model="payment" class="accent-cherry" required>
                <div class="text-2xl">💵</div>
                <div>
                  <div class="font-semibold">Cash on Delivery (COD)</div>
                  <div class="text-fog text-xs">Pay when your order arrives. No upfront payment needed.</div>
                </div>
              </label>

              <label class="flex items-center gap-4 p-4 rounded-2xl border-2 cursor-pointer transition-colors" :class="payment === 'jazzcash' ? 'border-cherry bg-blush/30' : 'border-cloud'">
                <input type="radio" name="payment_method" value="jazzcash" x-model="payment" class="accent-cherry">
                <div class="text-2xl">📱</div>
                <div>
                  <div class="font-semibold">JazzCash</div>
                  <div class="text-fog text-xs">Pay securely via JazzCash mobile wallet.</div>
                </div>
              </label>

              <label class="flex items-center gap-4 p-4 rounded-2xl border-2 cursor-pointer transition-colors" :class="payment === 'easypaisa' ? 'border-cherry bg-blush/30' : 'border-cloud'">
                <input type="radio" name="payment_method" value="easypaisa" x-model="payment" class="accent-cherry">
                <div class="text-2xl">💚</div>
                <div>
                  <div class="font-semibold">Easypaisa</div>
                  <div class="text-fog text-xs">Pay securely via Easypaisa mobile wallet.</div>
                </div>
              </label>

              <label class="flex items-center gap-4 p-4 rounded-2xl border-2 cursor-pointer transition-colors" :class="payment === 'bank_transfer' ? 'border-cherry bg-blush/30' : 'border-cloud'">
                <input type="radio" name="payment_method" value="bank_transfer" x-model="payment" class="accent-cherry">
                <div class="text-2xl">🏦</div>
                <div>
                  <div class="font-semibold">Bank Transfer</div>
                  <div class="text-fog text-xs">Transfer to our account and upload your receipt. Order held until verified.</div>
                </div>
              </label>

            </div>
          </div>

          {{-- Order Notes --}}
          <div class="bg-white rounded-3xl border border-cloud p-6">
            <h2 class="font-display text-xl mb-4">Order Notes <span class="text-fog font-normal text-base">(optional)</span></h2>
            <textarea name="notes" rows="3" class="field-input" placeholder="Any special instructions for your order...">{{ old('notes') }}</textarea>

            <label class="flex items-center gap-3 mt-4 cursor-pointer text-sm">
              <input type="checkbox" name="gift_wrap" value="1" {{ old('gift_wrap') ? 'checked' : '' }} class="accent-cherry w-4 h-4">
              <span>🎁 Add gift wrapping <span class="text-fog">(free for now)</span></span>
            </label>
          </div>

        </div>

        {{-- Right: Order Summary --}}
        <div class="h-fit sticky top-6 space-y-4">
          <div class="bg-white rounded-3xl border border-cloud p-6">
            <h2 class="font-display text-xl mb-4">Order Summary</h2>
            <div class="space-y-3">
              @foreach($items as $item)
              <div class="flex items-center gap-3 text-sm">
                <x-product-image :image="$item['image'] ?? null" :alt="$item['name']" size="text-lg" class="w-10 h-10 rounded-xl bg-blush shrink-0" />
                <div class="flex-1 min-w-0">
                  <div class="font-semibold truncate">{{ $item['name'] }}</div>
                  <div class="text-fog text-xs">Qty: {{ $item['quantity'] }}</div>
                </div>
                <div class="font-semibold shrink-0">Rs {{ number_format($item['price'] * $item['quantity']) }}</div>
              </div>
              @endforeach
            </div>
            <div class="border-t border-cloud mt-4 pt-4 space-y-2 text-sm">
              <div class="flex justify-between"><span class="text-fog">Subtotal</span><span>Rs {{ number_format($subtotal) }}</span></div>
              <div class="flex justify-between"><span class="text-fog">Shipping (TCS)</span><span>Rs {{ number_format($shipping) }}</span></div>
              <div class="flex justify-between font-display text-lg border-t border-cloud pt-2 mt-2"><span>Total</span><span>Rs {{ number_format($total) }}</span></div>
            </div>
          </div>

          <button type="submit" class="btn-pop w-full justify-center text-base" :disabled="submitting" x-text="submitting ? 'Placing order…' : 'Place Order 🌸'"></button>

          <div class="bg-cloud/50 rounded-2xl p-4 text-xs text-fog text-center space-y-1">
            <p>🔒 Your information is secure</p>
            <p>📦 COD available nationwide</p>
            <p>↩️ 7-day hassle-free returns</p>
          </div>
        </div>

      </div>
    </form>
  </div>
</section>

</x-layouts.storefront>
