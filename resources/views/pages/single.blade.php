<x-layouts.app>
    <!-- Outer container for background & centering -->
    <div class="min-h-screen bg-gray-100 p-4 mt-10">
        <div class="max-w-[90%] mx-auto space-y-6">
            <h1 class="text-2xl font-bold text-green-600 border-b pb-2">
                Admin Dashboard
            </h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                <div class="bg-yellow-400 text-white p-4 rounded shadow">
                    <div class="text-2xl font-bold">5</div>
                    <div>Employees</div>
                </div>
                <div class="bg-red-400 text-white p-4 rounded shadow">
                    <div class="text-2xl font-bold">4</div>
                    <div>Clients</div>
                </div>
                <div class="bg-green-400 text-white p-4 rounded shadow">
                    <div class="text-2xl font-bold">3</div>
                    <div>Projects</div>
                </div>
                <div class="bg-blue-400 text-white p-4 rounded shadow">
                    <div class="text-2xl font-bold">15</div>
                    <div>Departments</div>
                </div>
                <div class="bg-orange-400 text-white p-4 rounded shadow">
                    <div class="text-2xl font-bold">52,800</div>
                    <div>Total Payment</div>
                </div>
            </div>

            <!-- Main Content Row -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <!-- Bar Chart -->
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-lg font-bold mb-4">Total Salaries Paid</h2>
                    <canvas id="salaryChart" class="w-full h-64"></canvas>
                </div>

                <!-- Latest Projects Table -->
                <div class="bg-white p-4 rounded shadow">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-bold">Latest Projects</h2>
                        <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm">View All</button>
                    </div>
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-100">
                        <tr>
                            <th class="py-2 px-4">Project Name</th>
                            <th class="py-2 px-4">Project Type</th>
                            <th class="py-2 px-4">Date</th>
                            <th class="py-2 px-4">Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="border-b">
                            <td class="py-2 px-4">Project 1</td>
                            <td class="py-2 px-4">Residential</td>
                            <td class="py-2 px-4">2023-01-10</td>
                            <td class="py-2 px-4">Description</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4">Project 2</td>
                            <td class="py-2 px-4">Public</td>
                            <td class="py-2 px-4">2023-02-15</td>
                            <td class="py-2 px-4">Description</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <!-- Doughnut Chart -->
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-lg font-bold mb-4">Male vs Female Employees</h2>
                    <canvas id="employeeGenderChart" class="w-full h-64"></canvas>
                </div>

                <!-- Payment - Last 6 Months Bar Chart -->
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-lg font-bold mb-4">Payment - Last 6 Months</h2>
                    <canvas id="paymentChart" class="w-full h-64"></canvas>
                </div>
            </div>

            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-lg font-bold mb-4">Employees By Department</h2>
                <canvas id="deptChart" class="w-full h-96"></canvas>
            </div>

        </div>
    </div>

    <!-- Chart.js (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const deptCtx = document.getElementById('deptChart').getContext('2d');
        new Chart(deptCtx, {
            type: 'bar',
            data: {
                labels: [
                    'Marketing','People','Operations','Industrial','Finance',
                    'Front Desk','Front Desk North','Front Desk South','Quality',
                    'IT','SSG','Ecom Dev','Caretaking','Vehicle','PROPS','Others'
                ],
                datasets: [{
                    label: 'Count',
                    data: [5, 10, 75, 2, 8, 4, 6, 7, 12, 3, 2, 9, 3, 2, 5, 1],
                    backgroundColor: 'rgba(0, 0, 128, 0.8)', // Adjust color as needed
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
    <script>
        // Doughnut Chart
        const ctxGender = document.getElementById('employeeGenderChart').getContext('2d');
        new Chart(ctxGender, {
            type: 'doughnut',
            data: {
                labels: ['Male', 'Female', 'Other'],
                datasets: [{
                    data: [45, 40, 15],
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                }]
            },
            options: { responsive: true }
        });

        // Payment - Last 6 Months
        const ctxPayment = document.getElementById('paymentChart').getContext('2d');
        new Chart(ctxPayment, {
            type: 'bar',
            data: {
                labels: ['October', 'November', 'December', 'January', 'February', 'March'],
                datasets: [{
                    label: 'Payment',
                    data: [10000, 12000, 9000, 14000, 13000, 15000],
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
    <script>
        const ctx = document.getElementById('salaryChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['October', 'November', 'December', 'January', 'February'],
                datasets: [{
                    label: 'Basic Salary',
                    data: [20000, 25000, 30000, 28000, 35000],
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</x-layouts.app>
