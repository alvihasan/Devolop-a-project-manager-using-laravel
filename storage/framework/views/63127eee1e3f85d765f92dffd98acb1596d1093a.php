                   
<?php $__env->startSection('content'); ?>

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">


<!-- Example row of columns -->
<div class="row" col-lg-12 col-md-12 col-sm-12 style="background: white;margin: 10px;">
<h1>Create new project</h1>


<form method='post' action="<?php echo e(route('projects.store')); ?>">
  
           <?php echo e(csrf_field()); ?>

   
   <div class="form-group">
    <label for="project-name">Name</label>
    <input class="form-control"
     id="project-name"
     required name="name"
     placeholder="Enter name"
     spellcheck="false">
     </div>

     
    <?php if($companies==null): ?>
    <div>
    <input class="form-control"
     type="hidden"
     name="company_id"
     value="<?php echo e($company_id); ?>">
     </div>
     <?php endif; ?>
     <?php if($companies!=null): ?>
     <div class="form-group">
        <label for="company-content">Select compony</label>
        <select name="company_id" class="form-control">
        <?php $__currentLoopData = $companies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <option value="<?php echo e($company->id); ?>"><?php echo e($company->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
        </select>
     </div>
     <?php endif; ?>
 
  <div class="form-group">
    <label for="comopany-content">Description</label>
    <textarea placeholder="Enter description" style="resize: vertical" id="project-content" rows='5' spellcheck="false" class="form-control autosize-target text-left" name="description"></textarea>
  </div>
  
  <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Submit" >
  </div>
</form>   


    
  



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
              <li><a href="/projects">My projects</a></li>
              <li><a href="/projects">All projects</a></li>
            </ol>
          </div>

          
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>