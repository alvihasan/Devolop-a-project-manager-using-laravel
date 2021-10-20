<?php $__env->startSection('content'); ?>

<div class="col-md-9 col-lg-9 col-sm-9 pull-left">


<!-- Example row of columns -->
<div class="row" col-lg-12 col-md-12 col-sm-12 style="background: white;margin: 10px;">

<form method='post' action="<?php echo e(route('companies.update',[$company->id])); ?>">
  
           <?php echo e(csrf_field()); ?>

    <input type= "hidden"  name="_method" value="put" >  
   
   <div class="form-group">
    <label for="company-name">Name</label>
    <input class="form-control" id="company-name" required name="name" placeholder="Enter name" spellcheck="false" value="<?php echo e($company->name); ?>"></div>
 
  <div class="form-group">
    <label for="comopany-content">Description</label>
    <textarea placeholder="Enter description" style="resize: vertical" id="company-content" rows='5' spellcheck="false" class="form-control autosize-target text-left" name="description" ><?php echo e($company->description); ?></textarea>
  </div>
  
  <div class="form-group">
    <input type="submit" class="btn btn-primary" value="Submit" >
  </div>
</form>   


    
  

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
              <li><a href="/companies/<?php echo e($company->id); ?>">View comanies</a></li>
              <li><a href="/companies">All companies</a></li>
            </ol>
          </div>

          
          
        </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>