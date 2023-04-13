<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
</head>
<body>
<div class="wrapper">
        <h2 class="title">REGISTER</h2>

        <form class="form" method="post">
            <div class="input_field">
                <label for="name">Name: </label>
                <input class="input" name="name" type="text" pattern="[a-zA-Z]+" required>
            </div>
            <div class="input_field">
                <label for="apellidos">Last Name: </label>
                <input class="input" name="apellidos" type="text" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}" required>
            </div>
            <div class="input_field">
                <label for="fechaNacimiento">Date of Birth: </label>
                <input class="input" type="date" id="fechaNacimiento" min="1930-01-01" max="2021-12-31" required>
                <h1 id="edad"></h1>
                <script src="edad.js"></script>
            </div>
            <div class="input_field">
                <label>DNI: </label>
                <input type="text" class="input">
            </div>
            <div class="input_field">
                <label>Email: </label>
                <input type="text" class="input">
            </div>
            <div class="input_field">
                <label>Postal Code: </label>
                <input type="text" class="input">
            </div>
            <div class="input_field">
                <label>Phone Number: </label>
                <input type="text" class="input">
            </div>
            <div class="input_field">
                <label class="check">
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
                <p style="font-size: 12px">Agree to the terms and conditions</p>
            </div>
            <div class="input_field">
                <input type="submit" value="Register" class="btn">
            </div>

        </form>
    </div>
</body>
</html>