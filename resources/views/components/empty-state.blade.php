@props(['icon' => 'M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4', 'title' => 'No items found', 'description' => 'Get started by creating your first item.', 'actionText' => null, 'actionUrl' => null])

<div class="bg-white rounded-lg shadow p-8 sm:p-12 text-center">
    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $icon }}" />
    </svg>
    <h3 class="mt-4 text-lg font-medium text-gray-900">{{ $title }}</h3>
    <p class="mt-2 text-sm text-gray-500">{{ $description }}</p>

    @if($actionText && $actionUrl)
    <div class="mt-6">
        <a href="{{ $actionUrl }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
            {{ $actionText }}
        </a>
    </div>
    @endif
</div>
