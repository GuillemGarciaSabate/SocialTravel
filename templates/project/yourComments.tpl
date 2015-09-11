{$modules.head}

<h2 style="text-align: center">- Comments -</h2>

<div style="margin-left: 25px">
    <ul>
        {foreach from=$travelData item=data}
            <a href="{$url.global}/mostrarViatge/{$data[0].Travel_id}"><h3>{$data[0].Title}</h3></a>
            <p><b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspComentari: </b>{$data[0].Comment}</p>
        {/foreach}
    </ul>
</div>

{$modules.footer}