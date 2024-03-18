function validate() {
    const age = document.forms['validateform']["age"].value;
    
    if (age > 100) {
        window.alert 
            ("Please enter valid age"); 
        age.focus(); 
        return false; 
    }
    return true;
};