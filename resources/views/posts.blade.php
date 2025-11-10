<x-admin-layout>
    <x-slot name="header">
        @include('components.header')
    </x-slot>
    <div class="bg-white p-6 rounded-xl shadow w-full">
        <div class="text-end mt-3">
            <a href="/add-post" class="text-white bg-gray-700 p-4 rounded-3xl">Create</a>
        </div>
        <h3 class="text-2xl font-bold mb-4 text-center">All Posts</h3>
        <div class="overflow-auto max-h-[75vh] mb-10">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead class="sticky top-0 bg-white z-3 shadow">
                    <tr class="bg-gray-100">
                        <th class="p-3">Update</th>
                        <th class="p-3">Delete</th>
                        <th class="p-3">Title</th>
                        <th class="p-3">image</th>
                        <th class="p-3">Description</th>
                        <th class="p-3">caption</th>
                    </tr>
                </thead>
                <tbody class="overflow-y-auto">
                    @if (count($posts) > 0)
                        @foreach ($posts as $post)
                            <tr class="border-b">
                                <td class="p-3"><a href='/alumni/update/post/{{$post->id}}' class="bg-green-700 hover:bg-green-800 text-white px-5 py-3 rounded-2xl font-semibold text-lg">Click</a></td>
                                <td class="p-3"><form action="{{ route('alumni.delete_post', ['id' => $post->id]) }}" method="POST">@csrf<input type="submit" value="Click"  class="bg-red-700 hover:bg-red-800 text-white px-5 py-3 rounded-2xl font-semibold text-lg cursor-pointer"></form></td>
                                <td class="p-3">{{ $post->title ?? 'N/A' }}</td>
                                <td class="p-3"><a href="/{{ $post->image }}"><img src="/{{ $post->image }}" alt="{{ $post->title }}"></a></td>
                                <td class="p-3 text-wrap">{{ $post->description ?? 'N/A' }}</td>
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