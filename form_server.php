<?php
// form_server.php - receives AJAX POST, validates, returns JSON
header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
    exit;
}

$errors = [];

$fullname   = trim($_POST["fullname"] ?? "");
$email      = trim($_POST["email"] ?? "");
$phone      = trim($_POST["phone"] ?? "");
$pob        = trim($_POST["pob"] ?? "");
$gender     = $_POST["gender"] ?? "";
$position   = $_POST["position"] ?? "";
$experience = trim($_POST["experience"] ?? "");
$education  = $_POST["education"] ?? "";
$field      = trim($_POST["field"] ?? "");
$languages  = $_POST["languages"] ?? [];
$comment    = trim($_POST["comment"] ?? "");

// Collect skills (checkboxes + "other skills" text)
$skills = $_POST["skills"] ?? [];
if (!is_array($skills)) $skills = [];
if (!is_array($languages)) $languages = [];

$other = trim($_POST["other_skills"] ?? "");
if ($other !== "") {
    foreach (preg_split('/\s*,\s*/', $other) as $extra) {
        if ($extra !== "") $skills[] = $extra;
    }
}
$skills = array_values(array_unique($skills));

// Validation
if ($fullname === "") {
    $errors["fullname"] = "* Please fill fullname field!";
}

if ($email === "") {
    $errors["email"] = "* Please fill email field!";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors["email"] = "* Invalid email format!";
}

if ($phone === "") {
    $errors["phone"] = "* Please fill phone field!";
} elseif (!preg_match('/^[0-9+\-\s]{7,20}$/', $phone)) {
    $errors["phone"] = "* Invalid phone number!";
}

if ($position === "") {
    $errors["position"] = "* Please select a position!";
}

if ($education === "") {
    $errors["education"] = "* Please select education level!";
}

if ($experience === "" || !is_numeric($experience)) {
    $errors["experience"] = "* Please enter years of experience!";
} elseif ((float)$experience <= 1) {
    $errors["experience"] = "* Years of experience must be greater than 1!";
}

if (count($skills) < 2) {
    $errors["skills"] = "* Please select or write at least 2 skills!";
}

if (!empty($errors)) {
    echo json_encode([
        "success" => false,
        "message" => "Please fix the errors below and try again.",
        "errors"  => $errors
    ]);
    exit;
}

echo json_encode([
    "success" => true,
    "message" => "Application submitted successfully!",
    "data" => [
        "fullname"   => $fullname,
        "email"      => $email,
        "phone"      => $phone,
        "pob"        => $pob,
        "gender"     => $gender,
        "position"   => $position,
        "experience" => $experience,
        "education"  => $education,
        "field"      => $field,
        "skills"     => implode(", ", $skills),
        "languages"  => implode(", ", $languages),
        "comment"    => $comment
    ]
]);
