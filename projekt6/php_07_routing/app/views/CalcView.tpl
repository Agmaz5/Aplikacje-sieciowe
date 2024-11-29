{extends file="main.tpl"}

{block name=content}

<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="{$conf->action_url}logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">użytkownik: {$user->login}, rola: {$user->role}</span>
</div>

<form action="{$conf->action_url}calcCompute" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Kalkulator</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_kw">Kwota: </label>
			<input id="id_kw" type="text" name="kw" value="{$form->kw}" />
		</div>
                
                
        <div class="pure-control-group">
			<label for="id_ok">Okres: </label>
			<input id="id_ok" type="text" name="ok" value="{$form->ok}" />
		</div>
                
        <div class="pure-control-group">
			<label for="id_op">Oprocentowanie: </label>
			<input id="id_op" type="text" name="op" value="{$form->op}" />
		</div>                
                
		<div class="pure-controls">
			<input type="submit" value="Oblicz" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
</form>	

{include file='messages.tpl'}

{if isset($res->result)}
<div class="messages info">
	Wynik: {$res->result}
</div>
{/if}

{/block}