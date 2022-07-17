<?php 

use yii\helpers\Url;
use common\widgets\MenuAdminLte;

?> 
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                

    <?=MenuAdminLte::widget(
    [
            
            ['label' => 'Dashboard', 'level' => 1, 'url' => ['/site/index'], 'icon' => 'fas fa-tachometer-alt', 'children' => []],

            ['label' => 'Product', 'level' => 1, 'url' => ['/product/index'], 'icon' => 'fas fa-list', 'children' => []],
            
            ['label' => 'Logout', 'level' => 1, 'url' => ['/site/logout'], ['data-method' => 'post'], 'icon' => 'fas fa-sign-out-alt', 'children' => []],
        ]
    
    )?>

                    
                    
                    
<br /><br /><br /><br /><br /><br />
                                  
    </ul>
</nav>