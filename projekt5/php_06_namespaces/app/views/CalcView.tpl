{extends file="main.tpl"}

{block name=footer}przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora{/block}

{block name=content}

<h2 class="content-head is-center">Prosty kalkulator</h2>

<div class="pure-g">
    <div class="l-box-lrg pure-u-1 pure-u-med-2-5">
        <form class="pure-form pure-form-stacked" action="{$conf->action_root}calcCompute" method="post">
            <fieldset>




                <label for="kw">Kwota</label>
                <input id="kw" type="text" placeholder="wartość kw" name="kw" value="{$form->kw}">

                <label for="ok">Okres w latach</label>
                <input id="ok" type="text" placeholder="wartość ok" name="ok" value="{$form->ok}">

                <label for="op">Oprocentowanie(%)</label>
                <input id="op" type="text" placeholder="wartość op" name="op" value="{$form->op}">

                <button type="submit" class="pure-button">Oblicz</button>
            </fieldset>
        </form>
    </div>

    <div class="l-box-lrg pure-u-1 pure-u-med-3-5">

        {* wyświeltenie listy błędów, jeśli istnieją *}
        {if $msgs->isError()}
        <h4>Wystąpiły błędy: </h4>
        <ol class="err">
            {foreach $msgs->getErrors() as $err}
            {strip}
            <li>{$err}</li>
            {/strip}
            {/foreach}
        </ol>
        {/if}

        {* wyświeltenie listy informacji, jeśli istnieją *}
        {if $msgs->isInfo()}
        <h4>Informacje: </h4>
        <ol class="inf">
            {foreach $msgs->getInfos() as $inf}
            {strip}
            <li>{$inf}</li>
            {/strip}
            {/foreach}
        </ol>
        {/if}

        {if isset($res->result)}
        <h4>Wynik</h4>
        <p class="res">
            {$res->result}
        </p>
        {/if}

    </div>
</div>

{/block}


