<button 
    class="bg-blue-500 text-white px-4 py-2 rounded-md border-transparent"
    wire:click="clickHandler('{{ $event }}')">
    {{ $camelText }}
</button>
