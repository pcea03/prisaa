<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Swimmer $swimmer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Swimmer'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="swimmer form large-9 medium-8 columns content">
    <?= $this->Form->create($swimmer) ?>
    <fieldset>
        <legend><?= __('Add Swimmer') ?></legend>
        <?php
            echo $this->Form->control('event_id', ['options' => $events]);
            echo $this->Form->control('name', [
                'label' => 'Name/Names separated by Comma(for Relay)'
                ]);
            echo $this->Form->control('team');
            echo $this->Form->control('seedtime');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
