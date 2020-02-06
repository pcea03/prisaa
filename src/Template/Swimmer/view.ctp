<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Swimmer $swimmer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Swimmer'), ['action' => 'edit', $swimmer->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Swimmer'), ['action' => 'delete', $swimmer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $swimmer->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Swimmer'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Swimmer'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="swimmer view large-9 medium-8 columns content">
    <h3><?= h($swimmer->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Event') ?></th>
            <td><?= $swimmer->has('event') ? $this->Html->link($swimmer->event->id, ['controller' => 'Events', 'action' => 'view', $swimmer->event->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($swimmer->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Team') ?></th>
            <td><?= h($swimmer->team) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($swimmer->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Seedtime') ?></th>
            <td><?= h($swimmer->seedtime) ?></td>
        </tr>
    </table>
</div>
