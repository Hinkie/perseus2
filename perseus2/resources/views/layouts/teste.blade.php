<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8" />
    <title>Semantic UI CDN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.11.8/semantic.min.js"></script>
</head>
<body>
     <div class="ui container"></div>
           <div class="ui four item fluid tabs menu"><a data-tab="flip up" class="item active">Top</a><a data-tab="flip left" class="item">Left</a><a data-tab="flip right" class="item">Right</a><a data-tab="flip down" class="item">Bottom</a></div>
           <div class="ui two column centered grid">
             <div class="column">
               <div class="ui cube shape">
                 <div class="sides">
                   <div class="side">
                     <div class="content">
                       <div class="center">1</div>
                     </div>
                   </div>
                   <div class="side">
                     <div class="content">
                       <div class="center">2</div>
                     </div>
                   </div>
                   <div class="side">
                     <div class="content">
                       <div class="center">3</div>
                     </div>
                   </div>
                   <div class="side">
                     <div class="content">
                       <div class="left">4</div>
                     </div>
                   </div>
                   <div class="side active">
                     <div class="content">
                       <div class="center">5</div>
                     </div>
                   </div>
                   <div class="side">
                     <div class="content">
                       <div class="center">6</div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
</body>
<script type="text/javascript">
  $(function(){
    
    var
        $outerSquare = $('.cube'),
      $menus     = $('a.item'),
      $innerSquare = $('.center'),
      $menuParent = $menus.parent(),
      $box       = $('.shape')
      ;
    
    $outerSquare
     .click('$flip', function() {
      $box.shape('flip up');
      })
  ;
  $menus.detach();
    $menus
      .click( '$menus', function() {
          $(this)
           .addClass('active')
            .siblings('.item')
              .removeClass('active');
    
      })
  ;
  $menuParent.append( $menus );
    
    $menus.on('click', function(attr) {
      var tabId = $(this).attr('data-tab');
      $box.shape(tabId);
    })
  ;
    
    $innerSquare
         .mouseover('$flip', function() {
      $box.shape('flip left');
      })
    ;
    
    
  });
</script>

</html>
