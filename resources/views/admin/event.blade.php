<x-admin-layout>
    <x-slot name="header">
        @include('components.admin-header')
    </x-slot>
    <div class="bg-white p-6 rounded-xl shadow w-full">
        <div class="text-end">
            <a href="/admin/event/create" class="text-white bg-gray-700 p-4 rounded-3xl">Create</a>
        </div>
        <h3 class="text-2xl font-bold mb-4 text-center">Active Event</h3>
        <div class="overflow-auto max-h-[75vh] mb-10">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead class="sticky top-0 bg-white z-3 shadow">
                    <tr class="bg-gray-100">
                        <th class="p-3">Update</th>
                        <th class="p-3">Name</th>
                        <th class="p-3">Location</th>
                        <th class="p-3">Date</th>
                        <th class="p-3">Description</th>
                        <th class="p-3">Link</th>
                        <th class="p-3">Image</th>
                    </tr>
                </thead>
                <tbody class="overflow-y-auto">
                    @if (count($active_event) > 0)
                        @foreach ($active_event as $event)
                            <tr class="border-b">
                            <td class="p-3"><a href='/admin/event/{{$event->id}}' class="text-blue-600 font-semibold text-lg">Click</a></td>
                                <td class="p-3">{{ $event->name ?? 'N/A' }}</td>
                                <td class="p-3">{{ $event->location ?? 'N/A' }}</td>
                                <td class="p-3">{{ $event->date ?? 'N/A' }}</td>
                                <td class="p-3">{{ $event->description ?? 'N/A' }}</td>
                                <td class="p-3"><a href="{{ $event->link }}">{{ $event->link ?? 'N/A' }}</a></td>
                                <td class="p-3"><a href="/{{ $event->image }}" target="_blank"><img src="/{{ $event->image }}" alt="{{ $event->name }}" class="h-16 w-16 rounded-full"></a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="14" class="text-center py-4 text-gray-500">No data found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <h3 class="text-2xl font-bold mb-4 text-center">Not Active Event</h3>
        <div class="overflow-auto max-h-[75vh] mb-10">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead class="sticky top-0 bg-white z-3 shadow">
                    <tr class="bg-gray-100">
                        <th class="p-3">Update</th>
                        <th class="p-3">Name</th>
                        <th class="p-3">Location</th>
                        <th class="p-3">Date</th>
                        <th class="p-3">Description</th>
                        <th class="p-3">Link</th>
                        <th class="p-3">Image</th>
                    </tr>
                </thead>
                <tbody class="overflow-y-auto">
                    @if (count($not_active_event) > 0)
                        @foreach ($not_active_event as $event)
                            <tr class="border-b">
                            <td class="p-3"><a href='/admin/event/{{$event->id}}' class="text-blue-600 font-semibold text-lg">Click</a></td>
                                <td class="p-3">{{ $event->name ?? 'N/A' }}</td>
                                <td class="p-3">{{ $event->location ?? 'N/A' }}</td>
                                <td class="p-3">{{ $event->date ?? 'N/A' }}</td>
                                <td class="p-3">{{ $event->description ?? 'N/A' }}</td>
                                <td class="p-3">{{ $event->link ?? 'N/A' }}</td>
                                <td class="p-3"><a href="/{{ $event->image }}" target="_blank"><img src="/{{ $event->image }}" alt="{{ $event->name }}" class="h-16 w-16 rounded-full"></a></td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="14" class="text-center py-4 text-gray-500">No data found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>