<x-admin-layout>
    <x-slot name="header">
        @include('components.admin-header')
    </x-slot>
    <div class="bg-white p-6 rounded-xl shadow w-full">
        <h3 class="text-2xl font-bold mb-4 text-center">Contact</h3>
        <div class="overflow-auto max-h-[75vh] mb-10">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead class="sticky top-0 bg-white z-3 shadow">
                    <tr class="bg-gray-100">
                        <th class="p-3">Update</th>
                        <th class="p-3">Name</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Subject</th>
                        <th class="p-3">Message</th>
                    </tr>
                </thead>
                <tbody class="overflow-y-auto">
                    @if (count($contact) > 0)
                        @foreach ($contact as $con)
                            <tr class="border-b">
                            <td class="p-3"><a href='/admin/contact/{{$con->id}}' class="text-blue-600 font-semibold text-lg">Click</a></td>
                                <td class="p-3">{{ $con->name ?? 'N/A' }}</td>
                                <td class="p-3">{{ $con->email ?? 'N/A' }}</td>
                                <td class="p-3">{{ $con->subject ?? 'N/A' }}</td>
                                <td class="p-3">{{ $con->message ?? 'N/A' }}</td>
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