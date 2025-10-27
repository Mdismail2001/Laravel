<div>
    <form action="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}" class="space-y-4 p-4 bg-white rounded shadow">
    @csrf
    @if (!in_array($method, ['GET', 'POST']))
        @method($method)
    @endif

    <!-- Dynamic form fields will be passed here -->
    {{ $slot }}

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        {{ $buttonText }}
    </button>
</form>

</div>