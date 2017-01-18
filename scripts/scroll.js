$('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        if (target.length) {
            $('html, body').animate({
                scrollTop: target.offset().top
            }, 800);
            return false;
        }
    }
});

/*function checkTextField(e) {
	e.preventDefault();
    var phone_num = document.getElementById("tel").value;
    if (phone_num != "") {       
                $("#myModal").modal("show");
    }
}
*/
$('#form1').submit(function(e) {
    e.preventDefault();
    var phone_num = document.getElementById("tel").value;
    if (phone_num != "") {
        $("#myModal").modal("show");
        $("#myModal #telp").val(phone_num);
        $("#myModal #mobile").val(phone_num);
    }
})