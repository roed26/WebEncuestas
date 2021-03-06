<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $question->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $question->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Question'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Poll'), ['controller' => 'Poll', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Poll'), ['controller' => 'Poll', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Answer'), ['controller' => 'Answer', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answer', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Answer Text'), ['controller' => 'AnswerText', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Answer Text'), ['controller' => 'AnswerText', 'action' => 'add']) ?> </li>
    </ul>
</div>
<div class="question form large-10 medium-9 columns">
    <?= $this->Form->create($question); ?>
    <fieldset>
        <legend><?= __('Edit Question') ?></legend>
        <?php
            echo $this->Form->input('poll_id', ['options' => $poll]);
            echo $this->Form->input('question');
            echo $this->Form->input('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
