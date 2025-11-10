<x-admin-layout>
    <x-slot name="header">
        @include('components.admin-header')
    </x-slot>
    <!-- User Activity Table -->
    <div class="bg-white p-6 rounded-xl shadow w-full">
        <h3 class="text-2xl font-bold mb-4 text-center">Requested Alumni</h3>
        <div class="overflow-auto max-h-[75vh] mb-10">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead class="sticky top-0 bg-white z-3 shadow">
                    <tr class="bg-gray-100">
                        <!-- <th class="p-3">Update Link</th> -->
                        <th class="p-3">Accept</th>
                        <th class="p-3">Reject</th>
                        <th class="p-3">User Name</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Phone</th>
                        <th class="p-3">Graduation Year</th>
                        <th class="p-3">Degree</th>
                        <th class="p-3">Job</th>
                        <th class="p-3">Skills</th>
                        <th class="p-3">Location</th>
                        <th class="p-3">Industry</th>
                        <th class="p-3">Resume</th>
                        <th class="p-3">Year</th>
                        <th class="p-3">Interests</th>
                        <th class="p-3">Goals</th>
                        <th class="p-3">Profile Image</th>
                    </tr>
                </thead>
                <tbody class="overflow-y-auto">
                    @if (count($requested_alumni) > 0)
                        @foreach ($requested_alumni as $alum)
                            <tr class="border-b">
                            <!-- <td class="p-3"><a href='/admin/alumni/{{$alum->id}}' class="text-blue-600 font-semibold text-lg">Click</a></td> -->
                                <td class="p-3">
                                    <form action="{{ route('admin.accept_alumni', ['id' => $alum->id]) }}" method="POST">
                                        @csrf
                                        <input type="submit" value="Click" class="bg-green-700 hover:bg-green-800 text-white px-5 py-3 rounded-2xl font-semibold text-lg cursor-pointer">
                                    </form>
                                </td>
                                <td class="p-3">
                                    <form action="{{ route('admin.reject_alumni', ['id' => $alum->id]) }}" method="POST">
                                        @csrf
                                        <input type="submit" value="Click" class="bg-red-700 hover:bg-red-800 text-white px-5 py-3 rounded-2xl font-semibold text-lg cursor-pointer">
                                    </form>
                                </td>
                                <td class="p-3">{{ $alum->user->name ?? 'N/A' }}</td>
                                <td class="p-3">{{ $alum->user->email ?? 'N/A' }}</td>
                                <td class="p-3">{{ $alum->user->phone ?? 'N/A' }}</td>
                                <td class="p-3">{{ $alum->graduation_year }}</td>
                                <td class="p-3">{{ $alum->degree }}</td>
                                <td class="p-3">{{ $alum->job }}</td>
                                <td class="p-3">{{ $alum->skills }}</td>
                                <td class="p-3">{{ $alum->location }}</td>
                                <td class="p-3">{{ $alum->industry }}</td>
                                <td class="p-3">
                                    @if ($alum->resume)
                                        <a href="/{{ $alum->resume }}" target="_blank">Download</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="p-3">{{ $alum->user->year ?? 'N/A' }}</td>
                                <td class="p-3">{{ $alum->user->interests ?? 'N/A' }}</td>
                                <td class="p-3">{{ $alum->user->goals ?? 'N/A' }}</td>
                                <td class="p-3">@if($alum->user->profile_image) <a href="/{{ $alum->user->profile_image }}" target="_blank"><img src="/{{ $alum->user->profile_image }}" alt="{{ $alum->user->name }}" class="h-16 w-16 rounded-full"></a> @else N/A @endif</td>
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
        <h3 class="text-2xl font-bold mb-4 text-center">Alumni</h3>
        <div class="overflow-auto max-h-[75vh] mb-10">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead class="sticky top-0 bg-white z-3 shadow">
                    <tr class="bg-gray-100">
                        <th class="p-3">Update Link</th>
                        <th class="p-3">User Name</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Phone</th>
                        <th class="p-3">Graduation Year</th>
                        <th class="p-3">Degree</th>
                        <th class="p-3">Job</th>
                        <th class="p-3">Skills</th>
                        <th class="p-3">Location</th>
                        <th class="p-3">Industry</th>
                        <th class="p-3">Resume</th>
                        <th class="p-3">Year</th>
                        <th class="p-3">Interests</th>
                        <th class="p-3">Goals</th>
                        <th class="p-3">Profile Image</th>
                    </tr>
                </thead>
                <tbody class="overflow-y-auto">
                    @if (count($alumni) > 0)
                        @foreach ($alumni as $alum)
                            <tr class="border-b">
                                <td class="p-3"><a href='/admin/alumni/{{$alum->id}}' class="text-blue-600 font-semibold text-lg">Click</a></td>
                                <td class="p-3">{{ $alum->user->name ?? 'N/A' }}</td>
                                <td class="p-3">{{ $alum->user->email ?? 'N/A' }}</td>
                                <td class="p-3">{{ $alum->user->phone ?? 'N/A' }}</td>
                                <td class="p-3">{{ $alum->graduation_year }}</td>
                                <td class="p-3">{{ $alum->degree }}</td>
                                <td class="p-3">{{ $alum->job }}</td>
                                <td class="p-3">{{ $alum->skills }}</td>
                                <td class="p-3">{{ $alum->location }}</td>
                                <td class="p-3">{{ $alum->industry }}</td>
                                <td class="p-3">
                                    @if ($alum->resume)
                                        <a href="/{{ $alum->resume }}" target="_blank">Download</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="p-3">{{ $alum->user->year ?? 'N/A' }}</td>
                                <td class="p-3">{{ $alum->user->interests ?? 'N/A' }}</td>
                                <td class="p-3">{{ $alum->user->goals ?? 'N/A' }}</td>
                                <td class="p-3">@if($alum->user->profile_image) <a href="/{{ $alum->user->profile_image }}" target="_blank"><img src="/{{ $alum->user->profile_image }}" alt="{{ $alum->user->name }}" class="h-16 w-16 rounded-full"></a> @else N/A @endif</td>
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
        <h3 class="text-2xl font-bold mb-4 text-center">Rejected Alumni</h3>
        <div class="overflow-auto max-h-[75vh] mb-10">
            <table class="w-full text-left border-collapse whitespace-nowrap">
                <thead class="sticky top-0 bg-white z-3 shadow">
                    <tr class="bg-gray-100">
                        <th class="p-3">Update Link</th>
                        <th class="p-3">User Name</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Phone</th>
                        <th class="p-3">Graduation Year</th>
                        <th class="p-3">Degree</th>
                        <th class="p-3">Job</th>
                        <th class="p-3">Skills</th>
                        <th class="p-3">Location</th>
                        <th class="p-3">Industry</th>
                        <th class="p-3">Resume</th>
                        <th class="p-3">Year</th>
                        <th class="p-3">Interests</th>
                        <th class="p-3">Goals</th>
                        <th class="p-3">Profile Image</th>
                    </tr>
                </thead>
                <tbody class="overflow-y-auto">
                    <!-- @for($id = 0; $id < 20; $id++)
                        <tr class="border-b">
                            <td class="p-3">Aman Kumar</td>
                            <td class="p-3">Registered for Course</td>
                            <td class="p-3">Today hello world i am jems</td>
                            <td class="p-3">Today hello world i am jems</td>
                            <td class="p-3">Today hello world i am jems</td>
                            <td class="p-3">Today hello world i am jems</td>
                            <td class="p-3">Today hello world i am jems</td>
                            <td class="p-3">Today hello world i am jems</td>
                            <td class="p-3">Today hello world i am jems</td>
                            <td class="p-3">Today hello world i am jems</td>
                            <td class="p-3">Today hello world i am jems</td>
                            <td class="p-3">Today hello world i am jems</td>
                            <td class="p-3 text-green-600">✅ Completed</td>
                        </tr>
                    @endfor -->
                    @if (count($rejected_alumni) > 0)
                        @foreach ($rejected_alumni as $alum)
                            <tr class="border-b">
                            <td class="p-3"><a href='/admin/alumni/{{$alum->id}}' class="text-blue-600 font-semibold text-lg">Click</a></td>
                                <td class="p-3">{{ $alum->user->name ?? 'N/A' }}</td>
                                <td class="p-3">{{ $alum->user->email ?? 'N/A' }}</td>
                                <td class="p-3">{{ $alum->user->phone ?? 'N/A' }}</td>
                                <td class="p-3">{{ $alum->graduation_year }}</td>
                                <td class="p-3">{{ $alum->degree }}</td>
                                <td class="p-3">{{ $alum->job }}</td>
                                <td class="p-3">{{ $alum->skills }}</td>
                                <td class="p-3">{{ $alum->location }}</td>
                                <td class="p-3">{{ $alum->industry }}</td>
                                <td class="p-3">
                                    @if ($alum->resume)
                                        <a href="/{{ $alum->resume }}" target="_blank">Download</a>
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td class="p-3">{{ $alum->user->year ?? 'N/A' }}</td>
                                <td class="p-3">{{ $alum->user->interests ?? 'N/A' }}</td>
                                <td class="p-3">{{ $alum->user->goals ?? 'N/A' }}</td>
                                <td class="p-3">@if($alum->user->profile_image) <a href="/{{ $alum->user->profile_image }}" target="_blank"><img src="/{{ $alum->user->profile_image }}" alt="{{ $alum->user->name }}" class="h-16 w-16 rounded-full"></a> @else N/A @endif</td>
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