<div>
    <x-filament::app-header :title="$title" />

    <x-filament::app-content>
        <section
            aria-label="{{ __('filament::widgets.title') }}"
            class="grid grid-cols-1 gap-4 lg:grid-cols-2 lg:gap-8"
        >
            @if (config('filament.widgets.default.account', true))
                <x-filament::card class="flex">
                    <div class="flex items-center space-x-4">
                        <x-filament-avatar :user="\Filament\Filament::auth()->user()" :size="160" class="flex-shrink-0 w-20 h-20 rounded-full" />

                        <div class="space-y-1">
                            <h2 class="text-2xl">{{ __('filament::dashboard.widgets.account.heading', ['name' => \Filament\Filament::auth()->user()->name]) }}</h2>
                            <p class="text-sm"><a href="{{ route('filament.account') }}" class="link">{{ __('filament::dashboard.widgets.account.links.account.label') }}</a></p>
                        </div>
                    </div>
                </x-filament::card>
            @endif

            @foreach (\Filament\Filament::getWidgets() as $widget)
                @livewire(\Livewire\Livewire::getAlias($widget))
            @endforeach
        </section>
    </x-filament::app-content>
</div>
