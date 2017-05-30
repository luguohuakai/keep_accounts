namespace app\<?= $module ?>\validate;


use think\Validate;

class <?= ucfirst($table_name) ?> extends Validate
{
    protected $rule = [
    <?php foreach ($rs_col_info as $k => $v):
        $arr = [];
        $_pk = 'id';
        if ($v['Field'] == $_pk || $v['Field'] == 'create_time' || $v['Field']  == 'update_time' || preg_match('/(image|logo|face|img|pic)/', $v['Field']))
            continue;
        if ($v['Null'] == 'NO' && $v['Default'] === null): ?>
            <?php $arr[] = 'require'; ?>
        <?php endif;
        if ($v['Field'] == 'email'): ?>
            <?php $arr[] = 'email'; ?>
        <?php endif;
        if (strpos($v['Type'], 'int') !== FALSE): ?>
            <?php $arr[] = 'number'; ?>
        <?php endif;
        if (strpos($v['Type'], 'decimal') !== FALSE): ?>
            <?php $arr[] = 'currency'; ?>
        <?php endif;
        if (strpos($v['Type'], 'enum') !== FALSE): ?>
            <?php $arr[] = 'require'; ?>
        <?php endif;
        if (strpos($v['Type'], 'varchar') === 0): ?>
            <?php $str = str_replace(array('varchar(', ')'), array('', ''), $v['Type']); $arr[] = "max:$str"; ?>
        <?php endif;
        if (strpos($v['Type'], 'char') === 0): ?>
            <?php $str = str_replace(array('char(', ')'), array('', ''), $v['Type']); $arr[] = "max:$str"; ?>
        <?php endif;

        if(!empty($arr)): ?>
            <?php
                $arr_to_str = implode('|',$arr);
            ?>
            '<?=$v['Field']?>' => '<?=$arr_to_str?>',
        <?php endif;
    endforeach; ?>
    ];

    protected $message = [
    //        'name.require' => '昵称必须填写',
    //        'name.max' => '昵称最大20个字符串',
    //        'password.require' => '密码必须填写',
    ];

    protected $field = [
    <?php foreach ($rs_col_info as $rci): ?>
        '<?= $rci["Field"] ?>' => '<?= $rci["Comment"] ?>',
    <?php endforeach; ?>
    ];
}