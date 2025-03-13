function toggleFullscreen() {
    if (!document.fullscreenElement) {
        document.documentElement.requestFullscreen().catch((err) => {
            console.error(`Error attempting to enable full-screen mode: ${err.message}`);
        });
    } else {
        document.exitFullscreen();
    }
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('fullscreenBtn').addEventListener('click', toggleFullscreen);
});

//same address
$('#address_checkbox').change(function() {
    if ($(this).is(":checked")) {
        $("#permanent_address").val($("#present_address").val());
        $("#permanent_city").val($("#present_city").val());
        $("#permanent_state").val($("#present_state").val());
        $("#permanent_country").val($("#present_country").val());
        $("#permanent_national_id").val($("#present_national_id").val());
    } else {
        $("#permanent_address").val('');
        $("#permanent_city").val('');
        $("#permanent_state").val('');
        $("#permanent_country").val('');
        $("#permanent_national_id").val('');
    }
});

//experience add
document.getElementById("experience_add").addEventListener("click", function () {
    let row = `
                    <tr class="border-t border-gray-300">
                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="company_name[]"></td>
                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="job_title[]"></td>
                        <td class="p-2"><input type="date" class="w-full p-2 border rounded-lg" name="from_date[]"></td>
                        <td class="p-2"><input type="date" class="w-full p-2 border rounded-lg" name="to_date[]"></td>
                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="job_description[]"></td>
                        <td class="p-2 text-center">
                            <button type="button" class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 remove-row">✖</button>
                        </td>
                    </tr>`;
    document.getElementById("experience_row").insertAdjacentHTML("beforeend", row);
});

document.getElementById("experience_row").addEventListener("click", function (event) {
    if (event.target.classList.contains("remove-row")) {
        event.target.closest("tr").remove();
    }
});

//education add
document.getElementById("education_add").addEventListener("click", function () {
    let row = `
                    <tr class="border-t border-gray-300">
                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="institution_name[]"></td>
                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="degree[]"></td>
                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="specialization[]"></td>
                        <td class="p-2"><input type="date" class="w-full p-2 border rounded-lg" name="date_of_completion[]"></td>
                        <td class="p-2 text-center">
                            <button type="button" class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 remove-row">✖</button>
                        </td>
                    </tr>`;
    document.getElementById("education_row").insertAdjacentHTML("beforeend", row);
});

document.getElementById("education_row").addEventListener("click", function (event) {
    if (event.target.classList.contains("remove-row")) {
        event.target.closest("tr").remove();
    }
});

//emergency add
document.getElementById("emergency_add").addEventListener("click", function () {
    let row = `
                    <tr class="border-t border-gray-300">
                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="em_name[]"></td>
                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="relation[]"></td>
                        <td class="p-2"><input type="text" class="w-full p-2 border rounded-lg" name="em_phone[]"></td>
                        <td class="p-2 text-center">
                            <button type="button" class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 remove-row">✖</button>
                        </td>
                    </tr>`;
    document.getElementById("emergency_row").insertAdjacentHTML("beforeend", row);
});

document.getElementById("emergency_row").addEventListener("click", function (event) {
    if (event.target.classList.contains("remove-row")) {
        event.target.closest("tr").remove();
    }
});

//ctc calc
$("#ctc_salary_selection").change(function(e) {
    let selectedctc = $(this).val();
    calculate_payment(selectedctc);
});
function calculate_payment(selectedCTCvalue) {
    var annual_ctc = selectedCTCvalue;
    var basic_salary_per = $("#basic_salary_per").val();
    var house_rent_per = $("#house_rent_per").val();
    var annual_basic = Math.round((annual_ctc * basic_salary_per) / 100);
    $("#annual_basic").val(annual_basic);
    var monthly_ctc = annual_ctc / 12;
    var monthly_basic = Math.round((monthly_ctc * basic_salary_per) / 100);
    $("#monthly_basic").val(monthly_basic);

    var annual_house_rent = Math.round((annual_basic * house_rent_per) / 100);
    $("#annual_house_rent").val(annual_house_rent);
    var monthly_house_rent = Math.round((monthly_basic * house_rent_per) / 100);
    $("#monthly_house_rent").val(monthly_house_rent);

    var monthly_conveyance = $("#monthly_conveyance").val();
    var annual_conveyance = $("#annual_conveyance").val();

    var monthly_salary = Math.round(annual_ctc / 12);
    var annual_salary = annual_ctc;

    var monthly_total = parseInt(monthly_basic) + parseInt(monthly_house_rent) + parseInt(monthly_conveyance);
    var monthly_fixed = Math.round(monthly_salary - monthly_total);
    $("#monthly_fixed").val(monthly_fixed);

    var annual_total = parseInt(annual_basic) + parseInt(annual_house_rent) + parseInt(annual_conveyance);
    var annual_fixed = Math.round(annual_salary - annual_total);
    $("#annual_fixed").val(annual_fixed);

    $("#monthly_cost").empty();
    $("#annual_cost").empty();
    $("#monthly_cost").append("<b>&#x20B9; " + monthly_salary + "<b>");
    $("#annual_cost").append("<b>&#x20B9; " + annual_salary + "<b>");

}
