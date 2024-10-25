

<!-- resources/views/company/body/header.blade.php -->
<header class="bg-gray-50 transition-all">
    <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
        <!-- Sidebar Toggle Button -->
        <button type="button" class="text-lg text-gray-600 sidebar-toggle">
            <i class="ri-menu-line"></i>
        </button>
        <ul class="flex items-center text-sm ml-4">
            <li class="mr-2">
                <a href="#" class="text-gray-400 hover:text-gray-600 font-medium">Dashboard</a>
            </li>
            <li class="text-gray-600 mr-2 font-medium">/</li>
            <li class="text-gray-600 mr-2 font-medium">Analytics</li>
        </ul>
        <ul class="ml-auto flex items-center">
            <li class="relative ml-3">
                <button type="button" class="flex items-center" id="profileToggle">
                    <i class="ri-user-line text-gray-600 w-8 h-8"></i>
                </button>
                <div id="profileMenu" class="absolute right-0 mt-2 hidden bg-white rounded-md border border-gray-100 shadow-md z-30">
                    <ul class="py-2">
                        <li>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile Settings</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</header>


<!-- Include the main JavaScript file -->



<script>
document.addEventListener("DOMContentLoaded", function () {
    const profileToggle = document.getElementById("profileToggle");
    const profileMenu = document.getElementById("profileMenu");

    profileToggle.addEventListener("click", function () {
        profileMenu.classList.toggle("hidden");
    });

    // Close the menu if clicking outside
    document.addEventListener("click", function (event) {
        if (
            !profileToggle.contains(event.target) &&
            !profileMenu.contains(event.target)
        ) {
            profileMenu.classList.add("hidden");
        }
    });
});

</script>