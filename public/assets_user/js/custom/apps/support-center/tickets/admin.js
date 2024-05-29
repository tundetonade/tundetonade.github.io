"use strict";

// Class definition
var KTModalNewTicket = function () {
	var submitButton;
	var cancelButton;
	var validator;
	var form;
	var modal;
	var modalEl;

	// Init form inputs
	var initForm = function() {
		// Ticket attachments
		// For more info about Dropzone plugin visit:  https://www.dropzonejs.com/#usage
		var myDropzone = new Dropzone("#kt_modal_create_ticket_attachments", { 
			url: "https://keenthemes.com/scripts/void.php", // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
		});  

		// Due date. For more info, please visit the official plugin site: https://flatpickr.js.org/
		var dueDate = $(form.querySelector('[name="due_date"]'));
		dueDate.flatpickr({
			enableTime: true,
			dateFormat: "d, M Y, H:i",
		});

		// Ticket user. For more info, plase visit the official plugin site: https://select2.org/
        $(form.querySelector('[name="user"]')).on('change', function() {
            // Revalidate the field when an option is chosen
            validator.revalidateField('user');
        });

		// Ticket status. For more info, plase visit the official plugin site: https://select2.org/
        $(form.querySelector('[name="status"]')).on('change', function() {
            // Revalidate the field when an option is chosen
            validator.revalidateField('status');
        });
	}

	// Handle form validation and submittion
	var handleForm = function() {
		// Stepper custom navigation

		// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
		validator = FormValidation.formValidation(
			form,
			{
				fields: {
					product_name: {
						validators: {
							notEmpty: {
								message: 'Product Name is Required'
							}
						}
					},
						email: {
						validators: {
							notEmpty: {
								message: 'Email is Required'
							}
						}
					},
					name: {
						validators: {
							notEmpty: {
								message: 'Name is Required'
							}
						}
					},
					adminrole: {
						validators: {
							notEmpty: {
								message: 'Admin Role is Required'
							}
						}
					},
					weight: {
						validators: {
							notEmpty: {
								message: 'Weight is Required'
							}
						}
					},
					amount: {
						validators: {
							notEmpty: {
								message: 'Amount is Required'
							}
						}
					},
					
					supply_date: {
						validators: {
							notEmpty: {
								message: 'Supply Date is Required'
							}
						}
					},
					
					no_bags: {
						validators: {
							notEmpty: {
								message: 'Number of Bags is Required'
							}
						}
					},
					
					},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
						rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
					})
				}
			}
		);

		// Action buttons
		submitButton.addEventListener('click', function (e) {
			e.preventDefault();

			// Validate form before submit
			if (validator) {
				validator.validate().then(function (status) {
					console.log('validated!');

					if (status == 'Valid') {
						submitButton.setAttribute('data-kt-indicator', 'on');

						// Disable button to avoid multiple click 
						submitButton.disabled = true;

						setTimeout(function() {
							submitButton.removeAttribute('data-kt-indicator');

							// Enable button
							submitButton.disabled = false;
							
							// Show success message. For more info check the plugin's official documentation: https://sweetalert2.github.io/
							// Swal.fire({
							// 	text: "Form has been successfully submitted!",
							// 	icon: "success",
							// 	buttonsStyling: false,
							// 	confirmButtonText: "Ok, got it!",
							// 	customClass: {
							// 		confirmButton: "btn btn-primary"
							// 	}
							// }).then(function (result) {
							// 	if (result.isConfirmed) {
							// 		modal.hide();
							// 	}
							// });

							form.submit(); // Submit form
						}, 2000);   						
					} else {
						// Show error message.
						Swal.fire({
							text: "Sorry, looks like there are some errors detected, please try again.",
							icon: "error",
							buttonsStyling: false,
							confirmButtonText: "Ok, got it!",
							customClass: {
								confirmButton: "btn btn-primary"
							}
						});
					}
				});
			}
		});

		cancelButton.addEventListener('click', function (e) {
			e.preventDefault();

			Swal.fire({
				text: "Are you sure you would like to cancel?",
				icon: "warning",
				showCancelButton: true,
				buttonsStyling: false,
				confirmButtonText: "Yes, cancel it!",
				cancelButtonText: "No, return",
				customClass: {
					confirmButton: "btn btn-primary",
					cancelButton: "btn btn-active-light"
				}
			}).then(function (result) {
				if (result.value) {
					form.reset(); // Reset form	
					modal.hide(); // Hide modal				
				} else if (result.dismiss === 'cancel') {
					Swal.fire({
						text: "Your form has not been cancelled!.",
						icon: "error",
						buttonsStyling: false,
						confirmButtonText: "Ok, got it!",
						customClass: {
							confirmButton: "btn btn-primary",
						}
					});
				}
			});
		});
	}

	return {
		// Public functions
		init: function () {
			// Elements
			modalEl = document.querySelector('#kt_modal_new_ticket_admin');

			if (!modalEl) {
				return;
			}

			modal = new bootstrap.Modal(modalEl);

			form = document.querySelector('#kt_modal_new_ticket_admin_form');
			submitButton = document.getElementById('kt_modal_new_ticket_admin_submit');
			cancelButton = document.getElementById('kt_modal_new_ticket_admin_cancel');

			initForm();
			handleForm();
		}
	};
}();

// On document ready
KTUtil.onDOMContentLoaded(function () {
	KTModalNewTicket.init();
});