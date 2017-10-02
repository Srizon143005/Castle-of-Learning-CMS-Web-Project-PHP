$(document).ready(function(){
    
    $('#selectallboxes').click(function(event){
        
        if(this.checked){
            $('.checkboxes').each(function(){
                this.checked = true;                      
            });
        }
        else{
            $('.checkboxes').each(function(){
                this.checked = false;                      
            });
        }
        
    });
    
});