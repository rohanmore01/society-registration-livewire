$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#carouselExampleIndicators").carousel({
        interval: 2000,
    });

    $(document).on("click", ".statusListButton", function (e) {
        e.preventDefault();
        var dataId = $(this).attr("data-id");

        $.ajax({
            data: { dataId: dataId },
            url: "status-data",
            type: "POST",
            success: function (data) {
                $(".statusModalBody").html(data);
            },
            error: function (data) {
                console.log("Error:", data);
            },
        });
    });

    var applicationId;

    $(".uploadChallanButton").click(function (e) {
        applicationId = $(this).attr("data-id");
        $(".viewChallanReceipt").attr(
            "href",
            "view-document/challan_receipt_doc/" + applicationId
        );
    });

    $(".uploadChallan").click(function (e) {
        e.preventDefault();

        if ($("#upload_challan").val() == "") {
            alert("Please Select File First");
        } else {
            var formData = new FormData();
            formData.append("applicationId", applicationId);
            formData.append("upload_challan", $("#upload_challan")[0].files[0]);

            $.ajax({
                data: formData,
                dataType: "text",
                cache: false,
                url: "upload-challan-file",
                type: "POST",
                contentType: false,
                processData: false,

                success: function (data) {
                    alert("Challan Uploaded Successfully");
                    $("#upload_challan").val("");
                    $("#uploadChallanModal").modal("hide");
                },
                error: function (data) {
                    console.log("Error:", data);
                },
            });
        }
    });

    // Make alert message fade slowing from the screen
    setTimeout(function () {
        $("#msg-alert").fadeOut("slow");
    }, 5000);

    $(document).on("click", "#officeAddIsSameAsApplicantAdd", function (e) {
        if ($('input[id="officeAddIsSameAsApplicantAdd"]').is(":checked")) {
            var applicantAddress = $("#applicant_address").val();

            if (applicantAddress == "") {
                var timer;
                var waitTime = 500;

                if (timer) clearTimeout(timer);

                timer = setTimeout(function () {
                    alert("Fill the Applicant Address first");
                    $("#officeAddIsSameAsApplicantAdd")
                        .delay(5000)
                        .prop("checked", false);
                }, waitTime);
            } else {
                $("#office_address").val(applicantAddress);
            }
        } else {
            $("#office_address").val("");
        }
    });

    $(document).on("click", ".btnPaymentReceived", function (e) {
        var dataId = $(this).attr("data-id");

        if (confirm("Confirm Payment Received ?")) {
            $.ajax({
                data: { dataId: dataId },
                url: "payment-received",
                type: "POST",
                success: function (data) {
                    data = JSON.parse(data);

                    if (data == true) {
                        alert("Payment Received Successfully !!");
                        $("a[data-id=" + dataId + "]")
                            .removeClass("btn-outline-primary")
                            .addClass("btn-primary");

                        var parent = $(e.target).closest("tr");
                        parent
                            .find("#viewCertificate")
                            .html(
                                "&nbsp&nbsp<a title='View Certificate' href='/view-certificate/" +
                                    dataId +
                                    "' target='_blank'><i class='fa fa-cloud-download' aria-hidden='true'></i></a>"
                            );
                    } else {
                        alert("Payment is Already Received !!");
                    }
                },
                error: function (data) {
                    console.log("Error:", data);
                },
            });
        } else {
            return false;
        }
    });

    $(document).on("click", ".btnCaptchaRefresh", function (e) {
        $.ajax({
            type: "GET",
            url: "reload-captcha",
            success: function (data) {
                $(".captcha span").html(data.captcha);
            },
        });
    });

    $(document).on("click", "#callforHearing", function (e) {
        $("#remark").val("");
    });

    $(document).on("click", "#submitHearingDateTime", function (e) {
        var hearingDate = $("#hearingDate").val();
        var hearingTime = $("#hearingTime").val();
        var applicationId = $("#applicationId").val();

        hearingTime = moment(hearingTime, "hh:mm a").format("hh:mm A");
        var formattedDate = moment(hearingDate).format("DD-MM-YYYY");

        if (
            confirm(
                "You Selected Hearing Date is " +
                    formattedDate +
                    " and Hearing Time is " +
                    hearingTime +
                    " Confirm ??"
            )
        ) {
            $.ajax({
                data: {
                    hearingDate: hearingDate,
                    hearingTime: hearingTime,
                    applicationId: applicationId,
                },
                url: "/hearing-date-time-entry",
                type: "POST",
                success: function (data) {
                    data = JSON.parse(data);
                    if (data == true) {
                        alert(
                            "Hearing Notice Generated and sent to Suprintendent Successfully !!"
                        );
                        window.location.href = "/applications-list";
                    } else {
                        alert(
                            "Hearing Notice Already Sent to Suprintendent !!"
                        );
                        window.location.href = "/applications-list";
                    }
                },
                error: function (data) {
                    console.log("Error:", data);
                },
            });
        } else {
            return false;
        }
    });

    $("#sdpo_other").change(function () {
        if ($(this).prop("checked")) {
            $("#otherSdpo").removeClass("d-none");
        } else {
            $("#otherSdpo").addClass("d-none");
        }
    });

    $("#mamlatdar_other").change(function () {
        if ($(this).prop("checked")) {
            $("#otherMamlatdar").removeClass("d-none");
        } else {
            $("#otherMamlatdar").addClass("d-none");
        }
    });
});
