<?php 

use yii\helpers\Url;
use common\widgets\MenuAdminLte;

?> 
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                

    <?=MenuAdminLte::widget(
    [
            ['label' => 'MENU UTAMA', 'level' => 0],

            ['label' => 'Dashboard', 'level' => 1, 'url' => ['/site/index'], 'icon' => 'fas fa-tachometer-alt', 'children' => []],

            

            ['label' => 'Orders', 'level' => 1, 'url' => ['/shop/order/'], 'icon' => 'fa fa-list-alt', 'children' => []],
            ['label' => 'Products', 'level' => 1, 'url' => ['/shop/product/view?id=1'], 'icon' => 'fas fa-chart-pie', 'children' => []],
            ['label' => 'Members', 'level' => 1, 'url' => ['/user/index'], 'icon' => 'fas fa-user', 'children' => []],

            ['label' => 'Shipping Rate', 'level' => 1, 'url' => ['/shop/zone/'], 'icon' => 'fa fa-ship', 'children' => []],
            
            ['label' => 'Logout', 'level' => 1, 'url' => ['/site/logout'], ['data-method' => 'post'], 'icon' => 'fas fa-sign-out-alt', 'children' => []],
        ]
    
    )?>

                    
                    
                    
<br /><br /><br /><br /><br /><br />
                                  
    </ul>
</nav>