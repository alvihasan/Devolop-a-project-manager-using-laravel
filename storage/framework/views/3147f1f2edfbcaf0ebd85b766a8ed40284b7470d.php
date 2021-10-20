<?php $__env->startSection('content'); ?>


     
     <div class="row col-md-9 col-lg-9 col-sm-9 pull-left ">
      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
      <!-- Jumbotron -->
      <div class="well well-lg" >
        <h1><?php echo e($project->name); ?></h1>
        <p class="lead"><?php echo e($project->description); ?></p>
       <!-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
      </div>

      <!-- Example row of columns -->
      <div class="row  col-md-12 col-lg-12 col-sm-12" style="background: white; margin: 10px; ">
     <!-- <a href="/projects/create" class="pull-right btn btn-default btn-sm" >Add Project</a> -->
<br/>

<?php echo $__env->make('partials.comments', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


<div class="row container-fluid">

<form method="post" action="<?php echo e(route('comments.store')); ?>">
                            <?php echo e(csrf_field()); ?>



                            <input type="hidden" name="commentable_type" value="App\Project">
                            <input type="hidden" name="commentable_id" value="<?php echo e($project->id); ?>">


                            <div class="form-group">
                                <label for="comment-content">Comment</label>
                                <textarea placeholder="Enter comment" 
                                          style="resize: vertical" 
                                          id="comment-content"
                                          name="body"
                                          rows="3" spellcheck="false"
                                          class="form-control autosize-target text-left">

                                          
                                          </textarea>
                            </div>

                            
                            <div class="form-group">
                                <label for="comment-content">Proof of work done (Url/Photos)</label>
                                <textarea placeholder="Enter url or screenshots" 
                                          style="resize: vertical" 
                                          id="comment-content"
                                          name="url"
                                          rows="2" spellcheck="false"
                                          class="form-control autosize-target text-left">

                                          
                                          </textarea>
                            </div>


                            <div class="form-group">
                                <input type="submit" class="btn btn-primary"
                                       value="Submit"/>
                            </div>
                        </form>
   


                        </div>

                      

      </div>
</div>


<div class="col-sm-3 col-md-3 col-lg-3 pull-right">
          <!--<div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> -->
          <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
              <li><a href="/projects/<?php echo e($project->id); ?>/edit">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
              Edit</a></li>
              <li><a href="/project/create"><i class="fa fa-plus-circle" aria-hidden="true"></i> Create new project</a></li>
              <li><a href="/projects"><i class="fa fa-user-o" aria-hidden="true"></i> My projects</a></li>
            
            <br/>


            <?php if($project->user_id == Auth::user()->id): ?>
            
              <li>
              <i class="fa fa-power-off" aria-hidden="true"></i>
              <a   
              href="#"
                  onclick="
                  var result = confirm('Are you sure you wish to delete this project?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                          "
                          >
                  Delete
              </a>

              <form id="delete-form" action="<?php echo e(route('projects.destroy',[$project->id])); ?>" 
                method="POST" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        <?php echo e(csrf_field()); ?>

              </form>

              </li>
 <?php endif; ?>
              <!-- <li><a href="#">Add new member</a></li> -->
            </ol>
<hr/>

            <h4>Add members</h4>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-xs-12  col-sm-12 ">
              <form id="add-user" action="<?php echo e(route('projects.adduser')); ?>"  method="POST" >
                <?php echo e(csrf_field()); ?>

                <div class="input-group"> 
                  <input class="form-control" name = "project_id" id="project_id" value="<?php echo e($project->id); ?>" type="hidden">
                  <input type="text" required class="form-control" id="email"  name = "email" placeholder="Email">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" id="addMember" >Add!</button>
                  </span>
                </div><!-- /input-group -->
                </form>
              </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
<br/>
            <h4>Team Members</h4>
            <ol class="list-unstyled" id="member-list">
            <?php $__currentLoopData = $project->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><a href="#"> <?php echo e($user->email); ?> </a> </li>
              
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ol>

          </div>

          <!--<div class="sidebar-module">
            <h4>Members</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>
            </ol>
          </div> -->
        </div>


    <?php $__env->stopSection(); ?>

    
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>