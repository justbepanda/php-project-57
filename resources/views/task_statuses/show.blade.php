<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('task_statuses.task status') }} {{ $taskStatus->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                        <table class="mt-4 w-full">
                            <thead class="border-b-2 border-solid border-black text-left ">
                            <tr>
                                <th class="p-2">{{ __('task_statuses.id') }}</th>
                                <th class="p-2">{{ __('task_statuses.name') }}</th>
                                <th class="p-2">{{ __('task_statuses.created at') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                            <tr class="border-b border-dashed text-left">
                                <td class="p-2">{{ $taskStatus->id }}</td>
                                <td class="p-2"><a href="{{ route('task_statuses.show', $taskStatus) }}">{{ $taskStatus->name }}</a></td>
                                <td class="p-2">{{ $taskStatus->created_at }}</td>
                                <td class="p-2">

                                    <a href="{{ route('task_statuses.edit', $taskStatus) }}">{{ __('task_statuses.edit') }}</a>
                                    <form action="{{ route('task_statuses.destroy', $taskStatus) }}" data-confirm="{{ __('task_statuses.Are you sure you want to delete?') }}" method="POST"
                                          style="display:inline;" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">{{ __('task_statuses.delete') }}</button>
                                    </form>
                                </td>
                            </tr>


                            </tbody>
                        </table>


                </div>
            </div>
        </div>
    </div>


</x-app-layout>
