<?php if(count($errors)):?>
  
  <div class="err">
  <?php foreach($errors as $error): ?>
  <p> <?php echo $error; ?></p>
  <?php endforeach; ?>
  </div>

<?php endif; ?>