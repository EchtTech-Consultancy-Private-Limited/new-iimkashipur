function refreshCaptcha(){
	var baseURL = $("meta[name='baseURL']").attr('content');
	$.ajax({
        url: baseURL+'captcha-code', // URL to the server-side script
        type: 'GET',
        success: function() {
            // Update captcha image source
            var baseURL = $("meta[name='baseURL']").attr('content');
            $('#captchaimg').attr('src', baseURL+'captcha-code');
        },
        error: function(xhr, status, error) {
            console.error('Error refreshing captcha:', error);
        }
    });
	
}