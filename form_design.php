<?php
$positions = ["Software Developer", "Web Developer", "Network Administrator", "Data Analyst", "IT Support", "Other"];
$levels    = ["High School", "Diploma", "Bachelor's Degree", "Master's Degree", "PhD"];
$skillList = ["PHP", "Java", "C#", "JavaScript", "React", "SQL", "HTML/CSS", "Python", "Networking", "Communication"];
$languages = ["Somali", "English", "Arabic", "Chinese"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-11">

            <!-- ============ FORM ============ -->
            <div class="card shadow mb-5">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h2 class="mb-0">Job Application Form</h2>
                </div>

                <div class="card-body">
                    <div id="alertMessage"></div>

                    <form method="post" id="applicationForm" novalidate>

                        <!-- Personal -->
                        <fieldset class="mb-4">
                            <legend class="text-primary mb-3">Personal Information</legend>

                            <div class="mb-3">
                                <label for="fullname" class="form-label">Fullname <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your fullname">
                                <div class="text-danger small field-error" data-for="fullname"></div>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
                                <div class="text-danger small field-error" data-for="email"></div>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="e.g. +252 61 1234567">
                                <div class="text-danger small field-error" data-for="phone"></div>
                            </div>

                            <div class="mb-3">
                                <label for="pob" class="form-label">Place of Birth</label>
                                <input type="text" class="form-control" id="pob" name="pob" placeholder="Enter your place of birth">
                            </div>

                            <div class="mb-3">
                                <label class="form-label d-block">Gender</label>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="male" name="gender" value="male">
                                    <label for="male" class="form-check-label">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="female" name="gender" value="female">
                                    <label for="female" class="form-check-label">Female</label>
                                </div>
                            </div>
                        </fieldset>

                        <!-- Job details -->
                        <fieldset class="mb-4">
                            <legend class="text-primary mb-3">Job Details</legend>

                            <div class="mb-3">
                                <label for="position" class="form-label">Position Applying For <span class="text-danger">*</span></label>
                                <select class="form-select" name="position" id="position">
                                    <option value="">-- Select position --</option>
                                    <?php foreach ($positions as $p) { ?>
                                        <option value="<?php echo htmlspecialchars($p); ?>"><?php echo htmlspecialchars($p); ?></option>
                                    <?php } ?>
                                </select>
                                <div class="text-danger small field-error" data-for="position"></div>
                            </div>

                            <div class="mb-3">
                                <label for="experience" class="form-label">Years of Experience <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="experience" name="experience" min="0" step="0.5" placeholder="Must be greater than 1">
                                <div class="form-text">Must be greater than 1 year.</div>
                                <div class="text-danger small field-error" data-for="experience"></div>
                            </div>
                        </fieldset>

                        <!-- Education -->
                        <fieldset class="mb-4">
                            <legend class="text-primary mb-3">Education</legend>

                            <div class="mb-3">
                                <label for="education" class="form-label">Education Level <span class="text-danger">*</span></label>
                                <select class="form-select" name="education" id="education">
                                    <option value="">-- Select education level --</option>
                                    <?php foreach ($levels as $l) { ?>
                                        <option value="<?php echo htmlspecialchars($l); ?>"><?php echo htmlspecialchars($l); ?></option>
                                    <?php } ?>
                                </select>
                                <div class="text-danger small field-error" data-for="education"></div>
                            </div>

                            <div class="mb-3">
                                <label for="field" class="form-label">Field of Study</label>
                                <input type="text" class="form-control" id="field" name="field" placeholder="e.g. Computer Science">
                            </div>
                        </fieldset>

                        <!-- Skills -->
                        <fieldset class="mb-4">
                            <legend class="text-primary mb-3">Skills</legend>

                            <div class="mb-3">
                                <label class="form-label d-block">Select your skills (at least 2) <span class="text-danger">*</span></label>
                                <?php foreach ($skillList as $i => $skill) { ?>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input skill-check" name="skills[]"
                                               id="skill<?php echo $i; ?>" value="<?php echo htmlspecialchars($skill); ?>">
                                        <label class="form-check-label" for="skill<?php echo $i; ?>"><?php echo htmlspecialchars($skill); ?></label>
                                    </div>
                                <?php } ?>
                                <div class="text-danger small field-error" data-for="skills"></div>
                            </div>

                            <div class="mb-3">
                                <label for="other_skills" class="form-label">Other skills</label>
                                <input type="text" class="form-control" id="other_skills" name="other_skills"
                                       placeholder="e.g. Laravel, Docker, Git (comma separated)">
                            </div>

                            <div class="mb-3">
                                <label class="form-label d-block">Languages</label>
                                <?php foreach ($languages as $language) { ?>
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" name="languages[]"
                                               id="<?php echo strtolower($language); ?>" value="<?php echo htmlspecialchars($language); ?>">
                                        <label class="form-check-label" for="<?php echo strtolower($language); ?>"><?php echo htmlspecialchars($language); ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </fieldset>

                        <!-- Additional -->
                        <fieldset class="mb-4">
                            <legend class="text-primary mb-3">Additional Information</legend>
                            <div class="mb-3">
                                <label for="comment" class="form-label">Cover Letter / Comment</label>
                                <textarea class="form-control" name="comment" id="comment" rows="4"
                                          placeholder="Tell us why you are a good fit..."></textarea>
                            </div>
                        </fieldset>

                        <div class="d-flex gap-2">
                            <button type="submit" id="submitBtn" class="btn btn-primary">Submit Application</button>
                            <button type="button" id="clearBtn" class="btn btn-outline-secondary">Clear</button>
                        </div>
                    </form>
                </div>

                <div class="card-footer text-center text-muted">Job Application System</div>
            </div>

            <!-- ============ TABLE ============ -->
            <div class="card shadow">
                <div class="card-header bg-success text-white text-center py-3">
                    <h3 class="mb-0">Submitted Applications</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="applicationTable" class="table table-bordered table-striped table-hover">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Place of Birth</th>
                                    <th>Gender</th>
                                    <th>Position</th>
                                    <th>Experience (yrs)</th>
                                    <th>Education</th>
                                    <th>Field of Study</th>
                                    <th>Skills</th>
                                    <th>Languages</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr id="emptyRow">
                                    <td colspan="13" class="text-center text-muted">No applications submitted yet.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer text-muted text-center">Application Information Table</div>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(function () {

    // ---------- helpers ----------
    function setError(field, message) {
        $('.field-error[data-for="' + field + '"]').text(message);
        var $input = $("#" + field);
        if ($input.length) {
            message ? $input.addClass("is-invalid") : $input.removeClass("is-invalid");
        }
    }

    function clearErrors() {
        $(".field-error").text("");
        $(".is-invalid").removeClass("is-invalid");
    }

    function countSkills() {
        var count = $(".skill-check:checked").length;
        var other = $.trim($("#other_skills").val());
        if (other !== "") {
            $.each(other.split(","), function (_, part) {
                if ($.trim(part) !== "") count++;
            });
        }
        return count;
    }

    // ---------- single-field validators ----------
    var validators = {
        fullname: function () {
            if ($.trim($("#fullname").val()) === "") return "* Please fill fullname field!";
            return "";
        },
        email: function () {
            var v = $.trim($("#email").val());
            if (v === "") return "* Please fill email field!";
            if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v)) return "* Invalid email format!";
            return "";
        },
        phone: function () {
            var v = $.trim($("#phone").val());
            if (v === "") return "* Please fill phone field!";
            if (!/^[0-9+\-\s]{7,20}$/.test(v)) return "* Invalid phone number!";
            return "";
        },
        position: function () {
            return $("#position").val() === "" ? "* Please select a position!" : "";
        },
        education: function () {
            return $("#education").val() === "" ? "* Please select education level!" : "";
        },
        experience: function () {
            var v = $.trim($("#experience").val());
            if (v === "" || isNaN(v)) return "* Please enter years of experience!";
            if (parseFloat(v) <= 1) return "* Years of experience must be greater than 1!";
            return "";
        },
        skills: function () {
            return countSkills() < 2 ? "* Please select or write at least 2 skills!" : "";
        }
    };

    // Live validation
    $("#fullname, #email, #phone, #experience").on("blur", function () {
        setError(this.id, validators[this.id]());
    });
    $("#position, #education").on("change", function () {
        setError(this.id, validators[this.id]());
    });
    $(".skill-check, #other_skills").on("change blur", function () {
        setError("skills", validators.skills());
    });

    function validateAll() {
        var valid = true;
        $.each(validators, function (field, fn) {
            var msg = fn();
            setError(field, msg);
            if (msg) valid = false;
        });
        return valid;
    }

    // ---------- submit (AJAX) ----------
    var rowCount = 0;

    $("#applicationForm").on("submit", function (e) {
        e.preventDefault();
        $("#alertMessage").empty();

        if (!validateAll()) {
            $("#alertMessage").html(
                '<div class="alert alert-danger"><strong>Error!</strong> Please fix the errors below and try again.</div>'
            );
            return;
        }

        $("#submitBtn").prop("disabled", true).text("Submitting...");

        $.ajax({
            url: "form_server.php",
            method: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function (response) {
                if (response.success === true) {
                    $("#alertMessage").html(
                        '<div class="alert alert-success"><strong>Success!</strong> ' +
                        $("<div>").text(response.message).html() + '</div>'
                    );

                    var s = response.data;
                    rowCount++;
                    $("#emptyRow").remove();

                    // build row with .text() so user input can't inject HTML
                    var $row = $("<tr>");
                    $.each([
                        rowCount, s.fullname, s.email, s.phone, s.pob, s.gender, s.position,
                        s.experience, s.education, s.field, s.skills, s.languages, s.comment
                    ], function (_, val) {
                        $("<td>").text(val).appendTo($row);
                    });
                    $("#applicationTable tbody").append($row);

                    $("#applicationForm")[0].reset();
                    clearErrors();
                } else {
                    // server-side errors
                    if (response.errors) {
                        $.each(response.errors, function (field, msg) {
                            setError(field, msg);
                        });
                    }
                    $("#alertMessage").html(
                        '<div class="alert alert-danger"><strong>Error!</strong> ' +
                        $("<div>").text(response.message).html() + '</div>'
                    );
                }
            },
            error: function (xhr) {
                $("#alertMessage").html(
                    '<div class="alert alert-danger">Something went wrong! Please try again. (' +
                    xhr.status + ')</div>'
                );
                console.log(xhr.responseText);
            },
            complete: function () {
                $("#submitBtn").prop("disabled", false).text("Submit Application");
            }
        });
    });

    // ---------- clear ----------
    $("#clearBtn").on("click", function () {
        $("#applicationForm")[0].reset();
        clearErrors();
        $("#alertMessage").empty();
    });

});
</script>

</body>
</html>
