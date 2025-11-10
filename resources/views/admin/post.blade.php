<x-admin-layout>
    <x-slot name="header">
        @include('components.admin-header')
    </x-slot>
    <div class="bg-white p-6 rounded-xl shadow w-full">
        <div class="text-end">
            <a href="/admin/post/create" class="text-white bg-gray-700 p-4 rounded-3xl">Create</a>
        </div>
        <h3 class="text-2xl font-bold mb-4 text-center">Active Post</h3>
        <div class="overflow-auto max-h-[75vh] mb-10">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead class="sticky top-0 bg-white z-3 shadow">
                    <tr class="bg-gray-100">
                        <th class="p-3">Update</th>
                        <th class="p-3">Title</th>
                        <th class="p-3">User Id</th>
                        <th class="p-3">image</th>
                        <th class="p-3">Description</th>
                        <th class="p-3">caption</th>
                    </tr>
                </thead>
                <tbody class="overflow-y-auto">
                    @if (count($active_post) > 0)
                        @foreach ($active_post as $post)
                            <tr class="border-b">
                                <td class="p-3"><a href='/admin/post/{{$post->id}}' class="text-blue-600 font-semibold text-lg">Click</a></td>
                                <td class="p-3">{{ $post->title ?? 'N/A' }}</td>
                                <td class="p-3"><a href="/admin/member/{{ $post->user_id }}">{{ $post->user_id ?? 'N/A' }}</a></td>
                                <td class="p-3"><a href="/{{ $post->image }}" target="_blank"><img src="/{{ $post->image }}" alt="{{ $post->name }}" class="h-16 w-16 rounded-full"></a></td>
                                <td class="p-3">{{ $post->description ?? 'N/A' }}</td>
                                <td class="p-3">{{ $post->caption ?? 'N/A' }}</td>
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
        <h3 class="text-2xl font-bold mb-4 text-center">Not Active Post</h3>
        <div class="overflow-auto max-h-[75vh] mb-10">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead class="sticky top-0 bg-white z-3 shadow">
                    <tr class="bg-gray-100">
                        <th class="p-3">Update</th>
                        <th class="p-3">Title</th>
                        <th class="p-3">User Id</th>
                        <th class="p-3">image</th>
                        <th class="p-3">Description</th>
                        <th class="p-3">caption</th>
                    </tr>
                </thead>
                <tbody class="overflow-y-auto">
                    @if (count($not_active_post) > 0)
                        @foreach ($not_active_post as $post)
                            <tr class="border-b">
                                <td class="p-3"><a href='/admin/post/{{$post->id}}' class="text-blue-600 font-semibold text-lg">Click</a></td>
                                <td class="p-3">{{ $post->title ?? 'N/A' }}</td>
                                <td class="p-3"><a href="/admin/member/{{ $post->user_id }}">{{ $post->user_id ?? 'N/A' }}</a></td>
                                <td class="p-3"><a href="/{{ $post->image }}" target="_blank"><img src="/{{ $post->image }}" alt="{{ $post->name }}" class="h-16 w-16 rounded-full"></a></td>
                                <td class="p-3">{{ $post->description ?? 'N/A' }}</td>
                                <td class="p-3">{{ $post->caption ?? 'N/A' }}</td>
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