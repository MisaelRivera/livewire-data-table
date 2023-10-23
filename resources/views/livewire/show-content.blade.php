<div class="relative">
    <livewire:button 
        :bg-color="$btnBgColor"
        :text-color="$btnTextColor"
        :id="$btnId"
        :text="$btnText"/>
    <div class="">
        @if(isset($slot))
            {{ $slot }}
        @else
            <p>Default content</p>
        @endif
    </div>
</div>
