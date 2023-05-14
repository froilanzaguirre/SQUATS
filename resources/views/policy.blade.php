<x-guest-layout>

    <div class="pt-4 bg-gray-100">

        <div class="min-h-screen flex flex-col items-center pt-6 sm:pt-0">

      <!-- Logo -->
      <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                    <img src="/images/squats-logo.png" width="90" height="100">
                    </a>
                </div>

            <div class="w-full sm:max-w-2xl mt-2 p-6 text-xl bg-white shadow-md overflow-hidden sm:rounded-lg prose">
            {!! $policy !!}
            </div>

        </div>

    </div>

</x-guest-layout>

