{$modules.head}

<h2 style="text-align: center">- Hashtag: {$hashtag} -</h2>

<div id="hash">
    {foreach from=$info item=infor}
        <a href="{$url.global}/mostrarViatge/{$infor[0].Travel_id}"><h3>&nbsp&nbsp&nbsp&nbsp&nbsp{$infor[0].Title}</h3></a>
        <p><b>Descripció: </b>{$infor[0].Description|truncate:53}</p>
        <p><b>Data: </b>{$infor[0].Date}</p>
        <p><b>Puntuació: </b>{$infor[0].Puntuation}</p><br>
    {/foreach}
</div>


{$modules.footer}