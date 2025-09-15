<x-app-layout>
  <div class="mx-auto max-w-3xl p-6">
    <div class="bg-white border rounded-lg shadow-sm p-6">
      <h2 class="text-xl font-semibold text-gray-800 mb-4">Command runner</h2>

      <form method="POST" action="{{ route('command.run') }}" class="flex gap-3 mb-4">
        @csrf
        <input
          type="text"
          name="cmd"
          placeholder="Type a command…"
          class="flex-1 border rounded px-3 py-2 focus:outline-none focus:ring focus:ring-indigo-200"
        />
        <button
          type="submit"
          class="px-4 py-2 rounded bg-indigo-600 text-white hover:bg-indigo-700"
        >
          Run
        </button>
      </form>

      @isset($command)
        <div class="text-sm text-gray-500 mb-1">Command</div>
        <div class="mb-4 rounded border bg-gray-50 px-3 py-2 font-mono text-sm text-gray-800">
          $ {{ $command }}
        </div>

        <div class="text-sm text-gray-500 mb-1">Output</div>
        <pre class="rounded border bg-gray-50 px-3 py-2 font-mono text-sm text-gray-800 whitespace-pre-wrap overflow-x-auto">{{ $output }}</pre>
      @endisset
    </div>
  </div>
</x-app-layout>
