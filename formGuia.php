<style>
    .form_container {
        margin: 0 auto;   
        width: 100%;
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
        width: 60vw;
        max-width: 800px;
        min-width: 300px;
        margin: 0 auto;
        padding-bottom: 2em;
    }

    fieldset {
        border: none;
        padding: 2rem 0;
        border-bottom: 3px solid #3b3b4f;
    }

    fieldset:last-of-type {
        border-bottom: none;
    }

    label {
        display: block;
        margin: 0.5rem 0;
    }

    input,
    textarea,
    select {
        margin: 10px 0 0 0;
        width: 100%;
        min-height: 2.5em;
    }

    input,
    textarea {
        background-color: #0a0a23;
        border: 1px solid #0a0a23;
        color: #ffffff;
    }

    .inline {
        width: unset;
        margin: 0 0.5em 0 0;
        vertical-align: middle;
    }

    input[type="submit"] {
        display: block;
        width: 60%;
        margin: 1em auto;
        height: 2em;
        font-size: 1.1rem;
        background-color: #3b3b4f;
        border-color: white;
        min-width: 300px;
    }

    input[type="file"] {
        padding: 1px 2px;
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
        <h1>Registration Form</h1>
        <p>Please fill out this form with the required information</p>
        <form method="post" action=''>
            <fieldset>
                <label for="first-name">Enter Your First Name: <input id="first-name" name="first-name" type="text" required /></label>
                <label for="last-name">Enter Your Last Name: <input id="last-name" name="last-name" type="text" required /></label>
                <label for="email">Enter Your Email: <input id="email" name="email" type="email" required /></label>
                <label for="new-password">Create a New Password: <input id="new-password" name="new-password" type="password" pattern="[a-z0-5]{8,}" required /></label>
            </fieldset>
            <fieldset>
                <label for="personal-account"><input id="personal-account" type="radio" name="account-type" class="inline" /> Personal Account</label>
                <label for="business-account"><input id="business-account" type="radio" name="account-type" class="inline" /> Business Account</label>
                <label for="terms-and-conditions">
                    <input id="terms-and-conditions" type="checkbox" required name="terms-and-conditions" class="inline" /> I accept the <a href="">terms and conditions</a>
                </label>
            </fieldset>
            <fieldset>
                <label for="profile-picture">Upload a profile picture: <input id="profile-picture" type="file" name="file" /></label>
                <label for="age">Input your age (years): <input id="age" type="number" name="age" min="13" max="120" /></label>
                <label for="referrer">How did you hear about us?
                    <select id="referrer" name="referrer">
                        <option value="">(select one)</option>
                        <option value="1">  News</option>
                        <option value="2">  YouTube Channel</option>
                        <option value="3">  Forum</option>
                        <option value="4">Other</option>
                    </select>
                </label>
                <label for="bio">Provide a bio:
                    <textarea id="bio" name="bio" rows="3" cols="30" placeholder="I like coding on the beach..."></textarea>
                </label>
            </fieldset>
            <input type="submit" value="Submit" />
        </form>
    </div>
</body>

</html>