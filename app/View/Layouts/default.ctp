<!DOCTYPE html>
<html>
    <head>
        <?php
        echo $this->Html->charset();
        ?>
        <title>
            .:: Cadastro de usuarios ::.

        </title>
        <?php
        echo $this->Html->meta('icon');

        echo $this->Html->css('prodigious');
        echo $this->Html->css('south-street/jquery-ui-1.10.3.custom.min');
        echo $this->Html->css('colorpicker/colorpicker');

        echo $this->Html->script(array('jquery.js', 'gerais.js', 'jquery-ui.js', 'jquery.maskedinput.min.js', 'jquery.maskMoney.js', 'jquery-ui-1.10.3.custom.min.js', 'colorpicker.js'));

        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>

        <div id="global">

            <div id="diferenca">

            </div>

            <div id="conteudo">
                <div id="titulopagina">
                    <?php echo $title_for_layout; ?>
                </div>
                <div id="corpo">
                    <?php echo $this->element('navegacao'); ?>
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $this->fetch('content'); ?>
                </div>

            </div>

            <div id="rodape">
                <?php echo $this->Js->writeBuffer(); ?>
            </div>

        </div>

    </body>
</html>
