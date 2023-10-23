<button 
    class="px-4 py-2 rounded-md border-transparent {{ $bgColor }} {{ $textColor }}"
    type="{{ $type }}"
    id="{{ $id }}"
    wire:click="clickHandler('{{ $event }}')">
    {{ $text }}
</button>