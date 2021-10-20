<?php $__env->startSection('content'); ?>

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">
<!-- The justified navigation menu is meant for single line per list item.
     Multiple lines will require custom code not provided by Bootstrap. -->


<!-- Jumbotron -->
<div class="jumbotron">
  <h1><?php echo e($company->name); ?></h1>
  <p class="lead"><?php echo e($company->description); ?></p>
  <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>
</div>

<!-- Example row of columns -->
<div class="row" style="background: white;margin: 10px">
<a href="/projects/create/<?php echo e($company->id); ?>" class="pull-right btn btn-default btn-sm">Add project</a>
<?php $__currentLoopData = $company->projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="col-lg-4">
    <h2><?php echo e($project->name); ?></h2>
    <p class="text-danger"><?php echo e($project->description); ?></p>
    <p><a class="btn btn-primary" href="/projects/<?php echo e($project->id); ?>" role="button">View project</a></p>
  </div>
  
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- Site footer -->

  </div> 
</div>
<div class="col-sm-3 col-md-3 col-lg-3 pull-right"> 
         <!-- <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> -->
          <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
              <li><a href="/companies/<?php echo e($company->id); ?>/edit">Edit</a></li>
              <li><a href="/projects/create/<?php echo e($company->id); ?>">Add project</a></li>
              <li><a href="/companies">My companies</a></li>
              <li><a href="/companies/create">create new Company</a></li> 
            
            <br/>

              <li>

              <a href="#"
              onclick="
              var result=confirm('Are you sure you wish to delete this Company?');
              if(result){
                event.preventDefault();
                document.getElementById('delete-form').submit();
              }">Delete</a>

              <form id="delete-form" action="<?php echo e(route('companies.destroy',[$company->id])); ?>"
              method='POST' style="display:none;">
              <input type="hidden" name="_method" value="delete">
                    <?php echo e(csrf_field()); ?>

              </form>

              </li>

            </ol>

          </div>

          
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>