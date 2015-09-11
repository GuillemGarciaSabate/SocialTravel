    <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="title" content="" />
	<meta name="robots" content="all" />
	<meta name="expires" content="never" />
	<meta name="distribution" content="world" />		
	<title>Project</title>
	<link rel="stylesheet" href="{$url.global}/css/style.css">
	<link rel="stylesheet" href="{$url.global}/css/main.css">
</head>

<body>
	<div class="main_header">
		<header>

            <div class="site-logo" name="top"><a href="{$url.global}">Social Travel</a></div>

            {if $loguejat eq TRUE}
                <div>
                    <form method="POST" id="follow" action="{$url.global}/home/logout">
                        <input type="submit" value="Logout" class="field">
                    </form>
                </div>

                <div>
                    <form method="POST" id="travel" action="{$url.global}/travel">
                        <input type="submit" value="Share your experience!" class="field">
                    </form>
                </div>

                <div>
                    <form method="POST" id="follow" action="{$url.global}/follow">
                        <input type="submit" value="Follow users" class="field">
                    </form>
                </div>

                <div>
                    <form method="POST" id="follow" action="{$url.global}/userComments">
                        <input type="submit" value="Your comments" class="field">
                    </form>
                </div>

                <div>
                    <form method="POST" id="follow" action="{$url.global}/userTravels">
                        <input type="submit" value="Your travels" class="field">
                    </form>
                </div>
            {/if}

            {if $loguejat eq FALSE}
                <div>
                    <form method="POST" id="travel" action="{$url.global}/signup">
                        <input type="submit" value="Sign up" class="field">
                    </form>
                </div>

                <div>
                    <form method="POST" id="travel" action="{$url.global}/login">
                        <input type="submit" value="Sign in" class="field">
                    </form>
                </div>
            {/if}

            <div>
                <form method="POST" id="travel" action="{$url.global}">
                    <input type="submit" value="Home" class="field">
                </form>
            </div>

            {if $loguejat eq TRUE}
            <div id="user" style="color: white; font-size: 125%; float: right">Welcome {$user}&nbsp&nbsp&nbsp&nbsp&nbsp</div>
            {/if}

            <!--<div>
			    <p>{$logout}</p>
            </div>-->
		</header>
	</div>
	<div id="wrapper">