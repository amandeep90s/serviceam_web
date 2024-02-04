$(document).ready(function () {
    basicFunctions();

    // Check if siteSettings is not defined in localStorage
    if (typeof localStorage.siteSettings === "undefined") {
        let formData = new FormData();
        formData.append("access_key", window.country_id.replace(/&quot;/g, ""));
        formData.append("domain", location.hostname);

        // Use modern syntax for $.ajax
        $.ajax({
            url: `${window.base_url.replace(/"/g, "")}/api/verify`,
            type: "post",
            processData: false,
            contentType: false,
            data: formData,
        })
            .done((response, textStatus, jqXHR) => {
                let data = parseData(response);
                if (data.settings) {
                    setSiteSettings(
                        JSON.stringify(data.settings.settings_data)
                    );
                }
            })
            .fail((jqXHR, textStatus, errorThrown) => {
                // Handle error if needed
            });
    }
});

// Get the access token for the specified guard
function getToken(guard) {
    // Check if the access token exists for the specified guard
    if (guard === "admin") {
        if (localStorage.adminAccess) {
            // Return the access token if it exists
            return localStorage.adminAccess;
        }
    } else if (guard === "user") {
        if (localStorage.userAccess) {
            return localStorage.userAccess;
        }
    } else if (guard === "provider") {
        if (localStorage.providerAccess) {
            return localStorage.providerAccess;
        }
    } else if (guard === "shop") {
        if (localStorage.shopAccess) {
            return localStorage.shopAccess;
        }
    }

    // Return null if the access token does not exist
    return null;
}

// Function to set tokens based on the provided guard
function setToken(guard, token) {
    localStorage.setItem(guard + "Access", token);
}

// Function to get the base URL from localStorage
function getBaseUrl() {
    return localStorage.baseUrl || null;
}

// Function to get the socket URL from localStorage
function getSocketUrl() {
    return localStorage.socketUrl || null;
}

// Function to set the socket URL in localStorage
function setSocketUrl(socketUrl) {
    localStorage.setItem("socketUrl", socketUrl);
}

// Function to set the base URL in localStorage
function setBaseUrl(baseUrl) {
    localStorage.setItem("baseUrl", baseUrl);
}

// Function to get site settings from localStorage
function getSiteSettings() {
    return localStorage.siteSettings
        ? JSON.parse(localStorage.siteSettings)
        : null;
}

// Function to set site settings in localStorage
function setSiteSettings(data) {
    localStorage.setItem("siteSettings", data);
}

// Get admin details from localStorage
function getAdminDetails() {
    return localStorage.admin ? JSON.parse(localStorage.admin) : null;
}

// Set admin details in localStorage
function setAdminDetails(data) {
    localStorage.setItem("admin", JSON.stringify(data));
}

// Get shop details from localStorage
function getShopDetails() {
    return localStorage.shop ? JSON.parse(localStorage.shop) : null;
}

// Set shop details in localStorage
function setShopDetails(data) {
    localStorage.setItem("shop", JSON.stringify(data));
}

// Get user details from localStorage
function getUserDetails() {
    return localStorage.user ? JSON.parse(localStorage.user) : null;
}

// Set user details in localStorage
function setUserDetails(data) {
    localStorage.setItem("user", JSON.stringify(data));
}

// Get provider details from localStorage
function getProviderDetails() {
    return localStorage.provider ? JSON.parse(localStorage.provider) : null;
}

// Set provider details in localStorage
function setProviderDetails(data) {
    localStorage.setItem("provider", JSON.stringify(data));
}

