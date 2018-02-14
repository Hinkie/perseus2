@extends('layouts.admin.admin-master')

@section('conteudo')
  <div class="pagination-container" >
     <div data-page="1" >
        <p>Content for Div Number 1</p>
     </div>
     <div data-page="2" style="display:none;">
        <p>Content for Div Number 2</p>
     </div>
     <div data-page="3" style="display:none;">
        <p>Content for Div Number 3</p>
     </div>
     <div data-page="4" style="display:none;">
        <p>Content for Div Number 4</p>
     </div>
     <div data-page="5" style="display:none;">
        <p>Content for Div Number 5</p>
     </div>

     <div class="text-center">
     <div class="pagination pagination-centered">
         <ul class="pagination ">
              <li data-page="-" ></li>
              <li data-page="1"><a href="" >1</a></li>
              <li data-page="2"><a href="" >2</a></li>
              <li data-page="3"><a href="" >3</a></li>
              <li data-page="4"><a href="" >4</a></li>
              <li data-page="5"><a href="" >5</a></li>
              <li data-page="+"><a href="" >&gt;</a></li>
        </ul>
     </div></div></div>
     <script>
     var paginationHandler = function(){
         // store pagination container so we only select it once
         var $paginationContainer = $(".pagination-container"),
             $pagination = $paginationContainer.find('.pagination ul');
         // click event
         $pagination.find("li a").on('click.pageChange',function(e){
             e.preventDefault();
             // get parent li's data-page attribute and current page
         var parentLiPage = $(this).parent('li').data("page"),
         currentPage = parseInt( $(".pagination-container div[data-page]:visible").data('page') ),
         numPages = $paginationContainer.find("div[data-page]").length;
         // make sure they aren't clicking the current page
         if ( parseInt(parentLiPage) !== parseInt(currentPage) ) {
         // hide the current page
         $paginationContainer.find("div[data-page]:visible").hide();
         if ( parentLiPage === '+' ) {
                     // next page
             $paginationContainer.find("div[data-page="+( currentPage+1>numPages ? numPages : currentPage+1 )+"]").show();
         } else if ( parentLiPage === '-' ) {
                     // previous page
             $paginationContainer.find("div[data-page="+( currentPage-1<1 ? 1 : currentPage-1 )+"]").show();
         } else {
             // specific page
             $paginationContainer.find("div[data-page="+parseInt(parentLiPage)+"]").show();
                 }
             }
         });
     };
     $( document ).ready( paginationHandler );
     </script>
@endsection
