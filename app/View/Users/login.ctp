<?php 

echo $this->Form->create('User', array('action' => 'login',
    'inputDefaults' => array(
        'format' => array('before', 'label', 'between', 'input', 'error', 'after'),
        'div' => array('class' => 'control-group'),
        'label' => array('class' => 'control-label'),
        'between' => '<div class="controls">',
        'after' => '</div>',
        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'help-inline')),
    )
        
    , 'class'=>'form-horizontal'));
echo $this->Form->input('username', array('label'=>array('class'=>'control-label')));
echo $this->Form->input('password', array('label'=>array('class'=>'control-label')));
echo $this->Form->end(array('class'=>'btn btn-primary btn-large pull-right', 'label'=>'Login'));

?>