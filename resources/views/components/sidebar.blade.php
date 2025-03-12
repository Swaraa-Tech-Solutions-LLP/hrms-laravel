<div>
    <!-- Main Sidebar Container -->
    <div class="flex">
        <!-- Sidebar Section 1 -->
        <div class="h-[calc(100vh-64px)] bg-[#3B0E14] fixed top-[64px] overflow-hidden hover:overflow-y-auto">
            <ul class="flex flex-col text-center m-0 p-0 w-[120px] text-white">
                <li class="border-b border-[#dee2e6] w-full cursor-pointer group">
                    <a class="flex flex-col px-0 py-[26px]" href="#">
                        <i class="far fa-chart-bar text-white text-2xl my-0 mx-auto mb-1.5"></i>
                        <span class="text-[13px]">DashBoard</span>
                    </a>
                </li>
                <li class="border-b border-[#dee2e6] w-full cursor-pointer group">
                    <a class="flex flex-col px-0 py-[26px]" href="#" onmouseover="showSidebarContent('organization')">
                        <i class="far fa-building text-white text-2xl my-0 mx-auto mb-1.5"></i>
                        <span class="text-[13px]">Organization</span>
                    </a>
                </li>
                <li class="border-b border-[#dee2e6] w-full cursor-pointer group">
                    <a class="flex flex-col px-0 py-[26px]" href="#">
                        <i class="far fa-users text-white text-2xl my-0 mx-auto mb-1.5"></i>
                        <span class="text-[13px]">Clients</span>
                    </a>
                </li>
                <li class="border-b border-[#dee2e6] w-full cursor-pointer group">
                    <a class="flex flex-col px-0 py-[26px]" href="#" onmouseover="showSidebarContent('payroll')">
                        <i class="far fa-credit-card text-white text-2xl my-0 mx-auto mb-1.5"></i>
                        <span class="text-[13px]">Payroll</span>
                    </a>
                </li>
                <li class="border-b border-[#dee2e6] w-full cursor-pointer group">
                    <a class="flex flex-col px-0 py-[26px]" href="#" onmouseover="showSidebarContent('settings')">
                        <i class="far fa-cogs text-white text-2xl my-0 mx-auto mb-1.5"></i>
                        <span class="text-[13px]">Settings</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Sidebar Section 2 (Dynamic Content) -->
        <div id="sidebar-2" class="h-[calc(100vh-64px)] w-[220px] bg-white fixed top-[64px] left-[120px] py-[0.75rem] px-0 hidden">
            <!-- Organization Sidebar Content -->
            <ul id="content-organization" class="hidden flex flex-col text-center m-0 p-0 w-full text-black">
                <li class="w-full hover:bg-[#EEEEEE] cursor-pointer">
                    <a class="flex items-center text-[13px] px-6 py-3" href="{{route('employee')}}">
                        <i class="mr-4 far fa-user" style="font-size:18px; color:#70657B;"></i>
                        <span class="text-[13px] font-normal" style="color:#70657B;">Employee</span>
                    </a>
                </li>
                <li class="w-full hover:bg-[#EEEEEE] cursor-pointer">
                    <a class="flex items-center text-[13px] px-6 py-3" href="#">
                        <i class="mr-4 far fa-minus-circle" style="font-size:18px; color:#70657B;"></i>
                        <span class="text-[13px] font-normal" style="color:#70657B;">Deduction</span>
                    </a>
                </li>
                <li class="w-full hover:bg-[#EEEEEE] cursor-pointer">
                    <a class="flex items-center text-[13px] px-6 py-3" href="#">
                        <i class="mr-4 far fa-user-tag" style="font-size:18px; color:#70657B;"></i>
                        <span class="text-[13px] font-normal" style="color:#70657B;">Organization Roles</span>
                    </a>
                </li>
                <li class="w-full hover:bg-[#EEEEEE] cursor-pointer">
                    <a class="flex items-center text-[13px] px-6 py-3" href="#">
                        <i class="mr-4 far fa-building" style="font-size:18px; color:#70657B;"></i>
                        <span class="text-[13px] font-normal" style="color:#70657B;">Departments</span>
                    </a>
                </li>
                <li class="w-full hover:bg-[#EEEEEE] cursor-pointer">
                    <a class="flex items-center text-[13px] px-6 py-3" href="#">
                        <i class="mr-4 far fa-id-badge" style="font-size:18px; color:#70657B;"></i>
                        <span class="text-[13px] font-normal" style="color:#70657B;">Designations</span>
                    </a>
                </li>
                <li class="w-full hover:bg-[#EEEEEE] cursor-pointer">
                    <a class="flex items-center text-[13px] px-6 py-3" href="#">
                        <i class="mr-4 far fa-map-marker-alt" style="font-size:18px; color:#70657B;"></i>
                        <span class="text-[13px] font-normal" style="color:#70657B;">Locations</span>
                    </a>
                </li>
            </ul>

            <!-- Payroll Sidebar Content -->
            <ul id="content-payroll" class="hidden flex flex-col text-center m-0 p-0 w-full text-black">
                <li class="w-full hover:bg-[#EEEEEE] cursor-pointer">
                    <a class="flex items-center text-[13px] px-6 py-3" href="#">
                        <i class="mr-4 far fa-clock" style="font-size:18px; color:#70657B;"></i>
                        <span class="text-[13px] font-normal" style="color:#70657B;">Employee Timesheet</span>
                    </a>
                </li>
                <li class="w-full hover:bg-[#EEEEEE] cursor-pointer">
                    <a class="flex items-center text-[13px] px-6 py-3" href="#">
                        <i class="mr-4 far fa-dollar-sign" style="font-size:18px; color:#70657B;"></i>
                        <span class="text-[13px] font-normal" style="color:#70657B;">Rate</span>
                    </a>
                </li>
                <li class="w-full hover:bg-[#EEEEEE] cursor-pointer">
                    <a class="flex items-center text-[13px] px-6 py-3" href="#">
                        <i class="mr-4 far fa-calculator" style="font-size:18px; color:#70657B;"></i>
                        <span class="text-[13px] font-normal" style="color:#70657B;">Overtime Rate</span>
                    </a>
                </li>
                <li class="w-full hover:bg-[#EEEEEE] cursor-pointer">
                    <a class="flex items-center text-[13px] px-6 py-3" href="#">
                        <i class="mr-4 far fa-percentage" style="font-size:18px; color:#70657B;"></i>
                        <span class="text-[13px] font-normal" style="color:#70657B;">SSS rate</span>
                    </a>
                </li>
                <li class="w-full hover:bg-[#EEEEEE] cursor-pointer">
                    <a class="flex items-center text-[13px] px-6 py-3" href="#">
                        <i class="mr-4 far fa-file-invoice-dollar" style="font-size:18px; color:#70657B;"></i>
                        <span class="text-[13px] font-normal" style="color:#70657B;">Pay Runs</span>
                    </a>
                </li>
            </ul>

            <!-- Settings Sidebar Content -->
            <ul id="content-settings" class="hidden flex flex-col text-center m-0 p-0 w-full text-black">
                <li class="w-full hover:bg-[#EEEEEE] cursor-pointer">
                    <a class="flex items-center text-[13px] px-6 py-3" href="#">
                        <i class="mr-4 far fa-user-shield" style="font-size:18px; color:#70657B;"></i>
                        <span class="text-[13px] font-normal" style="color:#70657B;">Roles</span>
                    </a>
                </li>
                <li class="w-full hover:bg-[#EEEEEE] cursor-pointer">
                    <a class="flex items-center text-[13px] px-6 py-3" href="#">
                        <i class="mr-4 far fa-users-cog" style="font-size:18px; color:#70657B;"></i>
                        <span class="text-[13px] font-normal" style="color:#70657B;">Users</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    function showSidebarContent(section) {
        // Hide all content lists first
        document.querySelectorAll('#sidebar-2 ul').forEach(ul => {
            ul.classList.add('hidden');
        });

        // Show the sidebar container if hidden
        document.getElementById('sidebar-2').classList.remove('hidden');

        // Display only the relevant content
        const contentId = 'content-' + section;
        const contentEl = document.getElementById(contentId);
        if (contentEl) {
            contentEl.classList.remove('hidden');
        }
    }

    // Optionally, hide sidebar-2 when hovering on Dashboard or Clients
    document.querySelectorAll('.flex > ul > li a').forEach(link => {
        link.addEventListener('mouseover', function (e) {
            const text = e.currentTarget.querySelector('span').textContent.toLowerCase();
            if (text === 'dashboard' || text === 'clients') {
                document.getElementById('sidebar-2').classList.add('hidden');
            }
        });
    });
</script>
