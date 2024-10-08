<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('labels.Labels') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @auth
                        <x-primary-link-button class="mb-3" :href="route('labels.create')">
                            {{ __('labels.Create new label') }}
                        </x-primary-link-button>
                    @endauth

                    @if($labels->isNotEmpty())
                        <table class="mt-4 w-full">
                            <thead class="border-b-2 border-solid border-black text-left ">
                            <tr>
                                <th class="p-2">{{ __('labels.ID') }}</th>
                                <th class="p-2">{{ __('labels.Name') }}</th>
                                <th class="p-2">{{ __('labels.Description') }}</th>
                                <th class="p-2">{{ __('labels.Created at') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($labels as $label)
                                <tr class="border-b border-dashed text-left">
                                    <td class="p-2">{{ $label->id }}</td>
                                    <td class="p-2"><a href="{{ route('labels.show', $label) }}">{{ $label->name }}</a>
                                    </td>
                                    <td class="p-2">{{ $label->description }}</td>
                                    <td class="p-2">{{ $label->created_at->format('d.m.Y') }}</td>
                                    <td class="p-2">
                                        @auth
                                            <a href="{{ route('labels.edit', $label) }}">{{ __('labels.Edit') }}</a>
                                            <form id="delete-form-{{ $label->id }}"
                                                  action="{{ route('labels.destroy', $label) }}"
                                                  method="POST"
                                                  style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                            <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $label->id }}').submit();"
                                               data-confirm="{{ __('label.Are you sure you want to delete?') }}"
                                               class="delete-link">
                                                {{ __('labels.Delete') }}
                                            </a>
                                        @endauth
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    @else
                        <div>{{ __('labels.There are no labels') }}
                            <div>
                                @endif
                            </div>
                        </div>
                </div>
            </div>


</x-app-layout>
