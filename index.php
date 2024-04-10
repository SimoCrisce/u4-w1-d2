<?php
echo "<pre>" . print_r($_POST, true) . "</pre>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $password = $_POST["password"];
    $terms = $_POST["terms"];

    $errors = [];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Email non valida";
    }

    if(strlen($password) < 8) {
        $errors["password"] = "Password troppo corta, deve essere almeno 8 caratteri";
    }

    if($age > 100) {
        $errors["age"] = "L'età non può essere superiore a 100 anni";
    }
 
    if(!$terms == "on") {
        $errors["terms"] = "Devi accettare i termini e le condizioni";
    }
};



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row d-flex justify-content-center" style="margin-top: 8rem">
            <div class="col-8">
                <form class="row g-3 needs-validation border border-1 rounded-2 p-3" action="" method="post" novalidate>
                <div class="col-md-4">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" id="name" required>
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="surname" class="form-label">Cognome</label>
                    <input type="text" name="surname" class="form-control" id="surname" required>
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="age" class="form-label">Età</label>
                    <div class="input-group has-validation">
                    <input type="number" name="age" class="form-control <?= isset($errors["age"]) ? "is-invalid" : "" ?>" id="age" min="13" max="100" required>
                    <div class="invalid-feedback">
                       <?= $errors["age"] ?? "" ?>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control <?= isset($errors["email"]) ? "is-invalid" : "" ?>" id="email" required>
                    <div class="invalid-feedback"><?= $errors["email"] ?? "" ?></div>
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control <?= isset($errors["password"]) ? "is-invalid" : "" ?>" id="password" required>
                    <div class="invalid-feedback">
                    <?= $errors["password"] ?? "" ?>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-check">
                    <input class="form-check-input <?= isset($errors["terms"]) ? "is-invalid" : "" ?>" type="checkbox" name="terms" id="terms" required>
                    <label class="form-check-label" for="terms">
                        Accetto i termini e condizioni
                    </label>
                    <div class="invalid-feedback">
                        <?= $errors["terms"] ?? "" ?>
                    </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Invia</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>