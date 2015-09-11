{$modules.head}

<h2 style="text-align: center">- Sign in -</h2>

<P class="errorMessage">{$errorMessage}</P>

<form method="POST" id="access" action="{$next}">
    <b style="color: white">Username: </b><input type="text" name="usernamelogin" class="field"><br>
    <b style="color: white">Password: </b><input type="password" name="passwordlogin" class="field"><br>
    <input type="submit" value="Sign in">
</form>


{$modules.footer}