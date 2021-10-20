<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <script src="https://kit.fontawesome.com/58bdaac7fe.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <?php echo e(config('app.name', 'Laravel')); ?>

                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            <li><a href="<?php echo e(route('register')); ?>">Register</a></li>    
                        <?php else: ?>
                            
                        <li><a href="<?php echo e(route('companies.index')); ?>"><i class="fa fa-building" aria-hidden="true"></i>Companies</a></li>
                          <li><a href="<?php echo e(route('projects.index')); ?>"><i class="fa fa-briefcase" aria-hidden="true"></i>Projects</a></li>
                          <li><a href="<?php echo e(route('tasks.index')); ?>"><i class="fa fa-tasks" aria-hidden="true"></i>Tasks</a> </li>
<?php if(Auth::user()->role_id==1): ?>   


<li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Admin <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
<li><a href="<?php echo e(route('projects.index')); ?>"><i class="fa fa-briefcase" aria-hidden="true"></i>All Projects</a></li>
<li><a href="<?php echo e(route('users.index')); ?>"><i class="fa fa-user" aria-hidden="true"></i>All users</a></li>
<li><a href="<?php echo e(route('tasks.index')); ?>"><i class="fa fa-tasks" aria-hidden="true"></i>All tasks</a></li>
<li><a href="<?php echo e(route('companies.index')); ?>"><i class="fa fa-building" aria-hidden="true"></i>All companies</a></li>
<li><a href="<?php echo e(route('roles.index')); ?>"><i class="fa fa-envelope" aria-hidden="true"></i> All Roles</a></li>

                                </ul>
                        </li>

<?php endif; ?>
                        <li class="dropdown">
                                <a href="#" class="dropdown-toggle" 
                                data-toggle="dropdown" role="button" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>  <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fa fa-power-off" aria-hidden="true"></i>  Logout
                                        </a>

                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo e(csrf_field()); ?>

                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <?php endif; ?>
                       
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            
            <?php echo $__env->make('partials.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('partials.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="row">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <?php echo $__env->yieldContent('jqueryScript'); ?>
</body>
</html>
