{$modules.head}

<h2 style="text-align: center">- Home -</h2>

<div style="margin-left: 25px">
    <h3>{$titol}</h3>
    <p><img src="{$url.global}/imag/{$image}" id="tempPhoto"></p>
    <p><b>Hashtags: </b>
    {foreach from=$hastags item=hashtag}
        <a href="/hashtag/{$hashtag}">#{$hashtag}</a>
    {/foreach}</p><br>


    <h5>Últims viatges publicats:</h5>
    <ul>
        {assign var=i value=1}
        {foreach from=$lastTen item=viatges}
            <a href="{$url.global}/mostrarViatge/{$viatges.Travel_id}"><h3>{$i}. {$viatges.Title}</h3></a>
            <li><p><b>Descripció: </b>{$viatges.Description|truncate:53}</p>
            <li><p><b>Data de sortida: </b>{$viatges.Date}</p>
            <li><p><b>Puntuació: </b>{$viatges.Puntuation}</p><br>
            </li>
            {assign var=i value=$i+1}
        {/foreach}

    </ul>
</div>
{$modules.footer}