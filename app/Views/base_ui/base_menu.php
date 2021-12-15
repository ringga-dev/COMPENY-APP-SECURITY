<?= $this->extend('base_ui/ui_tamplate'); ?>
<?= $this->section('menu'); ?>

<?php
$db = \Config\Database::connect();
$role = session()->get('role');


$menu = $db->table('mas_aksesmenu')
    ->select('mas_menu.*,')
    ->join('mas_menu', 'mas_menu.id = mas_aksesmenu.menu_id')
    ->where(['mas_aksesmenu.posisi' => $role, 'mas_menu.stts' => "true"])
    ->orderBy('mas_menu.id', 'ASC')
    ->get()
    ->getResultArray();

// dd($menu);
?>


<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <?php foreach ($menu as $m) : ?>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas <?= $m['icon'] ?>"></i>
                    <p>
                        <?= $m['menu'] ?>
                        <i class="right fas fa-cog"></i>
                    </p>
                </a>

                <?php
                $subMenu = $db->table('mas_submenu')
                    ->select('mas_submenu.*')
                    ->join('mas_menu', 'mas_submenu.menu_id = mas_menu.id')
                    ->where(['mas_submenu.menu_id' => $m['id'], 'mas_submenu.stts' => "true"])
                    ->orderBy('mas_submenu.id', 'ASC')
                    ->get()
                    ->getResultArray();
                // dd($subMenu);

                ?>
                <ul class="nav nav-treeview">
                    <?php foreach ($subMenu as $sm) : ?>
                        <li class="nav-item">
                            <a href="<?= base_url($sm['url']) ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p><?= $sm['sub_menu'] ?></p>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>

            </li>
        <?php endforeach; ?>

    </ul>
</nav>


<?php $this->endSection() ?>