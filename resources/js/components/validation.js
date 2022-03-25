require('jquery-validation');

(function ($) {
    let authForm = $('#authForm'),
        profileForm = $('#profileFOrm'),
        employeeForm = $('#employeeForm');

    $.validator.addMethod("isEmailValid",
        function(value, element) {
            return /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(value)
        }, 'Please enter a valid email address.'
    );

    $.validator.addMethod("intlTelNumber", function(value, element) {
        return this.optional(element) || $(element).intlTelInput("isValidNumber");
    }, "Please enter a valid International Phone Number");

    authForm.validate({
        rules: {
            email: {
                required :true,
                isEmailValid: true
            },
            password: {
                required: true,
                minlength: 8
            },
            password_confirmation: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            password_confirmation: {
                equalTo: "Password do not match"
            }
        }
    });

    profileForm.validate({
        rules: {
            phone_number: {
                required: true,
                intlTelNumber: true
            },
            email: {
                required :true,
                isEmailValid: true
            },
            first_name: "required",
            last_name: "required",
            state: "required",
            country: "required",
            address: "required",
            city: "required",
            start_date: "required",
            salary: "required",
            job_title: "required",
            title: "required"
        }
    })

    employeeForm.validate({
        rules: {
            phone_number: {
                required: true,
                intlTelNumber: true
            },
            email: {
                required :true,
                isEmailValid: true
            },
            first_name: "required",
            last_name: "required",
            start_date: "required",
            salary: "required",
            job_title: "required",
            title: "required"
        }
    })

})(jQuery)
