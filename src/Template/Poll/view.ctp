<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Poll'), ['action' => 'edit', $poll->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Poll'), ['action' => 'delete', $poll->id], ['confirm' => __('Are you sure you want to delete # {0}?', $poll->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Poll'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Poll'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Question'), ['controller' => 'Question', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Question'), ['controller' => 'Question', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="poll view large-10 medium-9 columns">
    <h2><?= h($poll->title) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('User') ?></h6>
            <p><?= $poll->has('user') ? $this->Html->link($poll->user->id, ['controller' => 'Users', 'action' => 'view', $poll->user->id]) : '' ?></p>
            <h6 class="subheader"><?= __('Title') ?></h6>
            <p><?= h($poll->title) ?></p>
            <h6 class="subheader"><?= __('State') ?></h6>
            <p><?= h($poll->state) ?></p>
            <h6 class="subheader"><?= __('Url') ?></h6>
            <p><?= h($poll->url) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('Id') ?></h6>
            <p><?= $this->Number->format($poll->id) ?></p>
        </div>
        <div class="large-2 columns dates end">
            <h6 class="subheader"><?= __('Created') ?></h6>
            <p><?= h($poll->created) ?></p>
            <h6 class="subheader"><?= __('Modified') ?></h6>
            <p><?= h($poll->modified) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Description') ?></h6>
            <?= $this->Text->autoParagraph(h($poll->description)); ?>

        </div>
    </div>
</div>
<div class="related row">
    <div class="column large-12">
    <h4 class="subheader"><?= __('Related Question') ?></h4>
    <?php if (!empty($poll->question)): ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?= __('Id') ?></th>
            <th><?= __('Poll Id') ?></th>
            <th><?= __('Question') ?></th>
            <th><?= __('Type') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($poll->question as $question): ?>
        <tr>
            <td><?= h($question->id) ?></td>
            <td><?= h($question->poll_id) ?></td>
            <td><?= h($question->question) ?></td>
            <td><?= h($question->type) ?></td>

            <td class="actions">
                <?= $this->Html->link(__('View'), ['controller' => 'Question', 'action' => 'view', $question->id]) ?>

                <?= $this->Html->link(__('Edit'), ['controller' => 'Question', 'action' => 'edit', $question->id]) ?>

                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Question', 'action' => 'delete', $question->id], ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]) ?>

            </td>
        </tr>

        <?php endforeach; ?>
    </table>
    <?php endif; ?>
    </div>
</div>
