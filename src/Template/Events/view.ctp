<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Event $event
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Swimmer'), ['controller' => 'Swimmer', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Swimmer'), ['controller' => 'Swimmer', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="events view large-9 medium-8 columns content">
    <h3><?= h($event->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Divison') ?></th>
            <td><?= h($event->divison) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Age') ?></th>
            <td><?= h($event->age) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= h($event->category) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Level') ?></th>
            <td><?= h($event->level) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($event->id) ?></td>
        </tr>
    </table>
    <?php $countswimmers = sizeof($event->swimmer);
          $getheatno = $countswimmers / 8;
        //   echo $getheatno."<br>"; 
          $checkremainder = $getheatno - round($getheatno);
        //   echo $checkremainder."<br>";
            if($checkremainder <= 0){
                $heatno = round($getheatno);
            }else{
                $heatno = round($getheatno) +1;
            }
            // echo $heatno;
            $holdheat = $heatno;
          $swimlane = [
              '0' =>'4',
              '1' =>'5',
              '2' => '3',
              '3' => '6',
              '4' => '2',
              '5' => '7',
              '6' => '1',
              '7' => '8'
          ];
          $i=0;
    ?>
    <div class="related">
        <h4><?= __('Swimmer') ?></h4>
        <h5><?php echo "Heat: ".$heatno."/".$heatno;?></h5>
        <?php if (!empty($event->swimmer)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>

                <th scope="col"><?= __('Swim Lane') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Team') ?></th>
                <th scope="col"><?= __('Seedtime') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->swimmer as $swimmer): ?>
            <tr>
                <td><?php echo $swimlane[$i];?></td>
                <td><?= h($swimmer->name) ?></td>
                <td><?= h($swimmer->team) ?></td>
                <td><?= date("H:i", strtotime($swimmer->seedtime)); ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Swimmer', 'action' => 'view', $swimmer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Swimmer', 'action' => 'edit', $swimmer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Swimmer', 'action' => 'delete', $swimmer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $swimmer->id)]) ?>
                </td>
            </tr>
            <?php
                $i++;
                if($i == 8){
                    
                    $holdheat--;
                    $i=0;

                    if($holdheat!=0){
                        echo "
                    <table cellpadding='0' cellspacing='0'>
                        <tr>
                            <th scope='col'>Swim Lane</th>
                            <th scope='col'>Name</th>
                            <th scope='col'>Team</th>
                            <th scope='col'>Seedtime</th>
                            <th scope='col' class='actions'>Actions</th>
                        </tr>
                        <h5>Heat: $holdheat/$heatno</h5>";
                }
            }
            ?>
            
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
