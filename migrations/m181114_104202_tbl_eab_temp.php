<?php

use yii\db\Migration;

/**
 * Class m181114_104202_tbl_eab_temp
 */
class m181114_104202_tbl_eab_temp extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('aeb_temporary_aeb_region_data','value');
        $this->dropColumn('aeb_temporary_aeb_region_data','month');
        $this->addColumn('aeb_temporary_aeb_region_data','data_1',$this->integer()->defaultExpression('null')->after( 'year'));
        $this->addColumn('aeb_temporary_aeb_region_data','data_2',$this->integer()->defaultExpression('null')->after( 'data_1'));
        $this->addColumn('aeb_temporary_aeb_region_data','data_3',$this->integer()->defaultExpression('null')->after( 'data_2'));
        $this->addColumn('aeb_temporary_aeb_region_data','data_4',$this->integer()->defaultExpression('null')->after( 'data_3'));
        $this->addColumn('aeb_temporary_aeb_region_data','data_5',$this->integer()->defaultExpression('null')->after( 'data_4'));
        $this->addColumn('aeb_temporary_aeb_region_data','data_6',$this->integer()->defaultExpression('null')->after( 'data_5'));
        $this->addColumn('aeb_temporary_aeb_region_data','data_7',$this->integer()->defaultExpression('null')->after( 'data_6'));
        $this->addColumn('aeb_temporary_aeb_region_data','data_8',$this->integer()->defaultExpression('null')->after( 'data_7'));
        $this->addColumn('aeb_temporary_aeb_region_data','data_9',$this->integer()->defaultExpression('null')->after( 'data_8'));
        $this->addColumn('aeb_temporary_aeb_region_data','data_10',$this->integer()->defaultExpression('null')->after( 'data_9'));
        $this->addColumn('aeb_temporary_aeb_region_data','data_11',$this->integer()->defaultExpression('null')->after( 'data_10'));
        $this->addColumn('aeb_temporary_aeb_region_data','data_12',$this->integer()->defaultExpression('null')->after( 'data_11'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('aeb_temporary_aeb_region_data','month',$this->integer()->notNull()->after('year'));
        $this->addColumn('aeb_temporary_aeb_region_data','value',$this->integer()->notNull()->after('month'));
        $this->dropColumn('aeb_temporary_aeb_region_data','data_1');
        $this->dropColumn('aeb_temporary_aeb_region_data','data_2');
        $this->dropColumn('aeb_temporary_aeb_region_data','data_3');
        $this->dropColumn('aeb_temporary_aeb_region_data','data_4');
        $this->dropColumn('aeb_temporary_aeb_region_data','data_5');
        $this->dropColumn('aeb_temporary_aeb_region_data','data_6');
        $this->dropColumn('aeb_temporary_aeb_region_data','data_7');
        $this->dropColumn('aeb_temporary_aeb_region_data','data_8');
        $this->dropColumn('aeb_temporary_aeb_region_data','data_9');
        $this->dropColumn('aeb_temporary_aeb_region_data','data_10');
        $this->dropColumn('aeb_temporary_aeb_region_data','data_11');
        $this->dropColumn('aeb_temporary_aeb_region_data','data_12');
    }
}
