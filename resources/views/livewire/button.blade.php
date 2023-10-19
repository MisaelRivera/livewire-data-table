<button 
    class="{{ $size }} rounded-md border-transparent {{ $bgcolor }} {{ $textColor }}"
    type="{{ $type }}"
    id="{{ $id }}"
    wire:click="$parent.dieScreen()">
    {{ $text }}
</button>