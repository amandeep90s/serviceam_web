// index.js

"use strict";
$(document).ready(function () {
    $("input").attr("autocomplete", "off");
});

// Function to handle authentication errors in AJAX requests
function checkAuthentication(guard) {
    $(document).ajaxError(function (event, jqXHR) {
        if (jqXHR.status == 401) {
            if (getToken(guard) != null && getToken(guard) != "false") {
                refreshToken(guard);
            } else {
                window.location.replace("/" + guard + "/login");
            }
        }
    });
}

// Function to refresh the authentication token
function refreshToken(guard) {
    $.ajax({
        url: getBaseUrl() + "/" + guard + "/refresh",
        type: "post",
        headers: {
            Authorization: "Bearer " + getToken(guard),
        },
        success: function (response) {
            var data = parseData(response);
            setToken(guard, data.responseData.access_token);
        },
        error: function () {
            removeStorage(guard);
            window.location.replace("/" + guard + "/login");
        },
    });
}

// Function to save a row using AJAX
function saveRow(url, table, data, guard = "admin", page = "") {
    $.ajax({
        url: url,
        type: "post",
        data: data,
        processData: false,
        contentType: false,
        headers: {
            Authorization: "Bearer " + getToken(guard),
        },
        beforeSend: function (request) {
            showInlineLoader();
        },
        success: function (response) {
            let data = parseData(response);
            if (table != null) {
                let info = $("#data-table").DataTable().page.info();
                table.order([[0, "asc"]]).draw(false);
            }

            $(".crud-modal").modal("hide");
            alertMessage("Success", data.message, "success");
            hideInlineLoader();

            if (page != undefined) {
                if (page == "/admin/dashboard") {
                    if (data.responseData.length != 0) {
                        localStorage.setItem(
                            "admin",
                            JSON.stringify(data.responseData)
                        );
                    }
                }
                if (page == "store/order") {
                    page = "/user/home/";
                }

                setTimeout(function () {
                    window.location.replace(page);
                }, 1000);
            }
        },
        error: function (jqXHR, textStatus) {
            if (jqXHR.status == 401 && getToken(guard) != null) {
                refreshToken(guard);
            } else if (jqXHR.status == 401) {
                window.location.replace("/admin/login");
            }

            if (jqXHR.responseJSON) {
                if (page == "store/order") {
                    $(".commentLength").html(jqXHR.responseJSON.message);
                    hideInlineLoader();
                    return false;
                } else {
                    alertMessage(
                        textStatus,
                        jqXHR.responseJSON.message,
                        "danger"
                    );
                    hideInlineLoader();
                }
            }
        },
    });
}

// Function to fetch data using AJAX
const setData = async (url, guard = "admin") => {
    try {
        const response = await $.ajax({
            url,
            type: "get",
            headers: {
                Authorization: `Bearer ${getToken(guard)}`,
            },
            beforeSend: () => {
                showInlineLoader();
            },
            data: {},
        });

        const data = parseData(response).responseData;

        // Remove required rule for password fields
        $("#password").rules("remove", "required");
        $("#password_confirmation").rules("remove", "required");

        // Show featured image if is_featured is set
        if (data.is_featured == 1) {
            $(".featured_image").show();
        }

        // Handle different image types
        const imageTypes = [
            "picture",
            "vehicle_image",
            "vehicle_marker",
            "icon",
            "featured_image",
            "image",
        ];

        for (const type of imageTypes) {
            if (data[type]) {
                $(".image-placeholder img").attr("src", data[type]);
                break;
            }
        }

        // Iterate over data keys and update corresponding form elements
        for (const key in data) {
            if ($(`[name=${key}]`).length) {
                const node = $(`[name=${key}]`).prop("nodeName");
                const type = $(`[name=${key}]`).attr("type");

                if (
                    (node == "INPUT" &&
                        (type == "text" ||
                            type == "email" ||
                            type == "number" ||
                            type == "hidden" ||
                            type == "color")) ||
                    node == "TEXTAREA"
                ) {
                    $(`[name=${key}]`).val(data[key]);
                } else if (node == "INPUT" && type == "radio") {
                    $(`[name=${key}][value=${data[key]}]`).prop(
                        "checked",
                        true
                    );
                } else if (node == "INPUT" && type == "file") {
                    if (data[key] != "" && data[key] != null) {
                        $(`[name=${key}]`)
                            .closest("div")
                            .find("img")
                            .first()
                            .attr("src", data[key])
                            .show();
                        $(`[name=${key}]`).rules("remove", "required");
                    }
                } else if (node == "INPUT" && type == "checkbox") {
                    $(`[name=${key}]`).prop("checked", data[key] == 1);
                    $(`[name=${key}]`).val(data[key]);
                } else if (node == "SELECT") {
                    $(`select[name=${key}] option[value='${data[key]}']`).attr(
                        "selected",
                        true
                    );
                    $(`[name=${key}] option[value='${data[key]}']`).prop(
                        "selected",
                        true
                    );
                }

                // Special handling for country_id
                if (key == "country_id") {
                    $(`#${key}`).attr("readonly", true);
                    $(`#${key}`).css("pointer-events", "none");
                }

                // Additional handling for specific keys
                if (key == "admin_service") {
                    const adminService = data[key];
                }
                if (key == "menu_type_id") {
                    loadServiceList(
                        "menu_type_id",
                        data.service_list,
                        data[key],
                        adminService
                    );
                }
                if (key == "zone_id") {
                    loadzoneList("zone_id", data.zone_data, data[key]);
                }
                if (key == "service_subcategory_id") {
                    loadServiceSubcategory(
                        "service_subcategory_id",
                        data.service_subcategory_data,
                        data[key]
                    );
                }
                if (key == "mobile") {
                    const countryData =
                        window.intlTelInputGlobals.getCountryData();
                    const result = countryData.find(
                        (e) => e.dialCode == data.country_code
                    );

                    $(".phone").intlTelInput("setCountry", result.iso2);
                }
            } else if ($(`#${key}`).length) {
                $(`#${key}`).val(data[key]);
            }
        }

        hideInlineLoader();
    } catch (error) {
        if (error.status == 401 && getToken(guard) != null) {
            refreshToken(guard);
        } else if (error.status == 401) {
            window.location.replace("/admin/login");
        }
        hideInlineLoader();
    }
};

