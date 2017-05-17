/* function validate()will validate form data */


function validate() {
	var sid = $("#sid").val();
    var pwd1 = $("#pwd1").val();
	var uname = $("#uname").val();
	var pwd2 = $("#pwd2").val();
	
	var errMsg = "";								/* create variable to store the error message */
	var result = true;								/* assumes no errors */
	var pattern = /^[A-Za-z]+$/;					/* regular expression for letters and spaces only */
	var decimal =  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;  /* regular expression for password with 8-15 letters and one lowercase,uppercase,special character each. */
	
	if (sid == "") { //check whether User ID is empty
        errMsg += "<li>Email Id cannot be empty.</li>";
    }

    if (uname == "") { //check whether User Name is empty
        errMsg += "<li>User name cannot be empty.</li>";
    }

    if (pwd1 == "") { //check whether Password is empty
        errMsg += "<li>Password cannot be empty.</li>";
    }

	if (pwd2 == "") { //check whether Password is Re-entered
        errMsg += "<li>Please re-enter password.</li>";
    }

    /* Rule 3, check if user name contains only letters and spaces */
    if (! uname.match (pattern)) {
        errMsg += "<li>User name contains symbols.</li>";
    }

    /* Rule 4, check if password contains letters and other chracters between 8 to 15 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character */ 
    if (! pwd1.match (decimal)) {
        errMsg += "<li>Write password between 8-15 letters with 1 lowercase,uppercase,special character each.</li>";
	}

	/* Display error message if any error(s) is/are detected */
    if (errMsg != "") {
        errMsg = "<div id='scrnOverlay'></div>" //8.3
        + "<section id='errWin' class='window'><ul>"
        + errMsg //8.4
        + "</ul><a href='#' id='errBtn' class='button'>Close</a></section>";

        var numOfItems = ((errMsg.match(/<li>/g)).length) + 6; //8.5
        $("body").after(errMsg); //8.6
        $("#scrnOverlay").css('visibility', 'visible'); //8.7
        $("#errWin").css('height', numOfItems.toString() + 'em'); //8.8
        $("#errWin").css('margin-top', (numOfItems/-2).toString() + 'em'); //8.8
        $("#errWin").show(); //8.9
        $("#errBtn").click (function () { //8.10
            $("#scrnOverlay").remove();
            $("#errWin").remove();
        });

        result = false;
    }

return result
}

/* link HTML elements to corresponding event function */
function init() {

$("#loginset").submit(validate); // link function validate() to the submit event of the form

}
/* execute function init() once the window is loaded*/
$(document).ready(init);