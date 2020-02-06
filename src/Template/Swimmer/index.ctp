<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Swimmer[]|\Cake\Collection\CollectionInterface $swimmer
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Swimmer'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Event'), ['controller' => 'Events', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="swimmer index large-9 medium-8 columns content">
    <h3><?= __('Swimmer') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('event_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('team') ?></th>
                <th scope="col"><?= $this->Paginator->sort('seedtime') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($swimmer as $swimmer): ?>
            <tr>
                <td><?= $this->Number->format($swimmer->id) ?></td>
                <td><?= $swimmer->has('event') ? $this->Html->link($swimmer->event->category, ['controller' => 'Events', 'action' => 'view', $swimmer->event->id]) : '' ?></td>
                <td><?= h($swimmer->name) ?></td>
                <td><?= h($swimmer->team) ?></td>
                <td><?= h($swimmer->seedtime) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $swimmer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $swimmer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $swimmer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $swimmer->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
