<?php
echo $this->Html->link($this->Html->image("botoes/retornar.png", array("alt" => "Retornar", "title" => "Retornar")), array('action' => 'index'), array('escape' => false, 'onclick' => 'history.go(-1); return false;'));
echo $this->Form->postLink($this->Html->image('botoes/excluir.png', array('alt' => 'Exluir', 'title' => 'Exluir')), array('action' => 'delete', $user['User']['id']), array('escape' => false), __('Você realmete deseja apagar esse item?'));
?>
<br>
<br>
<p>
    <strong> Nome: </strong>
    <?php echo $user['User']['nome'] . " " . $user['User']['sobrenome']; ?>
    <br>
    <strong> E-mail: </strong>
    <?php echo $user['User']['email']; ?>
    <br>
    <br>
    <?php
    echo "<div id='imagemfoto'>";
    ?>
    <img src="<?php echo 'http://localhost/avaliacao_prodigious/img/usuarios/' . $user['User']['img_foto'] ?>" id="imagemfoto">
    <?php echo "</div>"; ?>
    <br>
</p>