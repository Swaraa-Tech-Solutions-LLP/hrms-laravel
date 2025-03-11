<div>
    <div class="flex">
        <!-- Sidebar Section 1 -->
        <div class="h-[calc(100vh-64px)] bg-[#3B0E14] fixed top-[64px] overflow-hidden hover:overflow-y-auto">
            <ul class="flex flex-col text-center m-0 p-0 w-[120px] text-white">
                <li class="border-b border-[#dee2e6] w-[100%] cursor-pointer group">
                    <a class="flex flex-col px-0 py-[26px]" href="#" onmouseover="">
                        <i class="far fa-chart-bar text-white text-2xl my-0 mx-auto mb-1.5"></i>
                        <span class="text-[13px]">DashBoard</span>
                    </a>
                </li>
                <li class="border-b border-[#dee2e6] w-[100%] cursor-pointer group">
                    <a class="flex flex-col px-0 py-[26px]" href="#" onmouseover="changeSidebarContent('organization')">
                        <i class="far fa-building text-white text-2xl my-0 mx-auto mb-1.5"></i>
                        <span class="text-[13px]">Organization</span>
                    </a>
                </li>
                <li class="border-b border-[#dee2e6] w-[100%] cursor-pointer group">
                    <a class="flex flex-col px-0 py-[26px]" href="#">
                        <i class="far fa-users text-white text-2xl my-0 mx-auto mb-1.5"></i>
                        <span class="text-[13px]">Clients</span>
                    </a>
                </li>
                <li class="border-b border-[#dee2e6] w-[100%] cursor-pointer group">
                    <a class="flex flex-col px-0 py-[26px]" href="#" onmouseover="changeSidebarContent('payroll')">
                        <i class="far fa-credit-card text-white text-2xl my-0 mx-auto mb-1.5"></i>
                        <span class="text-[13px]">Payroll</span>
                    </a>
                </li>
                <li class="border-b border-[#dee2e6] w-[100%] cursor-pointer group">
                    <a class="flex flex-col px-0 py-[26px]" href="#" onmouseover="changeSidebarContent('settings')">
                        <i class="far fa-cogs text-white text-2xl my-0 mx-auto mb-1.5"></i>
                        <span class="text-[13px]">Settings</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Sidebar Section 2 -->
        <div class="h-[calc(100vh-64px)] w-[220px] bg-white fixed top-[64px] left-[120px] py-[0.75rem] px-0 hidden"
            id="sidebar-2">
            <ul class="flex flex-col text-center m-0 p-0 w-full text-black">
                <!-- Dynamic list -->
            </ul>
        </div>
    </div>
</div>

<script>
  

    function changeSidebarContent(section) {

        const content = {
            organization: [
                'Employee',
                'Deduction',
                'Organization Roles',
                'Departments',
                'Designations',
                'Locations',
          
            ],
            payroll: [
                'Employee Timesheet',
                'Rate',
                'Overtime Rate',
                'SSS rate',
                'Pay Runs'
            ],
            settings: [
                'Roles',
                'Users'
            ]
        };


        document.getElementById('sidebar-2').classList.remove('hidden');
        const sectionContent = content[section];
        const sidebarList = document.querySelector('#sidebar-2 ul');
        sidebarList.innerHTML = '';
        sectionContent.forEach(item => {
            const li = document.createElement('li');
            li.classList.add('w-[100%]', 'hover:bg-[#EEEEEE]', 'cursor-pointer');
            const a = document.createElement('a');
            a.classList.add('flex', 'items-center', 'text-[13px]', 'px-6', 'py-3');
            const icon = document.createElement('i');
            icon.classList.add('mr-4', 'far', 'fa-chart-bar', 'text-[#70657B]');
            icon.style.fontSize = '18px';
            const span = document.createElement('span');
            span.classList.add('text-[13px]', 'font-normal', 'text-[#70657B]');
            span.textContent = item;
            a.appendChild(icon);
            a.appendChild(span);
            li.appendChild(a);
            sidebarList.appendChild(li);

            
        });

        document.querySelectorAll('.flex .cursor-pointer a').forEach(item => {
    item.addEventListener('mouseover', (e) => {
        const section = e.target.closest('a').querySelector('span').textContent.toLowerCase();
        if (section === 'dashboard' || section === 'clients') {
            document.getElementById('sidebar-2').classList.add('hidden');
        }
    });
});

   
    }
</script>