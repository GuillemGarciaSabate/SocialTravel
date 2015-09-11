{$modules.head}

<h2 style="text-align: center">- Viatge -</h2>

<div id="viatgeSol">
    <h3 style="text-align: center">{$information[0].Title}</h3>
    <p><img src="{$url.global}/imag/{$information[0].Image}" id="tempPhoto"></p>
    <p><b>Descripció: </b>{$information[0].Description}</p>
    <p><b>Data: </b>{$information[0].Date}</p>
    <p><b>Durada: </b>{$information[0].Days} dies</p>
    <p><b>Puntuació: </b>{$information[0].Puntuation}</p>
    <p><b>Autor: </b>{$user}</p>
    <p><b>Hashtags: </b>
        {foreach from=$hastags item=hashtag}
            <a href="/hashtag/{$hashtag}">#{$hashtag}</a>
        {/foreach}
    </p>



    <div style="text-align: center">
        <a href="{$url.global}/mostrarViatge/{$indexleft}"><IMG id="arrows" src="/imag/izquierda.png"></a>
        <a href="{$url.global}/mostrarViatge/{$indexrigth}">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<IMG id="arrows" src="/imag/derecha.png"></a>
    </div>
</div>

<div id="buttons">
    {if $username eq $user}
        <FORM method="POST" action="/travel/edit">
            <input type="submit" value="Edit this Travel">
        </FORM>

        <FORM method="POST" action="/travel/delete">
            <input type="submit" value="Delete this Travel">
        </FORM>
    {/if}
    {if $loguejat eq TRUE}
        <form method="POST" id="comment" action="{$url.global}/comment/{$information[0].Travel_id}">
            <input type="submit" value="Comment">
        </form>
    {/if}
</div>
{$modules.footer}