@props(['type' => 'info', 'title' => null, 'dismissible' => true])

@php
$bgColor = match($type) {
    'success' => 'bg-green-50 border-green-200',
    'error' => 'bg-red-50 border-red-200',
    'warning' => 'bg-yellow-50 border-yellow-200',
    'info' => 'bg-blue-50 border-blue-200',
    default => 'bg-blue-50 border-blue-200'
};

$textColor = match($type) {
    'success' => 'text-green-800',
    'error' => 'text-red-800',
    'warning' => 'text-yellow-800',
    'info' => 'text-blue-800',
    default => 'text-blue-800'
};

$iconColor = match($type) {
    'success' => 'text-green-600',
    'error' => 'text-red-600',
    'warning' => 'text-yellow-600',
    'info' => 'text-blue-600',
    default => 'text-blue-600'
};

$icons = [
    'success' => 'M9 12L11 14L15 10M21 12A9 9 0 1 1 3 12A9 9 0 0 1 21 12Z',
    'error' => 'M13 10V3L4 14H7V21L16 10H13Z',
    'warning' => 'M12 2C6.48 2 2 6.48 2 12S6.48 22 12 22S22 17.52 22 12 17.52 2 12 2M1 21H23V23H1Z',
    'info' => 'M12 2C6.48 2 2 6.48 2 12S6.48 22 12 22 22 17.52 22 12 17.52 2 12 2Z'
];
@endphp

<div class="border {{ $bgColor }} rounded-lg p-4 mb-4" role="alert" x-data="{ open: true }" x-show="open">
    <div class="flex items-start">
        <div class="flex-shrink-0">
            <svg class="h-5 w-5 {{ $iconColor }}" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="{{ $icons[$type] ?? $icons['info'] }}" />
            </svg>
        </div>
        <div class="ml-3 flex-1">
            @if($title)
                <p class="font-medium {{ $textColor }}">{{ $title }}</p>
            @endif
            <div class="{{ $textColor }} text-sm">
                {{ $slot }}
            </div>
        </div>
        @if($dismissible)
            <button @click="open = false" class="ml-3 inline-flex text-gray-400 hover:text-gray-500">
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        @endif
    </div>
</div>
