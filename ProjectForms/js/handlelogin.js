function handleLogin(SSN, f_name, P_password) {
    // AJAX request to send the dispensing details to the server
    const xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
    if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
            // The request was successful
            alert(f_name + "has succfully logged in");
            window.location.reload(); // Reload the page to show updated data
            setTimeout(function () {
                errorMessage.style.display = "none";
            }, 3000);
        }
       
    }
};

}