function basicFunctions() {
    // Handle keypress events for elements with class "phone"
    $("body").on("keypress", ".phone", function (e) {
        if (
            !(
                e.which === 8 ||
                e.which === 0 ||
                e.which === 43 ||
                e.which === 45 ||
                (e.which >= 48 && e.which <= 57)
            )
        ) {
            return false;
        }
    });

    // Handle keypress events for elements with class "numbers"
    $("body").on("keypress", ".numbers", function (e) {
        if (
            !(
                e.which === 8 ||
                e.which === 0 ||
                (e.which >= 48 && e.which <= 57)
            )
        ) {
            return false;
        }
    });

    // Set autocomplete attribute to "off" for specific elements
    $(".date-picker, .accounts-date-picker, .price").attr(
        "autocomplete",
        "off"
    );

    // Handle keypress events for date pickers
    $("body").on(
        "keypress",
        ".date-picker, .accounts-date-picker",
        function (e) {
            if (
                !(
                    e.which === 8 ||
                    e.which === 0 ||
                    e.which === 45 ||
                    (e.which >= 48 && e.which <= 57)
                )
            ) {
                return false;
            }
        }
    );

    // Update value attribute for elements with class "re-arrange-date"
    $(".re-arrange-date").each(function () {
        let data = $(this).val();
        if (data !== "") {
            let myCustomDate = data.split("-");
            $(this).val(
                `${$.trim(myCustomDate[2])}-${$.trim(myCustomDate[1])}-${$.trim(
                    myCustomDate[0]
                )}`
            );
        }
    });

    // Update text content for elements with class "re-arrange-date-text"
    $(".re-arrange-date-text").each(function () {
        let data = $(this).text();
        if (data !== "") {
            let myCustomDate = data.split("-");
            $(this).text(
                `${$.trim(myCustomDate[2])}-${$.trim(myCustomDate[1])}-${$.trim(
                    myCustomDate[0]
                )}`
            );
        }
    });

    // Remove content for elements with specific text values
    $(".text, .re-arrange-date-text, .datetype").each(function () {
        if (
            $(this).text() === "00-00-0000" ||
            $(this).text() === "0000-00-00"
        ) {
            $(this).text("");
        }
    });

    // Initialize clockpicker for elements with class "time-picker"
    $(".time-picker").clockpicker();

    // Initialize datepicker for elements with class "date-picker"
    $(".date-picker").datepicker({
        rtl: false,
        orientation: "left",
        todayHighlight: true,
        autoclose: true,
    });

    // Format and handle focus/focusout events for elements with class "price"
    $(".price").each(function () {
        let price = $(this);
        if (price.val() !== "") {
            if (price.val().indexOf(".00") === -1) {
                price.val(parseFloat(price.val()).toFixed(2));
            }
        } else {
            price.val("0.00");
        }

        price
            .on("focus", function () {
                if ($(this).val() === "0.00") {
                    $(this).val("");
                } else if ($(this).val().length > 0) {
                    $(this).val(parseFloat($(this).val()).toFixed(2));
                }
            })
            .on("focusout", function () {
                if ($(this).val() === "") {
                    $(this).val("0.00");
                } else if ($(this).val().length > 0) {
                    $(this).val(parseFloat($(this).val()).toFixed(2));
                }
            });
    });

    // Handle keypress events for elements with class "price"
    $("body").on("keypress", ".price", function (e) {
        if (
            !(
                e.which === 8 ||
                e.which === 0 ||
                e.which === 46 ||
                (e.which >= 48 && e.which <= 57)
            )
        ) {
            return false;
        }
    });

    // Handle keypress events for elements with class "decimal"
    $("body").on("keypress", ".decimal", function (e) {
        if (
            !(
                e.which === 8 ||
                e.which === 0 ||
                e.which === 43 ||
                e.which === 45 ||
                e.which === 46 ||
                (e.which >= 48 && e.which <= 57)
            )
        ) {
            return false;
        }
    });

    // Initialize timepicker with various configurations
    $(".timepicker-default").timepicker({
        autoclose: true,
        showSeconds: true,
        minuteStep: 1,
    });

    $(".timepicker-no-seconds").timepicker({
        autoclose: true,
        minuteStep: 5,
    });

    $(".timepicker-24").timepicker({
        autoclose: true,
        minuteStep: 5,
        showSeconds: false,
        defaultTime: false,
        showMeridian: false,
    });

    // Attach click event to show timepicker widget
    $(".timepicker")
        .parent(".input-group")
        .on("click", ".input-group-btn", function (t) {
            t.preventDefault();
            $(this)
                .parent(".input-group")
                .find(".timepicker")
                .timepicker("showWidget");
        });

    // Animate and display toast message with fade-out after a delay
    $(".toast").animate({ height: "auto", opacity: 1 }).fadeIn();

    setTimeout(function () {
        $(".toast").animate(
            { height: "0px", opacity: 0 },
            {
                easing: "swing",
                duration: "slow",
                complete: function () {
                    $(".toast").remove();
                },
            }
        );
    }, 6000);
}

