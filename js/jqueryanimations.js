$(window).load(function() {
		$('.flexslider').flexslider({
        keyboard: true,
        controlNav: true,            
        slideshowSpeed: 2000,            
        touch: true
        });
	  });
	
$(document).ready(function() {	
    $( ".searchbutton" ).click(function()
        {
        //confirm('you clicked the nav button');
        $( "#searchbar" ).slideToggle("slow");
            
    });
});        
	
$(document).ready(function() {	
    $( ".loginbutton" ).click(function()
        {
        //confirm('you clicked the nav button');
        $( ".formcontainer" ).slideToggle("slow");
        $( ".black" ).fadeToggle("slow");            
    });
});
                
        

        
//Show the mobile navbar        
$(document).ready(function() {	
    $( ".mobilenavicon" ).click(function()
        {
        //confirm('you clicked the nav button');
        $( "#mobilenavbar" ).slideToggle("slow");
    });
});        

        
        
// Show the girls product list    
$(document).ready(function() {	
    $( "#mobilenavgirlsheading" ).click(function()
        {
        //confirm('you clicked the nav button');
        $( "#mobilenavgirlslist" ).slideToggle("slow");
        $("#mobilenavgirlsheading").toggleClass("uparrow");        
    });
});        

$(document).ready(function() {	

//show girls categories      
    $( "#mobilenavgirlscategory" ).click(function()
        {
        //confirm('you clicked the nav button');
        $( "#mobilenavgirlscategorylist" ).slideToggle("slow");
        $("#mobilenavgirlscategory").toggleClass("uparrow");        		
    });
    
//show girls colours    
    $( "#mobilenavgirlscolour" ).click(function()
        {
        //confirm('you clicked the nav button');
        $( "#mobilenavgirlscolourlist" ).slideToggle("slow");
        $("#mobilenavgirlscolour").toggleClass("uparrow");        		
    });

//show girls sizes    
    $( "#mobilenavgirlssize" ).click(function()
        {
        //confirm('you clicked the nav button');
        $( "#mobilenavgirlssizelist" ).slideToggle("slow");
        $("#mobilenavgirlssize").toggleClass("uparrow");        				
    });

//show girls products on sale    
    $( "#mobilenavgirlssale" ).click(function()
        {
        //confirm('you clicked the nav button');
        $( "#mobilenavgirlssalelist" ).slideToggle("slow");
        $("#mobilenavgirlssale").toggleClass("uparrow");        		
    });
    
});



// Show the guys product list    
$(document).ready(function() {	
    $( "#mobilenavguysheading" ).click(function()
        {
        //confirm('you clicked the nav button');
        $( "#mobilenavguyslist" ).slideToggle("slow");
        $("#mobilenavguysheading").toggleClass("uparrow");        
    });
});        

$(document).ready(function() {	

//show guys categories      
    $( "#mobilenavguyscategory" ).click(function()
        {
        //confirm('you clicked the nav button');
        $( "#mobilenavguyscategorylist" ).slideToggle("slow");
        $("#mobilenavguyscategory").toggleClass("uparrow");        		
    });
    
//show guys colours    
    $( "#mobilenavguyscolour" ).click(function()
        {
        //confirm('you clicked the nav button');
        $( "#mobilenavguyscolourlist" ).slideToggle("slow");
        $("#mobilenavguyscolour").toggleClass("uparrow");        		
    });

//show guys sizes    
    $( "#mobilenavguyssize" ).click(function()
        {
        //confirm('you clicked the nav button');
        $( "#mobilenavguyssizelist" ).slideToggle("slow");
        $("#mobilenavguyssize").toggleClass("uparrow");        				
    });

//show guys products on sale    
    $( "#mobilenavguyssale" ).click(function()
        {
        //confirm('you clicked the nav button');
        $( "#mobilenavguyssalelist" ).slideToggle("slow");
        $("#mobilenavguyssale").toggleClass("uparrow");        		
    });
    
});        