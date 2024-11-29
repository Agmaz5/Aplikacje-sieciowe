<?php
/* Smarty version 3.1.30, created on 2024-11-28 23:41:58
  from "D:\Instalki\XAMPP\htdocs\php_07_routing\app\views\templates\main.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_6748f1b607f3d6_88888614',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '25f5f9fa0c9049648302832a79a50d51f45b018f' => 
    array (
      0 => 'D:\\Instalki\\XAMPP\\htdocs\\php_07_routing\\app\\views\\templates\\main.tpl',
      1 => 1732833715,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6748f1b607f3d6_88888614 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content=<?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_description']->value)===null||$tmp==='' ? "Domyślny Opis" : $tmp);?>
>
        <title>Kalkulator Kredytowy &ndash; Oblicz swoje raty kredytu</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/pure-min.css" integrity="sha384-X38yfunGUhNzHpBaEBsWLO+A0HDYOQi8ufWDkZ0k9e0eXz/tH3II7uKZ9msv++Ls" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/purecss@3.0.0/build/grids-responsive-min.css">
        <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <link rel="stylesheet" href="http://localhost/php_07_routing/css/style.css">
        
        
    </head>

    <body>

        <div class="pure-menu pure-menu-horizontal">
            <a href="#" class="pure-menu-heading"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? "Domyślny Tytuł" : $tmp);?>
</a>
            <ul class="pure-menu-list">
                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Strona Główna</a></li>
                <li class="pure-menu-item pure-menu-selected"><a href="#" class="pure-menu-link">Kalkulator</a></li>
                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Kontakt</a></li>
            </ul>
        </div>

        <div class="banner">
            <h1 class="banner-head">
                <?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_header']->value)===null||$tmp==='' ? "Domyślny Nagłówek" : $tmp);?>

            </h1>
        </div>




        <div class="l-content">
            <div class="pricing-tables pure-g">
                <div class="pure-u-1 pure-u-md-1-3">
                    <div class="pricing-table pricing-table-free">
                        <div class="pricing-table-header">
                            <h2>Prosty Kredyt</h2>
                            <span class="pricing-table-price">
                                5 000 zł <span>kwota kredytu</span>
                            </span>
                        </div>

                        <ul class="pricing-table-list">
                            <li>Stałe oprocentowanie</li>
                            <li>Niskie miesięczne raty</li>
                            <li>Łatwy do obliczenia</li>
                        </ul>

                        <a href="#app_content" class="button-choose pure-button">Oblicz samodzielnie</a>
                    </div>
                </div>

                <div class="pure-u-1 pure-u-md-1-3">
                    <div class="pricing-table pricing-table-biz pricing-table-selected">
                        <div class="pricing-table-header">
                            <h2>Kredyt Osobisty</h2>
                            <span class="pricing-table-price">
                                50 000 zł <span>kwota kredytu</span>
                            </span>
                        </div>

                        <ul class="pricing-table-list">
                            <li>Elastyczne warunki spłaty</li>
                            <li>Konkurencyjne oprocentowanie</li>
                            <li>Szybki proces akceptacji</li>
                        </ul>

                        <a href="#app_content" class="button-choose pure-button">Oblicz samodzielnie</a>
                    </div>
                </div>

                <div class="pure-u-1 pure-u-md-1-3">
                    <div class="pricing-table pricing-table-enterprise">
                        <div class="pricing-table-header">
                            <h2>Kredyt Hipoteczny</h2>
                            <span class="pricing-table-price">
                                500 000 zł <span>kwota kredytu</span>
                            </span>
                        </div>

                        <ul class="pricing-table-list">
                            <li>Długoterminowe opcje finansowania</li>
                            <li>Niskie oprocentowanie</li>
                            <li>Indywidualne plany kredytowe</li>
                        </ul>

                        <a href="#app_content" class="button-choose pure-button">Oblicz samodzielnie</a>
                    </div>
                </div>
            </div> <!-- end pricing-tables -->


            <div class="splash-container">
                <div class="splash">
                    <div class="information pure-g">
                        <div class="pure-u-1 pure-u-md-1-2">
                            <div class="l-box">
                                <h3 class="information-head">Jak działa kalkulator?</h3>
                                <p>
                                    Nasz kalkulator kredytowy pozwala na wprowadzenie kwoty kredytu, oprocentowania i okresu spłaty, aby łatwo obliczyć miesięczne raty. Pomaga to zrozumieć całkowity koszt pożyczki i wybrać najlepszą opcję kredytową.
                                </p>
                            </div>
                        </div>

                        <div class="pure-u-1 pure-u-md-1-2">
                            <div class="l-box">
                                <h3 class="information-head">Dlaczego warto korzystać z kalkulatora kredytowego?</h3>
                                <p>
                                    Kalkulator kredytowy upraszcza proces podejmowania decyzji o kredycie. Niezależnie od tego, czy szukasz kredytu osobistego, hipotecznego, czy firmowego, kalkulator pokaże Ci dokładnie, ile zapłacisz co miesiąc. Pomaga wybrać kredyt dostosowany do Twojego budżetu.
                                </p>
                            </div>
                        </div>

                        <div class="pure-u-1 pure-u-md-1-2">
                            <div class="l-box">
                                <h3 class="information-head">Oprocentowanie i warunki</h3>
                                <p>
                                    Oprocentowanie ma istotny wpływ na wysokość miesięcznych rat. Użyj kalkulatora, aby wypróbować różne oprocentowania i okresy spłaty, by znaleźć najbardziej korzystną opcję.
                                </p>
                            </div>
                        </div>

                        <div class="pure-u-1 pure-u-md-1-2">
                            <div class="l-box">
                                <h3 class="information-head">Rozpocznij już dziś</h3>
                                <p>
                                    Zacznij od wprowadzenia kwoty kredytu, okresu spłaty i oprocentowania. Nasz kalkulator kredytowy natychmiast pokaże Ci szczegółowy podział rat miesięcznych, pomagając podjąć świadomą decyzję.
                                </p>
                            </div>
                        </div>
                    </div> <!-- end information -->
                </div> <!-- end l-content -->
            </div>
        </div>

        <div class="content-wrapper">
            <div id="app_content" class="content">
                <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11077854116748f1b607ec48_73610703', 'content');
?>

            </div>

            <div class="footer l-box">
                <p>
                    <a href="#">Wypróbuj nasz kalkulator kredytowy</a> i uzyskaj dokładny szacunkowy koszt rat kredytowych. Nie wymaga karty kredytowej.
                </p>
            </div>
        </div>

    </body>
</html><?php }
/* {block 'content'} */
class Block_11077854116748f1b607ec48_73610703 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
 Domyślna treść zawartości .... <?php
}
}
/* {/block 'content'} */
}
