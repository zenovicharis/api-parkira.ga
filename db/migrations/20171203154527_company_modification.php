<?php


use Phinx\Migration\AbstractMigration;

class CompanyModification extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $table = $this->table('companies');
        $column = $table->hasColumn('businessType');

        if ($column) {
            $table->removeColumn('businessType');
        }
        $column = $table->hasColumn('CEO');
        if ($column) {
            $table->removeColumn('CEO');
        }
        $table->addColumn('capacity', 'integer')
            ->addColumn('places_taken', 'integer')
            ->addColumn('cost_per_hour', 'decimal', ['precision' => 10, 'scale'=>   3])
            ->addColumn('user_id', 'integer' , [ "null" => true])
            ->addForeignKey('user_id', 'users', 'id', [
                'delete'=> 'CASCADE',
                'update'=> 'CASCADE'
            ])->update();
    }
}
