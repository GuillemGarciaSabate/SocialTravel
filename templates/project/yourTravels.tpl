{$modules.head}

<h2 style="text-align: center">- User Travels -</h2>

<div style="margin-left: 25px">
    <h5>Viatges publicats per l'usuari:</h5>
    <ul>
        {assign var=i value=1}
        {foreach from=$travelData item=data}
            <a href="{$url.global}/mostrarViatge/{$data.Travel_id}"><h3>{$i}. {$data.Title}</h3></a>
            <p><img src="{$url.global}/imag/{$data.Image}" id="tempPhoto"></p>
            <li><p><b>Descripció: </b>{$data.Description|truncate:53}</p>
            <li><p><b>Data de sortida: </b>{$data.Date}</p>
            <li><p><b>Durada: </b>{$data.Days}</p>
            <li><p><b>País: </b>{$data.Country}</p>
            <li><p><b>Puntuació: </b>{$data.Puntuation}</p><br>
            </li>
            {assign var=i value=$i+1}
        {/foreach}

    </ul>
</div>

{$modules.footer}