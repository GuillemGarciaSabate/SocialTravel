{$modules.head}

<h2 style="text-align: center">- Add new travel -</h2>

<div id="travelform">
    <form method="POST"  enctype="multipart/form-data" action="{$url.global}{$next}">
        <b>Title: </b><INPUT type="text" name="title" value="{$title}" required>        </INPUT><BR>
        <b>Description: </b><INPUT type="text" name="description" value="{$desc}" required>        </INPUT><BR>
        <b>Departure date: </b><INPUT type="text" name="date" value="{$depart}" required>        </INPUT><BR>
        <b>Country: </b><INPUT type="text" name="country" value="{$coun}" required>        </INPUT><BR>
        <b>Duration: </b><INPUT type="text" name="duration" value="{$dur}" required>        </INPUT><BR>
        <b>Puntuation: </b><INPUT type="text" name="puntuation" value="{$punt}" required>        </INPUT><BR>
        <b>Image: </b><INPUT type="file" name="image"  required>        </INPUT><BR>
        <b>Hashtags: </b><INPUT type="text" name="hashtags" value="{$hash}" required>        </INPUT><BR>
        <INPUT type="submit" value="Share!" name="travel">
    </form>
    {if isset($id)}
         <IMG src="{$url.global}/imag/{$id}">
    {/if}
</div>


{$modules.footer}