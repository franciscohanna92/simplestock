<aside class="aside d-print-none">
    <!-- START Sidebar (left)-->
    <div class="aside-inner">
        <nav class="sidebar" data-sidebar-anyclick-close="">
            <!-- START sidebar nav-->
            <ul class="sidebar-nav">
                <!-- START user info-->
                <li class="has-user-block">
                    <div id="user-block">
                        <div class="item user-block">
                            <!-- User picture-->
                            <div class="user-block-picture">
                                <div class="user-block-status">
                                    <img class="img-thumbnail rounded-circle" src="https://drogaspoliticacultura.net/wp-content/uploads/2017/09/placeholder-user.jpg" alt="Avatar"
                                         width="60" height="60">
                                    <div class="circle bg-success circle-lg"></div>
                                </div>
                            </div>
                            <!-- Name and Job-->
                            <div class="user-block-info">
                                <span class="user-block-name"><?= $authUser['email'] ?></span>
                                <span class="user-block-role"><?= $this->Roles->getRoleDisplayName($authUser['role']) ?></span>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- END user info-->
                <?php if ($this->Roles->allow($authUser['role'], ['DEPOSITO', 'ADMIN', 'COMPRAS'])): ?>
                    <li class="mt-2">
                        <a href="/stock">
                            <em class="fa fa-cubes"></em>
                            <span>Stock</span>
                        </a>
                    </li>
                <?php endif; ?>

                <!--INVENTARIO-->
                <!--<li class="nav-heading ">
                    <span>Inventario</span>
                </li>-->
                <?php if ($this->Roles->deny($authUser['role'], ['TECNICA'])): ?>
                <li>
                    <a href="/inventory-receipts">
                        <em class="fa fa-sign-in"></em>
                        <span>Entradas</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if ($this->Roles->deny($authUser['role'], ['TECNICA'])): ?>
                <li>
                    <a href="/inventory-issues">
                        <em class="fa fa-sign-out"></em>
                        <span>Salidas</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if ($this->Roles->deny($authUser['role'], ['COMPRAS', 'ARTICULOS'])): ?>
                <li>
                    <a href="/reports">
                        <em class="fa fa-file-text-o"></em>
                        <span>Informes</span>
                    </a>
                </li>
                <?php endif; ?>


                <!--RECURSOS-->
                <!--<li class="nav-heading ">
                    <span>Recursos</span>
                </li>-->
                <?php if ($this->Roles->deny($authUser['role'], [])): ?>
                <li class="">
                    <a href="/articles">
                        <em class="fa fa-cube"></em>
                        <span>Artículos</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if ($this->Roles->allow($authUser['role'], ['DEPOSITO', 'ADMIN'])): ?>
                <li class="">
                    <a href="/categories">
                        <em class="fa fa-pie-chart"></em>
                        <span>Categorías</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if ($this->Roles->deny($authUser['role'], ['TECNICA', 'ARTICULOS'])): ?>
                <li class="">
                    <a href="/building-sites">
                        <em class="fa fa-building-o"></em>
                        <span>Obras</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if ($this->Roles->deny($authUser['role'], ['TECNICA'])): ?>
                    <li class="">
                        <a href="/providers">
                            <em class="fa fa-truck"></em>
                            <span>Proveedores</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if ($this->Roles->deny($authUser['role'], ['TECNICA'])): ?>
                <li class="">
                    <a href="/clients">
                        <em class="fa fa-handshake-o"></em>
                        <span>Clientes</span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if ($this->Roles->allow($authUser['role'], ['DEPOSITO', 'ADMIN'])): ?>
                <li class="">
                    <a href="/employees">
                        <em class="fa fa-male"></em>
                        <span>Personal</span>
                    </a>
                </li>
                <?php endif; ?>


                <!--SISTEMA-->

                <?php if ($this->Roles->allow($authUser['role'], ['DEPOSITO', 'ADMIN'])): ?>
                    <!--<li class="nav-heading ">
                        <span>Sistema</span>
                    </li>-->
                    <li>
                        <a href="/users">
                            <em class="fa fa-users"></em>
                            <span>Usuarios</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
            <!-- END sidebar nav-->
        </nav>
    </div>
    <!-- END Sidebar (left)-->
</aside>
