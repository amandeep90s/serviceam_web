$(document).ready(function () {
    basicFunctions();

    if (typeof localStorage.siteSettings == "undefined") {
        let formData = new FormData();

        formData.append("access_key", window.country_id.replace(/&quot;/g, ""));
        formData.append("domain", location.hostname);

        $.ajax({
            url: window.base_url.replace(/"/g, "") + "/api/verify",
            type: "post",
            processData: false,
            contentType: false,
            data: formData,
            success: (response, textStatus, jqXHR) => {
                let data = parseData(response);
                if (data.settings)
                    setSiteSettings(
                        JSON.stringify(data.settings.settings_data)
                    );
            },
            error: (jqXHR, textStatus, errorThrown) => {
            },
        });
    }
});

function getToken(guard) {
    if (guard == "admin") {
        if (localStorage.adminAccess != null) {
            return localStorage.adminAccess;
        }
    } else if (guard == "user") {
        if (localStorage.userAccess != null) {
            return localStorage.userAccess;
        }
    } else if (guard == "provider") {
        if (localStorage.providerAccess != null) {
            return localStorage.providerAccess;
        }
    } else if (guard == "shop") {
        if (localStorage.shopAccess != null) {
            return localStorage.shopAccess;
        }
    }

    return null;
}

function setToken(guard, token) {
    localStorage.setItem(guard + "Access", token);
}

function getBaseUrl() {
    if (localStorage.baseUrl != null) {
        return localStorage.baseUrl;
    }

    return null;
}

function getSocketUrl() {
    if (localStorage.socketUrl != null) {
        return localStorage.socketUrl;
    }

    return null;
}

function setSocketUrl(socketUrl) {
    localStorage.setItem("socketUrl", socketUrl);
}

function setBaseUrl(baseUrl) {
    localStorage.setItem("baseUrl", baseUrl);
}

function getSiteSettings() {
    if (localStorage.siteSettings != null) {
        return JSON.parse(localStorage.siteSettings);
    }

    return null;
}

function setSiteSettings(data) {
    localStorage.setItem("siteSettings", data);
}

function getAdminDetails() {
    if (localStorage.admin != null) {
        return JSON.parse(localStorage.admin);
    }

    return null;
}

function setAdminDetails(data) {
    localStorage.setItem("admin", JSON.stringify(data));
}

function getShopDetails() {
    if (localStorage.shop != null) {
        return JSON.parse(localStorage.shop);
    }

    return null;
}

function setShopDetails(data) {
    localStorage.setItem("shop", JSON.stringify(data));
}

function getUserDetails() {
    if (localStorage.user != null) {
        return JSON.parse(localStorage.user);
    }

    return null;
}

function setUserDetails(data) {
    localStorage.setItem("user", JSON.stringify(data));
}

function getProviderDetails() {
    if (localStorage.provider != null) {
        return JSON.parse(localStorage.provider);
    }

    return null;
}

function setProviderDetails(data) {
    localStorage.setItem("provider", JSON.stringify(data));
}

function basicFunctions() {
    $("body").on("keypress", ".phone", function (e) {
        if (
            e.which != 8 &&
            e.which != 0 &&
            e.which != 43 &&
            e.which != 45 &&
            (e.which < 48 || e.which > 57)
        ) {
            return false;
        }
    });

    $("body").on("keypress", ".numbers", function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });

    $(".date-picker, .accounts-date-picker, .price").each(function (e) {
        $(this).attr("autocomplete", "off");
    });

    $("body").on(
        "keypress",
        ".date-picker, .accounts-date-picker",
        function (e) {
            if (
                e.which != 8 &&
                e.which != 0 &&
                e.which != 45 &&
                (e.which < 48 || e.which > 57)
            ) {
                return false;
            }
        }
    );

    $(".re-arrange-date").each(function () {
        let data = $(this).val();
        let mycustomdate = data.split("-");
        if (data != "") {
            $(this).attr(
                "value",
                $.trim(mycustomdate[2]) +
                "-" +
                $.trim(mycustomdate[1]) +
                "-" +
                $.trim(mycustomdate[0])
            );
        }
    });

    $(".re-arrange-date-text").each(function () {
        let data = $(this).text();
        let mycustomdate = data.split("-");
        $(this).text(
            $.trim(mycustomdate[2]) +
            "-" +
            $.trim(mycustomdate[1]) +
            "-" +
            $.trim(mycustomdate[0])
        );
    });

    $(".text, .re-arrange-date-text, .datetype").each(function () {
        if ($(this).text() == "00-00-0000" || $(this).text() == "0000-00-00") {
            $(this).text("");
        }
    });

    $(".time-picker").clockpicker();

    $(".date-picker").datepicker({
        rtl: false,
        orientation: "left",
        todayHighlight: true,
        autoclose: true,
    });

    $(".price").each(function () {
        let price = $(this);
        if (price.val() != "") {
            if (price.val().indexOf(".00") == -1) {
                price.val(parseFloat(price.val()).toFixed(2));
            }
        } else if (price.val() == "") {
            price.val("0.00");
        }
    });

    $(".price")
        .on("focus", function () {
            if ($(this).val() == "0.00") {
                $(this).val("");
            } else if ($(this).val().length > 0) {
                $(this).val(parseFloat($(this).val()).toFixed(2));
            }
        })
        .on("focusout", function () {
            if ($(this).val() == "") {
                $(this).val("0.00");
            } else if ($(this).val().length > 0) {
                $(this).val(parseFloat($(this).val()).toFixed(2));
            }
        });

    $("body").on("keypress", ".price", function (e) {
        if (
            e.which != 8 &&
            e.which != 0 &&
            e.which != 46 &&
            (e.which < 48 || e.which > 57)
        ) {
            return false;
        }
    });

    $("body").on("keypress", ".decimal", function (e) {
        if (
            e.which != 8 &&
            e.which != 0 &&
            e.which != 43 &&
            e.which != 45 &&
            e.which != 46 &&
            (e.which < 48 || e.which > 57)
        ) {
            return false;
        }
    });

    $(".timepicker-default").timepicker({
        autoclose: !0,
        showSeconds: !0,
        minuteStep: 1,
    }),
        $(".timepicker-no-seconds").timepicker({
            autoclose: !0,
            minuteStep: 5,
        }),
        $(".timepicker-24").timepicker({
            autoclose: !0,
            minuteStep: 5,
            showSeconds: !1,
            defaultTime: false,
            showMeridian: !1,
        }),
        $(".timepicker")
            .parent(".input-group")
            .on("click", ".input-group-btn", function (t) {
                t.preventDefault(),
                    $(this)
                        .parent(".input-group")
                        .find(".timepicker")
                        .timepicker("showWidget");
            });

    $(".toast").animate({height: "auto", opacity: 1});
    $(".toast").fadeIn();

    setTimeout(function () {
        $(".toast").animate(
            {height: "0px", opacity: 0},
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

function showLoader() {
    if ($("body").find(".loader-container").length == 0) {
        $("body").prepend(`<div class="loader-container">
            <div class="lds-ripple"><div></div><div></div></div>
        </div>`);
    }
}

function validateEmail(email) {
    let regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function hideLoader() {
    setTimeout(function () {
        if ($("body").find(".loader-container").length > 0) {
            $("body").find(".loader-container").remove();
        }
    }, 100);
}

function showInlineLoader() {
    if ($("body").find(".lds-ripple").length == 0) {
        $("body").prepend(
            `<div class="lds-ripple"><div></div><div></div></div>`
        );
    }
}

function hideInlineLoader() {
    setTimeout(function () {
        if ($("body").find(".lds-ripple").length > 0) {
            $("body").find(".lds-ripple").remove();
        }
    }, 100);
}

function alertMessage(title, message, type) {
    let parsedTitle = title.slice(0, 1).toUpperCase() + title.slice(1);

    $(".toaster").append(
        `
		<div style="display: none;" class="toast alert alert-` +
        type +
        ` alert-dismissible" role="alert" >
		<button type="button" class="close" data-dismiss="alert">
		<span aria-hidden="true">×</span>
		<span class="sr-only">Close</span></button>
		<span class="title" style="font-weight: bold;">` +
        parsedTitle +
        `</span><br>
		<span class="message">` +
        message +
        `</span>
		</div>`
    );

    $(".toast").animate({height: "auto", opacity: 1}).fadeIn();
}

let http = new XMLHttpRequest();
let url = getBaseUrl() + "/user/socket";
let params = "url=" + window.location.origin + "&key=5d2303e0d2a19";

function readURL(input) {
    let trigg_input = $(input);
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function (e) {
            trigg_input.prev().show().attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

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

    for (let i = 0, max = entities.length; i < max; ++i)
        text = text.replace(
            new RegExp("&" + entities[i][0] + ";", "g"),
            entities[i][1]
        );

    return text;
}

function removeStorage(prefix) {
    for (let key in localStorage) {
        if (key.indexOf(prefix) == 0) {
            localStorage.removeItem(key);
        }
    }
}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    let regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return "";
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