// Function to load state/city options dynamically
const loadStateCity = (attr, data, selectedVal) => {
    // Clear existing options
    $(`#${attr}`).empty();
    // Add a default option
    $(`#${attr}`).append("<option>-- Please Select --</option>");

    // Iterate through the data array and populate the options
    data.forEach((item) => {
        let selected = "";

        // Extract city and state information
        const city = item.city || {};
        const state = item.state || {};

        const cityId = city.id || item.id;
        const cityName = city.city_name || item.city_name;

        const stateId = state.id || item.id;
        const stateName = state.state_name || item.state_name;

        // Determine whether to load city or state options based on the 'attr' parameter
        if (attr === "city_id") {
            if (selectedVal === cityId) {
                selected = "selected";
            }

            $(`#${attr}`).append(
                `<option value="${cityId}" ${selected}>${cityName}</option>`
            );
        } else {
            if (selectedVal === stateId) {
                selected = "selected";
            }

            $(`#${attr}`).append(
                `<option value="${stateId}" ${selected}>${stateName}</option>`
            );
        }
    });
};

// Function to load service subcategories dynamically
const loadServiceSubcategory = (attr, data, selectedVal) => {
    $(`#${attr}`).empty();
    $(`#${attr}`).append("<option>-- Please Select --</option>");

    data.forEach((item) => {
        let selected = "";

        if (selectedVal == item.id) {
            selected = "selected";
        }

        $(`#${attr}`).append(
            `<option value="${item.id}" ${selected}>${item.service_subcategory_name}</option>`
        );
    });
};

// Function to load zone options dynamically
const loadZoneList = (attr, data, selectedVal) => {
    $(`#${attr}`).empty();
    $(`#${attr}`).append("<option>-- Please Select --</option>");

    data.forEach((item) => {
        let selected = "";

        if (selectedVal == item.id) {
            selected = "selected";
        }

        $(`#${attr}`).append(
            `<option value="${item.id}" ${selected}>${item.name}</option>`
        );
    });
};

// Function to load service options dynamically
const loadServiceList = (attr, data, selectedVal, serviceId) => {
    $(`#${attr}`).empty();
    $(`#${attr}`).append("<option>-- Please Select --</option>");

    data.forEach((item) => {
        let selected = "";

        if (selectedVal == item.id) {
            selected = "selected";
        }

        if (serviceId == 3) {
            $(`#${attr}`).append(
                `<option value="${item.id}" ${selected}>${item.service_category_name}</option>`
            );
        } else if (serviceId == 1) {
            $(`#${attr}`).append(
                `<option value="${item.id}" ${selected}>${item.ride_name}</option>`
            );
        }
    });
};

// Function to delete a row with confirmation
const deleteRow = (id, url, table, guard = "admin") => {
    $(".delete-modal").modal("show");

    $(".delete-modal-btn")
        .off()
        .on("click", () => {
            const confirm = $(this).data("value");
            const data = {
                _method: "delete",
                id: id,
            };

            if (confirm == 1) {
                data.confirm = confirm;
            }

            $.ajax({
                url: url,
                type: "post",
                headers: {
                    Authorization: `Bearer ${getToken(guard)}`,
                },
                data: data,
                beforeSend: () => {
                    showInlineLoader();
                },
                success: (response, textStatus, jqXHR) => {
                    const data = parseData(response);
                    const info = $("#data-table").DataTable().page.info();

                    $(".delete-modal").modal("hide");
                    if (data.responseData.status == "1") {
                        $(".confirm-modal").modal("show");
                        $(".confirm-modal .modal-body").html("");
                        $(".confirm-modal .modal-body").html(data.message);
                    } else {
                        $(".confirm-modal").modal("hide");
                        table.order([[info.page, "asc"]]).draw(false);
                        alertMessage("Success", data.message, "success");
                    }

                    hideInlineLoader();
                },
                error: (jqXHR, textStatus, errorThrown) => {
                    if (jqXHR.status == 401 && getToken(guard) != null) {
                        refreshToken(guard);
                    } else if (jqXHR.status == 401) {
                        window.location.replace("/admin/login");
                    }
                    $(".delete-modal").modal("hide");
                    alertMessage(textStatus, jqXHR.statusText, "danger");
                    hideInlineLoader();
                },
            });
        });
};

// Function to parse JSON data safely
const parseData = (data) => {
    try {
        return JSON.parse(data);
    } catch (e) {}

    return data;
};

// Function to protect email by hiding part of it
const protectEmail = (userEmail) => {
    const splitted = userEmail.split("@");
    const part1 = splitted[0];
    const avg = part1.length / 2;
    const protectedPart = part1.substring(0, part1.length - avg);
    const part2 = splitted[1];
    return `${protectedPart}****@${part2}`;
};

// Function to protect number by hiding part of it
const protectNumber = (number) => {
    const str = number.substring(0, number.length - 4);
    return `${str}****`;
};
