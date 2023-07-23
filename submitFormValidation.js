

 
    function submitForm() 
    {
        // Read the value of the hidden input field
        var validationPassed = document.getElementById('validationPassed').value;

        // Check if validationPassed is true to submit the form to "sendPasswordReset.php"
        if (validationPassed =='true') {

            document.getElementById('resetForm').action = 'sendPasswordReset.php';
            return true;

        } 
    }
