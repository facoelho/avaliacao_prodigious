<?php
echo $this->Html->link($this->Html->image("botoes/retornar.png", array("alt" => "Retornar", "title" => "Retornar")), array('action' => 'index'), array('escape' => false, 'onclick' => 'history.go(-1); return false;'));
?>
<br>
<br>
<?php echo $this->Form->create('User', array('type' => 'file')); ?>
<fieldset>
    <?php
    echo $this->Form->input('id');
    echo $this->Form->input('nome');
    echo $this->Form->input('sobrenome');
    echo $this->Form->input('email');
    echo $this->Form->input('foto_usuario', array('type' => 'file', 'class' => 'file', 'label' => 'Foto do usuário'));
    echo $this->Form->input('img_foto', array('type' => 'hidden'));
    ?>
</fieldset>
<?php echo $this->Form->end(__('Adicionar')); ?>