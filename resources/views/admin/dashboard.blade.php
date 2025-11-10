<x-admin-layout>
    <x-slot name="header">
        @include('components.admin-header')
    </x-slot>
    <!-- Main Content -->
    <div class="min-h-screen bg-gray-100 text-gray-800">
        <main class="flex-1 p-6">
            <!-- Welcome -->
            <div class="mb-6">
                <h2 class="text-3xl font-bold mb-2 text-center">Hello Admin 👋</h2>
                <p class="text-gray-600 text-center">Here is an overview of the platform</p>
            </div>
            <!-- Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <div class="flex items-center gap-4 mb-2">
                        <div class="bg-indigo-100 text-indigo-600 p-3 rounded-full text-2xl">👥</div>
                        <h3 class="text-xl font-semibold">Total Users</h3>
                    </div>
                    <p class="text-gray-600">{{ $total_users }} Registered Users</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <div class="flex items-center gap-4 mb-2">
                        <div class="bg-green-100 text-green-600 p-3 rounded-full text-2xl">📚</div>
                        <h3 class="text-xl font-semibold">Total Alumni</h3>
                    </div>
                    <p class="text-gray-600">{{ $total_alumni }} Requested Alumni</p>
                </div>
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <div class="flex items-center gap-4 mb-2">
                        <div class="bg-yellow-100 text-yellow-600 p-3 rounded-full text-2xl">📅</div>
                        <h3 class="text-xl font-semibold">Total Contact</h3>
                    </div>
                    <p class="text-gray-600">{{ $total_contact }} Contact</p>
                </div>
            </div>
            <!-- User Activity Table -->
            <div class="bg-white p-6 rounded-xl shadow w-full">
                <h3 class="text-2xl text-center font-bold mb-4">Recent User Activity</h3>
                <!-- <div class="overflow-auto max-h-[75vh]">
                    <table class="min-w-[1000px] w-full text-left border-collapse">
                        <thead class="sticky top-0 bg-white z-10 shadow">
                            <tr class="bg-gray-100">
                                <th class="p-3">Name</th>
                                <th class="p-3">Activity</th>
                                <th class="p-3">Date</th>
                                <th class="p-3">Date</th>
                                <th class="p-3">Date</th>
                                <th class="p-3">Date</th>
                                <th class="p-3">Status</th>
                            </tr>
                        </thead>
                        <tbody class="overflow-y-auto">
                            <tr class="border-b">
                                <td class="p-3">Aman Kumar</td>
                                <td class="p-3">Registered for Course</td>
                                <td class="p-3">Today</td>
                                <td class="p-3">Today</td>
                                <td class="p-3">Today</td>
                                <td class="p-3">Today</td>
                                <td class="p-3 text-green-600">✅ Completed</td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-3">Harshita P.</td>
                                <td class="p-3">Updated Profile</td>
                                <td class="p-3">Yesterday</td>
                                <td class="p-3">Yesterday</td>
                                <td class="p-3">Yesterday</td>
                                <td class="p-3">Yesterday</td>
                                <td class="p-3 text-blue-600">⏳ Pending</td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-3">Rahul Sinha</td>
                                <td class="p-3">Messaged Admin</td>
                                <td class="p-3">2 days ago</td>
                                <td class="p-3">2 days ago</td>
                                <td class="p-3">2 days ago</td>
                                <td class="p-3">2 days ago</td>
                                <td class="p-3 text-yellow-600">⚠️ Review</td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-3">Aman Kumar</td>
                                <td class="p-3">Registered for Course</td>
                                <td class="p-3">Today</td>
                                <td class="p-3">Today</td>
                                <td class="p-3">Today</td>
                                <td class="p-3">Today</td>
                                <td class="p-3 text-green-600">✅ Completed</td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-3">Harshita P.</td>
                                <td class="p-3">Updated Profile</td>
                                <td class="p-3">Yesterday</td>
                                <td class="p-3">Yesterday</td>
                                <td class="p-3">Yesterday</td>
                                <td class="p-3">Yesterday</td>
                                <td class="p-3 text-blue-600">⏳ Pending</td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-3">Rahul Sinha</td>
                                <td class="p-3">Messaged Admin</td>
                                <td class="p-3">2 days ago</td>
                                <td class="p-3">2 days ago</td>
                                <td class="p-3">2 days ago</td>
                                <td class="p-3">2 days ago</td>
                                <td class="p-3 text-yellow-600">⚠️ Review</td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-3">Aman Kumar</td>
                                <td class="p-3">Registered for Course</td>
                                <td class="p-3">Today</td>
                                <td class="p-3">Today</td>
                                <td class="p-3">Today</td>
                                <td class="p-3">Today</td>
                                <td class="p-3 text-green-600">✅ Completed</td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-3">Harshita P.</td>
                                <td class="p-3">Updated Profile</td>
                                <td class="p-3">Yesterday</td>
                                <td class="p-3">Yesterday</td>
                                <td class="p-3">Yesterday</td>
                                <td class="p-3">Yesterday</td>
                                <td class="p-3 text-blue-600">⏳ Pending</td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-3">Rahul Sinha</td>
                                <td class="p-3">Messaged Admin</td>
                                <td class="p-3">2 days ago</td>
                                <td class="p-3">2 days ago</td>
                                <td class="p-3">2 days ago</td>
                                <td class="p-3">2 days ago</td>
                                <td class="p-3 text-yellow-600">⚠️ Review</td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-3">Aman Kumar</td>
                                <td class="p-3">Registered for Course</td>
                                <td class="p-3">Today</td>
                                <td class="p-3">Today</td>
                                <td class="p-3">Today</td>
                                <td class="p-3">Today</td>
                                <td class="p-3 text-green-600">✅ Completed</td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-3">Harshita P.</td>
                                <td class="p-3">Updated Profile</td>
                                <td class="p-3">Yesterday</td>
                                <td class="p-3">Yesterday</td>
                                <td class="p-3">Yesterday</td>
                                <td class="p-3">Yesterday</td>
                                <td class="p-3 text-blue-600">⏳ Pending</td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-3">Rahul Sinha</td>
                                <td class="p-3">Messaged Admin</td>
                                <td class="p-3">2 days ago</td>
                                <td class="p-3">2 days ago</td>
                                <td class="p-3">2 days ago</td>
                                <td class="p-3">2 days ago</td>
                                <td class="p-3 text-yellow-600">⚠️ Review</td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-3">Aman Kumar</td>
                                <td class="p-3">Registered for Course</td>
                                <td class="p-3">Today</td>
                                <td class="p-3">Today</td>
                                <td class="p-3">Today</td>
                                <td class="p-3">Today</td>
                                <td class="p-3 text-green-600">✅ Completed</td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-3">Harshita P.</td>
                                <td class="p-3">Updated Profile</td>
                                <td class="p-3">Yesterday</td>
                                <td class="p-3">Yesterday</td>
                                <td class="p-3">Yesterday</td>
                                <td class="p-3">Yesterday</td>
                                <td class="p-3 text-blue-600">⏳ Pending</td>
                            </tr>
                            <tr class="border-b">
                                <td class="p-3">jems Patel</td>
                                <td class="p-3">Messaged Admin</td>
                                <td class="p-3">2 days ago</td>
                                <td class="p-3">2 days ago</td>
                                <td class="p-3">2 days ago</td>
                                <td class="p-3">2 days ago</td>
                                <td class="p-3 text-yellow-600">⚠️ Review</td>
                            </tr>
                        </tbody>
                    </table>
                </div> -->
                <div class="overflow-auto max-h-[75vh] mb-10">
                    <table class="w-full text-left border-collapse whitespace-nowrap">
                        <thead class="sticky top-0 bg-white z-3 shadow">
                            <tr class="bg-gray-100">
                                <th class="p-3">Type</th>
                                <th class="p-3">Details</th>
                                <th class="p-3">Updated At</th>
                            </tr>
                        </thead>
                        <tbody class="overflow-y-auto">
                            @if (count($activities) > 0)
                                @foreach ($activities as $activity)
                                    <tr class="border-b">
                                        {{-- TYPE --}}
                                        <td class="p-3 font-semibold">
                                            @if($activity instanceof App\Models\User)
                                                👤 User
                                            @elseif($activity instanceof App\Models\Alumni)
                                                🎓 Alumni
                                            @elseif($activity instanceof App\Models\Post)
                                                📝 Post
                                            @elseif($activity instanceof App\Models\Event)
                                                📅 Event
                                            @elseif($activity instanceof App\Models\Contact)
                                                📧 Contact
                                            @endif
                                        </td>

                                        {{-- DETAILS --}}
                                        <td class="p-3">
                                            @if($activity instanceof App\Models\User)
                                                {{ $activity->name }} ({{ $activity->email }})
                                            @elseif($activity instanceof App\Models\Alumni)
                                                {{ $activity->user->name }} - {{ $activity->user->year ?? 'N/A' }}
                                            @elseif($activity instanceof App\Models\Post)
                                                {{ $activity->title }} <br>
                                                <span class="text-sm text-gray-500">{{ Str::limit($activity->content, 50) }}</span>
                                            @elseif($activity instanceof App\Models\Event)
                                                {{ $activity->title }} ({{ $activity->date ?? 'N/A' }})
                                            @elseif($activity instanceof App\Models\Contact)
                                                {{ $activity->name }} - {{ $activity->email }}
                                            @endif
                                        </td>

                                        {{-- TIME --}}
                                        <td class="p-3">
                                            {{ $activity->created_at->diffForHumans() }}
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-gray-500">No recent activity found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
        </main>
    </div>
</x-admin-layout>