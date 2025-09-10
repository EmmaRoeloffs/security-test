<x-app-layout>
  <div class="flex items-center justify-center bg-gradient-to-br from-gray-900 to-black mt-6">
    <div class="w-full max-w-3xl bg-gray-900/80 backdrop-blur-sm border border-green-600/40 rounded-2xl shadow-2xl p-8 font-mono text-green-300">

      <!-- Header -->
      <div class="flex items-center mb-6">
        <div class="flex space-x-2 mr-4">
          <span class="w-3 h-3 rounded-full bg-red-500"></span>
          <span class="w-3 h-3 rounded-full bg-yellow-400"></span>
          <span class="w-3 h-3 rounded-full bg-green-500"></span>
        </div>
        <h2 class="text-lg font-semibold tracking-wide text-green-400">Simulated Console</h2>
      </div>

      <!-- Form -->
      <form method="POST" action="{{ route('command.run') }}" class="flex gap-3 mb-6">
        @csrf
        <input type="text"
               name="cmd"
               placeholder="Type command..."
               class="flex-grow px-4 py-2 rounded-lg bg-black/80 border border-green-700 text-green-200 placeholder-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 transition">
        <button type="submit"
                class="px-5 py-2 bg-green-700 p-4 hover:bg-green-600 rounded-lg text-green-100 font-semibold shadow-md transition">
          Run
        </button>
      </form>

      <!-- Output -->
      @isset($command)
        <div class="bg-black rounded-lg p-5 text-sm leading-relaxed overflow-auto max-h-96 shadow-inner">
          <div class="text-green-400 mb-2">$ {{ $command }}</div>
          <pre class="whitespace-pre-wrap text-green-200">{{ $output }}</pre>
        </div>
      @endisset

    </div>
  </div>
</x-app-layout>
