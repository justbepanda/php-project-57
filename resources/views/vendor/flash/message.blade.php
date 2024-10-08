@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 pt-4 sm:rounded-lg">
            <div class="relative p-4 text-sm sm:rounded-lg text-white
            @if ($message['level'] === 'success')
                bg-green-700
            @elseif ($message['level'] === 'error')
                bg-red-700
            @elseif ($message['level'] === 'warning')
                bg-yellow-700
            @else
                bg-blue-700
            @endif
            {{ $message['important'] ? 'border-l-4 border-yellow-700' : '' }}"
                 role="alert"
            >
                @if ($message['important'])
                    <button type="button"
                            class="absolute top-0 right-0 mt-2 mr-2 text-white"
                            data-dismiss="alert"
                            aria-hidden="true"
                    >&times;
                    </button>
                @endif

                {!! $message['message'] !!}
            </div>
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
