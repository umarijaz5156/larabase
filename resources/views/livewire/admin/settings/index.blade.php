<div class="px-6">
    <div class="my-2">
        @if (session('success'))
            <x-alerts.success :success="session('success')" />
        @endif
    </div>

    <div class="mx-3">
        <div wire:ignore.self id="accordion-collapse" data-accordion="collapse">
            {{-- System Settings --}}
            <livewire:admin.settings.system-settings />

            {{-- Mail Settings --}}
            <livewire:admin.settings.mail-settings />

            {{-- payment gateway --}}
            <livewire:admin.settings.payment-gateway />
        </div>
    </div>
</div>
