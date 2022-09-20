       <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

           <!-- Sidebar - Brand -->
           <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

               <div class="sidebar-brand-text mx-3">Kasmir Cart</div>
           </a>

           <!-- Divider -->
           <hr class="sidebar-divider my-0">

           <!-- Nav Item - Dashboard -->
           <li class="nav-item active">
               <a class="nav-link" href="index.html">
                   <i class="fas fa-fw fa-tachometer-alt"></i>
                   <span>Dashboard</span></a>
           </li>

           <!-- Divider -->
           <hr class="sidebar-divider">
           <div class="sidebar-heading">
               Functionality
           </div>

           <!-- Nav Item - Utilities Collapse Menu -->
           <li class="nav-item">
               <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                   <i class="fa fa-tasks"></i>
                   <span>Status</span>
               </a>
               <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                   <div class="bg-white py-2 collapse-inner rounded">
                       <h6 class="collapse-header">Tracking Status</h6>
                       <a class="collapse-item" href="utilities-color.html">Pending</a>
                       <a class="collapse-item" href="utilities-border.html">Accepted</a>
                       <a class="collapse-item" href="utilities-animation.html">Out for Delivery</a>
                       <a class="collapse-item" href="utilities-other.html">Delivered</a>
                   </div>
               </div>
           </li>
           <!-- Nav Item - Charts -->
           <li class="nav-item">
               <a class="nav-link" href="charts.html">
                   <i class="fa fa-list-alt"></i>
                   <span>Order</span></a>
           </li>

           <li class="nav-item">
               <a class="nav-link" href="<?= base_url('product') ?>">
                   <i class="fas fa-fw fa-chart-area"></i>
                   <span>Product</span></a>
           </li>

           <!-- Nav Item - Tables -->
           <li class="nav-item">
               <a class="nav-link" href="<?= base_url('category') ?>">
                   <i class="fas fa-fw fa-table"></i>
                   <span>Category</span></a>
           </li>

           <hr class="sidebar-divider d-none d-md-block">


       </ul>