// Function to show loader by prepending a loader container to the body
function showLoader() {
    if ($(".loader-container").length === 0) {
        $("body").prepend(`<div class="loader-container">
            <div class="lds-ripple"><div></div><div></div></div>
        </div>`);
    }
}

// Function to validate email using a regular expression
function validateEmail(email) {
    let regex = /^([a-zA-Z0-9_.+-])+@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

// Function to hide loader after a short delay
function hideLoader() {
    setTimeout(function () {
        $(".loader-container").remove();
    }, 100);
}

// Function to show an inline loader by prepending a ripple container to the body
function showInlineLoader() {
    if ($(".lds-ripple").length === 0) {
        $("body").prepend(
            `<div class="lds-ripple"><div></div><div></div></div>`
        );
    }
}

// Function to hide an inline loader after a short delay
function hideInlineLoader() {
    setTimeout(function () {
        $(".lds-ripple").remove();
    }, 100);
}

// Function to display an alert message with specified title, message, and type
function alertMessage(title, message, type) {
    let parsedTitle = title.charAt(0).toUpperCase() + title.slice(1);

    $(".toaster").append(
        `<div style="display: none;" class="toast alert alert-${type} alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
        <span aria-hidden="true">×</span>
        <span class="sr-only">Close</span></button>
        <span class="title" style="font-weight: bold;">${parsedTitle}</span><br>
        <span class="message">${message}</span>
        </div>`
    );

    $(".toast").animate({ height: "auto", opacity: 1 }).fadeIn();
}

// Create an XMLHttpRequest object for making HTTP requests
let http = new XMLHttpRequest();

// Construct the URL for the user socket based on the base URL
let url = `${getBaseUrl()}/user/socket`;

// Construct parameters for the user socket request
let params = `url=${window.location.origin}&key=5d2303e0d2a19`;

// Function to read and display the image from an input file
function readURL(input) {
    let triggerInput = $(input);
    if (input?.files?.[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            triggerInput.prev().show().attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// Function to decode HTML entities in a given text
function decodeHTMLEntities(text) {
    let entities = [
        ["amp", "&"],
        ["apos", "'"],
        ["#x27", "'"],
        ["#x2F", "/"],
        ["#39", "'"],
        ["#47", "/"],
        ["lt", "<"],
        ["gt", ">"],
        ["nbsp", " "],
        ["quot", '"'],
    ];

    // Replace HTML entities in the text
    for (const element of entities) {
        text = text.replace(new RegExp(`&${element[0]};`, "g"), element[1]);
    }

    return text;
}

// Function to remove storage items with a given prefix from localStorage
function removeStorage(prefix) {
    for (let key in localStorage) {
        if (key.startsWith(prefix)) {
            localStorage.removeItem(key);
        }
    }
}

// Function to get the value of a query parameter by name from a URL
function getParameterByName(name, url) {
    if (!url) {
        url = window.location.href;
    }
    name = name.replace(/[[\]]/g, "\\$&");
    let regex = new RegExp(`[?&]${name}(=([^&#]*)|&|#|$)`);
    let results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return "";
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
