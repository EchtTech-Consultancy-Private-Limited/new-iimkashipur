function trackPageView(data) {

    internalTracking("page-view", null, "page-view");
}

function trackDashboardClick(data) {

}

function trackDashboardEvent(event_name, parameters) {

}
function trackLogin(data) {
    alert('1');
    dataLayer.push({
        "event": "Customer Signed In",
        "event_category" : "Customer Action",
        "event_action" : "Sign In",
        "event_label" :"Success",
        "event_app" : "Customer App",
        "properties" : {
            "user_id" : data.user_id,
            "customer_email" : data.email,
            "customer_name" : data.name,
            "customer_sign_up_date": data.signup_date,
            "crisp_signature": data.crisp_signature,
            "email_verified" : data.email_verified,
        }
    })
    alert('1');
    internalTracking("event", "Dashboard", "logged-in", data.email);
    alert('2');
}

function trackFailedLogin(data) {
    dataLayer.push({
        "event": "Customer Sign In Failed",
        "event_category" : "Customer Action",
        "event_action" : "Sign In",
        "event_label" :"Failed",
        "event_app" : "Customer App",
        "properties" : {
            "customer_email" : data.email,
            "customer_log_in_method" : data.login_method,
        }
    })

    internalTracking("event", "Dashboard", "failed-login-attempt", "email: " + data.email + ", login_method: " + data.login_method);
}
function trackLogout(data) {
    dataLayer.push({
        "event": "Customer Signed Out",
        "event_category" : "Customer Action",
        "event_action" : "Sign Out",
        "event_label" :"Success",
        "event_app" : "Customer App",
        "properties" : {
            "customer_email" :data.email,
            "logout_method" : data.logout_method,
            "logout_timestamp" : data.logout_timestamp,
        }
    })

    // internalTracking("event", "Dashboard", "logged-out", data.email);
}
// internal tracking
function internalTracking(eventType, eventCategory = null, eventAction = null, eventLabel = null, miscData = null) {
    alert('3');
    axios.post("/analytics", {
        page: window.location.href,
        referrer: document.referrer,
        userAgent: navigator.userAgent,
        eventType: eventType,
        eventCategory: eventCategory,
        eventAction: eventAction,
        eventLabel: eventLabel,
        miscData: miscData
    })
}