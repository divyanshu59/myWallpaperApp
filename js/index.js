$(document).ready(function(){

$("#addWallpaper").hide();
$("#editInfo").hide();
$("#addCategory").hide();

$('[name="addWall"]').click(function(){
    $("#mainPart").toggle(1000);
    $("#addWallpaper").toggle();
    $("#addCategory").hide();
    $("#editInfo").hide();
   
  });
 $('[name="addCato"]').click(function(){
    $("#mainPart").toggle(1000);
    $("#addCategory").toggle();
   $("#addWallpaper").hide();
    $("#editInfo").hide();
  });

 $('[name="editInfo"]').click(function(){
    $("#mainPart").toggle(1000);
    $("#editInfo").toggle();
    $("#addWallpaper").hide();
    $("#addCategory").hide();
   
  });

 $('[name="BaraddWall"]').click(function(){
    $("#mainPart").toggle(1000);
    HideAll()
    $("#addWallpaper").toggle();
   
  });
 $('[name="BaraddCato"]').click(function(){
    $("#mainPart").toggle(1000);
    HideAll()
    $("#addCategory").toggle();
   
  });
 $('[name="BareditInfo"]').click(function(){
    $("#mainPart").toggle(1000);
    HideAll()
    $("#editInfo").toggle();
  
   
  });

 $('#btnBackAddWall').click(function(){
    $("#mainPart").toggle(1000);
    $("#editInfo").hide(1000);
    $("#addCategory").hide(1000);
    $("#addWallpaper").hide(1000);
   
  });
   $('#btnBackAddCato').click(function(){
    $("#mainPart").toggle(1000);
    $("#editInfo").hide(1000);
    $("#addCategory").hide(1000);
    $("#addWallpaper").hide(1000);
   
  }); 
   $('#btnBackEditInfo').click(function(){
    $("#mainPart").toggle(1000);
    $("#editInfo").hide(1000);
    $("#addCategory").hide(1000);
    $("#addWallpaper").hide(1000);
   
  });
 

  function HideAll() {
   	$("#addWallpaper").hide();
    $("#addCategory").hide();
    $("#editInfo").hide();
   	 
   }
});

