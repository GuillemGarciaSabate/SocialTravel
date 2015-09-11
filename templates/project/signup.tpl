{$modules.head}

<h2 style="text-align: center">- Sign up -</h2>

<div id="registerform">
    <form method="POST" action="{$url.global}{$next}">
        <b>Username: </b><INPUT type="text" name="username"  value="{$name}">        </INPUT><BR>
        <b>Birth date: </b><INPUT type="text" name="birth"  value="{$birth}">        </INPUT><BR>
        <b>Email: </b><INPUT type="text" name="email" value="{$email}">        </INPUT><BR>
        <b>Password: </b><INPUT type="password" name="password" value="{$password}">        </INPUT><BR>
        <INPUT type="submit" value="Sign up" name="submit">
    </form>
    <A href="{$url.global}/welcome">{$activation}</A>
</div>


{$modules.footer}