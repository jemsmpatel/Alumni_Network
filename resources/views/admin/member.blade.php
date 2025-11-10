<x-admin-layout>
    <x-slot name="header">
        @include('components.admin-header')
    </x-slot>
    <div class="bg-white p-6 rounded-xl shadow w-full">
        <h3 class="text-2xl font-bold mb-4 text-center">Members</h3>
        <div class="overflow-auto max-h-[75vh] mb-10">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead class="sticky top-0 bg-white z-3 shadow">
                    <tr class="bg-gray-100">
                        <th class="p-3">Update</th>
                        <th class="p-3">Name</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">phone</th>
                        <th class="p-3">year</th>
                        <th class="p-3">interests</th>
                        <th class="p-3">goals</th>
                        <th class="p-3">Profile Image</th>
                        <th class="p-3">is_active</th>
                    </tr>
                </thead>
                <tbody class="overflow-y-auto">
                    @if (count($users) > 0)
                        @foreach ($users as $user)
                            <tr class="border-b">
                            <td class="p-3"><a href='/admin/member/{{$user->id}}' class="text-blue-600 font-semibold text-lg">Click</a></td>
                                <td class="p-3">{{ $user->name ?? 'N/A' }}</td>
                                <td class="p-3">{{ $user->email ?? 'N/A' }}</td>
                                <td class="p-3">{{ $user->phone ?? 'N/A' }}</td>
                                <td class="p-3">{{ $user->year ?? 'N/A' }}</td>
                                <td class="p-3">{{ $user->interests ?? 'N/A' }}</td>
                                <td class="p-3">{{ $user->goals ?? 'N/A' }}</td>
                                <td class="p-3">@if($user->profile_image) <a href="/{{ $user->profile_image }}" target="_blank"><img src="/{{ $user->profile_image }}" alt="{{ $user->name }}" class="h-16 w-16 rounded-full"></a> @else N/A @endif</td>
                                <td class="p-3">{{ $user->is_active ?? 'N/A' }}</td>
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