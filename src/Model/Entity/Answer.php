<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Answer Entity.
 */
class Answer extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'question_id' => true,
        'answer' => true,
        'question' => true,
    ];
}
