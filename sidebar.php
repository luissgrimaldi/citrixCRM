        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* SideBar */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div class="sidebar" id="sidebar">
            <nav class="sidebar__nav">
                <ul class="sidebar__ul">
                    <li class="sidebar__li <?php if(basename($_SERVER['PHP_SELF']) == "index.php"){ echo "sidebar__li--active";}?>"><a href="index.php" class="sidebar__a"><i class="fa-solid fa-home-user sidebar__emoji"></i>Inicio</a></li>
                    <li class="sidebar__li <?php if(basename($_SERVER['PHP_SELF']) == "propiedades.php"){ echo "sidebar__li--active";}?>"><a href="propiedades.php" class="sidebar__a"><i class="fa-solid fa-building sidebar__emoji"></i>Propiedades</a></li>
                    <li class="sidebar__li <?php if(basename($_SERVER['PHP_SELF']) == "agenda.php"){ echo "sidebar__li--active";}?>"><a href="agenda.php" class="sidebar__a"><i class="fa-solid fa-address-book sidebar__emoji"></i>Agenda</a></li>
                    <li class="sidebar__li <?php if(basename($_SERVER['PHP_SELF']) == "consultas.php"){ echo "sidebar__li--active";}?>"><a href="consultas.php" class="sidebar__a"><i class="fa-solid fa-circle-question sidebar__emoji"></i>Consultas</a></li>
                    <li class="sidebar__li <?php if(basename($_SERVER['PHP_SELF']) == "controladmin.php"){ echo "sidebar__li--active";}?>"><a href="controladmin.php" class="sidebar__a"><i class="fa-solid fa-gauge sidebar__emoji"></i>Control</a></li>
                </ul>   
            </nav>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--/* End SideBar */-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->