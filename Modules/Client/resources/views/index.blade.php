@extends('client::layouts.master')

@section('content')
    <div class="flex flex-col min-h-screen">
  <header class="px-4 lg:px-6 h-14 flex items-center bg-white">
    <a class="flex items-center justify-center" href="#">
      <span class="sr-only">event+</span>
      {{-- <x-lucide-calendar class="h-6 w-6 text-[#007bff]" /> --}}
      <span class="ml-2 text-2xl font-bold text-[#007bff]">event+</span>
    </a>
    <nav class="ml-auto flex gap-4 sm:gap-6">
      <a class="text-sm font-medium hover:text-[#007bff] transition-colors" href="#features">Features</a>
      <a class="text-sm font-medium hover:text-[#007bff] transition-colors" href="#testimonials">Testimonials</a>
      <a class="text-sm font-medium hover:text-[#007bff] transition-colors" href="#pricing">Pricing</a>
    </nav>
  </header>

  <main class="flex-1">
    <section class="w-full py-12 md:py-24 lg:py-32 xl:py-48 bg-[#007bff]">
      <div class="container px-4 md:px-6">
        <div class="flex flex-col items-center space-y-4 text-center">
          <div class="space-y-2">
            <h1 class="text-3xl font-bold tracking-tighter sm:text-4xl md:text-5xl lg:text-6xl text-white">
              Plan Your Perfect Event with event+
            </h1>
            <p class="mx-auto max-w-[700px] text-gray-200 md:text-xl">
              Streamline your event planning process, collaborate with your team, and create unforgettable experiences.
            </p>
          </div>
          <div class="w-full max-w-sm space-y-2">
            <form method="POST" class="flex space-x-2">
              @csrf
              <input 
                class="form-input max-w-lg flex-1"
                placeholder="Enter your email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
              />
              <button type="submit" class="bg-white text-[#007bff] hover:bg-gray-100">Get Started</button>
            </form>
            <p class="text-xs text-gray-300">Start your free 14-day trial. No credit card required.</p>
          </div>
        </div>
      </div>
    </section>

    <section id="features" class="w-full py-12 md:py-24 lg:py-32 bg-white">
      <div class="container px-4 md:px-6">
        <h2 class="text-3xl font-bold tracking-tighter sm:text-5xl text-center mb-12">Features</h2>
        <div class="grid gap-10 sm:grid-cols-2 md:grid-cols-3">
          <div class="flex flex-col items-center space-y-3 text-center">
            {{-- <x-lucide-calendar class="h-12 w-12 text-[#007bff]" /> --}}
            <h3 class="text-xl font-bold">Event Planning</h3>
            <p class="text-gray-500">Create and manage events with ease using our intuitive interface.</p>
          </div>
          <div class="flex flex-col items-center space-y-3 text-center">
            {{-- <x-lucide-users class="h-12 w-12 text-[#007bff]" /> --}}
            <h3 class="text-xl font-bold">Team Collaboration</h3>
            <p class="text-gray-500">Work seamlessly with your team members in real-time.</p>
          </div>
          <div class="flex flex-col items-center space-y-3 text-center">
            {{-- <x-lucide-map-pin class="h-12 w-12 text-[#007bff]" /> --}}
            <h3 class="text-xl font-bold">Venue Management</h3>
            <p class="text-gray-500">Find and book the perfect venue for your events.</p>
          </div>
        </div>
      </div>
    </section>

    <section id="testimonials" class="w-full py-12 md:py-24 lg:py-32 bg-gray-50">
      <div class="container px-4 md:px-6">
        <h2 class="text-3xl font-bold tracking-tighter sm:text-5xl text-center mb-12">Testimonials</h2>
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
          @foreach ([1, 2, 3] as $i)
          <div class="flex flex-col items-center space-y-3 text-center bg-white p-6 rounded-lg shadow-lg">
            {{-- <x-lucide-star class="h-12 w-12 text-yellow-400" /> --}}
            <p class="text-gray-500">"event+ has revolutionized our event planning process. It's a game-changer!"</p>
            <p class="font-semibold">- Happy Customer {{ $i }}</p>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    <section id="pricing" class="w-full py-12 md:py-24 lg:py-32 bg-white">
      <div class="container px-4 md:px-6">
        <h2 class="text-3xl font-bold tracking-tighter sm:text-5xl text-center mb-12">Pricing Plans</h2>
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
          @foreach ([
            ['name' => 'Basic', 'price' => '$29', 'features' => ['Up to 5 events', 'Basic analytics', 'Email support']],
            ['name' => 'Pro', 'price' => '$79', 'features' => ['Unlimited events', 'Advanced analytics', '24/7 support', 'Team collaboration']],
            ['name' => 'Enterprise', 'price' => 'Custom', 'features' => ['Custom solutions', 'Dedicated account manager', 'API access', 'On-site training']],
          ] as $plan)
          <div class="flex flex-col p-6 bg-gray-50 rounded-lg shadow-lg">
            <h3 class="text-2xl font-bold">{{ $plan['name'] }}</h3>
            <p class="text-3xl font-bold mt-2">{{ $plan['price'] }}</p>
            <p class="text-gray-500 mb-4">{{ $plan['name'] == 'Enterprise' ? 'per year' : 'per month' }}</p>
            <ul class="space-y-2 mb-6 flex-grow">
              @foreach ($plan['features'] as $feature)
              <li class="flex items-center">
                {{-- <x-lucide-check class="h-5 w-5 text-[#007bff] mr-2" /> --}}
                {{ $feature }}
              </li>
              @endforeach
            </ul>
            <button class="w-full bg-[#007bff] hover:bg-[#0056b3] text-white">Choose Plan</button>
          </div>
          @endforeach
        </div>
      </div>
    </section>

    <section class="w-full py-12 md:py-24 lg:py-32 bg-[#007bff]">
      <div class="container px-4 md:px-6">
        <div class="flex flex-col items-center space-y-4 text-center">
          <div class="space-y-2">
            <h2 class="text-3xl font-bold tracking-tighter sm:text-5xl text-white">Ready to Transform Your Event Planning?</h2>
            <p class="mx-auto max-w-[600px] text-gray-200 md:text-xl">Join thousands of satisfied event planners and start your journey with event+ today.</p>
          </div>
          <div class="w-full max-w-sm space-y-2">
            <form method="POST" class="flex space-x-2">
              @csrf
              <input 
                class="form-input max-w-lg flex-1"
                placeholder="Enter your email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
              />
              <button type="submit" class="bg-white text-[#007bff] hover:bg-gray-100">Get Started</button>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer class="flex flex-col gap-2 sm:flex-row py-6 w-full shrink-0 items-center px-4 md:px-6 border-t">
    <p class="text-xs text-gray-500">© 2024 event+. All rights reserved.</p>
    <nav class="sm:ml-auto flex gap-4 sm:gap-6">
      <a class="text-xs hover:text-[#007bff] transition-colors" href="#">Terms of Service</a>
      <a class="text-xs hover:text-[#007bff] transition-colors" href="#">Privacy</a>
    </nav>
  </footer>
</div>

@endsection
