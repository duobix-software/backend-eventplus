<!-- resources/views/company/body/sidebar.blade.php -->
<div id="sidebarMenu" class="fixed top-0 left-0 w-64 h-screen bg-gray-900 p-4 z-50 transition-transform duration-300">
    <a href="#" class="flex items-center pb-4 border-b border-b-gray-800">
        <span class="text-lg font-bold text-white ml-3">Duobix</span>
    </a>
    <ul class="mt-4">
        <li class="mb-1">
            <a href="{{ route('dashboard') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                <i class="ri-home-2-line mr-3 text-lg"></i>
                <span class="text-sm">Dashboard</span>
            </a>
        </li>
        <li class="mb-1">
            <a href="{{ route('events.index') }}" class="flex items-center py-2 px-4 text-gray-300 hover:bg-gray-950 hover:text-gray-100 rounded-md">
                <i class="ri-calendar-event-line mr-3 text-lg"></i>
                <span class="text-sm">Event</span>
            </a>
        </li>
        <!-- Add more sidebar items as needed -->
    </ul>
</div>
