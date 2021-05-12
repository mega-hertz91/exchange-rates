<?php

use yii\db\Migration;

/**
 * Class m210511_135227_Rate
 */
class m210511_135227_create_rate_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('rate', [
           'id' => $this->primaryKey()->unique(),
            'uid' => $this->char('255')->notNull(),
            'num_code' => $this->integer()->notNull(),
            'char_code' => $this->char('25')->notNull(),
            'nominal' => $this->integer()->notNull(),
            'name' => $this->char('255')->notNull(),
            'value' => $this->double()->notNull(),
            'previous' => $this->double()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('rate');
    }
}
