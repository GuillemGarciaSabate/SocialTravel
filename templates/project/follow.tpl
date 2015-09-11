{$modules.head}

<script type="text/javascript">
    {literal}
    function OnSubmitForm()
    {
        if(document.goTo.searchType[0].checked == true)
        {
            document.goTo.action ="/follow/user";
        }
        else
        {
            document.goTo.action ="/follow/country";
        }
    }
    {/literal}
</script>

<UL>
    {foreach from=$followed item=user}
        <LI>{$user.USER_Followed} <A href="http://g4.local/follow/unfollow/{$user.USER_Followed}">Unfollow</A></LI>
    {/foreach}
</UL>

<h2 style="text-align: center">- Follow users -</h2>

{if $buit eq TRUE}
    <h1>You are not following anyone!</h1>
{/if}

<div id="travelform">
    <FORM  name="goTo" method="POST" onsubmit="return OnSubmitForm();">
        <h1>Search people to follow:</h1>
        <input type="radio" name="searchType" value="user" checked>By user
        <input type="radio" name="searchType" value="country">By country
        <INPUT type="text" name="peopletofollow"><BR>
        <INPUT type="submit" name="Enter" value="Enter">
    </FORM>
</div>


<H1>
    {$notfoundUsers}
</H1>

{if isset($foundUsers)}
    <H1><ul>
        {foreach from=$foundUsers item=user}
        <li><A href="/follow/user/{$user}" style="color: white">Follow {$user}!</A></li>
        {/foreach}
    </ul></H1>
{/if}

{if isset($foundCountry)}
    {foreach item=curr_id from=$foundCountry }
    <H1>
        <A href="/follow/user/{$curr_id}">Follow {$curr_id}!</A>
    </H1>
    {/foreach}
{/if}



{$modules.footer}