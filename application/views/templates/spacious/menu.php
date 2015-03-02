<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <?php $mptt = new Zebra_Mptt(); ?>
    <ul class="nav navbar-nav navbar-right">
        <?php foreach ($mptt->get_tree(1) as $tree): ?>
            <li><a href="<?php echo menu_url($tree); ?>"><?php echo $tree['title']; ?></a>
                <?php if (count($tree['children']) > 0): ?>
                    <ul class="dropdown-menu">
                        <?php foreach ($tree['children'] as $key => $node): ?>
                            <li class="dropdown item">
                                <a class="dropdown-toggle" href="<?php echo menu_url($node); ?>"><?php echo $node['title']; ?></a>
                                <?php if (count($node['children']) > 0): ?>
                                    <ul class="dropdown-menu">
                                        <?php foreach ($node['children'] as $key => $grandchild): ?>
                                            <li class="dropdown item">
                                                <a class="dropdown-toggle" href="<?php echo menu_url($grandchild); ?>"><?php echo $grandchild['title']; ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?></li>
        <?php endforeach; ?>
        <form  action="<?php echo site_url('search'); ?>" method="post" class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" name="search" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-info"><i class="ion-search"></i> Cari</button>
        </form>
    </ul>
</div><!-- /.navbar-collapse -->