<?php defined("APP") or die() // Main Page ?>  
<section class="hero">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="promo">
          <h1><?php echo $this->config["title"] ?></h1>
        </div>

        <?php echo Main::message() ?>
        <!-- 网址缩短简单形式 -->
        <?php echo $this->shortener() ?>
        <!-- 网址缩短简单形式END -->
 
      </div>
    </div>
  </div> 
 <?php echo $this->ads(728) ?>
  <svg id="wave" viewbox="0 0 100 15">
    <path fill="#fff" opacity="0.5" d="M0 30 V15 Q30 3 60 15 V30z" />
    <path fill="#fff" d="M0 30 V12 Q30 17 55 12 T100 11 V30z" />
  </svg>   
</section>
<?php if(!$this->history()): ?>
  <section id="mainto">
    <div class="container">
      <h3 class="text-center featureH">
        <?php echo e("One short link, infinite possibilities.") ?>        
      </h3>
      <p class="text-center featureP">
        <?php echo e("A short link is a powerful marketing tool when you use it carefully. It is not just a link but a medium between your customer and their destination. A short link allows you to collect so much data about your customers and their behaviors.") ?>
      </p>
    
      <p class="text-center">
        <a href="<?php echo Main::href("user/register") ?>" class="btn btn-secondary btn-lg btn-round"><?php echo e("Create an account") ?></a> 
      </p>              
        
      
    </div>    
  </section>
  
 
<?php endif; ?>
<?php $this->public_list() ?>
 
