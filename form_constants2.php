<style>
    .form_container {
        margin: 0 auto;
        width: 60%;
        height: auto;
        background-color: #1b1b32;
        color: #f5f6f7;
        font-family: Tahoma;
        font-size: 16px;
    }

    h1,
    p {
        margin: 1em auto;
        text-align: center;
    }

    form {
        max-width: 800px;
        min-width: 300px;
        margin: 0 auto;
        padding-bottom: 2em;
    }

    fieldset {
        margin: auto;
        border: none;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-content: space-around;
    }

    /* fieldset:last-of-type {
        border-bottom: none;
    } */

    label {
        display: block;
        margin: 0.5rem 0;
        width: 45%;
    }

    input,
    textarea,
    select {
        margin: 10px 0 0 0;
        width: 100%;
        min-height: 2.5em;
        font-size: 1rem;
    }

    input,
    textarea {
        background-color: #0a0a23;
        border: 1px solid #0a0a23;
        color: #ffffff;
        padding: 0.5rem;
    }

    .inline {
        width: unset;
        margin: 0 0.5em 0 0;
        vertical-align: middle;
    }

    input[type="submit"] {
        display: block;
        width: calc(60% - 10px);
        margin: 2em auto;
        height: 2em;
        font-size: 1.1rem;
        background-color: #3b3b4f;
        border-color: white;
        min-width: 300px;
    }

    input[type="file"] {
        padding: 1px 2px;
    }

    /* Estilos para dispositivos móviles */
    @media only screen and (max-width: 600px) {
        label {
            width: 80%;
        }

        fieldset {
            flex-direction: column;
        }

        form {
            min-width: 200px;
        }

        input[type="submit"] {
            width: unset;
        }
    }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("scripts.php"); ?>
</head>

<body>
    <?php
    include_once("header.php");

    ?>
    <div class="form_container">
        <h1>CONSTANTS</h1>
        <form method="post" action='https://register-demo.freecodecamp.org'>
            <fieldset>
                <label for="first-name"><i class="fa-solid fa-weight-scale"></i> Temperatura: <input id="first-name" name="first-name" type="text" required /></label>
                <label for="last-name"><i class="fa-solid fa-stethoscope"></i> Pulsacions (ppm): <input id="last-name" name="last-name" type="text" required /></label>
            </fieldset>
            <fieldset>
                <label for="email"><i class="fa-sharp fa-solid fa-heart-pulse"></i> Pressió arterial (mm Hg):<input id="email" name="email" type="email" required /></label>
                <label for="new-password">Create a New Password: <input id="new-password" name="new-password" type="password" pattern="[a-z0-5]{8,}" required /></label>
            </fieldset>
            <fieldset>
                <label for="email"><i class="fa-sharp fa-solid fa-heart-pulse"></i> Pressió arterial (mm Hg):<input id="email" name="email" type="email" required /></label>
                 <!-- <label for="new-password">Create a New Password: <input id="new-password" name="new-password" type="password" pattern="[a-z0-5]{8,}" required /></label> -->
            </fieldset>
            <input type="submit" value="Submit" />
        </form>
    </div>
</body>

</html>